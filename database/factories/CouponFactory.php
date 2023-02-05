<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'payment_id' => Payment::all()->random()->id,
            'code' => $this->faker->text,
            'is_enabled' => $this->faker->randomElement($arry = array(1, 0)),
            'discount' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'discount_description' => $this->faker->text,
            'discount_type' => $this->faker->randomElement($arry = array('percentage', 'fixed_amount')),
            'times_usage' => $this->faker->randomNumber($nbDigits = 2),
            'expire_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
