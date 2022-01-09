<x-account-layout :title="__('Update your password')">
   <form action="{{ route('account.password.update') }}"
      method="POST">
      @csrf
      @method("PUT")
      <div class="row gx-4 gy-3">
         <div class="col-sm-12">
            <label class="form-label">{{ __('Current password') }}</label>
            <input name="current_password"
               placeholder="{{ __('Current password') }}"
               class="form-control"
               type="password">
         </div>
         <div class="col-sm-12">
            <label class="form-label">{{ __('New password') }}</label>
            <input name="new_password"
               placeholder="{{ __('New password') }}"
               class="form-control"
               type="password">
         </div>
         <div class="col-sm-12">
            <label class="form-label">{{ __('New password confirmation') }}</label>
            <input name="new_password_confirmation"
               placeholder="{{ __('New password confirmation') }}"
               class="form-control"
               type="password">
         </div>
         <div class="col-12">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
               <button class="btn btn-primary mt-3 mt-sm-0 ms-auto"
                  type="submit">{{ __('Save') }}
               </button>
            </div>
         </div>
      </div>
   </form>
</x-account-layout>
