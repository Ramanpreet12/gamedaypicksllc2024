<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couponRecords = [
            ['id' => 1 , 'coupon_code' => 'ppbt40fxi5e6lvb7' , 'user_id' => '' , 'status' => 'active' ,
            'created_at' => now() , 'updated_at' => now()]
        ];

        Coupon::insert($couponRecords);
    }
}
