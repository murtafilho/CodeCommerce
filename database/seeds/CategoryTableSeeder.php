<?php
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run(){
        DB::table('categories')->truncate();
        factory(CodeCommerce\Category::class,15)->create();
    }
}