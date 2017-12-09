<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/8
 * Time: 17:55
 */

namespace App\Model;


use Core\Component\Spl\SplBean;

class SubscribesBean extends SplBean
{
    protected $uid;
    protected $name;
    protected $email;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
        // TODO: Implement initialize() method.
        $this->ctime = time();
    }


}