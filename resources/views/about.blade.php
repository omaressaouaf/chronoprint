<x-app-layout title="À propos de nous"
   description="{{ config('app.name') }} est une société d'impression en ligne à Casablanca qui facilite le processus d'impression de vos fichiers d'exigences commerciales tels que cartes de visite, dépliants, catalogues, étiquettes, autocollants, emballages, emballages, boîtes, étuis, stylos, calendriers 2022,
   La livraison est disponible dans tout le Maroc"
   canonical="about">
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
   <x-home.contact-cards />
</x-app-layout>
