<?php

namespace App\Gateway;

interface DatabaseGatewayInterface
{
    public function listDbs(): array;
}