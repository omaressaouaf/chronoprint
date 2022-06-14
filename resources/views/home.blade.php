<x-app-layout>
   <x-home.hero />

   <x-products.popular />

   <x-home.promo-dealer-banners />

   <x-home.brands />

   <section class="mb-4 bg-accent">
      <div class="px-5 px-md-10">
         <div class="row pt-5">
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="d-flex"><i class="ci-rocket text-primary"
                     style="font-size: 2.25rem;"></i>
                  <div class="ps-3">
                     <h6 class="fs-base text-light mb-1">
                        {{ __('Fast and free delivery in casablanca') }}</h6>
                     <p class="mb-0 fs-ms text-light opacity-50">
                        {{ __('Free delivery if you live in casablanca') }}
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="d-flex"><i class="ci-currency-exchange text-primary"
                     style="font-size: 2.25rem;"></i>
                  <div class="ps-3">
                     <h6 class="fs-base text-light mb-1">{{ __('Money back guarantee') }}</h6>
                     <p class="mb-0 fs-ms text-light opacity-50">
                        {{ __('We return money within 30 days') }}
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="d-flex"><i class="ci-support text-primary"
                     style="font-size: 2.25rem;"></i>
                  <div class="ps-3">
                     <h6 class="fs-base text-light mb-1">{{ __('Customer support') }}</h6>
                     <p class="mb-0 fs-ms text-light opacity-50">
                        {{ __('Friendly customer support for our clients') }}
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="d-flex"><i class="ci-card text-primary"
                     style="font-size: 2.25rem;"></i>
                  <div class="ps-3">
                     <h6 class="fs-base text-light mb-1">
                        {{ __('Secure online payment with CMI') }}</h6>
                     <p class="mb-0 fs-ms text-light opacity-50">
                        {{ __('We possess SSL / Secure сertificate and use CMI gateway for great security') }}
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <x-home.testimonials />

   <x-home.subscription-banner />

   <x-home.contact-cards />
</x-app-layout>
