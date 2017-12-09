<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/8
 * Time: 17:37
 */

namespace App\Controller;


use Core\AbstractInterface\AbstractController;
use Jenssegers\Blade\Blade;

abstract class ViewController extends AbstractController
{
    protected $TemplateViews = ROOT . '/Templates/';
    protected $TemplateCache = ROOT . '/Temp/TplCache';

    function View($tplName, $tplData = [])
    {
        $blade = new Blade([$this->TemplateViews], $this->TemplateCache);
        $viewTemplate = $blade->render($tplName, $tplData);
        $this->response()->write($viewTemplate);
    }
}