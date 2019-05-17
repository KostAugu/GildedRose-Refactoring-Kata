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
    public function sellInIsNegative(): bool
    {
        return $this->item->sell_in < 0;
    }

    /**
     * @return bool
     */
    public function qualityMoreThanZero(): bool
    {
        return $this->item->quality > 0;
    }

    /**
     * @return bool
     */
    public function qualityMoreThanOne(): bool
    {
        return $this->item->quality > 1;
    }

    /**
     * @return int
     */
    public function getQualityChange(): int
    {
        $qualityChange = 0;
        if ($this->qualityMoreThanZero()) {
            if ($this->qualityMoreThanOne() && $this->sellInIsNegative()) {
                $qualityChange = -2;
            } else {
                $qualityChange = -1;
            }
        }
        return $qualityChange;
    }
}