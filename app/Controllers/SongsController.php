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
    public function get($request, $response) : Response
    {
        try {
            $data = $this->songsRepository->getAll();
            return $this->view->render($response, 'songs.phtml', ['songs' => $data]);

        } catch (\Exception $e) {
            return $response->write('Something Went Wrong');
        }
    }

    public function delete($request, $response, $args)
    {
        try {
            $this->songsRepository->deleteOne((int) $args['id']);
            $this->logger->addInfo('Deleted row with id: ' . $args['id']);

        } catch (\Exception $e) {
            return $response->write('Something Went Wrong');
        }
    }
}