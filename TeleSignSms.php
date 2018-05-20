<?php
namespace he\sms;

class TeleSignSms extends SmsAbstract
{
    public function __construct(array $config)
    {
    }

    public function send(string $message): bool
    {
        return true;
    }

    public function sendVoice(string $message): bool
    {
        return true;
    }
}