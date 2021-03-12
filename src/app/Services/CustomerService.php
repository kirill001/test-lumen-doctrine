<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use App\Services\Contracts\DataImporterInterface;

class CustomerService
{
    protected $repository;
    protected $importer;

    public function __construct()
    {
        $this->repository   = app(CustomerRepository::class);
        $this->importer     = app(DataImporterInterface::class);
    }

    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function import()
    {
        $results = $this->importer->import();

        $created = 0;
        $updated = 0;

        foreach ($results as $result) {
            $customer = $this->repository->findOneByCondition(['email' => $result['email']]);

            if ($customer) {
                $this->repository->update($customer, $result);
                $updated++;
            } else {
                $this->repository->create($result);
                $created++;
            }
        }

        return ['created' => $created, 'updated' => $updated];
    }
}
