<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 9:26 AM
 */

namespace App\Builder;


use App\Figure;
use App\Figures\FigureType;
use App\Figures\King;
use App\Figures\Pawn;
use App\Figures\Queen;

class FigureBuilder
{

    /**
     * @param FigureType $type
     * @return Figure
     */
    private static function buildFigure(FigureType $type)
    {
        return new Figure($type);
    }

    /**
     * @return Figure
     */
    public static function buildPawn()
    {
        return self::buildFigure(new Pawn());
    }

    /**
     * @return Figure
     */
    public static function buildKing()
    {
        return self::buildFigure(new King());
    }

    /**
     * @return Figure
     */
    public static function buildQueen()
    {
        return self::buildFigure(new Queen());
    }

}