<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $statuses = ['ingest','complete', 'pending', 'decline'];
    $locations = [
    'lagos','ibadan','abuja','kano','kaduna','port-harcourt','ondo','osun','oyo','ogun','kogi','benue','nassarawa','taraba','adamawa','gombe','bauchi','plateau','katsina','kebbi','sokoto','zamfara','enugu','anambra','imo','abia','ebonyi','akwa-ibom','cross-river','bayelsa','delta','edo','ekiti','kwara','rivers','borno','yobe','jigawa'
];



        for ($i = 1; $i <= 100; $i++) {
            $date = Carbon::now()->subDays(rand(1, 30));
            DB::table('orders')->insert([
                'user_id' => DB::table('users')->inRandomOrder()->first()->id,
                'location' => $locations[array_rand($locations)],
                'status' => $statuses[array_rand($statuses)],
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
