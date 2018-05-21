<?php
namespace he\sms;

class TeleSignSms extends SmsAbstract
{
    const SMS_REST_API = 'https://rest-ww.telesign.com/v1/verify/sms';

    const VOICE_REST_API = 'https://rest-ww.telesign.com/v1/verify/call';

    protected $customerId;

    protected $appkey;

    public function __construct(array $config)
    {
        if (empty($config['teCustomerId'])) {
            throw new \Exception('teleesign customerId 未设置');
        }

        if (empty($config['teAppkey'])) {
            throw new \Exception('telesign telesign 未设置');
        }

        $this->customerId = $config['teCustomerId'];
        $this->appkey = $config['teAppkey'];
    }

    public function send(string $message): bool
    {
        return $this->sendPost(static::SMS_REST_API, [
            'phone_number' => $this->getPhone(),
            'verify_code' => $this->getCountryCode(),
        ]) !== false;
    }

    public function sendVoice(string $message): bool
    {
        return $this->sendPost(static::VOICE_REST_API, [
                'phone_number' => $this->getPhone(),
                'verify_code' => $this->getCountryCode(),
            ]) !== false;
    }

    public function sendPost($uri, $params)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        $param = http_build_query($params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getAuthHeader());
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
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

    public function getAuthHeader()
    {
        return [
            'Authorization: Basic '.base64_encode($this->customerId.':'.$this->appkey),
            'Content-Type: application/x-www-form-urlencoded; charset=utf-8'
        ];
    }
}