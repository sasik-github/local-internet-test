<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 9:24 AM
 */

namespace App;


use App\Figures\FigureType;

class Figure
{
    /**
     * @var FigureType
     */
    private $type;


    /**
     * Figure constructor.
     * @param FigureType $type
     */
    public function __construct(FigureType $type)
    {
        $this->type = $type;
    }

    /**
     * @return FigureType
     */
    public function getType()
    {
        return $this->type;
    }

}
