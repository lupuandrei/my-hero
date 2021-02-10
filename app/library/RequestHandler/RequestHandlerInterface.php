<?php

namespace App\Library\RequestHandler;

interface RequestHandlerInterface
{
    function prepareURL();
    function handleRequest();
}