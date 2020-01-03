<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeds::class);
        $this->call(CategorySeeds::class);
        $this->call(NewsTypeSeeds::class);              
        $this->call(NewsSeeds::class);
        $this->call(CommentTableSeeds::class);
        $this->call(SlideSeeds::class);
    }
}
