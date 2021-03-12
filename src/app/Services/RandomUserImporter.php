<?php

namespace App\Services;

use App\Entities\Customer;
use App\Repositories\CustomerRepository;
use App\Services\Contracts\DataImporterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Mockery\Exception;

class RandomUserImporter implements DataImporterInterface
{
    public function import() : array
    {
        $params = [
            'nat'       => 'AU',
            'results'   => 100,
            'inc'       => 'id,name,email,login,location,dob,phone,gender'
        ];

        $query = http_build_query($params);

        $json = file_get_contents('https://randomuser.me/api/?' . $query);
        $response = json_decode($json, true);

        return $response['results'];
    }
}
