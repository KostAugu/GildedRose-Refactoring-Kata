<?php


namespace App\Model\Product;


class Conjured extends Product
{
    /**
     * @return int
     */
    public function getQualityChange(): int
    {
        $qualityChange = 0;
        if ($this->qualityMoreThan(0)) {
            if ($this->qualityMoreThan(3) && $this->sellInIsLessThan(1)) {
                $qualityChange = -4;
            } else {
                $qualityChange = -2;
            }
        }
        return $qualityChange;
    }
}