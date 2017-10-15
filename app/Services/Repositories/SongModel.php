<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/15/2017
 * Time: 10:49 AM
 */

namespace App\Services\Repositories;


class SongModel
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $songName;

    /**
     * @var string
     */
    public $artistName;

    /**
     * SongData constructor.
     * @param int|boolean $id
     * @param string $songName
     * @param string $artistName
     */
    public function __construct(int $id, string $songName, string $artistName)
    {
        $this->id = $id;
        $this->songName = $songName;
        $this->artistName = $artistName;
    }

}
