<?php

namespace App;

abstract class Item {

    public $name;
    public $sell_in;
    public $quality;

    function __construct(
        string $name,
        int $sell_in,
        int $quality
    ) {
        $this->name    = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    abstract protected function upgrade();

    /**
     * @param int $quality
     * @return int
     */
    public function addQuality($quality)
    {
        if ($quality < 50) {
            return $quality + 1;
        }
        return $quality;
    }

    /**
     * @param int $quality
     * @return int
     */
    public function decreaseQuality($quality)
    {
        if ($quality > 0) {
            return $quality - 1;
        }
        return $quality;
    }
}
