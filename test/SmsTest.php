<?php
namespace he\sms\test;

use he\sms\AliSms;
use PHPUnit\Framework\TestCase;
use he\sms\LuosimaoSms;
use he\sms\TxSms;
require dirname(__DIR__).'/vendor/autoload.php';
class SmsTest extends TestCase
{
    protected $config;

    protected $phone;

    protected $countryCode;

    public function setUp()
    {
        $this->config = require __DIR__.'/config.php';
        $this->phone = '';
        $this->countryCode = '86';
    }

    public function testAli()
    {
        $ali = new AliSms($this->config);
        $ali->setPhone($this->phone);
        $ali->setCountryCode($this->countryCode);
        $this->assertTrue($ali->send('1234'));
    }

    public function testSentLsm()
    {
        $luosimao = new LuosimaoSms($this->config);
        $luosimao->setPhone($this->phone);
        $luosimao->setCountryCode($this->countryCode);
        $res = $luosimao->send('本次验证码为1234【】');
        $this->assertTrue($res);
    }

    public function testSendTxsms()
    {
        $tx = new TxSms($this->config);
        $tx->setCountryCode($this->countryCode);
        $tx->setPhone($this->phone);

        $this->assertTrue($tx->send("您的验证码为1234，十分钟内有效"));
        $this->assertTrue($tx->sendVoice("1234"));
    }
}