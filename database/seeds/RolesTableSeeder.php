<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(

            array(
                'title' => 'Top Admin',
                'description' => 'A Top Administrative role that can create other admins of the app',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),


            array(
            'title' => 'Executive Admin',
            'description' => 'An Executive Administrative role that can perform any action on the app as the top admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
            ),

            array(
                'title' => 'Guest Admin',
                'description' => 'A Partial Administrative role that can perform readonly actions on the app',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),

            array(
                'title' => 'Customer',
                'description' => 'A registered customer on the app',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )

            ));
    }
}
