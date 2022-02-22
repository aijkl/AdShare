<?php

namespace Aijkl\AdShare;
class Response
{
    public bool $success;
    public string $errorMessage;

    public function __construct(bool $Success,string $ErrorMessage)
    {
        $this->success = $Success;
        $this->errorMessage = $ErrorMessage;
    }
}