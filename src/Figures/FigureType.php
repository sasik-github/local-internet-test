<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 9:26 AM
 */

namespace App\Figures;


abstract class FigureType
{
    function __toString()
    {
        return static::class;
    }


}