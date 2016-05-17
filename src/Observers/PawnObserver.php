<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 11:25 AM
 */

namespace App\Observers;


use App\Figure;
use App\Figures\Pawn;

class PawnObserver extends ABoardObserver
{

    /**
     * @param Figure $figure
     * @param $posX int
     * @param $posY int
     */
    public function figureAdded(Figure $figure, $posX, $posY)
    {
        if (!$this->isPawn($figure)) {
            return false;
        }

        echo 'You added Pawn at x=' . $posX . ' y=' . $posY . PHP_EOL;
    }

    /**
     * @param Figure $figure
     * @return bool
     */
    private function isPawn(Figure $figure)
    {
        return $this->checkTypeOfFigure($figure, Pawn::class);
    }
}