<?php
namespace sms;

interface  ErrorInterface
{
    public function setError(string $message);

    public function getError();
}