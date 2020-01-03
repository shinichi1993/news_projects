<?php

use Illuminate\Database\Seeder;

class NewsTypeSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('newstype')->insert([
        	['idCategory'=>'1','Name' => '教育'],
            ['idCategory'=>'1','Name' => '若者'],
            ['idCategory'=>'1','Name' => '旅行'],
            ['idCategory'=>'1','Name' => '留学'],
            ['idCategory'=>'2','Name' => '周り'],
            ['idCategory'=>'2','Name' => '写真'],
            ['idCategory'=>'2','Name' => '世界のベトナム人'],
            ['idCategory'=>'2','Name' => '分割'],
            ['idCategory'=>'3','Name' => '不動産'],
            ['idCategory'=>'3','Name' => '証券'],
            ['idCategory'=>'3','Name' => 'ショッピング'],
            ['idCategory'=>'4','Name' => '映画'],
            ['idCategory'=>'4','Name' => 'アート'],
            ['idCategory'=>'5','Name' => 'サッカー'],
            ['idCategory'=>'5','Name' => 'ラブ'],
            ['idCategory'=>'6','Name' => '事件']
        ]);
    }
}
