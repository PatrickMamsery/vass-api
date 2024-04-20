<div>
    <div class="page centres-wrapper">
        <div class="custom-header">
            <h2>Vet Centres</h2>
            <div class="actions">
                <button class="btn btn-custom mr-4" type="button" data-toggle="modal" data-target="#centreModal">
                    <i class="fa-solid fa-plus"></i> Add Centre
                </button>
            </div>
        </div>
        <div class="content">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="custom-table">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($centres as $centre)
                            <tr>
                                <td>
                                    {{ $centre->name }}
                                </td>
                                <td>
                                    {{ $centre->location }}
                                </td>
                                <td>
                                    <a type="button" data-toggle="modal" data-target="#centreModal"
                                        wire:click="setFormData({{ $centre->id }})">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pages">
                {{ $centres->links() }}
            </div>
        </div>

        <!-- MODALS -->
        <div>
            <div wire:ignore.self class="modal fade" id="centreModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $action }} Vet Centre
                                Form</h5>
                                <div>
                                    @if ($action == 'Update')
                                    <a class="pr-3"
                                        wire:click="delete">
                                        <i class="fa-solid fa-trash text-danger "></i>
                                    </a>
                                @endif
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                        </div>
                        <div class="modal-body">
                            <div class="m-2">
                                <form wire:submit.prevent="createOrUpdate">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" wire:model="name"
                                                class="form-control">
                                            @error('name')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Location</label>
                                            <input type="text" wire:model="location"
                                                class="form-control">
                                            @error('location')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" d-flex justify-content-around w-100 pt-3">
                                        <button class="btn btn-custom pr-5 pl-5"
                                            type="submit">{{ $action }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
