<?php
namespace THE;

/**
 * Class Deck
 * @package THE
 */
class Deck
{
    protected $length = 52;
    protected $suits = array('Diamonds', 'Hearts', 'Spades', 'Clubs');
    protected $ranks = array('Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King');
    protected $cards = array();
    public $jokers;

    /**
     * @param bool $jokers
     */
    public function __construct($jokers = FALSE)
    {
        $this->jokers = $jokers;
    }

    /**
     * @param $number
     * @return array
     */
    public function getCards($number)
    {
        // check to see if deck has been generated
        if(count($this->cards) == 0) {
            $this->cards = $this->generateDeck();
        }

        return $this->array_slice_by_reference($this->cards, 0, $number);
    }

    /**
     * @return array
     */
    protected function generateDeck()
    {
        $cards = array();

        foreach($this->suits as $suit) {
            foreach($this->ranks as $rank) {
                $cards[] = new Card($suit, $rank);
            }
        }
        // check for jokers
        if($this->jokers) {
            $cards[] = new Card('Joker', 'Joker');
            $cards[] = new Card('Joker', 'Joker');
        }
        shuffle($cards);
        return $cards;
    }

    /**
     * Since the normal implementation of array_slice doesn't modify the original array, we pass it by reference.
     * @param $array by reference
     * @param $offset
     * @param $length
     * @return array
     */
    private function array_slice_by_reference(&$array, $offset, $length)
    {
        $split_array = array_slice($array, $offset, $length);
        $split_array_original_keys = array_slice($array, $offset, $length, TRUE); // keep original key for easy unset

        foreach($split_array_original_keys as $key => $value) {
            unset($array[$key]);
        }

        return $split_array;
    }

}