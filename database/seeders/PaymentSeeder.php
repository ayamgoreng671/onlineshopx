<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("payments")->insert([
            [
                "method" => "BCA",
            ],            [
                "method" => "BNI",
            ],            [
                "method" => "BRI",
            ],            [
                "method" => "Bank Mandiri",
            ],            [
                "method" => "ShopeePay",
            ],            [
                "method" => "Gopay",
            ],

        ]);
    }
}
