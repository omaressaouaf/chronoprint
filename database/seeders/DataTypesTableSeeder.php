<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'Utilisateur',
                'display_name_plural' => 'Utilisateurs',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2022-04-30 16:21:39',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2021-12-15 20:47:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Rôle',
                'display_name_plural' => 'Rôles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}',
                'created_at' => '2021-12-15 20:47:30',
                'updated_at' => '2022-04-30 14:37:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'categories',
                'slug' => 'categories',
                'display_name_singular' => 'Catégorie',
                'display_name_plural' => 'Catégories',
                'icon' => 'voyager-categories',
                'model_name' => 'App\\Models\\Category',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-12-15 20:49:46',
                'updated_at' => '2022-04-20 18:46:36',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'category_groups',
                'slug' => 'category-groups',
                'display_name_singular' => 'Catégorie groupe',
                'display_name_plural' => 'Catégorie groupes',
                'icon' => 'voyager-list',
                'model_name' => 'App\\Models\\CategoryGroup',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-12-15 20:51:02',
                'updated_at' => '2022-01-14 17:07:48',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'products',
                'slug' => 'products',
                'display_name_singular' => 'Produit',
                'display_name_plural' => 'Produits',
                'icon' => 'voyager-book',
                'model_name' => 'App\\Models\\Product',
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Voyager\\ProductController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-12-15 20:57:26',
                'updated_at' => '2022-04-20 18:45:34',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'attributes',
                'slug' => 'attributes',
                'display_name_singular' => 'Attribut',
                'display_name_plural' => 'Attributs',
                'icon' => 'voyager-params',
                'model_name' => 'App\\Models\\Attribute',
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Voyager\\AttributeController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-12-15 21:02:09',
                'updated_at' => '2022-01-14 17:11:11',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'coupons',
                'slug' => 'coupons',
                'display_name_singular' => 'Coupon',
                'display_name_plural' => 'Coupons',
                'icon' => 'voyager-pie-graph',
                'model_name' => 'App\\Models\\Coupon',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-12-21 21:26:23',
                'updated_at' => '2022-01-14 17:16:39',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'reviews',
                'slug' => 'reviews',
                'display_name_singular' => 'Avis',
                'display_name_plural' => 'Avis',
                'icon' => 'voyager-star-two',
                'model_name' => 'App\\Models\\Review',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-01-08 15:19:27',
                'updated_at' => '2022-01-14 17:12:09',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'orders',
                'slug' => 'orders',
                'display_name_singular' => 'Commande',
                'display_name_plural' => 'Commandes',
                'icon' => 'voyager-bag',
                'model_name' => 'App\\Models\\Order',
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Voyager\\OrderController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-01-14 14:32:36',
                'updated_at' => '2022-04-30 16:21:58',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'posts',
                'slug' => 'posts',
                'display_name_singular' => 'Article',
                'display_name_plural' => 'Articles',
                'icon' => 'voyager-file-text',
                'model_name' => 'App\\Models\\Post',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-02-05 16:21:21',
                'updated_at' => '2022-05-01 17:57:23',
            ),
        ));
        
        
    }
}