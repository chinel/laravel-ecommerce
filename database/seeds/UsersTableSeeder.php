<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(

            array(
                'firstname' => 'Top',
                'lastname' => 'Admin',
                'email' => 'admin@ecommerce.com',
                'phone' => '00000000000',
                'role_id' => 1,
                'active' => 1,
                'verified' => 1,
                'email_verified_at' =>  \Carbon\Carbon::now(),
                'password' => bcrypt('ADMIN12345'),
                'remember_token' => null,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),



        ));
    }
}
