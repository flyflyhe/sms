<?php
namespace sms;

/**
 * sms interface 暴露方法
 * Interface SmsInterface
 * @package sms
 */
interface SmsInterface
{
    public function send(string $message) :bool;

    public function sendVoice(string $message) :bool;

    public function setPhone(string $phone);

    public function setCountryCode(string $countryCode);

    public function getPhone();

    public function getCountryCode();
}