###常用短信运营商封装

###example

####配置文件
```
$config = [

    'lsmApiKey' => '',
    
    'txAppId' => '',

    'txAppKey' => '',

    'aliAccessKeyId' => '',

    'aliAccessKeySecret' => '',

    'aliSignName' => '',

    'aliTemplateCode' => ''
    
    'teCustomerId' => '',
    
     'teAppkey' => '',
];
```
###实例化
```$xslt
    $aliSms = new he\sms\AliSms($config);
    $aliSms->setPhone('10080');
    $aliSms->setCountryCode('86');
    $aliSms->send('1234');
    
    $lsmSms = new he\sms\LuosimaoSms($config);
    ...
    
    $txSms = new he\TxSms($config);
    ...
    $txSms->sendVoice(1234)
    
    #只实现了telesing verifySms verifyVoice
    $telesignSms = new he\TeleSignSms($config);
    ...
```

