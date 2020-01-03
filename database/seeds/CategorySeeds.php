<?php

use Illuminate\Database\Seeder;

class CategorySeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert([
            ['Name' => '社会'],
            ['Name' => 'グローバル'],
            ['Name' => '営業'],
            ['Name' => '文化'],
            ['Name' => 'スポーツ'],
            ['Name' => '生活'],
            ['Name' => 'コンピューター']
        ]);
}
}
