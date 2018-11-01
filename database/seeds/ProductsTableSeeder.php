<?php
/**
 * Created by PhpStorm.
 * User: Sammy
 * Date: 9/15/2017
 * Time: 5:12 PM
 */

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        //Not strictly needed for the task, but handy for testing.
        factory(\App\Product::class)->times(2)->create();
    }
}