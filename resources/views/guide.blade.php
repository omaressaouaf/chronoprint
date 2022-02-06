<x-app-layout title="Guide d'impression"
   canonical="guide">
   <x-layout.breadcrumb :dark="false"
      :active-page="__('Printing guide')" />

   <div class="container py-5 mt-md-2 mb-2">
      <div class="row">
         <div class="col-lg-12">
            <h2 class="h4 pb-3 text-center">Comment utiliser notre site ?</h2>
            <p class="fs-md">
               Nous avons préparé cette section pour vous aider dans l’utilisation de notre site et
               dans la préparation de vos fichiers électroniques.
               Si vous avez un problème qui n'est pas couvert par ce qui suit, ou si vous avez
               d'autres questions, n'hésitez pas à nous contacter, nous nous ferons un plaisir de
               vous conseiller.
            </p>
            <br>
            <div>
               <h6>Quel est le processus d'ajout au panier ?</h6>
               <p class="fs-md">
                  Pour vous connecter, il vous suffit d’entrer une adresse mail valide et de choisir
                  un
                  mot de passe.
                  Tous nos tarifs sont affichés HT. Le montant TTC est calculé au moment de la
                  confirmation de commande.
                  Une fois connecté, dans la section « Mon compte », vous trouverez vos données
                  personnelles, l’historique de toutes vos commandes, votre profil ..
                  Pour ajouter un produit au panier. Importer vos fichiers prêts pour l’impression
                  en
                  suivant nos conseils techniques.
               </p>
            </div>
            <br>
            <div>
               <h6>Comment préparer vos fichiers ?</h6>
               <p class="fs-md">
                  <span class="text-danger">
                     <i class="ci-announcement me-2"></i> ATTENTION
                  </span> : des fichiers mal préparés peuvent
                  entraîner des retards dans la
                  fabrication.
               </p>
               <ul>
                  <li>Les fichiers que vous nous déposez doivent être en format jpg, jpeg, gif, png,
                     eps, ai, svg, pdf, zip, goudron, rar, cdr, psd</li>
                  <li>L'espace colorimétrique doit être de préférence CMYK (Fogra 39)</li>
                  <li>S'assurer d'inclure toutes les pages dans 1 seul document</li>
                  <li>Résolution des images minimum de 200 et maximum de 300 dpi pour une qualité
                     optimale</li>
                  <li>Toutes les polices doivent être incorporées ou vectorisées</li>
                  <li>Ne pas protéger par mot de passe les fichiers PDF</li>
                  <li>La résolution définie la netteté de vos photos, images. Celle-ci doit être au
                     minimum de 200 dpi et idéalement de 300 dpi à la taille finale pour assurer une
                     qualité
                     optimale.</li>
                  <li>Votre conception graphique doit être entre 3 mm à 5mm plus grande que la
                     taille
                     de
                     votre document afin de pouvoir couper avec un débordement des couleurs sans
                     risque
                     d’une bordure blanche le long de votre document final.</li>
                  <li>La taille finale de votre document imprimé.</li>
                  <li>Zone de 3mm tout autour du document au-delà de laquelle le risque de couper
                     les
                     éléments texte ou image est important lors de la coupe finale.</li>
               </ul>
               <p class="fs-md">
                  <span class="text-info">
                     <i class="ci-announcement me-2"></i> Note
                  </span> :
                  Nous vous conseillons le format PDF haute définition : plus sûr, plus rapide,
                  multi
                  plateformes, moins lourd (donc plus facile à transmettre), … Vous pouvez le
                  générer à
                  partir de vos applications Mac, PC ou Linux en utilisant Adobe Distiller ou tout
                  autre logiciel téléchargeable (ex : PDF creator), à moins que votre application
                  puisse le générer directement.
                  Nous pouvons également convertir vos documents créés via Word, Excel, Publisher,
                  Powerpoint … Les couleurs que nous convertirons en CMYK (Fogra 39) risquent d’être
                  différentes et ne seront pas garanties, les fonds perdus inexistants risquent de
                  générer du blanc sur les bords des pages et les résolutions souvent faibles
                  donneront
                  un rendu moins net.

               </p>
            </div>
            <br>
            <div>
               <h6>Comment procéder et valider ma commande ?</h6>
               <p class="fs-md">
                  Au moment de valider votre commande, vous devrez choisir votre mode de livraison
                  (Livraison gratuite si vous habitez à casablanca)
               </p>
               <p class="fs-md">
                  Le site donne la possibilité de payer par carte de bancaire national ou
                  international.
                  Vous serez, ensuite, dirigé sur un site sécurisé du Centre monétique interbancaire
                  (CMI) pour effectuer votre paiement. Vous pouvez également choisir de payer à la
                  livraison
               </p>
            </div>
            <section class="container text-center pt-5 mt-2">
               <h2 class="h4 pb-3">{{ __("Haven't found the answer? We can help") }}</h2><i
                  class="ci-help fs-3 text-primary d-block mb-4"></i><a class="btn btn-primary"
                  href="{{ route('contact.index') }}">{{ __('Submit a request') }}</a>
               <p class="fs-sm pt-4">
                  {{ __('Contact us and we’ll get back to you as soon as possible') }}
               </p>
            </section>
         </div>
      </div>
   </div>
</x-app-layout>
