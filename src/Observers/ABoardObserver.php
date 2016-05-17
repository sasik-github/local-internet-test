<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 11:24 AM
 */

namespace App\Observers;


use App\Figure;

abstract class ABoardObserver
{

    /**
     * @param Figure $figure
     * @param $posX int
     * @param $posY int
     * @return
     */
    abstract public function figureAdded(Figure $figure, $posX, $posY);

    /**
     * @param Figure $figure
     * @param $className
     * @return bool
     */
    protected function checkTypeOfFigure(Figure $figure, $className)
    {
        if ($figure->getType() instanceof $className) {
            return true;
        }

        return false;
    }

}
