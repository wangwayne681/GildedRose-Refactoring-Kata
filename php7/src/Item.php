<?php

namespace App;

abstract class Item {

    /**
     * @var string 商品名稱
     */
    public $name;

    /**
     * @var int 商品銷售剩餘天數
     */
    public $sell_in;

    /**
     * @var int 商品價值
     */
    public $quality;

    /**
     * Item constructor.
     * @param string $name
     * @param int $sell_in
     * @param int $quality
     */
    function __construct(
        string $name,
        int $sell_in,
        int $quality
    ) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    abstract protected function upgrade();

    /**
     * 增加商品價值
     * @param int $quality 商品價值
     * @return int 增加後商品價值
     */
    public function addQuality($quality)
    {
        if ($quality < 50) {
            return $quality + 1;
        }
        return $quality;
    }

    /**
     * 減少商品價值
     * @param int $quality 商品價值
     * @return int 減少後商品價值
     */
    public function decreaseQuality($quality)
    {
        if ($quality > 0) {
            return $quality - 1;
        }
        return $quality;
    }
}
