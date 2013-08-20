<?php

namespace THE\Games;

/**
 * Class Game
 * @package THE\Games
 */
interface Game
{
    public function __construct(array $players, \THE\Deck $deck);
    public function deal();
    public function determineWinner();
    public function getWinner();
    public function isOver();

}