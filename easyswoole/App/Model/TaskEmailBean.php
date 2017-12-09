<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/7
 * Time: 18:22
 */

namespace App\Model;

use Core\Component\Spl\SplBean;

class TaskEmailBean extends SplBean
{
    /*
     * 仅仅做示例，curl opt 选项请自己写
     */
    protected $toAddress;

    protected $ccAddress;

    protected $title;

    protected $content;

    /**
     * @return mixed
     */
    public function getToAddress()
    {
        return $this->toAddress;
    }

    /**
     * @param mixed $toAddress
     */
    public function setToAddress($toAddress)
    {
        $this->toAddress = $toAddress;
    }

    /**
     * @return mixed
     */
    public function getCcAddress()
    {
        return $this->ccAddress;
    }

    /**
     * @param mixed $ccAddress
     */
    public function setCcAddress($ccAddress)
    {
        $this->ccAddress = $ccAddress;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }



    protected function initialize()
    {
        // TODO: Implement initialize() method.
    }
}