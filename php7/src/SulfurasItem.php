<?php

namespace App;

class SulfurasItem extends item
{
    public function __construct($name, $sell_in, $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function upgrade()
    {
    }
}
