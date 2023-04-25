<?php

namespace App\Services;

use App\Contracts\CustomerInterface;
use App\Models\Customer;
use App\Models\CustomerPhone;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CustomerService implements CustomerInterface
{
    public function fillNewCustomers($data): void
    {
        Db::beginTransaction();
        foreach ($data as $item) {
            Customer::upsert([
                [
                    'u_id' => $item['id'],
                    'displayName' => $item['displayName'],
                    'givenName' => $item['givenName'],
                    'jobTitle' => $item['jobTitle'],
                    'mail' => $item['mail'],
                    'mobilePhone' => $item['mobilePhone'],
                    'officeLocation' => $item['officeLocation'],
                    'preferredLanguage' => $item['preferredLanguage'],
                    'surname' => $item['surname'],
                    'userPrincipalName' => $item['userPrincipalName'],
                    'status' => 'Active'
                ]
            ], 'u_id', ['displayName', 'givenName', 'jobTitle', 'mail', 'mobilePhone', 'officeLocation', 'preferredLanguage', 'surname', 'userPrincipalName','status']);

            $lastId = DB::getPdo()->lastInsertId();
            if (!empty($item['businessPhones'])) {
                foreach ($item['businessPhones'] as $phone) {
                    CustomerPhone::upsert([
                        'customer_id' => $lastId,
                        'phone' => $phone
                    ], ['customer_id', 'phone'], ['phone']);
                }
            }
        }
        DB::commit();
    }

    public function getAllCustomers($resource = false)
    {
        return !$resource
            ? Customer::with('phones')->orderBy('created_at', 'desc')->paginate(20)
            : Customer::with('phones')->orderBy('created_at', 'desc')->get();

    }
}
