<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory()->create([
            'email' => 'azeemhassni@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
