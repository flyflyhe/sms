<?php
namespace he\sms;

/**
 * sms Interface 公共实现
 * Class SmsAbstract
 * @package sms
 */
abstract class SmsAbstract implements SmsInterface, ErrorInterface
{
    const TIMEOUT_SECOND = 5;

    protected $phone;

    protected $countryCode;

    protected $errorMsg;

    protected $singName;

    abstract public function send(string $message) :bool ;

    abstract public function sendVoice(string $message) :bool;

    public function setError(string $errorMsg)
    {
        $this->errorMsg = $errorMsg;
    }

    public function getError() :string
    {
        return $this->errorMsg ?? '';
    }

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

    public function postRequest($url, $params)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, SmsAbstract::TIMEOUT_SECOND);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode != 200) {
            $this->setError('not 200 error');
            return false;
        }
        return $response;
    }
}