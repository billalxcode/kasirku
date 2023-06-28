<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    protected function generate_supplier_code() {
        $max_length = 8;
        $supplier_code = '';
        for ($i = 0; $i < $max_length; $i++) {
            $supplier_code .= random_int(0, 9);
        }
        return $supplier_code;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_code' => $this->generate_supplier_code(),
            'supplier_name' => fake('id_ID')->name(),
            'supplier_contact' => fake('id_ID')->phoneNumber(),
            'supplier_address' => fake('id_ID')->address(),
            'supplier_email' => fake('id_ID')->email()
        ];
    }
}
