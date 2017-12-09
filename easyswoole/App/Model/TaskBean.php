<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/7
 * Time: 18:22
 */

namespace App\Model;

use Core\Component\Spl\SplBean;

class TaskBean extends SplBean
{
    /*
     * 仅仅做示例，curl opt 选项请自己写
     */
    protected $url;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    protected function initialize()
    {
        // TODO: Implement initialize() method.
    }
}