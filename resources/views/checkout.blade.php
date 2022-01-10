<x-app-layout>
   <x-layout.breadcrumb :active-page="__('Checkout')" />

   <div class="container pb-5 mb-2 mb-md-4">
      <div x-data="checkout({{ json_encode(auth()->user()->addresses) }})"
         class="row">
         <x-checkout.form />
         <x-checkout.summary :cart="$cart" />
      </div>
   </div>

</x-app-layout>
