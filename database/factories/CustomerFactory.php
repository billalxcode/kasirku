<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected function generate_customer_code() {
        $max_length = 8;
        $customer_code = '';
        for ($i = 0; $i < $max_length; $i++) {
            $customer_code .= random_int(0, 9);
        }
        return $customer_code;
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_code' => $this->generate_customer_code(),
            'customer_name' => fake('id_ID')->name(),
            'contact' => fake('id_ID')->phoneNumber(),
            'address' => fake('id_ID')->address() 
        ];
    }
}
