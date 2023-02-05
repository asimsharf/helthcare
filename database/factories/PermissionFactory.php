<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_id' => Admin::all()->random()->id,
            'super_admin_id' => SuperAdmin::all()->random()->id,
            'action' => $this->faker->randomElement($arry = array('create', 'read', 'update', 'delete')),
            'access' => $this->faker->randomElement($arry = array(0, 1)),
        ];
    }
}
