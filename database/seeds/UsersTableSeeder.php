<?php
/**
 * Created by PhpStorm.
 * User: Sammy
 * Date: 9/15/2017
 * Time: 5:12 PM
 */

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\User::class)->times(5)->create();
    }
}