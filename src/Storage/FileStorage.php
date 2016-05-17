<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 10:56 AM
 */

namespace App\Storage;




use App\Board;

class FileStorage implements IStorage
{

    /**
     * @var string
     */
    private $file;

    /**
     * FileStorage constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @param Board $board
     * @return bool
     */
    public function save(Board $board)
    {
        return false !== file_put_contents($this->file, serialize($board));
    }

    /**
     * @return Board
     */
    public function load()
    {
        $board = unserialize(file_get_contents($this->file));

        return $board;
    }
}