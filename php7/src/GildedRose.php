<?php

namespace App;

final class GildedRose {

    /**
     * @var array
     */
    public $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $item->upgrade();
        }
    }
}

