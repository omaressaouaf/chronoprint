<x-account-layout :title="__('Update your profile info')" active-page="Profile">
   <form action="{{ route('account.profile.update') }}"
      method="POST">
      @csrf
      @method("PUT")
      <div class="row gx-4 gy-3">
         <div class="col-sm-12">
            <label class="form-label">{{ __('Name') }}</label>
            <input name="name"
               class="form-control"
               value="{{ auth()->user()->name }}">
         </div>
         <div class="col-sm-12">
            <label class="form-label">{{ __('E-Mail Address') }}</label>
            <input name="email"
               class="form-control"
               type="email"
               value="{{ auth()->user()->email }}">
         </div>
         <div class="col-sm-12">
            <label class="form-label">{{ __('Phone') }}</label>
            <input name="phone"
               class="form-control"
               value="{{ auth()->user()->phone }}">
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
