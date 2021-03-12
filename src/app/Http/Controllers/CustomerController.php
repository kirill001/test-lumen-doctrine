<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;

class CustomerController extends Controller
{
    protected CustomerService $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }

    public function find($id)
    {
        $customer = $this->service->findById($id);

        if (!$customer) {
            return response(null, 404);
        }

        return response()->json([
            'id'        => $customer->getId(),
            'fullName'  => $customer->getFullName(),
            'email'     => $customer->getEmail(),
            'country'   => $customer->getCountry(),
            'username'  => $customer->getUsername(),
            'gender'    => $customer->getGender(),
            'city'      => $customer->getCity(),
            'phone'     => $customer->getPhone(),
        ]);
    }

    public function all()
    {
        $customers = $this->service->all();

        $results = array_map(fn($customer) => [
                                'id'        => $customer->getId(),
                                'fullName'  => $customer->getFullName(),
                                'email'     => $customer->getEmail(),
                                'country'   => $customer->getCountry(),
                            ]
                            , $customers);

        return response()->json($results);
    }
}
