<?php


namespace App\Model\Product;


use App\Model\Item;

class Product
{
    /*
     * @var Item
     */
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;

    }

    public function changeQuality()
    {
        $number = $this->getQualityChange();
        $this->item->quality = $this->item->quality + $number;
    }

    public function changeSellIn()
    {
        $this->item->sell_in = $this->item->sell_in - 1;
    }

    /**
     * @return bool
     */
    public function sellInIsMoreThan(int $number): bool
    {
        return $this->item->sell_in > $number;
    }

    /**
     * @return bool
     */
    public function sellInIsLessThan(int $number): bool
    {
        return $this->item->sell_in < $number;
    }

    /**
     * @return bool
     */
    public function qualityMoreThan(int $number): bool
    {
        return $this->item->quality > $number;
    }

    /**
     * @return bool
     */
    public function qualityLessThan(int $number): bool
    {
        return $this->item->quality < $number;
    }

    /**
     * @return int
     */
    public function getQualityChange(): int
    {
        $qualityChange = 0;
        if ($this->qualityMoreThan(0)) {
            if ($this->qualityMoreThan(1) && $this->sellInIsLessThan(1)) {
                $qualityChange = -2;
            } else {
                $qualityChange = -1;
            }
        }
        return $qualityChange;
    }
}