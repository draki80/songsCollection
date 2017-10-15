<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/11/2017
 * Time: 11:07 AM
 */

namespace App\Controllers;


use Slim\Http\Response;
use App\Services\Repositories\SongModel as SongDataObject;

class FormController extends Controller
{
    /**
     * @param $request
     * @param $response
     * @return mixed
     */
    public function getAddForm($request, $response): Response
    {
        try {
            $this->form->createForm();

            return $this->view->render($response, 'addSongTemplate.phtml', $this->form->templateVariables);

        } catch (\Exception $e) {
            return $response->write('Something Went Wrong');
        }
    }

    /**
     * @param $request
     * @param $response
     * @return Response
     */
    public function postAddForm($request, $response): Response
    {
        try {
            $this->form->createForm();

            if ($this->form->validate($request->getParams()) === false) {
                return $this->view->render($response, 'addSongTemplate.phtml', $this->form->templateVariables);
            }

            $parsedBody = $request->getParsedBody();
            $this->songsRepository->insertOne(new SongDataObject(false, $parsedBody['form']['songName'], $parsedBody['form']['artistName']));

            return $response->withRedirect('/songs');
        } catch (\Exception $e) {
            return $response->write('Something Went Wrong');
        }

    }

    /**
     * @param $request
     * @param $response
     * @param $args
     * @return \Psr\Http\Message\ResponseInterface|Response
     */
    public function getEditForm($request, $response, $args) :Response
    {
        try {
            $this->form->createForm($args['id']);
            return $this->view->render($response, 'editSongTemplate.phtml', $this->form->templateVariables);

        } catch (\Exception $e) {
            return $response->write('Something Went Wrong');
        }

    }

    /**
     * @param $request
     * @param $response
     * @param $args
     * @return Response
     */
    public function put($request, $response, $args) : Response
    {
        try {
            $parsedBody = $request->getParsedBody();
            $this->form->createForm();

            if ($this->form->validate($request->getParams()) === false) {
                return $this->view->render($response, 'editSongTemplate.phtml', $this->form->templateVariables);
            }

            $this->songsRepository->insertOne(new SongDataObject($args['id'], $parsedBody['form']['songName'], $parsedBody['form']['artistName']));
            return $response->withRedirect('/songs');


        } catch (\Exception $e) {
            return $response->write('Something Went Wrong');
        }
    }
}