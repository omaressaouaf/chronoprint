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
               style="min-height: 15rem; max-height: 40rem; background-image: url(/storage/theme/about/01.jpg);">
            </div>
            <div class="col-md-6 px-3 px-md-5 py-5">
               <div class="mx-auto py-lg-5">
                  <h3 class="mb-4">
                     {{ config('app.name') }} est une imprimerie <span class="text-primary">100%
                        digitale</span>
                  </h3>
                  <div class="mt-4">
                     <h6 class="mb-3">{{ config('app.name') }} est une marque déposée par
                        la
                        société <a href="http://fournishop.ma/"
                           rel="noopener"
                           target="_blank">FOURNISHOP</a></h6>
                     <p>
                        Fruit de l’expérience et de la modernité,
                        {{ config('app.name') }} a réuni le meilleur de l’impression et du web.
                        Nous bénéficions d’un savoir-faire unique de professionnels
                        de la digitalisation, mais aussi de la chaîne graphique et de l’impression
                        offset et numérique.
                        Chez {{ config('app.name') }} tout a été repensé pour en faire une
                        imprimerie
                        comme vous n’en n’avez jamais vu ! Nous sommes en effet équipés des
                        dernières
                        technologies en matière d’impression et d’automatisation de la production.
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
                     <h6>Service de qualité</h6>
                     <p class="fs-sm text-muted pb-2">
                        Notre équipe se tient à votre disposition pour répondre de manière
                        compétente
                        et rapide à vos questions et vous proposer des solutions personnalisées afin
                        de
                        satisfaire vos exigences.
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
                        Quels que soient nos outils (offset, jet d'encre, laser), nous vous offrons
                        une
                        qualité d'impression sur une grande variété de supports (papiers, cartons,
                        adhésif...).
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
                        Vous avez un accès clair à l'ensemble des prix dans notre boutique en ligne.
                        Les frais de livraison sont toujours détaillés au moment de la confirmation
                        de
                        commande.
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
                        En 24h pour les plus grandes villes (Agadir, Casablanca, Fès, Marrakech,
                        Rabat
                        et Tanger) et entre 48 à 72h pour le reste du Royaume.
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
                        Faites confiance à notre
                        Service Client pour vous guider.
                        Ils seront à vos petits soins pour répondre à toutes vos questions et feront
                        tout pour vous accompagner.
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
                        Nous vous proposons les formats et papiers les plus utilisés par l’ensemble
                        des
                        clients, particuliers ou professionnels. Vos créations trouveront le modèle
                        qu’il leur faut pour un rendu parfait.
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
               style="min-height: 15rem; max-height: 40rem; background-image: url(/storage/theme/about/02.jpg);">
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
                           <h5>Economisez du temps et de l’argent</h5>
                           <p>Grâce à la digitalisation, tout va plus vite. La commande est passée
                              rapidement.
                              Le temps de production est optimisé.
                              La livraison se fait dans les meilleurs délais.
                              Du temps que vous pourrez consacrer à votre travail, à la création ou
                              au démarchage de nouveaux clients.
                              Un temps gagné grâce à {{ config('app.name') }} qui ne pourra que
                              faire
                              augmenter votre chiffre d’affaires !
                           </p>
                        </div>
                     </div>
                     <div class="d-flex align-items-start gap-4 my-2">
                        <div class="bg-accent px-3 py-2 rounded shadow-lg">
                           <i class="ci-smile text-white fs-base fw-bold"></i>
                        </div>
                        <div>
                           <h5>Satisfait ou Réimprimé !</h5>
                           <p>
                              Votre satisfaction est notre priorité. A la livraison de votre
                              commande, si vous n’êtes pas 100% satisfait, notre Service Client se
                              chargera de vous assister très rapidement dans l’identification du
                              défaut. Une fois le défaut détecté, s’il est de notre responsabilité,
                              nous nous engageons à récupérer la commande défectueuse et à vous la
                              réimprimer.
                           </p>
                        </div>
                     </div>
                     <div class="d-flex align-items-start gap-4">
                        <div class="bg-accent px-3 py-2 rounded shadow-lg">
                           <i class="ci-discount text-white fs-5"></i>
                        </div>
                        <div>
                           <h5>Des prix avantageux sans rogner sur la qualité</h5>
                           <p>
                              La qualité est notre première préoccupation. C’est à travers une
                              organisation minutieuse et la digitalisation de nos procédés que nous
                              pouvons vous permettre un rapport qualité/prix imbattable. Et ce, tout
                              en vous garantissant une maîtrise et une régularité de la colorimétrie
                              de vos imprimés.
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
