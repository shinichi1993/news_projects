<?php

use Illuminate\Database\Seeder;

class CommentTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Content = array(
    		'It is sound good',
    		'Maybe I like it',
    		'So so',
    		'Great!',
    		'勉強になった',
    		'なんか可笑しいな～',
    		'わからんー',
    		'うまい',
    		'Không thích bài viết này',
    		'Tôi chưa có ý kiến gì'
    	);

    	for($i=1;$i<=100;$i++)
    	{
	        DB::table('comment')->insert(
	        	[
	            	'idNews' => rand(1,36),
	            	'Content' => $Content[rand(0,9)],
	            	'created_at' => new DateTime()
	        	]
	    	);
    	}
    }
}
