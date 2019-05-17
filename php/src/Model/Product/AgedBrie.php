<?php


namespace App\Model\Product;


use App\Model\Item;

class AgedBrie extends Product
{
    protected $name = "Aged Brie";

    public function __construct(Item $item)
    {
        parent::__construct($item);

    }

    public function change()
    {
        $this->item->name = "OK";
    }

}