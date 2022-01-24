<div>
   <h2 class="h4 mb-1">{{ __('Log in') }}</h2>
   <h3 class="fs-base pt-4 pb-2">{{ __('using the form below') }}</h3>
   <form method="POST"
      action="{{ route('login') }}">
      @csrf
      <div class="form-group mb-3 mt-4">
         <div class="input-group">
            <i
               class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
            <input type="email"
               placeholder="Email"
               class="form-control rounded-start @error('email') is-invalid @enderror"
               name="email"
               value="{{ old('email') }}"
               required
               autocomplete="email"
               autofocus>

         </div>
         @error('email')
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
                  placeholder="Password"
                  class="form-control @error('password') is-invalid @enderror"
                  name="password"
                  required
                  autocomplete="current-password">
               <label class="password-toggle-btn"
                  aria-label="Show/hide password">
                  <input class="password-toggle-check"
                     type="checkbox">
                  <div class="password-toggle-indicator"></div>
               </label>
            </div>
         </div>
         @error('password')
            <span class="invalid-feedback text-sm"
               role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>
      <div class="d-flex flex-wrap justify-content-between">
         <div class="form-check">
            <input class="form-check-input"
               type="checkbox"
               name="remember"
               id="remember"
               {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label"
               for="remember">{{ __('Remember Me') }}</label>
         </div>

         @if (Route::has('password.request'))
            <a class="nav-link-inline fs-sm"
               href="{{ route('password.request') }}">
               {{ __('Forgot Your Password?') }}
            </a>
         @endif
      </div>

      <hr class="mt-4">
      <div class="d-flex justify-content-between align-items-center pt-4">
         <a class="nav-link-inline fs-sm"
            href="{{ route('register') }}">
            {{ __('Create Account') }}
         </a>
         <button class="btn btn-primary"
            type="submit"><i class="ci-sign-in me-2 ms-n21"></i>{{ __('Login') }}</button>
      </div>
   </form>
</div>
