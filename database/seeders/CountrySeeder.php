<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country([
            'name' => 'US',
            'Rate' => '2'
        ]);
        $country->save();
        $country = new Country([
            'name' => 'UK',
            'Rate' => '3'
        ]);
        $country->save();
        $country = new Country([
            'name' => 'CN',
            'Rate' => '2'
        ]);
        $country->save();
    }
}
