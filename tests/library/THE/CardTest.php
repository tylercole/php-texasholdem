<?php

class CardTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {

    }

    public function testSingleCard()
    {
        $card = new THE\Card('Diamond', 'Queen');

        $this->assertEquals('Diamond', $card->getSuit());
        $this->assertEquals('Queen', $card->getRank());
    }
}