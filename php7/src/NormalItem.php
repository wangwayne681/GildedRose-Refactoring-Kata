<?php

namespace App;

class NormalItem extends Item
{
    public function __construct($name, $sell_in, $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function upgrade()
    {
        $this->sell_in = $this->sell_in - 1;
        $this->quality = $this->decreaseQuality($this->quality);
        if ($this->sell_in < 0) {
            $this->quality = $this->decreaseQuality($this->quality);
        }
    }
}
