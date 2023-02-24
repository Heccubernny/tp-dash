<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        for ($i = 1; $i <= 5; $i++) {
            $statuses = [0, 1];
            DB::table('service_providers')->insert([
                'provider_name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => now(),
                'status' => $statuses[array_rand($statuses)],
                'mobile' => Str::random(10),
            ]);
        }
    }
}
