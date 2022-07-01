<?php

namespace App;

class Cart
{
    //all products
    public $items = null;
    //all quantity products
    public $totalQty = 0;
    //origin price
    public $totalPrice = 0;
    //shipping price
    public $Shipping = 0;
    //shipping price after VAT
    public $NewShipping = 0;
    //total price after discounts
    public $total = 0;
    //value added tax
    public $VAT = 0;
    //dicounts
    public $discounts = null;

    //to count discounts index
    public $index = 0;
    public function __construct($oldCart)
    {
        //assign cart to old one
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->Shipping = $oldCart->Shipping;
            $this->VAT = $oldCart->VAT;
            $this->discounts = $oldCart->discounts;
            $this->total = $oldCart->total;
        }
    }

    //calculate items price
    public function add($item, $id, $country)
    {

        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'weight' => $item->weight, 'Rate' => $country['Rate'], 'Shipping' => 0];
        //check if there are items exist
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;

        //calculate price for one product per quantity 
        $storedItem['price'] = $item->price * $storedItem['qty'];
        
        //divided by 100 to calculate rate per 100 g
        $weight = $item->weight / 100;
        
        //calculate shipping by multiplay Rate by product weight
        $this->Shipping += $weight * $country->Rate;
        
        //assign new sipping to total shipping
        $this->NewShipping += $this->Shipping;
        
        //add new item
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        
        //add price to exist price
        $this->totalPrice += $item->price;
        
        //assign total to origin price
        $this->total = $this->totalPrice;
        
        //calculate VAT by multiply origin price by 14%
        $this->VAT =  $this->totalPrice * (14 / 100);
        
        if ($this->items) {
        
            //check if there is Shoes item
            if (array_key_exists(6, $this->items)) {
                $this->discounts[$this->index] = '10% off shoes: ' . '-$' . ($this->items[6]['price'] * (10 / 100));
                $this->index++;
        
                //reduce total price 
                $this->total -= ($this->items[6]['price'] * (10 / 100));
            }
            //check there are 2 or more items in cart
            if (sizeof($this->items) >= 2) {
                $this->discounts[$this->index] = '$10 of shipping: -$10';
                $this->index++;
        
                //check if shipping less than 10
                if ($this->Shipping < 10) {
                    $this->NewShipping = 0;
                } else {
                
                    //reduce shipping by $10
                    $this->NewShipping -=  10;
                }
            }
          
            //check if more than 2 items , (t-shirt or blouse) and get jacket by 50% offer
            if (sizeof($this->items) > 2  && array_key_exists(1, $this->items) && array_key_exists(2, $this->items) && array_key_exists(5, $this->items)) {
                $this->discounts[$this->index] = '50% off jacket: ' . '-$' . ($this->items[5]['price'] * (50 / 100));
                $this->index++;
          
                //reduce total price 
                $this->total -=  ($this->items[5]['price'] * (50 / 100));
            }
        }

        //increase total 
        $this->total += $this->NewShipping;
        $this->total += $this->VAT;
    }

    //remove one item and calculate again;
    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    //remove product and calculate again
    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
