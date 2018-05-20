<?php
namespace he\sms;

interface SmsFactoryInterface
{
    public function getSms(array $config) :SmsAbstract;
}