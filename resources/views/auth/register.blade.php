<x-app-layout title="Inscription"
   description="Rejoignez notre site Web pour des coupons gratuits et les meilleurs produits d'impression numérique"
   canonical="register">
   <x-slot name="schemaBreadcrumbItems">
      {
      "@type": "ListItem",
      "position": 2,
      "name": "Inscription",
      "item": "{{ config('app.url') }}register"
      }
   </x-slot>

   <x-layout.breadcrumb :dark="false"
   :active-page="__('Register')" />
   <div class="container my-5">
      <div class="row justify-content-center">
         <div class="col-md-7">
            <div class="card border-0 shadow">
               <div class="card-body p-4 p-md-5">
                  <x-auth.register-form />
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
