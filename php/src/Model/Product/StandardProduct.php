<?php


namespace App\Model\Product;


use App\Model\Item;

class StandardProduct extends Product
{
    public function __construct(Item $item)
    {
        parent::__construct($item);

    }
}