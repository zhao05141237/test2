<?php


namespace App\Libraries;
use App\Contracts\SmsSenderContract;

class NexmoSender implements SmsSenderContract
{
    public function sender($phoneNumber, $message)
    {
        echo __CLASS__.' is sender';
        // TODO: Implement sender() method.
    }

}