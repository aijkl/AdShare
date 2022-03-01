<?php

namespace Aijkl\AdShare;
use Exception;

class ImageController
{
    public function showImage($id)
    {
        try
        {
            $database = AdShareHelper::createDataBase();
            $database->showImage($id);
        }
        catch (Exception)
        {
            http_send_status(404);
        }
    }
}