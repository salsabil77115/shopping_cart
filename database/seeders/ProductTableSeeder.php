<?php

use Illuminate\Database\Seeder;
use App\Models\product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new product([
            'imagePath' => 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
            'title' => 'T-shirt',
            'country_id' => '1',
            'price' => 30.99
        ]);
        $product->save();
    
        $product = new Product([
            'imagePath' => 'http://www.revelationz.net/images/book/gameofthrones3.jpg',
            'title' => 'Blouse',
            'country_id' => '2',
            'price' => 10.99
        ]);
        $product->save();
    
        $product = new Product([
            'imagePath' => 'http://d.gr-assets.com/books/1411114164l/33.jpg',
            'title' => 'Pants',
            'country_id' => '2',
            'price' => 64.99
        ]);
        $product->save();
    
        $product = new Product([
            'imagePath' => 'http://ecx.images-amazon.com/images/I/919-FLL37TL.jpg',
            'title' => 'Sweatpants',
            'country_id' => '3',
            'price' => 84.99
        ]);
        $product->save();
    
        $product = new Product([
            'imagePath' => 'http://www.georgerrmartin.com/wp-content/uploads/2012/08/feastforcrows.jpg',
            'title' => 'Jacket',
            'country_id' => '	1',
            'price' => 199.99
        ]);
        
        $product = new Product([
            'imagePath' => 'http://www.georgerrmartin.com/wp-content/uploads/2012/08/feastforcrows.jpg',
            'title' => 'Shoes',
            'country_id' => '3',
            'price' => 79.99
        ]);
        $product->save();
        }
}
