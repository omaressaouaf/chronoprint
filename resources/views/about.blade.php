<x-app-layout title="À propos de nous"
   description="{{ config('app.name') }} est une société d'impression en ligne à Casablanca qui facilite le processus d'impression de vos fichiers d'exigences commerciales tels que cartes de visite, dépliants, catalogues, étiquettes, autocollants, emballages, emballages, boîtes, étuis, stylos, calendriers 2022,
   La livraison est disponible dans tout le Maroc"
   canonical="about">
   <x-layout.breadcrumb :dark="false"
      :active-page="__('About us')" />
   <main class="container-fluid px-0 mb-5">
      <section class="row g-0">
         <div class="col-md-6 bg-position-center bg-size-cover bg-secondary"
            style="min-height: 15rem; max-height: 40rem; background-image: url(/storage/theme/about/01.jpg);">
         </div>

         <div class="col-md-6 px-3 px-md-5 py-5">
            <div class="mx-auto py-lg-5">
               <h3 class="mb-4">
                  {{ config('app.name') }} est une imprimerie <span class="text-primary">100%
                     digitale</span>
               </h3>
               <div class="mt-4">
                  <h6 class="mb-3">{{ config('app.name') }} est une marque déposée par la
                     société <a href="http://fournishop.ma/"
                        rel="noopener"
                        target="_blank">FOURNISHOP</a></h6>
                  <p>
                     Fruit de l’expérience et de la modernité,
                     {{ config('app.name') }} a réuni le meilleur de l’impression et du web.
                     Nous bénéficions d’un savoir-faire unique de professionnels
                     de la digitalisation, mais aussi de la chaîne graphique et de l’impression
                     offset et numérique.
                     Chez {{ config('app.name') }} tout a été repensé pour en faire une imprimerie
                     comme vous n’en n’avez jamais vu ! Nous sommes en effet équipés des dernières
                     technologies en matière d’impression et d’automatisation de la production.
                  </p>
               </div>
            </div>
         </div>
      </section>
      <section class="row g-0">
         <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2"
            style="min-height: 15rem; background-image: url(storage/theme/about/01.jpg);"></div>
         <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
            <div class="mx-auto py-lg-5"
               style="max-width: 35rem;">
               <h2 class="h3 pb-3">Un aperçu de vos avantages</h2>
               <div>
                  <h6><i class="ci-check-circle text-success me-2"></i> Service de qualité</h6>
                  <p>Notre équipe se tient à votre disposition pour répondre de manière compétente
                     et rapide à vos questions et vous proposer des solutions personnalisées afin de
                     satisfaire vos exigences.</p>
                  <h6><i class="ci-check-circle text-success me-2"></i> Qualité d'impression</h6>
                  <p>Quels que soient nos outils (offset, jet d'encre, laser), nous vous offrons une
                     qualité d'impression sur une grande variété de supports (papiers, cartons,
                     adhésif...).</p>
                  <h6><i class="ci-check-circle text-success me-2"></i> Pas de frais cachés</h6>
                  <p>Vous avez un accès clair à l'ensemble des prix dans notre boutique en ligne.
                     Les frais de livraison sont toujours détaillés au moment de la confirmation de
                     commande.</p>
                  <h6><i class="ci-check-circle text-success me-2"></i> Livraison Express !</h6>
                  <p>Nous livrons dans tout le Maroc !
                     En 24h pour les plus grandes villes (Agadir, Casablanca, Fès, Marrakech, Rabat
                     et Tanger) et entre 48 à 72h pour le reste du Royaume.
                  </p>
                  <h6><i class="ci-check-circle text-success me-2"></i> Service client incroyable !
                  </h6>
                  <p>
                     Faites confiance à notre
                     Service Client pour vous guider.
                     Ils seront à vos petits soins pour répondre à toutes vos questions et feront
                     tout pour vous accompagner.
                  </p>
                  <h6><i class="ci-check-circle text-success me-2"></i> Des papiers choisis pour
                     vous !
                  </h6>
                  <p>
                     Nous vous proposons les formats et papiers les plus utilisés par l’ensemble des
                     clients, particuliers ou professionnels. Vos créations trouveront le modèle
                     qu’il leur faut pour un rendu parfait.
                  </p>
               </div>
            </div>
         </div>
      </section>
   </main>
   <x-home.contact-cards />
</x-app-layout>
