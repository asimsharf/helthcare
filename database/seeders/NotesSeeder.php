<?php

namespace Database\Seeders;

use App\Models\Notes;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notes::factory()->count(10)->create();
    }
}
