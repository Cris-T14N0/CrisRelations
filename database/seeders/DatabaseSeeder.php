<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory(10)
            ->has(Contact::factory())
            ->create();

        Project::factory(10)
            ->create();

        //User::factory()->cre0ate([
            //  'name' => 'cris',
            //'email' => 'cris@cris.com',
            //'password' => 'password'
        //]);
    }

}
