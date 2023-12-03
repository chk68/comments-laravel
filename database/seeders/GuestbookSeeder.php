<?php

namespace Database\Seeders;

use App\Models\Guestbook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        DB::table('guestbook')->truncate();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('guestbook')->insert([
                'user_name' => 'User' . $i,
                'email' => 'user' . $i . '@example.com',
                /*'homepage' => 'http://example.com/user' . $i,
                'captcha' => 'captcha' . $i,*/
                'text' => 'Message ' . $i,
                'ip_address' => '127.0.0.1',
                'browser' => 'Chrome',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
