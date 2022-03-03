<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $adminRecords =[
        	['id'=>1,'name'=>'admin','email'=>'admin@gmail.com','password'=>'$2y$10$NRsnPZ0Qo8Oulj0bV9TPxeMtflatKrnGrUtgswGy7c0cWg3FonMLy','is_admin'=>1,'status'=>1],
        	['id'=>2,'name'=>'user','email'=>'user@gmail.com','password'=>'$2y$10$NRsnPZ0Qo8Oulj0bV9TPxeMtflatKrnGrUtgswGy7c0cWg3FonMLy','is_admin'=>0,'status'=>1],
        ];

        DB::table('users')->insert($adminRecords);
    }
}
