<?php

class DeckTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {

    }

    public function testSingleCard()
    {
        $deck = new THE\Deck(FALSE);
        $this->assertEquals(1, count($deck->getCards(1)));
    }

    public function testTenCards()
    {
        $deck = new THE\Deck(FALSE);
        $this->assertEquals(10, count($deck->getCards(10)));
    }

    public function testRemainingCardDeck()
    {
        $deck = new THE\Deck(FALSE);
        $deck->getCards(50);

        $this->assertEquals(2, count($deck->getCards(10)));
    }

}