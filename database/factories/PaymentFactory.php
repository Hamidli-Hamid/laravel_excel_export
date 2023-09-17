<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        print_r('ok');
        return [
            'rrn' => $this->faker->text(10),
            'transaction' => $this->faker->text(25),
            'fk_id_user' => $this->faker->numberBetween(1, 10000),
            'total' => $this->faker->randomNumber(4, false),
            'commission' => $this->faker->randomNumber(4, false),
            'bank_commission' => $this->faker->randomNumber(4, false),
            'card_name' => $this->faker->text(),
            'card_mask' => $this->faker->text(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'inn' => $this->faker->text(),
            'contract_number' => $this->faker->text(20),
            'pay_status' => $this->faker->numberBetween(0, 2),
            'bank_error_id' => $this->faker->numberBetween(0, 4),
            'type' => $this->faker->numberBetween(0, 2),
            'purpose' => $this->faker->numberBetween(0, 2),
            'created_at' => $this->faker->dateTimeBetween('-10 years', 'now', 'Asia/Baku'),
        ];
    }
}
