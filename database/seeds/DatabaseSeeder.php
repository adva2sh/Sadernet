<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan migrate:refresh --seed
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'אדווה שכטר',
            'gmail' => 'oran.gilboa1@gmail.com',
            'facebook' => 'adva',
            'numfin' => '123123123',
            'license' => '77777777',
            'idnum' => '01010101010',
            'phone' => '245145214521',
            'enternum' => '1',
            'admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'קרן מרציאנו',
            'gmail' => 'keren@gmail.com',
            'facebook' => 'keren',
            'numfin' => '0',
            'license' => '2',
            'idnum' => '3',
            'phone' => '4',
            'enternum' => '2',
            'admin' => false,
        ]);
        DB::table('orders')->insert([
            'start_time' => '13/02/2015 19:30',
            'end_time' => '14/02/2015 12:30',
            'destination' => 'tel-aviv',
            'tremp' => true,
            'userspay' => '12,34',
            'autopay' => true,
            'status' => '1',
            'userid'=>1,
            'cost'=>rand(20,200)
        ]);
        DB::table('orders')->insert([
            'start_time' => '11/02/2001 19:30',
            'end_time' => '15/02/2050 12:30',
            'destination' => 'ashdod',
            'tremp' => false,
            'userspay' => '12,34',
            'autopay' => false,
            'status' => '2',
            'car_number' => '12837192',
            'userid'=>2,
            'cost'=>rand(20,200)
        ]);
        DB::table('cars')->insert([
            'number' => '12837192',
            'last_treat' => '17/02/2019',
            'next_treat' => '17/02/2020',
            'last_wash' => '12/08/2018'
        ]);
    }
}
