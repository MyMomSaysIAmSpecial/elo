<?php

class EloCalculator
{
    // The maximum possible adjustment per game, called the K-factor,
    // was set at K = 16 for masters and K = 32 for weaker players.
    private $coefficient = 32;

    // Player game result points for win, lose and draw
    private $points = [
        1,
        0,
        0.5
    ];

    /**
     * @param int $player first player elo
     * @param int $rival second player elo
     * @param int $result first player game result
     *
     * @return float
     */
    public function calculate($player, $rival, $result)
    {
        $expectedValue = 1 / (1 + 10 ** (($rival - $player) / 400));
        return $player + $this->coefficient * ($this->points[$result] - $expectedValue);
    }
}

$eloCalculator = new EloCalculator();
$r = $eloCalculator->calculate(1400, 1400, 0);
