<x-app-layout title="Connexion"
   description="Rejoignez notre site Web pour des coupons gratuits et les meilleurs produits d'impression numérique"
   canonical="login">
   <x-slot name="schemaBreadcrumbItems">
      {
      "@type": "ListItem",
      "position": 2,
      "name": "Connexion",
      "item": "{{ config('app.url') }}login"
      }
   </x-slot>

   <x-layout.breadcrumb :dark="false"
      :active-page="__('Log in')" />
   <div class="container my-5">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="card border-0 shadow">
               <div class="card-body p-4 p-md-5">
                  <x-auth.login-form />
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
