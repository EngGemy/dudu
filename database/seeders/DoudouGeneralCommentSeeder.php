<?php

namespace Database\Seeders;

use App\Models\GeneralComment\GeneralComment;
use Illuminate\Database\Seeder;

class DoudouGeneralCommentSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'date' => '2024-02-10',
                'rate' => 5,
                'translations' => [
                    'en' => ['username' => 'Sarah Williams', 'comment' => 'The Cairo and Luxor itinerary was perfectly paced. The team answered quickly and every transfer was on time.'],
                    'zh' => ['username' => '莎拉·威廉姆斯', 'comment' => '开罗和卢克索的行程节奏非常好。团队回复很快，每一次接送都很准时。'],
                    'zh-Hant' => ['username' => '莎拉·威廉斯', 'comment' => '開羅和盧克索的行程節奏非常好。團隊回覆很快，每一次接送都很準時。'],
                ],
            ],
            [
                'date' => '2024-03-18',
                'rate' => 5,
                'translations' => [
                    'en' => ['username' => 'Li Wei', 'comment' => 'Our guide explained the history clearly in Chinese and helped us avoid crowded times at the main sites.'],
                    'zh' => ['username' => '李伟', 'comment' => '导游用中文把历史讲得很清楚，还帮我们避开了主要景点最拥挤的时间。'],
                    'zh-Hant' => ['username' => '李偉', 'comment' => '導遊用中文把歷史講得很清楚，還幫我們避開了主要景點最擁擠的時間。'],
                ],
            ],
            [
                'date' => '2024-04-22',
                'rate' => 4,
                'translations' => [
                    'en' => ['username' => 'Omar Al Mansouri', 'comment' => 'A smooth private trip with clear communication from booking until the last airport transfer.'],
                    'zh' => ['username' => '奥马尔·曼苏里', 'comment' => '一次顺利的私人行程，从预订到最后一次机场接送，沟通都很清楚。'],
                    'zh-Hant' => ['username' => '奧馬爾·曼蘇里', 'comment' => '一次順利的私人行程，從預訂到最後一次機場接送，溝通都很清楚。'],
                ],
            ],
        ];

        foreach ($records as $record) {
            $comment = GeneralComment::whereHas('translations', function ($query) use ($record) {
                $query->where('locale', 'en')->where('username', $record['translations']['en']['username']);
            })->first() ?? new GeneralComment();

            $comment->fill([
                'photo' => 'avatar.jpeg',
                'date' => $record['date'],
                'rate' => $record['rate'],
            ]);

            foreach ($record['translations'] as $locale => $values) {
                foreach ($values as $key => $value) {
                    $comment->translateOrNew($locale)->{$key} = $value;
                }
            }

            $comment->save();
        }
    }
}
