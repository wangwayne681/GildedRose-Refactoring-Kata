<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase {
    public function testFoo() {
        $items      = [new Item("foo", 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("foo", $items[0]->name);
    }

    public function testQualityNeverIsNegative()
    {
        $items = [new Item("foo", 0,0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $gildedRose->items[0]->quality);
    }

    public function testSulfurasCouldNotBeSold()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", 10, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(10, $gildedRose->items[0]->sell_in);
    }

    public function testSulfurasCouldNotDecreaseQuality()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(10, $gildedRose->items[0]->quality);
    }

    public function testQualityCouldNotBeMoreThanFifty()
    {
        $items = [new Item("Aged Brie", 10, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50, $gildedRose->items[0]->quality);
    }

    public function testitem_with_date_passed_quality_decrease_by_twice()
    {
        $items = [new Item("foo", -1, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(38, $gildedRose->items[0]->quality);
    }

    public function testAgedBrieIncreaseQualityWhenItGetsOlder()
    {
        $items = [new Item("Aged Brie", 1, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(41, $gildedRose->items[0]->quality);
    }

    public function testAgedBrieIncreaseByTwoQualityWhenDatePassed()
    {
        $items = [new Item("Aged Brie", -1, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(42, $gildedRose->items[0]->quality);
    }

    public function testAgedBrieIncreaseByTwoQualityWhenDatePassedAndNotMoreThanFifty()
    {
        $items = [new Item("Aged Brie", -1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50, $gildedRose->items[0]->quality);
    }

    public function testBackstagePassesIncreaseQualityByTwoWhenSellinLessThanTen()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(42, $gildedRose->items[0]->quality);
    }

    public function testBackstagePassesIncreaseQualityByTwoWhenSellinLessThanSix()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 6, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(42, $gildedRose->items[0]->quality);
    }

    public function testBackstagePassesIncreaseQualityByThreeWhenSellinLessThanFive()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(43, $gildedRose->items[0]->quality);
    }

    public function testBackstagePassesIncreaseQualityByTwoWhenSellinLessThanSixAndNotMoreThanFifty()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 6, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50, $gildedRose->items[0]->quality);
    }

    public function testBackstagePassesIncreaseQualityByThreeWhenSellinLessThanFiveAndNotMoreThanFifty()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 48)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50, $gildedRose->items[0]->quality);
    }

    public function testBackstagePassesQualityDropsToZeroAfterConcert()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 0, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $gildedRose->items[0]->quality);
    }

    public function testBackstagePassesQualityIncreaseQuilityByOneQhenDateIsMoreThan10()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 11, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(41, $gildedRose->items[0]->quality);
    }
}
