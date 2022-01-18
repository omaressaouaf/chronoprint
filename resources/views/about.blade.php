<x-app-layout>
   <x-layout.breadcrumb :dark="false"
      :active-page="__('About us')" />
   <main class="container my-5">
      <section class="row g-0">
         <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
            style="min-height: 15rem; max-height: 40rem; background-image: url(/storage/theme/about/01.jpg);">
         </div>

         <div class="col-md-6 px-3 px-md-5">
            <div class="mx-auto"
               style="max-width: 35rem;">
               {!! setting('site.about') !!}
            </div>
         </div>
      </section>
   </main>
</x-app-layout>
