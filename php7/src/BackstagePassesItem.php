<?php

namespace App;

class BackstagePassesItem extends Item
{
    /**
     * BackstagePassesItem constructor.
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
        $this->quality = $this->addQuality($this->quality);
        if ($this->sell_in < 10) {
            $this->quality = $this->addQuality($this->quality);
        }
        if ($this->sell_in < 5) {
            $this->quality = $this->addQuality($this->quality);
        }
        if ($this->sell_in < 0) {
            $this->quality = 0;
        }
    }
}
