<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/12/2017
 * Time: 11:55 AM
 */

namespace App\Controllers;

use Slim\Http\Response;

class SongsController extends Controller
{
    public function get($request, $response)
    {
        $data = $this->dbConn->fetchRowMany('SELECT * FROM songs');

        return $this->view->render($response, 'songs.phtml', ['songs' => $data]);
    }
    public function delete($request, $response, $args)
    {

        $data = $this->dbConn->delete('songs', ['id' => $args['id']]);
        $this->logger->addInfo('Deleted row with id: ' . $args['id']);
//        return true;
//        echo'<pre>';
//        var_dump($data);
//        echo'</pre>';

    }
}