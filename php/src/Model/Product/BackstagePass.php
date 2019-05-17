<?php


namespace App\Model\Product;


class BackstagePass extends Product
{
    /**
     * @return int
     */
    public function getQualityChange(): int
    {
        $qualityChange = 0;
        if ($this->qualityLessThan(50) && $this->sellInIsMoreThan(0)) {
            if($this->sellInIsMoreThan(10)) {
                $qualityChange = 1;
            } elseif ($this->sellInIsLessThan(6)) {
                $qualityChange = 3;
            } else {
                $qualityChange = 2;
            }

        } elseif ($this->sellInIsLessThan(1)) {
            $qualityChange = -($this->item->quality);
        }
        return $qualityChange;
    }
}