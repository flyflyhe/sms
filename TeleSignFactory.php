<?php
namespace he\sms;

class TeleSignFactory implements SmsFactoryInterface
{
    public function getSms(array $config): SmsAbstract
    {
        return new TeleSignSms($config);
    }
}