<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrateur',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'display_name' => 'Utilisateur normal',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'dealer',
                'display_name' => 'Revendeur',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
        ));
        
        
    }
}