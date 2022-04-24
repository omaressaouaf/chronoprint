<div>
   <h2 class="h4 mb-3">{{ __('Create Account') }}</h2>
   <p class="fs-sm text-muted mb-4">
      {{ __('Registration gives you full control over your orders') }}</p>
   <hr class="mt-3 mb-4">
   <form method="POST"
      action="{{ route('register') }}">
      @csrf
      <div class="form-group mb-3 mt-4">
         <div class="input-group">
            <i
               class="ci-user position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
            <input id="register_name"
               placeholder="{{ __('Full name') }}"
               class="form-control rounded-start @error('register_name') is-invalid @enderror"
               name="register_name"
               value="{{ old('register_name') }}"
               required
               autocomplete="register_name"
               autofocus>

         </div>
         @error('register_name')
            <span class="text-danger fs-xs"
               role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>
      <div class="form-group mb-3">
         <div class="input-group">
            <i
               class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
            <input type="email"
               placeholder="Email"
               class="form-control rounded-start @error('register_email') is-invalid @enderror"
               name="register_email"
               value="{{ old('register_email') }}"
               required
               autocomplete="register_email"
               autofocus>

         </div>
         @error('register_email')
            <span class="text-danger fs-xs"
               role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>
      <div class="form-group mb-3">
         <div class="input-group">
            <i
               class="ci-phone position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
            <input id="register_phone"
               placeholder="{{ __('Phone') }}"
               class="form-control rounded-start @error('register_phone') is-invalid @enderror"
               name="register_phone"
               value="{{ old('register_phone') }}"
               required
               autocomplete="register_phone"
               autofocus>

         </div>
         @error('register_phone')
            <span class="text-danger fs-xs"
               role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>
      <div class="form-group mb-3">
         <div class="input-group mb-3"><i
               class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
            <div class="password-toggle w-100">
               <input type="password"
                  placeholder="{{ __('Password') }}"
                  class="form-control @error('register_password') is-invalid @enderror"
                  name="register_password"
                  required
                  autocomplete="new-password">
               <label class="password-toggle-btn"
                  aria-label="Show/hide password">
                  <input class="password-toggle-check"
                     type="checkbox">
                  <div class="password-toggle-indicator"></div>
               </label>
            </div>
         </div>
         @error('register_password')
            <span class="text-danger fs-xs"
               role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>
      <div class="form-group mb-3">
         <div class="input-group mb-3"><i
               class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
            <div class="password-toggle w-100">
               <input type="password"
                  placeholder="{{ __('Password confirmation') }}"
                  class="form-control @error('register_password_confirmation') is-invalid @enderror"
                  name="register_password_confirmation"
                  required
                  autocomplete="new-password">
               <label class="password-toggle-btn"
                  aria-label="Show/hide password">
                  <input class="password-toggle-check"
                     type="checkbox">
                  <div class="password-toggle-indicator"></div>
               </label>
            </div>
         </div>
         @error('register_password_confirmation')
            <span class="text-danger fs-xs"
               role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>
      <hr class="mt-4">
      <p class="fs-sm mt-4">
         {{ __('Your personal data will be used to process your order, support your experience on this website and for other purposes described in our') }}
         <a href="{{ route('privacy-policy') }}">{{ __('Privacy policy') }}</a>
      </p>
      <div class="text-end pt-2">
         <button class="btn btn-primary"
            type="submit"><i class="ci-user me-2 ms-n1"></i>{{ __('Register') }}</button>
      </div>
   </form>
</div>
