<?php

namespace App;

final class GildedRose {

    public $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Aged Brie':
                    $item->sell_in = $item->sell_in - 1;
                    $item->quality = $this->addQuality($item->quality);
                    if ($item->sell_in < 0) {
                        $item->quality = $this->addQuality($item->quality);
                    }
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $item->sell_in = $item->sell_in - 1;
                    $item->quality = $this->addQuality($item->quality);
                    if ($item->sell_in < 10) {
                        $item->quality = $this->addQuality($item->quality);
                    }
                    if ($item->sell_in < 5) {
                        $item->quality = $this->addQuality($item->quality);
                    }
                    if ($item->sell_in < 0) {
                        $item->quality = 0;
                    }
                    break;
                case 'Sulfuras, Hand of Ragnaros':
                    break;
                default:
                    $item->sell_in = $item->sell_in - 1;
                    $item->quality = $this->decreaseQuality($item->quality);
                    if ($item->sell_in < 0) {
                        $item->quality = $this->decreaseQuality($item->quality);
                    }
                    break;
            }
        }
    }

    /**
     * @param int $quality
     * @return int
     */
    private function addQuality($quality)
    {
        if ($quality < 50) {
            return $quality + 1;
        }
        return $quality;
    }

    private function decreaseQuality($quality)
    {
        if ($quality > 0) {
            return $quality - 1;
        }
        return $quality;
    }
}

