<?php

namespace THE;

/**
 * Class Player
 * @package THE
 */
class Player
{
    protected $name;
    protected $cards = array();

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param array $cards
     */
    public function setHand(array $cards)
    {
        $this->cards = $cards;
    }

    /**
     * @return array
     */
    public function getHand()
    {
        return $this->cards;
    }

    public function __toString()
    {
        return $this->getName();
    }
}