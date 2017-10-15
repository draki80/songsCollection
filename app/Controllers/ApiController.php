<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/12/2017
 * Time: 11:55 AM
 */

namespace App\Controllers;


use Slim\Http\Response;

class ApiController extends Controller
{
    public function getLatest($request, $response) : Response
    {
        try {
            $data = $this->songsRepository->getAll();
            return $response->withJson($data, 200);

        } catch (\Exception $e) {
            return $response->write('Something Went Wrong');
        }
    }
}