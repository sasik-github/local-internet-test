<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 1:16 PM
 */

namespace App\Storage;


use App\Board;
use Predis\Client;

class RedisStorage implements IStorage
{
    /**
     * @var Client
     */
    private $client;

    private $saveKey = 'board';

    /**
     * RedisStorage constructor.
     */
    public function __construct(array $attributes = [])
    {
        $this->client = new Client($attributes);
    }


    /**
     * @param Board $board
     * @return bool
     */
    public function save(Board $board)
    {
        $this->client->set($this->saveKey, serialize($board));
    }

    /**
     * @return Board
     */
    public function load()
    {
        return unserialize($this->client->get($this->saveKey));
    }
}