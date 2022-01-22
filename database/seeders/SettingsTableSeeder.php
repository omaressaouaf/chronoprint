<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array(
            2 =>
            array(
                'id' => 3,
                'key' => 'site.logo',
                'display_name' => 'Logo du site',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Site',
            ),
            3 =>
            array(
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'display_name' => 'Google Analytics Tracking ID',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            4 =>
            array(
                'id' => 5,
                'key' => 'admin.bg_image',
                'display_name' => "Arrière-plan de la zone d'administration",
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ),
            5 =>
            array(
                'id' => 6,
                'key' => 'admin.title',
                'display_name' => "Titre de la zone d'administration",
                'value' => 'Mr.Print',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            6 =>
            array(
                'id' => 7,
                'key' => 'admin.description',
                'display_name' => "Description de la zone d'administration",
                'value' => "Bienvenue dans l'administration de Mr.Print",
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ),
            7 =>
            array(
                'id' => 8,
                'key' => 'admin.loader',
                'display_name' => "Spinner de zone d'administration",
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ),
            8 =>
            array(
                'id' => 9,
                'key' => 'admin.icon_image',
                'display_name' => "Image de l'icône de l'administration",
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ),
            9 =>
            array(
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
                'display_name' => "Google Analytics Client ID (utilisé pour les statistiques et les analyses)",
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            10 =>
            array(
                'id' => 12,
                'key' => 'site.email',
                'display_name' => 'Email',
                'value' => 'fournishop01@gmail.com',
                'details' => NULL,
                'type' => 'text',
                'order' => 7,
                'group' => 'Site',
            ),
            11 =>
            array(
                'id' => 13,
                'key' => 'site.phone',
                'display_name' => 'Téléphone',
                'value' => '+212 23 22 33',
                'details' => NULL,
                'type' => 'text',
                'order' => 8,
                'group' => 'Site',
            ),
            12 =>
            array(
                'id' => 16,
                'key' => 'cart.delivery_price',
                'display_name' => 'Prix de livraison',
                'value' => '39',
                'details' => '{
"type" : "number"
}',
                'type' => 'text',
                'order' => 9,
                'group' => 'Cart',
            ),
            13 =>
            array(
                'id' => 17,
                'key' => 'cart.tax',
                'display_name' => 'TVA',
                'value' => '20',
                'details' => NULL,
                'type' => 'text',
                'order' => 10,
                'group' => 'Cart',
            ),
            14 =>
            array(
                'id' => 18,
                'key' => 'site.about',
                'display_name' => 'À propos de nous',
                'value' => '<p>&nbsp;</p>
<h2 class="h3 pb-3" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.75rem; font-weight: 500; line-height: 1.2; color: #373f50; font-size: 1.75rem; -webkit-font-smoothing: antialiased; font-family: Rubik, sans-serif; padding-bottom: 1rem !important;">Search, Select, Buy online</h2>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; color: #333333; font-family: montserratbold, sans-serif !important;"><span style="box-sizing: border-box; font-size: 20px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Bienvenue sur 24hprint.ma, une imprimerie en ligne marocaine&nbsp;d&eacute;di&eacute;e aux produits imprim&eacute;s.</span></span></span></p>
<ul style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif;">
<li style="box-sizing: border-box; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Choisissez un&nbsp; produit, personnalisez-le en utilisant nos mod&egrave;les et notre studio de conception, et passez votre commande.</span></span></li>
<li style="box-sizing: border-box; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Plusieurs solutions de livraisons vous sont propos&eacute;es et le paiement se fait par cartes de cr&eacute;dit, virement bancaire ou esp&egrave;ce.</span></span></li>
</ul>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><em style="box-sizing: border-box;">En cas de demande sp&eacute;cifique ou d&rsquo;aide particuli&egrave;re, nous sommes &agrave; votre service pour vous guider et pour vous apporter tout compl&eacute;ment d&rsquo;information dont vous auriez besoin.</em></span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; color: #008000;"><span style="box-sizing: border-box; font-size: 20px;"><span style="box-sizing: border-box; color: #333333; font-family: montserratbold, sans-serif !important;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Particuliers ou Professionnels, enregistrez-vous gratuitement, le web-to-print de 24hprint.ma est fait pour vous.</span></span></span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;">&nbsp;</p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 20px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><span style="box-sizing: border-box; color: #333333; font-family: montserratbold, sans-serif !important;"><u style="box-sizing: border-box;">Innovation et Engagement</u></span></span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Notre site internet est, avec notre page&nbsp;<a style="box-sizing: border-box; color: #4a4a4a; text-decoration-line: none; background-color: transparent; transition: all 0.3s ease 0s;" href="https://www.facebook.com/stpmultipress/">Facebook</a>, la vitrine digitale de notre soci&eacute;t&eacute;.</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Depuis sa cr&eacute;ation, celle-ci n&rsquo;a cess&eacute; de faire cro&icirc;tre son potentiel pour vous offrir le meilleur de l&rsquo;imprimerie en s&rsquo;appuyant sur ses 2 valeurs de base&nbsp;:<span style="box-sizing: border-box; color: #333333; font-family: montserratbold, sans-serif !important;">&nbsp;Innovation et Engagement.</span></span></span><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">&nbsp;</span></span><br style="box-sizing: border-box;" />&nbsp;</p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;">au 1er Septembre 2020,</span><u style="box-sizing: border-box;"></u></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">. 35&nbsp;employ&eacute;s,</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">. 15&nbsp;millions dh de Chiffre d\'affaires</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">. 19 machines de production travaillant en 2 &eacute;quipes,&nbsp;</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">. Plus de 2500&nbsp;clients actifs (du public et du priv&eacute;, de tous secteurs d\'activit&eacute;s),</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">. Plus de 3000 Commandes par an,</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">. Plus de 98% de Clients satisfaits,&nbsp;</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;">&nbsp;</p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><span style="box-sizing: border-box; color: #333333; font-family: montserratbold, sans-serif !important;"><em style="box-sizing: border-box;">- Service de qualit&eacute;</em></span></span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Notre &eacute;quipe se tient &agrave; votre disposition pour r&eacute;pondre de mani&egrave;re comp&eacute;tente et rapide &agrave; vos questions et vous proposer des solutions personnalis&eacute;es afin de satisfaire vos exigences.</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><span style="box-sizing: border-box; color: #333333; font-family: montserratbold, sans-serif !important;"><em style="box-sizing: border-box;">- Qualit&eacute; d\'impression</em></span></span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Quels que soient nos outils (offset, jet d\'encre, laser), nous vous offrons une qualit&eacute; d\'impression&nbsp;sur une grande vari&eacute;t&eacute; de supports (papiers, cartons, adh&eacute;sif...).</span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;">&nbsp;</p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;"><span style="box-sizing: border-box; color: #333333; font-family: montserratbold, sans-serif !important;"><em style="box-sizing: border-box;">- Pas de frais cach&eacute;s</em></span></span></span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="box-sizing: border-box; font-size: 16px;"><span style="box-sizing: border-box; font-family: arial, helvetica, sans-serif;">Vous avez un acc&egrave;s clair &agrave; l\'ensemble des prix dans notre boutique en ligne. Les frais de livraison sont toujours d&eacute;taill&eacute;s au moment de la confirmation de commande<a style="box-sizing: border-box; color: #4a4a4a; text-decoration-line: none; background-color: transparent; transition: all 0.3s ease 0s;" href="http://www.saxoprint.fr/budget-transparent">.</a></span></span></p>',
                'details' => NULL,
                'type' => 'rich_text_box',
                'order' => 11,
                'group' => 'Site',
            ),
        ));
    }
}
