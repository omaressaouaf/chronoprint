<x-app-layout title="Mentions légales"
   canonical="legal-notice">
   <x-layout.breadcrumb :dark="false"
      :active-page="__('Legal notice')" />

   <div class="container py-5 mt-md-2 mb-2">
      <div class="row">
         <div class="col-lg-12">
            <h5 class="text-center">Les produits et services présentés sur le présent site sont
               proposés par la société</h5>
            <div class="text-center">
               <h6>FOURNISHOP SARL</h6>
               <p><b>Siège social :</b> {{ setting('site.address') }}</p>
               <p><b>{{ __('Phone') }} :</b> {{ setting('site.phone') }}</p>
               @if (setting('site.main_email'))
                  <p><b>Email {{ __('Pricipal') }} :</b> {{ setting('site.main_email') }}</p>
               @endif
               @if (setting('site.contact_email'))
                  <p><b>Email {{ __('Contact') }} :</b> {{ setting('site.contact_email') }}</p>
               @endif
            </div>

            <p class="text-center">
               Immatriculée au registre du commerce et des sociétés FOURNISHOP sous le numéro
               468819.
               N° identifiant Fiscal : 45881556
            </p>
         </div>
      </div>
   </div>
   <x-home.contact-cards />
</x-app-layout>
