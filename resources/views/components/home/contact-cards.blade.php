<section class="container-fluid px-0">
   <div class="row g-0">
      <div class="col-md-3"><a
            class="card h-100 border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary"
            href="http://fournishop.ma/"
            target="_blank"
            rel="noopener">
            <div class="card-body text-center"><i
                  class="ci-navigation fs-3 mt-2 mb-4 text-primary"></i>
               <h3 class="h5 mb-1">{{ __('Visit our other website') }}</h3>
               <p class="text-muted fs-sm">{{ __('Check out furniture products') }}</p>
            </div>
         </a></div>
      <div class="col-md-3"><a
            class="card h-100 border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent"
            href="https://www.instagram.com/fournishopmaroc/"
            target="_blank"
            rel="noopener">
            <div class="card-body text-center"><i
                  class="ci-instagram fs-3 mt-2 mb-4 text-accent"></i>
               <h3 class="h5 mb-1">{{ __('Follow us on Instagram') }}</h3>
               <p class="text-muted fs-sm">#fournishopmaroc</p>
            </div>
         </a></div>
      <div class="col-md-3">
         <div class="card h-100 border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary">
            <div class="card-body text-center"><i class="ci-mail fs-3 mt-2 mb-4 text-primary"></i>
               <h3 class="h5 mb-2">{{ __('E-Mail Address') }}</h3>
               @if (setting('site.main_email'))
                  <p class="fs-sm mb-0">
                     <span class="me-1">{{ __('Main') }} :</span>
                     <span class="">
                        {{ setting('site.main_email') }}
                     </span>
                  </p>
               @endif
               @if (setting('site.contact_email'))
                  <p class="fs-sm">
                     <span class="me-1">{{ __('Contact') }} :</span>
                     <span class="">
                        {{ setting('site.contact_email') }}
                     </span>
                  </p>
               @endif
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card h-100 border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent">
            <div class="card-body text-center"><i class="ci-support fs-3 mt-2 mb-4 text-accent"></i>
               <h3 class="h5 mb-1">{{ __('Client support') }}</h3>
               <p class="text-muted fs-sm">{{ setting('site.phone') }}
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
