<?php


namespace App\Model\Product;


use App\Model\Item;

class Sulfuras extends Product
{
    protected $name = "Sulfuras, Hand of Ragnaros";

    public function __construct(Item $item)
    {
        parent::__construct($item);

    }
}