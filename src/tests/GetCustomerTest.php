<?php


use App\Models\Customer;
use Laravel\Lumen\Testing\DatabaseMigrations;

class GetCustomerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetCustomer()
    {
        $customer = Customer::factory()->create();

        $response = $this->json('GET', '/customers/' . $customer->id);

        $response->seeStatusCode(200)->seeJsonEquals([
            'id'            => $customer->id,
            'fullName'      => $customer->first_name . ' ' . $customer->last_name,
            'email'         => $customer->email,
            'country'       => $customer->country,
            'username'      => $customer->username,
            'gender'        => $customer->gender,
            'city'          => $customer->city,
            'phone'         => $customer->phone,
        ]);
    }
}
