<?php

namespace Aijkl\AdShare;
class Response
{
    public bool $success;
    public string $errorMessage;
    public object $data;
    public function __construct(bool $success = true,int $statusCode = 200,string $errorMessage = "",object $data = null)
    {
        $this->success = $success;
        $this->errorMessage = $errorMessage;
        if($data != null){
            $this->data = $data;
        }
        http_response_code($statusCode);
    }
}