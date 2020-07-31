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
            if ($item->name == 'Aged Brie' || $item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $item->quality = $this->addQuality($item->quality);
                if ($item->quality < 50) {
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sell_in < 11) {
                            $item->quality = $this->addQuality($item->quality);
                        }
                        if ($item->sell_in < 6) {
                            $item->quality = $this->addQuality($item->quality);
                        }
                    }
                }
            } else {
                if ($item->quality > 0) {
                    if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                    } else {
                        $item->quality = $item->quality - 1;
                    }
                }
            }
            
            if ($item->name == 'Sulfuras, Hand of Ragnaros') {
            } else {
                $item->sell_in = $item->sell_in - 1;
            }
            
            if ($item->sell_in < 0) {
                switch ($item->name) {
                    case 'Aged Brie':
                        $item->quality = $this->addQuality($item->quality);
                        break;
                    case 'Backstage passes to a TAFKAL80ETC concert':
                        $item->quality = 0;
                        break;
                    case 'Sulfuras, Hand of Ragnaros':
                        break;
                    default:
                    $item->quality = $this->decreaseQuality($item->quality);
                }
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
            $quality = $quality - 1;
        }
        return $quality;
    }
}

