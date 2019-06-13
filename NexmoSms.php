<?php

namespace he\sms;

class NexmoSms extends SmsAbstract
{
    protected $apiUrl = 'https://rest.nexmo.com/sms/json';

    protected $nexmoApiKey;

    protected $nexmoApiSecret;

    protected $nexmoFrom;

    public function __construct(array $config)
    {
        if (empty($config['nexmoApiKey'])) {
            throw new \Exception('nexmo api key not config');
        }

        if (empty($config['nexmoApiSecret'])) {
            throw new \Exception('nexmo api secret not config');
        }

        $this->nexmoApiKey = $config['nexmoApiKey'];
        $this->nexmoApiSecret = $config['nexmoApiSecret'];
        isset($config['nexmoFrom']) && $this->nexmoFrom = $config['nexmoFrom'];
    }

    public function send(string $message): bool
    {
        $response = $this->postRequest($this->apiUrl, $this->getParam($message));
        $result = json_decode($response, true);
        if (isset($result['messages']) && $result['messages'][0]['status'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function sendVoice(string $message): bool
    {
        throw new \Exception('未实现');
    }

    public function getParam(string $message)
    {
        return [
                'api_key' => $this->nexmoApiKey,
                'api_secret' => $this->nexmoApiSecret,
                'from' => $this->getFrom(),
                'to' => $this->getCountryCode() . $this->getPhone(),
                'type' => 'text',
                'text' => $message,
        ];
    }

    public function getFrom()
    {
        return $this->nexmoFrom;
    }
}