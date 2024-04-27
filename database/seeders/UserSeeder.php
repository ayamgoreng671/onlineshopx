<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new Carbon;
        DB::table("users")->insert([
            [
                "role_id" => 1,
                "name" => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("admin1234"),
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
            ],
            [
                "role_id" => 2,
                "name" => "ayam",
                "email" => "ayam@gmail.com",
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
                "password" => Hash::make("ayam1234"),
            ],
            [
                "role_id" => 2,
                "name" => "bebek",
                "email" => "bebek@gmail.com",
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
                "password" => Hash::make("bebek1234"),
            ],
            [
                "role_id" => 2,
                "name" => "kuda",
                "email" => "kuda@gmail.com",
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
                "password" => Hash::make("kuda1234"),
            ],
            [
                "role_id" => 2,
                "name" => "sapi",
                "email" => "sapi@gmail.com",
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
                "password" => Hash::make("sapi1234"),
            ],
            [
                "role_id" => 2,
                "name" => "domba",
                "email" => "domba@gmail.com",
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
                "password" => Hash::make("domba1234"),
            ],
            [
                "role_id" => 2,
                "name" => "kambing",
                "email" => "kambing@gmail.com",
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
                "password" => Hash::make("kambing1234"),
            ],
        ]);
    }
}
