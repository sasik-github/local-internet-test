<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 11:11 AM
 */

namespace App\Builder;


use App\Storage\FileStorage;
use App\Storage\IStorage;
use App\Storage\RedisStorage;

class StorageBuilder
{

    /**
     * @param string $file
     * @return FileStorage
     */
    public static function buildFileStorage($file = 'default.save')
    {
        return new FileStorage($file);
    }

    public static function buildRedisStorage()
    {
        $attributes = [
            'scheme' => 'tcp',
            'host'   => '127.0.0.1',
            'port'   => 6379,
        ];

        return new RedisStorage($attributes);
    }
}