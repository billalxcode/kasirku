<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    protected function generate_voucher_code() {
        $voucher_code = Str::random(16);
        $voucher_code = Str::upper($voucher_code);
        return $voucher_code;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $typeArray = ['currency', 'percentage'];
        $type = $typeArray[random_int(0, count($typeArray) - 1)];
        $amount = 0;
        if ($type == 'currency') {
            $amount = random_int(1000, 100000);
        } else {
            $amount = random_int(0, 70);
        }

        return [
            'voucher_code' => $this->generate_voucher_code(),
            'voucher_name' => fake('id_ID')->sentence(4),
            'amount' => $amount,
            'type' => $type
        ];
    }
}
