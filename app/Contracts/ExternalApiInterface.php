<?php

namespace App\Contracts;

interface ExternalApiInterface
{
    public function getHttpHeaders(): array;

    public function getApiFullUrl();
    public function getDataByEndPoint($endpoint): array;
}
