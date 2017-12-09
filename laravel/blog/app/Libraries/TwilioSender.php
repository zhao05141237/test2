<?php


namespace App\Libraries;
use App\Contracts\SmsSenderContract;

class TwilioSender implements SmsSenderContract
{
    public function sender($phoneNumber, $message)
    {
        // TODO: Implement sender() method.
        echo __CLASS__.' is sender';
    }

}