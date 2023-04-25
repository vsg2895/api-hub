<?php

namespace App\Http\Controllers;

use App\Contracts\ExternalApiInterface;
use Illuminate\Http\Request;

class MicrosoftApiController extends Controller
{

    public function __construct(private ExternalApiInterface $externalApi)
    {

    }

    public function getTeamUsers()
    {
        try {
           $this->externalApi->getDataByEndPoint();

            return redirect()->back()->withSuccess('Customers Updated Successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }


    }
}
