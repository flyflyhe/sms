<?php
namespace sms;

class TeleSignSms extends SmsAbstract
{
    public function send(string $message): bool
    {
        return true;
    }

    public function sendVoice(string $message): bool
    {
        return true;
    }
}