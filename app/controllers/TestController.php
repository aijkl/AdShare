<?php

namespace Aijkl\AdShare;
class TestController
{
    public function test()
    {
        $dataBase = AdShareHelper::createDataBase();
        $dataBase->searchAdvice(target: "基本");
    }
}