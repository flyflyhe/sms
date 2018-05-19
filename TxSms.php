<?php
namespace sms;

class TxSms extends SmsAbstract
{
    protected $apiUri = 'https://yun.tim.qq.com/v5/tlssmssvr/sendsms';

    protected $appId;

    protected $appKey;

    public function send(string $message)
    {

    }
}