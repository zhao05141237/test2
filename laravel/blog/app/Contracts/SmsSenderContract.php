<?php
namespace App\Contracts;

Interface SmsSenderContract
{
    public function sender($phoneNumber, $message);
}