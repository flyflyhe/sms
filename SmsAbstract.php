<?php
namespace sms;

/**
 * sms Interface 公共实现
 * Class SmsAbstract
 * @package sms
 */
abstract class SmsAbstract implements SmsInterface
{
    protected $phone;

    protected $countryCode;

    abstract public function send(string $message);

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function getPhone() :string
    {
        return $this->phone;
    }

    public function getCountryCode() :string
    {
        return $this->countryCode;
    }
}