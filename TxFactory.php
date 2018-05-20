<?php
namespace he\sms;

class TxFactory implements SmsFactoryInterface
{
    public function getSms(array $config): SmsAbstract
    {
        return new  TxSms($config);
    }
}