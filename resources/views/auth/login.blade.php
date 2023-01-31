 <div class="login">
     <div class="title">Sign In</div>
     <div class="error">
        <x-auth-session-status  :status="session('status')" />
        <x-auth-validation-errors  :errors="$errors" />
     </div>
     <form method="POST" action="{{ route('login') }}">
        @csrf
         <div class="form-group">
             <input type="email" id="email" class="form-control"  placeholder="Enter email"   name="email" :value="old('email')" required autofocus>
         </div>
         <div class="form-group">
             <input id="password" type="password" class="form-control" placeholder="Enter password" type="password" name="password" required autocomplete="current-password">
         </div>
         <button type="submit" class="btn btn-custom mt-4">{{ __('Log in') }}</button>
         <div class="text-center mt-2">
             <a wire:click="switch" >Forgot password ?</a>
         </div>
     </form>
 </div>
