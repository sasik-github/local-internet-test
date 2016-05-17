<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 11:52 AM
 */

namespace App\Observers;


use App\Figure;

class AnyObserver extends ABoardObserver
{

    /**
     * @param Figure $figure
     * @param $posX int
     * @param $posY int
     * @return
     */
    public function figureAdded(Figure $figure, $posX, $posY)
    {
        echo 'Figure added ' . $figure->getType() . PHP_EOL;
    }
}