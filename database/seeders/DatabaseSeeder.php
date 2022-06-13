<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(DataTypesTableSeeder::class);
        // $this->call(DataRowsTableSeeder::class);
        // $this->call(MenusTableSeeder::class);
        // $this->call(MenuItemsTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);
        // $this->call(PermissionRoleTableSeeder::class);
        // $this->call(SettingsTableSeeder::class);
        // $this->call(UserSeeder::class);

        $products = \App\Models\Product::with("attributs")->get();

        foreach ($products as $product) {
            $allowedQuantitiesWithRef = [];

            foreach ($product->allowed_quantities as $quantity) {
                $allowedQuantitiesWithRef[] =  array_merge(
                    isset($quantity["ref"])
                        ? []
                        : ['ref' => generate_ref()],
                    $quantity,
                );
            }

            $product->update([
                "allowed_quantities" => $allowedQuantitiesWithRef
            ]);

            foreach ($product->attributs as $attribute) {
                $newOptions = $attribute->pivot->options;

                foreach ($newOptions as $key => $option) {
                    $newOptions[$key]["pricesPerOption"] = [];
                    $newOptions[$key]["disabledOptions"] = [];
                    $currentOptionPrices = (array)$newOptions[$key]["prices"];

                    if (is_array($currentOptionPrices) && count($currentOptionPrices)) {
                        foreach ($currentOptionPrices as $quantityValue => $price) {
                            $quantityRef = collect($allowedQuantitiesWithRef)
                                ->where("value", $quantityValue)
                                ->pluck("ref")
                                ->first();

                            unset($currentOptionPrices[$quantityValue]);
                            $currentOptionPrices[$quantityRef] = $price;
                        }

                        $newOptions[$key]["prices"] = $currentOptionPrices;
                    }
                }


                $product->attributs()->updateExistingPivot($attribute->id, [
                    "options" => $newOptions
                ]);
            }
        }
    }
}
