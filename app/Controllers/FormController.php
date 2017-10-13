<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/11/2017
 * Time: 11:07 AM
 */

namespace App\Controllers;

use App\Services\Form\Form;
use Slim\Http\Response;

class FormController extends Controller
{
    /**
     * @param $request
     * @param $response
     * @return mixed
     */
    public function addForm($request, $response) : Response
    {
        return $this->view->render($response, 'addSongTemplate.phtml', (new Form())->createForm());
    }

    /**
     * @param $request
     * @param $response
     * @return Response
     */
    public function add($request, $response) : Response
    {
        $parsedBody = $request->getParsedBody();

        $data = [
            'id'   => false,
            'song_name' => $parsedBody['form']['songName'],
            'artist_name'  => $parsedBody['form']['artistName']
        ];

        $this->dbConn->insert('songs', $data);
        return $response->withRedirect('/songs');
    }

    /**
     * @param $request
     * @param $response
     * @param $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editForm($request, $response, $args)
    {
        return $this->view->render($response, 'editSongTemplate.phtml', (new Form())->createForm($args['id']));
    }

    /**
     * @param $request
     * @param $response
     * @param $args
     * @return Response
     */
    public function put($request, $response, $args) : Response
    {
        $parsedBody = $request->getParsedBody();

        $conditions = [
            'id' => $args['id'],
        ];

        $data = [
            'song_name' => $parsedBody['form']['songName'],
            'artist_name'  => $parsedBody['form']['artistName'],
        ];

        $this->dbConn->update('songs', $conditions, $data);
        return $response->withRedirect('/songs');
    }
}