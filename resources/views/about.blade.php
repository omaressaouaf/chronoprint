<x-app-layout title="À propos de nous"
   description="{{ config('app.name') }} est une société d'impression en ligne à Casablanca qui facilite le processus d'impression de vos fichiers d'exigences commerciales tels que cartes de visite, dépliants, catalogues, étiquettes, autocollants, emballages, emballages, boîtes, étuis, stylos, calendriers 2022,
   La livraison est disponible dans tout le Maroc"
   canonical="about">
   <x-layout.breadcrumb :dark="false"
      :active-page="__('About us')" />
   <main class="px-0 my-5">
      <section class="container">
         <div class="row">
            <div class="col-md-6 bg-position-center bg-size-cover bg-secondary rounded shadow-lg"
               style="min-height: 15rem; max-height: 40rem; background-image: url(/theme-images/about/01.jpg);">
            </div>
            <div class="col-md-6 px-3 px-md-5 py-5">
               <div class="mx-auto py-lg-5">
                  <h3 class="mb-4">
                     {{ config('app.name') }} est une imprimerie <span
                        class="text-primary">digitale</span>
                  </h3>
                  <div class="mt-4">
                     <h6 class="mb-3">{{ config('app.name') }} est une marque détenue par
                        <a href="http://fournishop.ma/"
                           rel="noopener"
                           target="_blank"> FOURNISHOP</a>
                     </h6>
                     <p>
                        qui est aussi une famille construite par les personnes les plus
                        expérimentées dans le domaine de l'impression et du design avec un seul
                        objectif : répondre aux besoins de nos clients partout au Maroc.
                        Bienvenue chez <a href="{{ route('home') }}"
                           class="text-info">{{ config('app.name') }}</a>
                     </p>
                     <p>
                        Nous fournissons à votre entreprise la meilleure qualité d'impression et des
                        délais d'exécution ultra rapides afin de répondre à tous vos besoins
                        d'impression. Bien entendu, nous servons chaque client en tenant compte de
                        son budget ; nous nous spécialisons dans la réduction de vos coûts
                        d'impression.
                     </p>
                     <p>
                        Nous faisons bien plus pour votre entreprise que de simplement fournir des
                        impressions. Des services de conception au publipostage, notre objectif est
                        de vous faciliter la vie. Pour voir plus de nos excellents services.
                     </p>

                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="container py-3 mt-5">
         <h2 class="h3 text-center mb-5">Un aperçu de vos avantages</h2>
         <div class="row">
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
               <div class="card border-0 shadow">
                  <div class="card-body text-center">
                     <i class="ci-check-circle fs-3 mt-2 mb-4 text-success"></i>
                     <h6>Qualité de produits et service</h6>
                     <p class="fs-sm text-muted pb-2">
                        {{ config('app.name') }} dispose d'une équipe dont le seul rôle est de
                        valider la qualité de nos produits et services, afin de répondre aux
                        exigences de nos clients
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
               <div class="card border-0 shadow">
                  <div class="card-body text-center">
                     <i class="ci-check-circle fs-3 mt-2 mb-4 text-success"></i>
                     <h6>Qualité d'impression</h6>
                     <p class="fs-sm text-muted pb-2">
                        {{ config('app.name') }} s'engage toujours à donner la meilleure version
                        de
                        qualité d'impression quels que soient les outils que nous utilisons (offset,
                        jet d'encre, laser) valable sur tous types de supports (papier, carton,
                        adhésif, etc...)
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
               <div class="card border-0 shadow">
                  <div class="card-body text-center">
                     <i class="ci-check-circle fs-3 mt-2 mb-4 text-success"></i>
                     <h6>Pas de frais cachés</h6>
                     <p class="fs-sm text-muted pb-2">
                        {{ config('app.name') }} pratique une politique de transparence avec ses
                        clients, c'est pourquoi nous avons mis en place un système qui donne tous
                        les prix de nos produits et services disponibles sur la plateforme
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
               <div class="card h-100 border-0 shadow">
                  <div class="card-body text-center">
                     <i class="ci-check-circle fs-3 mt-2 mb-4 text-success"></i>
                     <h6>Livraison Express</h6>
                     <p class="fs-sm text-muted pb-2">
                        {{ config('app.name') }} est la seule plateforme qui dispose d'un système
                        de
                        livraison express au Maroc afin de répondre au plus vite aux besoins de nos
                        clients, entre 12 à 24 heures pour les plus grandes villes (Agadir,
                        Casablanca, Fès, Marrakech, Rabat et Tanger) et entre 24 à 48 heures pour le
                        reste du Royaume
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
               <div class="card border-0 shadow">
                  <div class="card-body text-center">
                     <i class="ci-check-circle fs-3 mt-2 mb-4 text-success"></i>
                     <h6>Service client incroyable</h6>
                     <p class="fs-sm text-muted pb-2">
                        Ce n'est pas parce que nous sommes en ligne que nous sommes inaccessibles.
                        Chaque fois que vous souhaitez obtenir de l'aide pour une commande ou avez
                        des questions, n'hésitez pas à contacter nos sympathiques représentants de
                        compte. Nos représentants sont tous des spécialistes dans le domaine et
                        dédiés à répondre à tous les besoins d'impression de votre entreprise de
                        manière rapide
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
               <div class="card border-0 shadow">
                  <div class="card-body text-center">
                     <i class="ci-check-circle fs-3 mt-2 mb-4 text-success"></i>
                     <h6>Des papiers choisis pour vous</h6>
                     <p class="fs-sm text-muted pb-2">
                        {{ config('app.name') }} un des rares centres d'impression qui propose
                        tous
                        les formats et papiers les plus utilisés par l'ensemble du milieu
                        professionnel marocain, tout cela pour vous donner la meilleure version
                        possible de vos besoins
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="container mt-5">
         <div class="row">
            <div
               class="col-md-6 order-1 order-lg-2 bg-position-center bg-size-cover bg-secondary rounded shadow-lg"
               style="min-height: 15rem; max-height: 40rem; background-image: url(/theme-images/about/02.jpg);">
            </div>
            <div class="col-md-6 order-2 order-lg-1 px-3 px-md-5 mt-5 mt-lg-0">
               <div class="mx-auto">
                  <h3>
                     Nos Engagements
                  </h3>
                  <div class="mt-5">
                     <div class="d-flex align-items-start gap-4">
                        <div class="bg-accent px-3 py-2 rounded shadow-lg">
                           <i class="ci-time text-white fs-base fw-bold"></i>
                        </div>
                        <div>
                           <h5>Réactivité</h5>
                           <p>
                              Notre équipe vous conseille, vous propose un devis adapté et imprime
                              tous vos supports de communication en un temps record, Testez notre réactivité hors norme, vous ne serez pas déçu.
                           </p>
                        </div>
                     </div>
                     <div class="d-flex align-items-start gap-4 my-2">
                        <div class="bg-accent px-3 py-2 rounded shadow-lg">
                           <i class="ci-smile text-white fs-base fw-bold"></i>
                        </div>
                        <div>
                           <h5>Suivi personnalisé</h5>
                           <p>
                              Nous mettons nos clients au cœur de nos process de fabrication. Nous proposons un service personnalisé de la prise de brief à la livraison. Cela signifie que vous n’avez qu’un seul et même interlocuteur pour le suivi de votre dossier d’impression. Nous mettons également à votre disposition notre service de livraison interne avec nos propres chauffeurs. Les coordonnées de la personne en charge de la livraison de vos supports de communication vous sont données dès la commande. Vous pouvez ainsi contacter votre livreur à tout moment et suivre l’acheminement de vos travaux en temps réel. C’est un service entièrement gratuit. Profitez-en !
                           </p>
                        </div>
                     </div>
                     <div class="d-flex align-items-start gap-4">
                        <div class="bg-accent px-3 py-2 rounded shadow-lg">
                           <i class="ci-discount text-white fs-5"></i>
                        </div>
                        <div>
                           <h5>Qualité</h5>
                           <p>
                              La qualité d’exécution et d’impression de vos documents est notre priorité. Notre matériel offset et numérique, petit, moyen ou encore grand format est de dernière génération. Que ce soit pour imprimer en ligne vos prospectus, vos dossiers de presse, vos affiches ou encore vos cartes de visite sur Casablanca ou partout au maroc, nos machines haute performance répondront à vos besoins et à vos exigences.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
   <x-home.contact-cards />
</x-app-layout>
