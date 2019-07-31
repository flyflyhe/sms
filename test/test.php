<?php
require 'bootstrap.php';

$config = require __DIR__.'/config.php';

$phone = require __DIR__.'/phone.php';

#$tx = new \he\sms\TxSms($config);
#$tx->setCountryCode('86');
#$tx->setPhone($phone);
#var_dump($tx->send('您的验证码为1234，十分钟内有效'));
#var_dump($tx->sendVoice('1234'));
#var_dump($tx->getError());

/*$luosimao = new \he\sms\LuosimaoSms($config);
$luosimao->setPhone($phone);
$luosimao->setCountryCode('86');
var_dump($luosimao->send('本次验证码为1234【珑凌科技】'));*/

$telesgin = new \he\sms\TeleSignSms($config);
$telesgin->setPhone('19098708373');
$telesgin->setCountryCode(1);
$bool = $telesgin->send('1234');
var_dump($bool);
//var_dump($telesgin->sendVoice('1234'));
var_dump($telesgin->getError());
/*$nexmo = new \he\sms\NexmoSms($config);

$nexmo->setCountryCode('86');
$nexmo->setPhone($phone);
$bool = $nexmo->send('Your code is 1234');
var_dump($bool);
var_dump($nexmo->getError());*/