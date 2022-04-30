<x-app-layout title="Programme revendeurs"
   canonical="dealers-program">
   <x-layout.breadcrumb :dark="false"
      :active-page="__('Dealers program')" />

   <div class="container py-5 mt-md-2 mb-2">
      <div class="row">
         <div class="col-lg-12">
            <img class="rounded-3 w-100"
               src="/theme-images/banners/revendeur.png"
               alt="{{ __('Dealers program') }}">
            <div class="mt-5">
               <h2 class="h4 mb-4 text-center">{{ __('Envoyez-nous une demande') }}</h2>
               <div class="steps steps-dark my-5">
                  <a href="{{ route('register') }}"
                     class="step-item active text-dark">
                     <div class="step-progress">
                        <span class="step-count">1</span>
                     </div>
                     <div class="step-label">
                        <i class="ci-add-user"></i>
                        {{ __('Create your account') }}
                     </div>
                     <div class="media-tab-subtitle text-muted fs-sm mt-2 px-5">
                        {{ __('Create your account first . then we can upgrade it to a dealer account') }}
                     </div>
                  </a>
                  <a href="#"
                     class="step-item active current">
                     <div class="step-progress">
                        <span class="step-count">2</span>
                     </div>
                     <div class="step-label">
                        <i class="ci-mail"></i>
                        {{ __('Send us a request') }}
                     </div>
                     <div class="media-tab-subtitle text-muted fs-sm mt-2 px-5">
                        {{ __('Fill this form and send us a copy of your trade register in this email') }}
                        :
                        {{ setting('site.contact_email') ?? setting('site.main_email') }}
                        {{ __('Your request will not be taken into consideration if you did not create your account first') }}
                     </div>
                  </a>
               </div>
               <x-base.alerts />
               <form action="{{ route('dealers-program.store') }}"
                  method="POST"
                  class="mb-3">
                  @csrf
                  <div class="row g-3">
                     <div class="col-sm-6">
                        <label class="form-label">{{ __('Full name') }}<span
                              class="text-danger ms-1">*</span></label>
                        <input name="name"
                           class="form-control"
                           type="text"
                           placeholder="{{ __('Full name') }}"
                           required>
                     </div>
                     <div class="col-sm-6">
                        <label class="form-label">{{ __('E-Mail Address') }}<span
                              class="text-danger ms-1">*</span></label>
                        <input name="email"
                           class="form-control"
                           type="email"
                           placeholder="{{ __("Preferably your account's email") }}"
                           required>
                     </div>
                     <div class="col-sm-6">
                        <label class="form-label">{{ __('Company') }}</label>
                        <input name="company"
                           class="form-control"
                           type="text"
                           placeholder="{{ __('Company') }}">
                     </div>
                     <div class="col-sm-6">
                        <label class="form-label">{{ __('Phone') }}</label>
                        <input name="phone"
                           class="form-control"
                           type="text"
                           placeholder="{{ __('Phone') }}">
                     </div>
                     <div class="col-12">
                        <label class="form-label">{{ __('Message') }}<span
                              class="text-danger ms-1">*</span></label>
                        <textarea name="message"
                           class="form-control"
                           rows="6"
                           placeholder="{{ __('Please describe in detail your request') }}"
                           required></textarea>
                        <button class="btn btn-primary mt-4"
                           type="submit">
                           {{ __('Send the request') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <x-home.contact-cards />
</x-app-layout>
