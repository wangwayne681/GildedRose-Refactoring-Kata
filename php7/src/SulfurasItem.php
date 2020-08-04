<?php

namespace App;

class SulfurasItem extends item
{
    /**
     * SulfurasItem constructor.
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
    }
}
