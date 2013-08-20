<?php

namespace THE\Games;
use THE\CardMethods;

/**
 * Class TexasHoldEm
 * @package THE\Games
 */
class TexasHoldEm implements Game
{
    protected $good_hands = array(
        'Straight Flush' => array('value' => 9, 'function' => array('sameSuit' => array(TRUE), 'sequential' => array(TRUE))),
        'Four of a Kind' => array('value' => 8, 'function' => array('sameRank' => array(TRUE, 4))),
        'Full House' => array('value' => 7, 'function' => array('sameRank' => array(TRUE, 3), 'sameRank' => array(TRUE, 2))),
        'Flush' => array('value' => 6, 'function' => array('sameSuit' => TRUE)),
        'Straight' => array('value' => 5, 'function' => array('sequential')),
        'Three of a Kind' => array('value' => 4, 'function' => array('sameRank' => array(TRUE, 3))),
        'Two Pair' => array('value' => 3, 'function' => array('sameRank' => array(TRUE, 2), 'sameRank' => array(TRUE, 2))),
        'One Pair' => array('value' => 2, 'function' => array('sameRank' => array(TRUE, 1))),
        'High Card' => array('value' => 1, 'function' => array('max_card' => array(TRUE))),
    );

    protected $players;
    protected $deck;
    protected $winner;

    public $is_over = FALSE;

    /**
     * @param array $players
     * @param \THE\Deck $deck
     */
    public function __construct(array $players, \THE\Deck $deck)
    {
        $this->players = $players;
        $this->deck = $deck;
    }


    public function deal() {
        foreach($this->players as $player) {
            $player->setHand = $this->deck->getCards(7);
        }

        // one turns are no fun!
        $this->is_over = TRUE;
    }
    protected function cardValues($player) {
        $cards = $player->getHand();

        foreach($this->good_hands as $hand)
            $condition = array();
            foreach($hand['function'] as $function) {

                // add cards as the first variable.
                $function[1] = array_unshift($function[1], $cards);
                $condition[] = call_user_func(\THE\CardMethods::$function[0], $function[1]);
            }
            if(!in_array(FALSE, $condition)) {
                return $hand['value'];
            }
    }

    public function determineWinner()
    {
        $values = array();
        foreach($this->players as $player) {
            // getName() assumption warning. id would be a better solution
            $values[$player->getName()] = $this->cardValues($player);
        }

        $this->winner = max(array_keys($values));
    }

    public function getWinner()
    {
        if($this->winner) {
            return $this->winner;
        }

        return 'There are no winners yet.';
    }

    public function getPlayersValues()
    {

    }

    public function isOver()
    {
        return $this->is_over;
    }
}