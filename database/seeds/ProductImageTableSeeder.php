<?php
/**
 * Created by PhpStorm.
 * User: murtafilho
 * Date: 10/26/2015
 * Time: 10:54 PM
 */
namespace database\seeds;
use Illuminate\Database\Seeder;

class ProductImageTableSeeder
{
    public function run(){
        DB::table('product_images')->truncate();
    }
}