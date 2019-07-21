<?php

//use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Bezhanov\Faker\Provider\Educator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 500)->create()->each(function ($user) {


        });
    }
}
