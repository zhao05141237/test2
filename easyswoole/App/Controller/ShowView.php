<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/8
 * Time: 17:40
 */

namespace App\Controller;


use Core\Component\Di;

class ShowView extends ViewController
{
    function index()
    {
        $db = Di::getInstance()->get('MYSQL');
        $subscribe = $db->get('tb_research_subscribe'); //contains an Array of all users
        // TODO: Implement index() method.
        $this->View('Index/index', ['subscribes' => $subscribe]);
    }

    function onRequest($actionName)
    {
        // TODO: Implement onRequest() method.
    }

    function actionNotFound($actionName = null, $arguments = null)
    {
        // TODO: Implement actionNotFound() method.
    }

    function afterAction()
    {
        // TODO: Implement afterAction() method.
    }


}