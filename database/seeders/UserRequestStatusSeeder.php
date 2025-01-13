<?php

namespace Database\Seeders;

use App\Models\UserRequestStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        UserRequestStatus::insert([
            ['name' => 'Approved', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rejected', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AwaitingAdminApproval', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AwaitingSupplierApproval', 'created_at' => now(), 'updated_at' => now()],
        ]);


    }
}
