<?php
namespace sms;

class LuosimaoSms extends SmsAbstract
{
    protected $apiUri = "http://sms-api.luosimao.com/v1/send.json";

    protected $apiKey;

    public function send(string $message)
    {

    }

    public function __construct()
    {
    }
}