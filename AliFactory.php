<?php
namespace he\sms;

class AliFactory implements SmsFactoryInterface
{
    public function getSms(array $config): SmsAbstract
    {
        return new AliSms($config);
    }
}