<?php


namespace App\Model\Product;


class AgedBrie extends Product
{
    /**
     * @return int
     */
    public function getQualityChange(): int
    {
        $qualityChange = 0;
        if ($this->qualityLessThan(50)) {
            if ($this->qualityLessThan(49) && $this->sellInIsNegative()) {
                $qualityChange = 2;
            } else {
                $qualityChange = 1;
            }
        }
        return $qualityChange;
    }

}