<?php

use Illuminate\Database\Seeder;

class SlideSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('slide')->insert([
        	['Name'=>'Slide1','Image'=>'Slide1.jpg','Content'=>'Slide1','Link'=>'google.com'],
        	['Name'=>'Slide2','Image'=>'Slide2.jpg','Content'=>'Slide2','Link'=>'facebook.com']
        ]);
    }
}
