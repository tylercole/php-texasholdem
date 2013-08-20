<?php

namespace THE;

/**
 * Class Game
 * @package Game
 */
class Game
{
    private $_game;

    /**
     * @param $game_type
     * @param array $players
     * @param Deck $deck
     */
    public function __construct($game_type, array $players, Deck $deck)
    {
        if(file_exists(__DIR__ . '/Games/' . $game_type . '.php')) {
            include_once(__DIR__ . '/Games/' . $game_type . '.php');
        } else {
            throw new \Exception('The game ' . $game_type . ' is not implemented. Get ta work!');
        }
        // variable class name with a different namespace seriously sucks
        $class = 'THE\\Games\\' . $game_type;
        $this->_game = new $class($players, $deck);
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        if(!method_exists($this, $method)) {
            return call_user_func_array(array($this->_game, $method), $args);
        }
    }

}