<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/15/2017
 * Time: 10:33 AM
 */

namespace App\Services\Repositories;

use Simplon\Mysql\Mysql;


class SongsRepository
{
    /**
     * @var Mysql
     */
    protected $mySql;

    /**
     * SongsRepository constructor.
     * @param $mySql
     */
    function __construct($mySql)
    {
        $this->mySql = $mySql;
    }

    /**
     * @param SongModel $song
     */
    public function insertOne(SongModel $song)
    {
        $data = [
            'id'   => false,
            'song_name' => $song->songName,
            'artist_name'  => $song->artistName
        ];

        $this->mySql->insert('songs', $data);
    }

    /**
     * @param SongModel $song
     */
    public function editOne(SongModel $song)
    {
        $conditions = [
            'id' => $song->id,
        ];

        $data = [
            'song_name' => $song->songName,
            'artist_name'  => $song->artistName
        ];

        $this->mySql->update('songs', $conditions, $data);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->mySql->fetchRowMany('SELECT * FROM songs');
    }

    /**
     * @param int $id
     */
    public function deleteOne(int $id)
    {
        return $this->mySql->delete('songs', ['id' => $id]);
    }

    public function getLatest()
    {
        return $this->mySql->fetchRowMany('SELECT * FROM songs LIMIT 15');
    }
}