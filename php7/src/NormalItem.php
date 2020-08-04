<?php

namespace App;

class NormalItem extends Item
{
    /**
     * NormalItem constructor.
     * @param string $name
     * @param int $sell_in
     * @param int $quality
     */
    public function __construct(
        string $name,
        int $sell_in,
        int $quality
    ) {
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
