<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
        factory(User::class, 10)->create();
    }
}
