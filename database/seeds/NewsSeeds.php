<?php

use Illuminate\Database\Seeder;

class NewsSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Content = "
    	</h3>東京駅は混雑</h3>
    	<p>
    	ＪＲ東京駅は午前中からふるさとや行楽地に向かう家族連れなどで混雑し、大きな荷物を持った人たちが新幹線のホームで長い列を作っていました。<br>
    	このうち、６歳と５歳のきょうだいと一緒に徳島県の実家に帰省するという、30代の会社員の女性は「ことしは子どもの成長を実感する１年でした。両親は孫に会う機会が少ないので楽しみにしているはずです」と話していました。<br>
    	また、妻や１歳の長女と一緒に旅行先の京都市へ向かうという30代の会社経営者の男性は「ことしは職場が変わるなど、激動の１年間だったので、妻や娘と一緒に観光してリフレッシュしたいです」と話していました。<br>
    	そして、小学生の長女が大阪の実家に帰省するのを見送りに来たという40代の女性は「娘は祖母に会うのを楽しみにしているので実家で一緒にのんびり過ごしてほしいです」と話していました。<br>
    	</p>
    	";        
    	DB::table('news')->insert([
    		['idNewsType'=>'1','Tittle' => '帰省ラッシュ続く各交通機関は午前中から混雑','Summary' => '帰省ラッシュ続く 各交通機関は午前中から混雑','Content' => $Content,'Image' => 'Image1.jpg','Hightlight' => 1],
    		['idNewsType'=>'2','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image2.jpg','Hightlight' => 1],
            ['idNewsType'=>'3','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image3.jpg','Hightlight' => 0],
            ['idNewsType'=>'4','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image4.jpg','Hightlight' => 1],
            ['idNewsType'=>'5','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image5.jpg','Hightlight' => 1],
            ['idNewsType'=>'6','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image6.jpg','Hightlight' => 1],
            ['idNewsType'=>'1','Tittle' => '帰省ラッシュ続く各交通機関は午前中から混雑','Summary' => '帰省ラッシュ続く 各交通機関は午前中から混雑','Content' => $Content,'Image' => 'Image7.jpg','Hightlight' => 1],
            ['idNewsType'=>'2','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image8.jpg','Hightlight' => 1],
            ['idNewsType'=>'3','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image9.jpg','Hightlight' => 0],
            ['idNewsType'=>'4','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image10.jpg','Hightlight' => 1],
            ['idNewsType'=>'5','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image11.jpg','Hightlight' => 1],
            ['idNewsType'=>'6','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image12.jpg','Hightlight' => 1],
            ['idNewsType'=>'1','Tittle' => '帰省ラッシュ続く各交通機関は午前中から混雑','Summary' => '帰省ラッシュ続く 各交通機関は午前中から混雑','Content' => $Content,'Image' => 'Image13.jpg','Hightlight' => 1],
            ['idNewsType'=>'2','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image14.jpg','Hightlight' => 1],
            ['idNewsType'=>'3','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image15.jpg','Hightlight' => 0],
            ['idNewsType'=>'4','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image16.jpg','Hightlight' => 1],
            ['idNewsType'=>'5','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image17.jpg','Hightlight' => 1],
            ['idNewsType'=>'6','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image18.jpg','Hightlight' => 1],
            ['idNewsType'=>'1','Tittle' => '帰省ラッシュ続く各交通機関は午前中から混雑','Summary' => '帰省ラッシュ続く 各交通機関は午前中から混雑','Content' => $Content,'Image' => 'Image19.jpg','Hightlight' => 1],
            ['idNewsType'=>'2','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image20.jpg','Hightlight' => 1],
            ['idNewsType'=>'3','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image21.jpg','Hightlight' => 0],
            ['idNewsType'=>'4','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image22.jpg','Hightlight' => 1],
            ['idNewsType'=>'5','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image23.jpg','Hightlight' => 1],
            ['idNewsType'=>'6','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image24.jpg','Hightlight' => 1],
            ['idNewsType'=>'1','Tittle' => '帰省ラッシュ続く各交通機関は午前中から混雑','Summary' => '帰省ラッシュ続く 各交通機関は午前中から混雑','Content' => $Content,'Image' => 'Image1.jpg','Hightlight' => 1],
            ['idNewsType'=>'2','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image25.jpg','Hightlight' => 1],
            ['idNewsType'=>'7','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image26.jpg','Hightlight' => 0],
            ['idNewsType'=>'8','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image27.jpg','Hightlight' => 1],
            ['idNewsType'=>'9','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image28.jpg','Hightlight' => 1],
            ['idNewsType'=>'10','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image29.jpg','Hightlight' => 1],
            ['idNewsType'=>'11','Tittle' => '帰省ラッシュ続く各交通機関は午前中から混雑','Summary' => '帰省ラッシュ続く 各交通機関は午前中から混雑','Content' => $Content,'Image' => 'Image30.jpg','Hightlight' => 1],
            ['idNewsType'=>'12','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image31.jpg','Hightlight' => 1],
            ['idNewsType'=>'13','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image32.jpg','Hightlight' => 0],
            ['idNewsType'=>'14','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image33.jpg','Hightlight' => 1],
            ['idNewsType'=>'15','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image34.jpg','Hightlight' => 1],
            ['idNewsType'=>'16','Tittle' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Summary' => '教員の勤務時間 タイムカードなど客観的な把握は５割未満','Content' => $Content,'Image' => 'Image35.jpg','Hightlight' => 1]
    	]);
    }
}
