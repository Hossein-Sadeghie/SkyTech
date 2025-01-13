<?php

namespace Database\Seeders;

use App\Models\SupplierRequestStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupplierRequestStatus::insert([
            ['name' => 'Approved', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rejected', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'UnderReview', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'UnderPreparation', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
