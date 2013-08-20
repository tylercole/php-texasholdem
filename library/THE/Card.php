<?php
namespace THE;

/**
 * Class Card
 * @package THE
 */
class Card
{
    protected $suit;
    protected $rank;

    /**
     * @param $suit
     * @param $rank
     */
    public function __construct($suit, $rank)
    {
        $this->setRank($rank);
        $this->setSuit($suit);
    }

    /**
     * @param $suit
     */
    public function setSuit($suit)
    {
        $this->suit = $suit;
    }

    /**
     * @param $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return mixed
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }
}