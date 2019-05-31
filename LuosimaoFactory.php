<?php
namespace he\sms;

class LuosimaoFactory implements SmsFactoryInterface
{
    public function getSms(array $config): SmsAbstract
    {
        return new LuosimaoSms($config);
    }
}