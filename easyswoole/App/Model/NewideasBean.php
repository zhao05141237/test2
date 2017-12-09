<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/8
 * Time: 18:00
 */

namespace App\Model;


use Core\Component\Spl\SplBean;

class NewideasBean extends SplBean
{
    protected $uid;
    protected $name;
    protected $content;
    protected $ctime;

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    /**
     * @return mixed
     */
    public function getCtime()
    {
        return $this->ctime;
    }

    /**
     * @param mixed $ctime
     */
    public function setCtime($ctime)
    {
        $this->ctime = $ctime;
    }




    protected function initialize()
    {
        $this->ctime = time();
        // TODO: Implement initialize() method.
    }


}