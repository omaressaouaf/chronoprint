<x-app-layout title="Validation de commande"
   description="Livraison gratuite pour votre produits d'impression au maroc. Commandez maintenant en ligne"
   canonical="checkout/">
   <x-layout.breadcrumb :active-page="__('Checkout')" />

   <div class="container pb-5 mb-2 mb-md-4">
      <div x-data="checkout({{ json_encode(auth()->user()->addresses) }})"
         class="row">
         <x-checkout.form />
         <x-checkout.summary :cart="$cart" />
      </div>
   </div>

</x-app-layout>
