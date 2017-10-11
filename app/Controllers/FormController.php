<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/11/2017
 * Time: 11:07 AM
 */

namespace App\Controllers;

use App\Services\Form\Form;

class FormController extends Controller
{
    /**
     * @param $request
     * @param $response
     * @return mixed
     */
    public function index($request, $response)
    {
        return $this->view->render($response, 'index.phtml', (new Form())->createForm());
    }
}