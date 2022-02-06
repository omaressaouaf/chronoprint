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
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'display_name' => 'Google Analytics Tracking ID',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            1 => 
            array (
                'id' => 5,
                'key' => 'admin.bg_image',
                'display_name' => 'Arrière-plan de la zone d\'administration',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 31,
                'group' => 'Admin',
            ),
            2 => 
            array (
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
            'display_name' => 'Google Analytics Client ID (utilisé pour les statistiques et les analyses)',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 30,
                'group' => 'Admin',
            ),
            3 => 
            array (
                'id' => 12,
                'key' => 'site.main_email',
                'display_name' => 'Email principal',
                'value' => 'chronoprint.ma@gmail.com',
                'details' => NULL,
                'type' => 'text',
                'order' => 7,
                'group' => 'Site',
            ),
            4 => 
            array (
                'id' => 13,
                'key' => 'site.contact_email',
                'display_name' => 'Email du contact',
                'value' => 'contact@chronoprint.ma',
                'details' => NULL,
                'type' => 'text',
                'order' => 8,
                'group' => 'Site',
            ),
            5 => 
            array (
                'id' => 14,
                'key' => 'site.phone',
                'display_name' => 'Téléphone',
                'value' => '06 32 35 34 34',
                'details' => NULL,
                'type' => 'text',
                'order' => 9,
                'group' => 'Site',
            ),
            6 => 
            array (
                'id' => 17,
                'key' => 'cart.delivery_price',
                'display_name' => 'Prix de livraison',
                'value' => '39',
                'details' => '{
"type" : "number"
}',
                'type' => 'text',
                'order' => 10,
                'group' => 'Cart',
            ),
            7 => 
            array (
                'id' => 18,
                'key' => 'cart.tax',
                'display_name' => 'TVA',
                'value' => '20',
                'details' => NULL,
                'type' => 'text',
                'order' => 11,
                'group' => 'Cart',
            ),
            8 => 
            array (
                'id' => 21,
                'key' => 'site.address',
                'display_name' => 'Adresse',
                'value' => '61 AV LALLA YACOUT ANGLE MAANI 1ER ETG N 39 CASABLANCA',
                'details' => NULL,
                'type' => 'text',
                'order' => 10,
                'group' => 'Site',
            ),
            9 => 
            array (
                'id' => 22,
                'key' => 'site.facebook',
                'display_name' => 'Facebook',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 32,
                'group' => 'Site',
            ),
            10 => 
            array (
                'id' => 23,
                'key' => 'site.instagram',
                'display_name' => 'Instagram',
                'value' => '',
                'details' => NULL,
                'type' => 'text',
                'order' => 33,
                'group' => 'Site',
            ),
        ));
        
        
    }
}