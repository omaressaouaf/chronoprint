<x-app-layout>
   <div class="container my-5">
      <div class="row justify-content-center">
         <div class="col-md-7">
            <div class="card border-0 shadow">
               <div class="card-body p-5">
                  <h2 class="h4 mb-3">{{ __('Create Account') }}</h2>
                  <p class="fs-sm text-muted mb-4">
                     {{ __('Registration gives you full control over your orders') }}</p>
                  <hr class="mt-3 mb-4">
                  <form method="POST"
                     action="{{ route('register') }}">
                     @csrf

                     <div class="row mb-3">
                        <label for="name"
                           class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                           <input id="name"
                              type="text"
                              class="form-control @error('name') is-invalid @enderror"
                              name="name"
                              value="{{ old('name') }}"
                              required
                              autocomplete="name"
                              autofocus>

                           @error('name')
                              <span class="invalid-feedback"
                                 role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="email"
                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                           <input id="email"
                              type="email"
                              class="form-control @error('email') is-invalid @enderror"
                              name="email"
                              value="{{ old('email') }}"
                              required
                              autocomplete="email">

                           @error('email')
                              <span class="invalid-feedback"
                                 role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="password"
                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                           <input id="password"
                              type="password"
                              class="form-control @error('password') is-invalid @enderror"
                              name="password"
                              required
                              autocomplete="new-password">

                           @error('password')
                              <span class="invalid-feedback"
                                 role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                           <input id="password-confirm"
                              type="password"
                              class="form-control"
                              name="password_confirmation"
                              required
                              autocomplete="new-password">
                        </div>
                     </div>

                     <div class="text-end pt-4">
                        <button class="btn btn-primary"
                           type="submit"><i
                              class="ci-user me-2 ms-n1"></i>{{ __('Register') }}</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
