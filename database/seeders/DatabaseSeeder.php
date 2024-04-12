<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  $this->call(UserSeeder::class);
        // $this->call(FixtureTableSeeder::class);
        // $this->call(GeneralTableSeeder::class);
       // $this->call(BannerTableSeeder::class);
        //$this->call(TeamResultSeeder::class);
        //$this->call(LeaderboardSeeder::class);
        // $this->call(SectionHeadingSeeder::class);
        // $this->call(PlayerSeeders::class);
        // $this->call(VacationSeeder::class);
        //$this->call(SeasonTableSeeder::class);
        // $this->call(ContactPageSeeder::class);
        // $this->call(AboutPageSeeder::class);
        // $this->call(StaticPageSeeder::class);
        // $this->call(MatchResultSeeder::class);
        // $this->call(GeneralSettingSeeder::class);
        // $this->call(ReviewsSeeder::class);
        // $this->call(CouponSeeder::class);
        $this->call(AdminJerseySeeder::class);
    }
}
