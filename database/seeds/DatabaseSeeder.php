<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 250)->create();
        //factory(App\Relation::class, 250)->create();
        factory(App\ProfilePicture::class, 250)->create();
    }
}
