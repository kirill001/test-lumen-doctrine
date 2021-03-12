<?php


use App\Models\Customer;
use Laravel\Lumen\Testing\DatabaseMigrations;

class GetAllCustomersTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllCustomers()
    {
        Customer::factory()->count(100)->create();

        $response = $this->json('GET', '/customers');

        $response->seeStatusCode(200)->seeJsonStructure([
            [
                'id',
                'fullName',
                'email',
                'country'
            ]
        ]);
    }
}
