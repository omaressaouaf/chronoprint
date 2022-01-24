<div>
   <h2 class="h4 mb-3">{{ __('Create Account') }}</h2>
   <p class="fs-sm text-muted mb-4">
      {{ __('Registration gives you full control over your orders') }}</p>
   <hr class="mt-3 mb-4">
   <form method="POST"
      action="{{ route('register') }}">
      @csrf

      <div class="row mb-3">
         <label for="register_name"
            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

         <div class="col-md-6">
            <input id="register_name"
               type="text"
               class="form-control @error('register_name') is-invalid @enderror"
               name="register_name"
               value="{{ old('register_name') }}"
               required
               autocomplete="register_name"
               autofocus>

            @error('register_name')
               <span class="invalid-feedback"
                  role="alert">
                  <strong>{{ $message }}</strong>
               </span>
            @enderror
         </div>
      </div>

      <div class="row mb-3">
         <label for="register_email"
            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

         <div class="col-md-6">
            <input id="register_email"
               type="email"
               class="form-control @error('register_email') is-invalid @enderror"
               name="register_email"
               value="{{ old('register_email') }}"
               required
               autocomplete="register_email">

            @error('register_email')
               <span class="invalid-feedback"
                  role="alert">
                  <strong>{{ $message }}</strong>
               </span>
            @enderror
         </div>
      </div>
      <div class="row mb-3">
         <label for="register_phone"
            class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

         <div class="col-md-6">
            <input id="register_phone"
               class="form-control @error('register_phone') is-invalid @enderror"
               name="register_phone"
               value="{{ old('register_phone') }}"
               required
               autocomplete="register_phone">

            @error('register_phone')
               <span class="invalid-feedback"
                  role="alert">
                  <strong>{{ $message }}</strong>
               </span>
            @enderror
         </div>
      </div>

      <div class="row mb-3">
         <label for="register_password"
            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

         <div class="col-md-6">
            <input id="register_password"
               type="password"
               class="form-control @error('register_password') is-invalid @enderror"
               name="register_password"
               required
               autocomplete="new-password">

            @error('register_password')
               <span class="invalid-feedback"
                  role="alert">
                  <strong>{{ $message }}</strong>
               </span>
            @enderror
         </div>
      </div>

      <div class="row mb-3">
         <label for="register_password-confirm"
            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

         <div class="col-md-6">
            <input id="register_password-confirm"
               type="password"
               class="form-control"
               name="register_password_confirmation"
               required
               autocomplete="new-password">
         </div>
      </div>

      <div class="text-end pt-4">
         <button class="btn btn-primary"
            type="submit"><i class="ci-user me-2 ms-n1"></i>{{ __('Register') }}</button>
      </div>
   </form>
</div>
