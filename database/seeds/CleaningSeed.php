<?php

use App\Models\Extras;
use Backpack\Settings\app\Models\Setting;
use Illuminate\Database\Seeder;

class CleaningSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = array(
            array(, 'key' => 'cleaning_price', 'name' => 'Cleaning base price', 'description' => 'Cleaning base price', 'value' => '1000', 'field' => '{"name":"value","label":"Value","type":"number"}', 'active' => '1', 'created_at' => NULL, 'updated_at' => '2024-04-22 18:20:30'),
            array(, 'key' => 'cleaning_tax', 'name' => 'Cleaning tax (%)', 'description' => 'Cleaning tax in percent', 'value' => '5', 'field' => '{"name":"value","label":"Value","type":"number"}', 'active' => '1', 'created_at' => NULL, 'updated_at' => '2021-10-23 00:44:20')
        );
        Setting::insert($settings);

        $extras = array(
            array('name' => 'Inside Fridge', 'price' => '25.00', 'created_at' => NULL, 'updated_at' => NULL),
            array('name' => 'Inside Oven', 'price' => '25.00', 'created_at' => NULL, 'updated_at' => NULL),
            array('name' => 'Inside Cabinets', 'price' => '25.00', 'created_at' => NULL, 'updated_at' => NULL)
        );

        Extras::insert($extras);

    }
}
