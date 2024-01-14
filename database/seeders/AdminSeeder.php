<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'      => 'Abrar Khan',
            'type'      => 'admin',
            'mobile'    => '03149292939',
            'email'     => 'abrargaloch@gmail.com',
            'password'  => Hash::make(123456),
            'status'    => 1
        ]);
    }
}
