<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\VetDetails;
use App\Models\VetCenter;
use App\Models\CentreVet;

use Illuminate\Support\Facades\Validator;

use App\Http\Resources\UserResource;
use App\Http\Resources\VetResource;
use App\Http\Resources\OwnerResource;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(UserResource::collection(User::paginate()), 'RETRIEVE_MANY_SUCCESS');
    }

    /**
     * Get users by role
     *
     * @param  string  $role
     */
    public function getUsersByRole($role)
    {
        $users = User::with('role')->whereHas('role', function ($query) use ($role) {
            $query->where('name', $role);
        })->get();

        // return different response if no user is found
        if ($users->isEmpty()) {
            return $this->sendError('RETRIEVE_MANY_FAILED', ['message' => 'No user found'], 404);
        }

        // return different responses based on the role
        if ($role === 'vet') {
            // add eager loading for vet details and vet center to already loaded users
            $users->load('vetDetails', 'vetCenter.center');
            return $this->sendResponse(VetResource::collection($users), 'RETRIEVE_MANY_SUCCESS');
        } elseif ($role === 'owner') {
            return $this->sendResponse(OwnerResource::collection($users), 'RETRIEVE_MANY_SUCCESS');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|min:3|max:255',
            'mname' => 'nullable',
            'sname' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|unique:users',
            'image' => 'nullable|string',
            'role' => 'nullable|string',
            'additionalInfo' => 'nullable',
        ]);


        if ($validator->fails()) {
            return $this->sendError('VALIDATION_ERROR', $validator->errors(), 422);
        }

        // check if there's role attribute else create a new user with "owner" role
        if ($request->has('role')) {
            // clean the role input to small letters
            $inputRole = strtolower($request->role);

            // check if the role exists in the database
            $role = Role::where('name', $inputRole)->first();

            if (is_null($role)) {
                $role = new Role;
                $role->name = $inputRole;
                $role->save();
            }

            // check if there is additional info in the payload
            if ($inputRole == 'vet' && !$request->has('additionalInfo')) {
                return $this->sendError('MISSING_ADDITIONAL_INFO');
            } else {
                // check if additional info data is correct for given role
                $additionalInfoData = $request->additionalInfo;

                if ($role->name == 'vet' && !array_key_exists('license_no', $additionalInfoData)) {
                    return $this->sendError('ADDITIONAL_INFO_ROLE_MISMATCH');
                } elseif ($role->name == 'vet' && !array_key_exists('vet_center', $additionalInfoData)) {
                    return $this->sendError('ADDITIONAL_INFO_ROLE_MISMATCH');
                }

                // create the user
                $user = new User;
                $user->fname = $request->fname;
                $user->mname = $request->mname ? $request->mname : null;
                $user->sname = $request->sname;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->role_id = $role->id;
                $user->password = $request->phone ? bcrypt($request->phone) : bcrypt($request->email);
                $user->image = $request->image ? $request->image : null;

                // try-catch block to handle database transactions
                try {
                    DB::transaction(function () use ($user, $role, $additionalInfoData) {
                        $user->save();

                        if ($role->name == 'vet') {
                            $vetDetails = new VetDetails;
                            $vetDetails->user_id = $user->id;
                            $vetDetails->license_no = $additionalInfoData['license_no'];
                            $vetDetails->license_expiry = $additionalInfoData['license_expiry'] ?? null;
                            $vetDetails->licence_copy = $additionalInfoData['licence_copy'] ?? null;
                            $vetDetails->save();

                            // create the relationship between the vet and the vet center but first check if the vet center exists
                            // clean the vet center name input
                            $inputVetCenter = ucwords(strtolower($additionalInfoData['vet_center']));

                            $vetCenter = VetCenter::where('name', $inputVetCenter)->first();

                            if (is_null($vetCenter)) {
                                $vetCenter = new VetCenter;
                                $vetCenter->name = $inputVetCenter;

                                // check if location is provided, if not take the first word of the vet center name
                                $vetCenter->location = $additionalInfoData['location'] ?? explode(' ', $inputVetCenter)[0];
                                $vetCenter->save();
                            }

                            $centreVet = new CentreVet;
                            $centreVet->vet_center_id = $vetCenter->id;
                            $centreVet->vet_id = $user->id;
                            $centreVet->save();

                            // return $user;
                        }
                    });

                    if ($role->name == 'vet') {
                        return $this->sendResponse(new VetResource($user), 'CREATE_SUCCESS');
                    } elseif ($role->name == 'owner') {
                        return $this->sendResponse(new OwnerResource($user), 'CREATE_SUCCESS');
                    }
                } catch (\Throwable $th) {
                    return $this->sendError('CREATE_FAILED', $th->getMessage());
                }
            }
        } else {
            $role = 'owner';

            $user = new User;
            $user->fname = $request->fname;
            $user->mname = $request->mname ? $request->mname : null;
            $user->sname = $request->sname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role_id = Role::where('name', $role)->first()->id;
            $user->password = $request->phone ? bcrypt($request->phone) : bcrypt($request->email);
            $user->image = $request->image ? $request->image : null;

            try {
                $user->save();
                return $this->sendResponse(new OwnerResource($user), 'CREATE_SUCCESS');
            } catch (\Throwable $th) {
                return $this->sendError('CREATE_FAILED', $th->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
