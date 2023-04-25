<?php

namespace App\Contracts;

interface CustomerInterface
{
    public function fillNewCustomers($data): void;
    public function getAllCustomers();
}
