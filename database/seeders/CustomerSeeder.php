<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Customer::create([
            'name' => 'Alex Truman',
            'email' => 'alex.truman@example.com',
            'password' => bcrypt('password') // Always hash passwords
        ]);

        Customer::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'password' => bcrypt('password')
        ]);

        Customer::create([
            'name' => 'Alice Johnson',
            'email' => 'alice.johnson@example.com',
            'password' => bcrypt('password')
        ]);
    }
}
