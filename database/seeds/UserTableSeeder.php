<?php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();
        factory(CodeCommerce\User::class,15)->create();
    }
}