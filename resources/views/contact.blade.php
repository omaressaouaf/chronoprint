<x-app-layout title="Contact"
   description="Contactez-nous à tout moment pour l'impression de vos cartes de visite, Flyers, Catalogues.."
   canonical="contact">
   <x-layout.breadcrumb :dark="false"
      :active-page="__('Contact us')" />

   {{-- Contact cards --}}
   <section class="container-fluid pt-grid-gutter">
      <div class="row">
         <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <a class="card h-100"
               href="#map"
               data-scroll>
               <div class="card-body text-center">
                  <i class="ci-location fs-3 mt-2 mb-4 text-primary"></i>
                  <h3 class="h6 mb-2">{{ __('Main address') }}</h3>
                  <p class="fs-sm text-muted">{{ setting('site.address') }}</p>
               </div>
            </a>
         </div>
         <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
               <div class="card-body text-center"><i
                     class="ci-navigation fs-3 mt-2 mb-4 text-primary"></i>
                  <h3 class="h6 mb-3">{{ __('Visit our other website') }}</h3>
                  <ul class="list-unstyled fs-sm mb-0">
                     <li class="mb-0">
                        <span
                           class="text-muted me-1">{{ __('Check out furniture products') }}</span>
                        <a class="nav-link-style"
                           href="http://fournishop.ma/"
                           target="_blank"
                           rel="nooppener">
                           fournishop.ma
                        </a>
                     </li>
                  </ul>

               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
               <div class="card-body text-center"><i
                     class="ci-phone fs-3 mt-2 mb-4 text-primary"></i>
                  <h3 class="h6 mb-3">{{ __('Phone') }}</h3>
                  <ul class="list-unstyled fs-sm mb-0">
                     <li class="mb-0">
                        <span class="text-muted me-1">{{ __('Customer support') }}</span>
                        <a class="nav-link-style"
                           href="tel:{{ setting('site.phone') }}">
                           {{ setting('site.phone') }}
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
               <div class="card-body text-center">
                  <i class="ci-mail fs-3 mt-2 mb-4 text-primary"></i>
                  <h3 class="h6 mb-3">{{ __('Email addresses') }}</h3>
                  <ul class="list-unstyled fs-sm mb-0">
                     <li>
                        <span class="text-muted me-1">{{ __('Contact') }}:</span>
                        <a class="nav-link-style"
                           href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}
                        </a>
                     </li>
                     <li class="mb-0">
                        <span class="text-muted me-1">{{ __('Support') }}</span>
                        <a class="nav-link-style"
                           href="mailto:support@example.com">support@example.com
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>

   {{-- Map & Contact form --}}
   <div class="container-fluid px-0 mb-5"
      id="map">
      <div class="row g-0">
         <div class="col-lg-6 iframe-full-height-wrap">
            <div class="mapouter">
               <iframe class="iframe-full-height"
                  width="600"
                  height="500"
                  id="gmap_canvas"
                  src="https://maps.google.com/maps?q={{ setting('site.address') }}&z=13&ie=UTF8&iwloc=&output=embed"
                  frameborder="0"
                  scrolling="no"
                  marginheight="0"
                  marginwidth="0">
               </iframe>
            </div>
         </div>
         <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
            <h2 class="h4 mb-4">{{ __('Send us a message') }}</h2>
            <x-base.alerts />
            <form action="{{ route('contact.store') }}"
               method="POST"
               class="mb-3">
               @csrf
               <div class="row g-3">
                  <div class="col-sm-6">
                     <label class="form-label">{{ __('Name') }}</label>
                     <input name="name"
                        class="form-control"
                        type="text"
                        placeholder="John Doe">
                  </div>
                  <div class="col-sm-6">
                     <label class="form-label">{{ __('E-Mail Address') }}<span
                           class="text-danger ms-1">*</span></label>
                     <input name="email"
                        class="form-control"
                        type="email"
                        placeholder="johndoe@example.com"
                        required>
                  </div>
                  <div class="col-sm-6">
                     <label class="form-label">{{ __('Phone') }}</label>
                     <input name="phone"
                        class="form-control"
                        type="text"
                        placeholder="+212 23 54 23">
                  </div>
                  <div class="col-sm-6">
                     <label class="form-label">{{ __('Subject') }}<span
                           class="text-danger ms-1">*</span></label>
                     <input name="subject"
                        class="form-control"
                        type="text"
                        placeholder="{{ __('Please provide a title of your request') }}"
                        required>
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
                        {{ __('Send message') }}
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

</x-app-layout>
