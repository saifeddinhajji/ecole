<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           /**********************create patient *************************/
           DB::table('users')->insert([
            'name' => 'youssef',
            'email' => 'youssef@gmail.com',
            'password' => bcrypt('youssef'),            
        ]);
       
         
    }
}
