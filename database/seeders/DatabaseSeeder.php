<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Database\Seeder\ProductTableSeeder;
use App\Models\product;
use App\Models\Country;
use App\Models\offer;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //i can't call it , there is error appear so i copy code for ProductTableSeeder here
        //  $this->call(ProductTableSeeder::class);
        //  $this->call(CountrySeeder::class);
        //  $this->call(OfferSeeder::class);

        $product = new product([
            'imagePath' => 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
            'title' => 'T-shirt',
            'country_id' => '1',
            'weight' => '200',
            'price' => 30.99
        ]);
        $product->save();

        $product = new Product([
            'imagePath' => 'http://www.revelationz.net/images/book/gameofthrones3.jpg',
            'title' => 'Blouse',
            'country_id' => '2',
            'weight' => '300',
            'price' => 10.99
        ]);
        $product->save();

        $product = new Product([
            'imagePath' => 'http://d.gr-assets.com/books/1411114164l/33.jpg',
            'title' => 'Pants',
            'country_id' => '2',
            'weight' => '900',
            'price' => 64.99
        ]);
        $product->save();

        $product = new Product([
            'imagePath' => 'http://ecx.images-amazon.com/images/I/919-FLL37TL.jpg',
            'title' => 'Sweatpants',
            'country_id' => '3',
            'weight' => '1100',
            'price' => 84.99
        ]);
        $product->save();

        $product = new Product([
            'imagePath' => 'http://www.georgerrmartin.com/wp-content/uploads/2012/08/feastforcrows.jpg',
            'title' => 'Jacket',
            'country_id' => '1',
            'weight' => '2200',
            'price' => 199.99
        ]);
        $product->save();

        $product = new Product([
            'imagePath' => 'http://www.georgerrmartin.com/wp-content/uploads/2012/08/feastforcrows.jpg',
            'title' => 'Shoes',
            'country_id' => '3',
            'weight' => '1300',
            'price' => 79.99
        ]);
        $product->save();

        #######offer##########

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
        #########country ##########
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
