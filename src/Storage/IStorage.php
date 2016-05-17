<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 10:56 AM
 */

namespace App\Storage;


use App\Board;

interface IStorage
{

    /**
     * @param Board $board
     * @return bool
     */
    public function save(Board $board);

    /**
     * @return Board
     */
    public function load();

}