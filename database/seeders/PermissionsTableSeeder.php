<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'created_at' => '2021-12-15 20:49:47',
                'updated_at' => '2021-12-15 20:49:47',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'created_at' => '2021-12-15 20:49:47',
                'updated_at' => '2021-12-15 20:49:47',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'created_at' => '2021-12-15 20:49:47',
                'updated_at' => '2021-12-15 20:49:47',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'created_at' => '2021-12-15 20:49:47',
                'updated_at' => '2021-12-15 20:49:47',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'created_at' => '2021-12-15 20:49:47',
                'updated_at' => '2021-12-15 20:49:47',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'browse_category_groups',
                'table_name' => 'category_groups',
                'created_at' => '2021-12-15 20:51:02',
                'updated_at' => '2021-12-15 20:51:02',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'read_category_groups',
                'table_name' => 'category_groups',
                'created_at' => '2021-12-15 20:51:02',
                'updated_at' => '2021-12-15 20:51:02',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'edit_category_groups',
                'table_name' => 'category_groups',
                'created_at' => '2021-12-15 20:51:02',
                'updated_at' => '2021-12-15 20:51:02',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'add_category_groups',
                'table_name' => 'category_groups',
                'created_at' => '2021-12-15 20:51:02',
                'updated_at' => '2021-12-15 20:51:02',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'delete_category_groups',
                'table_name' => 'category_groups',
                'created_at' => '2021-12-15 20:51:02',
                'updated_at' => '2021-12-15 20:51:02',
            ),
            35 => 
            array (
                'id' => 41,
                'key' => 'browse_products',
                'table_name' => 'products',
                'created_at' => '2021-12-15 20:57:26',
                'updated_at' => '2021-12-15 20:57:26',
            ),
            36 => 
            array (
                'id' => 42,
                'key' => 'read_products',
                'table_name' => 'products',
                'created_at' => '2021-12-15 20:57:26',
                'updated_at' => '2021-12-15 20:57:26',
            ),
            37 => 
            array (
                'id' => 43,
                'key' => 'edit_products',
                'table_name' => 'products',
                'created_at' => '2021-12-15 20:57:26',
                'updated_at' => '2021-12-15 20:57:26',
            ),
            38 => 
            array (
                'id' => 44,
                'key' => 'add_products',
                'table_name' => 'products',
                'created_at' => '2021-12-15 20:57:26',
                'updated_at' => '2021-12-15 20:57:26',
            ),
            39 => 
            array (
                'id' => 45,
                'key' => 'delete_products',
                'table_name' => 'products',
                'created_at' => '2021-12-15 20:57:26',
                'updated_at' => '2021-12-15 20:57:26',
            ),
            40 => 
            array (
                'id' => 46,
                'key' => 'browse_attributes',
                'table_name' => 'attributes',
                'created_at' => '2021-12-15 21:02:09',
                'updated_at' => '2021-12-15 21:02:09',
            ),
            41 => 
            array (
                'id' => 47,
                'key' => 'read_attributes',
                'table_name' => 'attributes',
                'created_at' => '2021-12-15 21:02:09',
                'updated_at' => '2021-12-15 21:02:09',
            ),
            42 => 
            array (
                'id' => 48,
                'key' => 'edit_attributes',
                'table_name' => 'attributes',
                'created_at' => '2021-12-15 21:02:09',
                'updated_at' => '2021-12-15 21:02:09',
            ),
            43 => 
            array (
                'id' => 49,
                'key' => 'add_attributes',
                'table_name' => 'attributes',
                'created_at' => '2021-12-15 21:02:09',
                'updated_at' => '2021-12-15 21:02:09',
            ),
            44 => 
            array (
                'id' => 50,
                'key' => 'delete_attributes',
                'table_name' => 'attributes',
                'created_at' => '2021-12-15 21:02:09',
                'updated_at' => '2021-12-15 21:02:09',
            ),
            45 => 
            array (
                'id' => 51,
                'key' => 'browse_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-12-21 21:26:23',
                'updated_at' => '2021-12-21 21:26:23',
            ),
            46 => 
            array (
                'id' => 52,
                'key' => 'read_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-12-21 21:26:23',
                'updated_at' => '2021-12-21 21:26:23',
            ),
            47 => 
            array (
                'id' => 53,
                'key' => 'edit_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-12-21 21:26:23',
                'updated_at' => '2021-12-21 21:26:23',
            ),
            48 => 
            array (
                'id' => 54,
                'key' => 'add_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-12-21 21:26:23',
                'updated_at' => '2021-12-21 21:26:23',
            ),
            49 => 
            array (
                'id' => 55,
                'key' => 'delete_coupons',
                'table_name' => 'coupons',
                'created_at' => '2021-12-21 21:26:23',
                'updated_at' => '2021-12-21 21:26:23',
            ),
            50 => 
            array (
                'id' => 56,
                'key' => 'browse_reviews',
                'table_name' => 'reviews',
                'created_at' => '2022-01-08 15:19:27',
                'updated_at' => '2022-01-08 15:19:27',
            ),
            51 => 
            array (
                'id' => 57,
                'key' => 'read_reviews',
                'table_name' => 'reviews',
                'created_at' => '2022-01-08 15:19:27',
                'updated_at' => '2022-01-08 15:19:27',
            ),
            52 => 
            array (
                'id' => 58,
                'key' => 'edit_reviews',
                'table_name' => 'reviews',
                'created_at' => '2022-01-08 15:19:27',
                'updated_at' => '2022-01-08 15:19:27',
            ),
            53 => 
            array (
                'id' => 60,
                'key' => 'delete_reviews',
                'table_name' => 'reviews',
                'created_at' => '2022-01-08 15:19:27',
                'updated_at' => '2022-01-08 15:19:27',
            ),
            54 => 
            array (
                'id' => 62,
                'key' => 'browse_orders',
                'table_name' => 'orders',
                'created_at' => '2022-01-14 14:32:37',
                'updated_at' => '2022-01-14 14:32:37',
            ),
            55 => 
            array (
                'id' => 63,
                'key' => 'read_orders',
                'table_name' => 'orders',
                'created_at' => '2022-01-14 14:32:37',
                'updated_at' => '2022-01-14 14:32:37',
            ),
            56 => 
            array (
                'id' => 64,
                'key' => 'edit_orders',
                'table_name' => 'orders',
                'created_at' => '2022-01-14 14:32:37',
                'updated_at' => '2022-01-14 14:32:37',
            ),
            57 => 
            array (
                'id' => 66,
                'key' => 'delete_orders',
                'table_name' => 'orders',
                'created_at' => '2022-01-14 14:32:37',
                'updated_at' => '2022-01-14 14:32:37',
            ),
        ));
        
        
    }
}