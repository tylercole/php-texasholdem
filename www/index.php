<?php
/**
 * For the sake of brevity, this will contain an HTML code as well. Could use something like Twig, but this is one form
 * element with simple echo commands, so really not worth it in the end. Again, this is just a rudimentary sample,
 * otherwise we'd use ENV and such for debugging info.
 */

use Symfony\Component\ClassLoader as cl;

ini_set('display_errors', 1);
error_reporting(E_ALL);

// autoload fun stuff
require_once __DIR__.'/../library/Symfony/ClassLoader/UniversalClassLoader.php';
$loader = new cl\UniversalClassLoader();

$loader->registerNamespaces(array(
    'THE' => __DIR__.'/../library',
));
$loader->register();


if($_POST) {
    $num_players = intval($_POST['numberOfPlayers']);

    if($num_players > 6 || $num_players < 2) {
        throw new exception('You don\'t understand the value of 2-6?');
    }

    $players = array();
    for($i=1; $i<=$num_players; $i++) {
        $players[] = new THE\Player('Player ' . $i);
    }
    $deck = new THE\Deck(False); // No jokers!

    $game = new THE\Game('TexasHoldEm', $players, $deck);

    while(!$game->isOver()) {
        // we're only doing one round, the deal. and then going for the win. this would certainly be a boring game
        $game->deal();
    }
    $game->determineWinner();

    echo '<p>Congratulations to player number ' . $game->getWinner() . '</p>';

    $show_html = false;
} else {
    $show_html = true;
}
if($show_html): ?>
<form input method="post" name="index.php">
    <label for="numberOfPlayers">Number of Players (2-6)</label><input type="text" value="2" name="numberOfPlayers" />
    <input type="submit" name="submit" value="Wheee" />
</form>

<?php endif; ?>
