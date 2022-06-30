<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offer = new offer([
            'product_id' => '6',
            'description' => 'are on 10% off.',
            'discount_value' => '10'

        ]);
        $offer->save();
        $offer = new offer([
            'product_id' => '0',
            'description' => 'Buy any two tops (t-shirt or blouse) and get any jacket half its price',
            'discount_value' => '50'
        ]);
        $offer->save();
        $offer = new offer([
            'product_id' => '0',
            'description' => 'Buy any two items or more and get a maximum of $10 off shipping fees.',
            'discount_value' => '10'
        ]);
        $offer->save();
    }
}
