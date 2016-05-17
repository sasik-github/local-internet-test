<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 9:24 AM
 */

namespace App;


use App\Observers\ABoardObserver;

class Board
{

    private $observers = [];

    private $grid = [];

    /**
     * @var int
     */
    private $xSize;

    /**
     * @var int
     */
    private $ySize;

    /**
     * Board constructor.
     * @param int $xSize
     * @param int $ySize
     */
    public function __construct($xSize, $ySize)
    {
        $this->xSize = $xSize;
        $this->ySize = $ySize;
    }


    public function addFigure(Figure $figure, $positionX, $postitionY)
    {
        if ($this->isOutOfRange($positionX, $this->xSize)) {
            return false;
        }

        if ($this->isOutOfRange($postitionY, $this->ySize)) {
            return false;
        }

        $this->add($figure, $positionX, $postitionY);

        $this->notifyFigureAdded($figure, $positionX, $postitionY);

    }

    /**
     * @param $fromX int
     * @param $fromY int
     * @param $toX int
     * @param $toY int
     * @return bool
     */
    public function move($fromX, $fromY, $toX, $toY)
    {

        if (!$this->isExistFigure($fromX, $fromY)) {
            return false;
        }


        if ($fromX == $toX && $fromY == $toY) {
            return false;
        }

        if ($this->isOutOfRange($toX, $this->xSize)) {
            return false;
        }

        if ($this->isOutOfRange($toY, $this->ySize)) {
            return false;
        }

        $figure = $this->get($fromX, $fromY);

        /**
         * здесь можно добавить валидацию по типу фигуры
         * $figure->validate($fromX, $fromY, $toX, $toY)
         */

        $this->remove($fromX, $fromY);
        $this->add($figure, $toX, $toY);

        return true;

    }

    /**
     * @param $position int
     * @param $border int
     * @return bool
     */
    private function isOutOfRange($position, $size)
    {
        if ($position > $size || $position < 0) {
            return true;
        }

        return false;
    }

    /**
     * @param Figure $figure
     * @param $posX int
     * @param $posY int
     */
    private function add(Figure $figure, $posX, $posY)
    {
        $this->grid[$posX][$posY] = $figure;
    }

    /**
     * @param $posX int
     * @param $posY int
     * @return bool
     */
    public function remove($posX, $posY)
    {

        if ($this->isExistFigure($posX, $posY)) {
            unset($this->grid[$posX][$posY]);
            return true;
        }

        return false;
    }

    /**
     * @param $posX
     * @param $posY
     * @return Figure
     */
    private function get($posX, $posY)
    {
        return $this->grid[$posX][$posY];
    }

    /**
     * @param $posX int
     * @param $posY int
     * @return bool
     */
    public function isExistFigure($posX, $posY)
    {
        if (array_key_exists($posX, $this->grid)) {
            if (array_key_exists($posY, $this->grid[$posX])) {
                return true; // maybe check figure?
            }
        }

        return false;
    }


    public function addObserver(ABoardObserver $boardObserver)
    {
        $this->observers[] = $boardObserver;
    }

    /**
     * @param Figure $figure
     * @param $posX
     * @param $posY
     */
    private function notifyFigureAdded(Figure $figure, $posX, $posY)
    {
        foreach ($this->observers as $observer) {
            /**
             * @var $observer ABoardObserver
             */
            $observer->figureAdded($figure, $posX, $posY);
        }
    }
}
