<div wire:ignore-self class="password-request">
    <div class="title">Request new password</div>
    <form wire:submit.prevent="requestNewPassword" >
        <div class="form-group">
          <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button  class="btn btn-custom mt-4">Submit</button>
        <div class="text-center mt-2">
            <p>
                New password will be sent to the emil, soon.
            </p>
        </div>
    </form>
</div>