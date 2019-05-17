<?php


namespace App\Model\Product;


use App\Model\Item;

class Product
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;

    }

}