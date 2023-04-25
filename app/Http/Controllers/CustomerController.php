<?php

namespace App\Http\Controllers;

use App\Contracts\CustomerInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private CustomerInterface $customer)
    {
    }

    public function index()
    {
        $customers = $this->customer->getAllCustomers();

        return view('customers.index', compact('customers'));
    }
}
