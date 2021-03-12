<?php

namespace App\Repositories;

use App\Entities\Customer;
use Doctrine\ORM\EntityManagerInterface;

class CustomerRepository
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function create(array $data)
    {
        $customer = new Customer();
        $customer->fillAllFields($data);

        $this->em->persist($customer);
        $this->em->flush();
    }

    public function update(Customer $customer, $data)
    {
        $customer->fillAllFields($data);

        $this->em->flush();
    }

    public function findById(int $id)
    {
        return $this->em->find(Customer::class, $id);
    }

    public function findOneByCondition(array $condition)
    {
        return $this->em->getRepository(Customer::class)->findOneBy($condition);
    }

    public function all()
    {
        return $this->em->getRepository(Customer::class)->findAll();
    }
}
