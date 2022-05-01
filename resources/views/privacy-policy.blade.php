<x-app-layout title="Politique de confidentialité"
   canonical="politique-de-confidentialite">
   <x-slot name="schemaBreadcrumbItems">
      {
      "@type": "ListItem",
      "position": 2,
      "name": "Politique de confidentialité",
      "item": "{{ config('app.url') }}politique-de-confidentialite"
      }
   </x-slot>

   <x-layout.breadcrumb :dark="false"
      :active-page="__('Privacy policy')" />
   <div class="container py-5 mt-md-2 mb-2">
      <div class="row">
         <div class="col-lg-12">
            <h5>
               Qui sommes nous
            </h5>
            <p>
               {{ config('app.name') }} est une marque détenue par
               <a href="http://fournishop.ma/"
                  rel="noopener"
                  target="_blank"> FOURNISHOP</a> qui est aussi une famille construite par les
               personnes les plus
               expérimentées dans le domaine de l'impression et du design avec un seul
               objectif, répondre aux besoins de nos clients partout au Maroc.
               Bienvenue chez <a href="{{ route('home') }}"
                  class="text-info">{{ config('app.name') }}</a>.
            </p>
            <br>
            <h5>Commentaires et avis</h5>
            <p>
               Lorsque les visiteurs laissent des commentaires sur le site, nous collectons les
               données affichées dans le formulaire de commentaires, ainsi que l’adresse IP du
               visiteur et la chaîne de l’agent utilisateur du navigateur pour faciliter la
               détection du spam.
            </p>
            <br>
            <h5>Médias</h5>
            <p>
               Si vous téléchargez des images sur le site Web, vous devez éviter de télécharger des
               images avec des données de localisation intégrées (EXIF GPS) incluses. Les visiteurs
               du site Web peuvent télécharger et extraire toutes les données de localisation des
               images sur le site Web.
            </p>
            <br>
            <h5>Cookies</h5>
            <p>
               Lors de votre connexion, nous mettrons également en place plusieurs cookies pour
               enregistrer vos informations de connexion. Les cookies de connexion durent 2 heures.
               Si vous sélectionnez "Se souvenir de moi", votre connexion persistera pendant deux
               semaines. Si vous vous déconnectez de votre compte, les cookies de connexion seront
               supprimés.
            </p>
            <br>
            <h5>Avec qui partageons-nous vos données</h5>
            <p>
               Si vous demandez une réinitialisation de mot de passe, votre adresse IP sera incluse
               dans l’e-mail de réinitialisation.
            </p>
            <br>
            <h5>Combien de temps conservons-nous vos données</h5>
            <p>
               Si vous laissez un commentaire, le commentaire et ses renforcés sont conservés
               indéfiniment. Cela nous permet de reconnaître et d'enregistrer automatiquement tous
               les commentaires de suivi au lieu de les conserver dans un fichier d'attente de
               modération. Pour les utilisateurs qui s'inscrivent sur notre site Web (le cas
               échéant), nous
               stockons également les informations personnelles qu'ils fournissent dans leur profil
               d'utilisateur. Tous les utilisateurs peuvent voir, modifier ou supprimer leurs
               informations personnelles à tout moment. Les administrateurs du site Web peuvent
               également voir et modifier ces informations.
            </p>
            <br>
            <h5>Quels droits avez-vous sur vos données</h5>
            <p>
               Si vous avez un compte sur ce site, ou avez laissé des commentaires, vous pouvez
               demander la suppression de toutes les données personnelles que nous détenons à votre
               sujet. Cela n'inclut pas les données que nous sommes obligés de conserver à des fins
               administratives, juridiques ou de sécurité.
            </p>
            <br>
            <h5>Où nous envoyons vos données</h5>
            <p>
               Les commentaires des visiteurs peuvent être vérifiés par un service automatisé de
               détection de spam.
            </p>
         </div>
      </div>
   </div>
   <x-home.contact-cards />
</x-app-layout>
