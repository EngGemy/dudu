<?php

namespace Database\Seeders;

use App\Models\Blog\Blog;
use App\Models\Blog\BlogSubHead;

class BlogSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        foreach ($this->blogData() as $spec) {
            $enTitle = $spec['en']['title'];
            if ($this->translationExists(Blog::class, $enTitle, 'title')) {
                $this->command->line("  skip Blog: {$enTitle}");

                continue;
            }
            try {
                $blog = Blog::create([
                    'image' => $this->getImage('blogs'),
                    'category' => $spec['category'],
                    'en' => $spec['en'],
                    'zh' => $spec['zh'],
                    'zh-Hant' => $spec['zh-Hant'],
                ]);

                foreach ($spec['subheads'] ?? [] as $sh) {
                    BlogSubHead::create([
                        'blog_id' => $blog->id,
                        'en' => ['name' => $sh['en']],
                        'zh' => ['name' => $sh['zh']],
                        'zh-Hant' => ['name' => $sh['zh-Hant']],
                    ]);
                }

                $this->command->info("  seeded Blog: {$enTitle}");
            } catch (\Throwable $e) {
                $this->command->error("  Blog '{$enTitle}': {$e->getMessage()}");
            }
        }
    }

    private function blogData(): array
    {
        return [
            [
                'category' => 1, // Destination
                'en' => [
                    'title' => 'Top 10 Things to Do in Cairo',
                    'slug' => 'top-10-things-to-do-in-cairo',
                    'head' => 'Discover Cairo — Africa\'s Largest City',
                    'description' => '<p>Cairo is a city of extraordinary contrasts — ancient pyramids visible from modern highways, medieval mosques nestled next to colonial-era buildings, and chaotic traffic that somehow moves. Whether you\'re visiting for a weekend or a month, these ten experiences are essential.</p><p><strong>1. The Pyramids of Giza & Great Sphinx</strong> — Start with the most iconic sight in the world. Go early to beat the crowds and the heat.</p><p><strong>2. The Egyptian Museum</strong> — Home to the treasures of Tutankhamun and over 120,000 ancient artefacts. Plan at least 3 hours.</p><p><strong>3. Khan El Khalili Bazaar</strong> — Lose yourself in the medieval souk. Bargain for spices, gold, and handmade crafts.</p><p><strong>4. Islamic Cairo</strong> — Wander through the UNESCO-listed historic district with its towering minarets and ornate mosques.</p><p><strong>5. Coptic Cairo</strong> — Explore Egypt\'s ancient Christian quarter, including the Hanging Church and Ben Ezra Synagogue.</p>',
                    'meta_title' => 'Top 10 Things to Do in Cairo — Egypt Travel Guide',
                    'meta_description' => 'Discover the best of Cairo — pyramids, Egyptian Museum, Khan El Khalili, and more in this essential travel guide.',
                ],
                'zh' => [
                    'title' => '开罗十大必做之事',
                    'slug' => 'top-10-things-to-do-in-cairo',
                    'head' => '探索开罗——非洲最大城市',
                    'description' => '<p>开罗是一座充满非凡反差的城市——古老金字塔与现代高速公路并存，中世纪清真寺紧邻殖民时代建筑，混乱的交通却神奇地运转不息。无论您是短暂逗留还是长期旅居，这十种体验都是不可错过的。</p><p><strong>1. 吉萨金字塔和大狮身人面像</strong>——从世界上最标志性的景观开始。请早早出发，避开人群和酷热。</p><p><strong>2. 埃及博物馆</strong>——珍藏图坦卡蒙的宝藏和超过12万件古代文物。请至少安排3小时参观。</p><p><strong>3. 汗·哈利利集市</strong>——迷失在中世纪的露天市场中，讨价还价购买香料、黄金和手工艺品。</p><p><strong>4. 伊斯兰开罗</strong>——漫步于联合国教科文组织列入名册的历史街区，欣赏高耸的宣礼塔和华丽的清真寺。</p><p><strong>5. 科普特开罗</strong>——探索埃及古老的基督教区，包括悬挂教堂和本·以斯拉会堂。</p>',
                    'meta_title' => '开罗十大必做之事——埃及旅游攻略',
                    'meta_description' => '探索开罗最精彩的一面——金字塔、埃及博物馆、汗·哈利利集市等，这份必备旅游攻略带您一一揭秘。',
                ],
                'zh-Hant' => [
                    'title' => '開羅十大必做之事',
                    'slug' => 'top-10-things-to-do-in-cairo',
                    'head' => '探索開羅——非洲最大城市',
                    'description' => '<p>開羅是一座充滿非凡反差的城市——古老金字塔與現代高速公路並存，中世紀清真寺緊鄰殖民時代建築，混亂的交通卻神奇地運轉不息。無論您是短暫逗留還是長期旅居，這十種體驗都是不可錯過的。</p><p><strong>1. 吉薩金字塔和大獅身人面像</strong>——從世界上最標誌性的景觀開始。請早早出發，避開人群和酷熱。</p><p><strong>2. 埃及博物館</strong>——珍藏圖坦卡蒙的寶藏和超過12萬件古代文物。請至少安排3小時參觀。</p><p><strong>3. 汗·哈利利集市</strong>——迷失在中世紀的露天市場中，討價還價購買香料、黃金和手工藝品。</p><p><strong>4. 伊斯蘭開羅</strong>——漫步於聯合國教科文組織列入名冊的歷史街區，欣賞高聳的宣禮塔和華麗的清真寺。</p><p><strong>5. 科普特開羅</strong>——探索埃及古老的基督教區，包括懸掛教堂和本·以斯拉會堂。</p>',
                    'meta_title' => '開羅十大必做之事——埃及旅遊攻略',
                    'meta_description' => '探索開羅最精彩的一面——金字塔、埃及博物館、汗·哈利利集市等，這份必備旅遊攻略帶您一一揭秘。',
                ],
                'subheads' => [
                    ['en' => 'Must-See Monuments', 'zh' => '必看名胜古迹', 'zh-Hant' => '必看名勝古蹟'],
                    ['en' => 'Food & Nightlife',    'zh' => '美食与夜生活', 'zh-Hant' => '美食與夜生活'],
                    ['en' => 'Practical Tips',      'zh' => '实用贴士',     'zh-Hant' => '實用貼士'],
                ],
            ],

            [
                'category' => 0, // Tips
                'en' => [
                    'title' => 'Best Time to Cruise the Nile',
                    'slug' => 'best-time-to-cruise-the-nile',
                    'head' => 'When to Book Your Nile Cruise',
                    'description' => '<p>The Nile cruise season runs almost year-round, but the experience varies dramatically depending on when you go. Here\'s a month-by-month breakdown to help you choose the perfect time.</p><p><strong>October–April (Peak Season)</strong> — Temperatures are mild and comfortable, ranging from 20–28°C (68–82°F) in Upper Egypt. This is the most popular time, so book early. The Christmas and New Year period sees the highest prices and maximum crowds.</p><p><strong>May–September (Summer)</strong> — Temperatures in Luxor and Aswan regularly exceed 40°C (104°F). Fewer tourists means better deals and empty temple sites at dawn. If you can handle the heat, summer offers a uniquely authentic Egypt experience.</p><p><strong>The Nile Flood Season</strong> — Historically, the Nile flooded annually from July to September. Today the High Dam controls this, but the river does run higher and faster in summer, which can actually make for a more dramatic sailing experience.</p>',
                    'meta_title' => 'Best Time to Cruise the Nile — Month by Month Guide',
                    'meta_description' => 'Find out the best time to take a Nile cruise — peak season vs summer, weather, prices, and what to expect.',
                ],
                'zh' => [
                    'title' => '尼罗河游船最佳时间',
                    'slug' => 'best-time-to-cruise-the-nile',
                    'head' => '何时预订尼罗河游船',
                    'description' => '<p>尼罗河游船季节几乎全年不间断，但体验会因出行时间而大相径庭。以下是逐月分析，帮助您选择最完美的旅行时间。</p><p><strong>10月至4月（旺季）</strong>——上埃及气温温和舒适，在20-28°C之间。这是最受欢迎的时段，请提前预订。圣诞节和元旦期间价格最高，游客最多。</p><p><strong>5月至9月（夏季）</strong>——卢克索和阿斯旺的气温经常超过40°C。游客减少意味着更优惠的价格和清晨空旷的神庙。如果您能承受高温，夏季提供了一种独特而真实的埃及体验。</p><p><strong>尼罗河洪水季</strong>——历史上，尼罗河每年7月至9月都会泛洪。如今阿斯旺高坝控制了这一现象，但夏季河水确实更高更急，这实际上使航行体验更加壮观。</p>',
                    'meta_title' => '尼罗河游船最佳时间——逐月指南',
                    'meta_description' => '了解尼罗河游船的最佳时间——旺季与夏季对比、天气、价格及注意事项。',
                ],
                'zh-Hant' => [
                    'title' => '尼羅河遊船最佳時間',
                    'slug' => 'best-time-to-cruise-the-nile',
                    'head' => '何時預訂尼羅河遊船',
                    'description' => '<p>尼羅河遊船季節幾乎全年不間斷，但體驗會因出行時間而大相徑庭。以下是逐月分析，幫助您選擇最完美的旅行時間。</p><p><strong>10月至4月（旺季）</strong>——上埃及氣溫溫和舒適，在20-28°C之間。這是最受歡迎的時段，請提前預訂。聖誕節和元旦期間價格最高，遊客最多。</p><p><strong>5月至9月（夏季）</strong>——盧克索和阿斯旺的氣溫經常超過40°C。遊客減少意味著更優惠的價格和清晨空曠的神廟。如果您能承受高溫，夏季提供了一種獨特而真實的埃及體驗。</p><p><strong>尼羅河洪水季</strong>——歷史上，尼羅河每年7月至9月都會泛洪。如今阿斯旺高壩控制了這一現象，但夏季河水確實更高更急，這實際上使航行體驗更加壯觀。</p>',
                    'meta_title' => '尼羅河遊船最佳時間——逐月指南',
                    'meta_description' => '了解尼羅河遊船的最佳時間——旺季與夏季對比、天氣、價格及注意事項。',
                ],
                'subheads' => [
                    ['en' => 'Peak Season Overview',  'zh' => '旺季概览',   'zh-Hant' => '旺季概覽'],
                    ['en' => 'Summer Travel Tips',    'zh' => '夏季旅行建议', 'zh-Hant' => '夏季旅行建議'],
                ],
            ],

            [
                'category' => 0, // Tips
                'en' => [
                    'title' => 'Egyptian Food Guide',
                    'slug' => 'egyptian-food-guide',
                    'head' => 'A Complete Guide to Egyptian Cuisine',
                    'description' => '<p>Egyptian food is hearty, flavourful, and deeply rooted in ancient agricultural traditions. Staples like bread, fava beans, lentils, and rice have fed the Egyptian people for millennia and remain central to the national diet today.</p><p><strong>Ful Medames</strong> — Egypt\'s national dish: slow-cooked fava beans mashed with olive oil, lemon, and cumin. Eaten for breakfast by millions every morning.</p><p><strong>Kushari</strong> — A uniquely Egyptian street food mixing rice, lentils, pasta, and crispy onions, topped with a spiced tomato sauce. Cheap, filling, and delicious.</p><p><strong>Feteer Meshaltet</strong> — A flaky Egyptian pastry, similar to a very buttery puff pastry. Eaten sweet with honey or savoury with cheese and eggs.</p><p><strong>Hawawshi</strong> — Spiced minced meat stuffed into bread and baked in a wood-fired oven. Cairo\'s version of a meat pie.</p>',
                    'meta_title' => 'Egyptian Food Guide — What to Eat in Egypt',
                    'meta_description' => 'Discover the best Egyptian foods — ful medames, kushari, feteer, and more in this complete guide to Egyptian cuisine.',
                ],
                'zh' => [
                    'title' => '埃及美食指南',
                    'slug' => 'egyptian-food-guide',
                    'head' => '埃及美食完整指南',
                    'description' => '<p>埃及食物丰盛、风味独特，深深根植于古老的农业传统。面包、蚕豆、扁豆和大米等主食已为埃及人民提供了数千年的滋养，至今仍是国家饮食的核心。</p><p><strong>富尔豆泥（Ful Medames）</strong>——埃及国菜：慢炖蚕豆配橄榄油、柠檬和孜然捣制而成。每天早晨有数百万人以此为早餐。</p><p><strong>科沙里（Kushari）</strong>——一种独特的埃及街头小吃，将米饭、扁豆、意大利面和酥脆洋葱混合，淋上香料番茄酱。价格实惠、饱腹可口。</p><p><strong>费蒂尔（Feteer Meshaltet）</strong>——一种薄脆的埃及糕点，类似非常酥脆的千层酥。可搭配蜂蜜食用甜味版，或搭配奶酪和鸡蛋食用咸味版。</p><p><strong>哈瓦什（Hawawshi）</strong>——香料碎肉塞入面包，在柴火炉中烘烤而成。开罗版的肉馅饼。</p>',
                    'meta_title' => '埃及美食指南——在埃及吃什么',
                    'meta_description' => '探索最佳埃及美食——富尔豆泥、科沙里、费蒂尔等，这份完整的埃及美食指南带您一一品鉴。',
                ],
                'zh-Hant' => [
                    'title' => '埃及美食指南',
                    'slug' => 'egyptian-food-guide',
                    'head' => '埃及美食完整指南',
                    'description' => '<p>埃及食物豐盛、風味獨特，深深根植於古老的農業傳統。麵包、蠶豆、扁豆和大米等主食已為埃及人民提供了數千年的滋養，至今仍是國家飲食的核心。</p><p><strong>富爾豆泥（Ful Medames）</strong>——埃及國菜：慢燉蠶豆配橄欖油、檸檬和孜然搗製而成。每天早晨有數百萬人以此為早餐。</p><p><strong>科沙里（Kushari）</strong>——一種獨特的埃及街頭小吃，將米飯、扁豆、意大利麵和酥脆洋蔥混合，淋上香料番茄醬。價格實惠、飽腹可口。</p><p><strong>費蒂爾（Feteer Meshaltet）</strong>——一種薄脆的埃及糕點，類似非常酥脆的千層酥。可搭配蜂蜜食用甜味版，或搭配奶酪和雞蛋食用鹹味版。</p><p><strong>哈瓦什（Hawawshi）</strong>——香料碎肉塞入麵包，在柴火爐中烘烤而成。開羅版的肉餡餅。</p>',
                    'meta_title' => '埃及美食指南——在埃及吃什麼',
                    'meta_description' => '探索最佳埃及美食——富爾豆泥、科沙里、費蒂爾等，這份完整的埃及美食指南帶您一一品鑒。',
                ],
                'subheads' => [
                    ['en' => 'Street Food Essentials', 'zh' => '必尝街头小吃', 'zh-Hant' => '必嚐街頭小吃'],
                    ['en' => 'Where to Eat in Cairo',  'zh' => '开罗哪里吃',  'zh-Hant' => '開羅哪裡吃'],
                ],
            ],

            [
                'category' => 0, // Tips
                'en' => [
                    'title' => 'Photography Tips for the Pyramids',
                    'slug' => 'photography-tips-for-the-pyramids',
                    'head' => 'How to Photograph the Pyramids of Giza',
                    'description' => '<p>The Pyramids of Giza are one of the most photographed subjects on earth, and yet getting a truly great shot requires planning, timing, and a few insider tricks. Here\'s how to come home with images you\'ll actually be proud of.</p><p><strong>Golden Hour is Everything</strong> — Arrive before sunrise. The Giza Plateau opens at 8 AM officially, but the soft golden light that falls across the pyramids at 6–7 AM, while the sky shifts from deep blue to amber, is worth bribing a camel owner for access to higher ground.</p><p><strong>The Sphinx Viewpoint</strong> — The classic Sphinx-and-Pyramid shot is taken from the Sphinx Panorama viewpoint on the eastern plateau. Arrive here early; by 9 AM the area is packed with tour groups.</p><p><strong>Avoid the Midday Glare</strong> — The harsh midday sun bleaches the limestone to near-white and creates unflattering flat light. Shoot in the morning or return for the late afternoon golden hour before closing.</p>',
                    'meta_title' => 'Pyramid Photography Tips — Best Shots at Giza',
                    'meta_description' => 'Learn how to photograph the Pyramids of Giza — best viewpoints, lighting, timing, and camera settings.',
                ],
                'zh' => [
                    'title' => '金字塔摄影技巧',
                    'slug' => 'photography-tips-for-the-pyramids',
                    'head' => '如何拍摄吉萨金字塔',
                    'description' => '<p>吉萨金字塔是地球上被拍摄最多的主题之一，但要拍出真正令人满意的照片，需要充分的计划、时机把握和一些内行技巧。以下是如何带回让您引以为傲的照片的方法。</p><p><strong>黄金时刻至关重要</strong>——在日出前抵达。吉萨高原官方开放时间是早上8点，但在早上6-7点，当天空从深蓝色变为琥珀色时，柔和的金色光线照射在金字塔上，值得向骆驼主人行贿以获得进入高处的机会。</p><p><strong>狮身人面像观景台</strong>——经典的狮身人面像与金字塔合影拍摄地点位于东部高原的狮身人面像全景观景台。请早早到达；早上9点之后，这里就会挤满旅游团。</p><p><strong>避开正午强光</strong>——严酷的正午阳光会将石灰岩漂白至近乎白色，并产生不讨好的平板光线。请在早晨拍摄，或在闭馆前返回享受下午晚些时候的黄金时刻。</p>',
                    'meta_title' => '金字塔摄影技巧——在吉萨拍出最佳照片',
                    'meta_description' => '学习如何拍摄吉萨金字塔——最佳观景点、光线、时机和相机设置。',
                ],
                'zh-Hant' => [
                    'title' => '金字塔攝影技巧',
                    'slug' => 'photography-tips-for-the-pyramids',
                    'head' => '如何拍攝吉薩金字塔',
                    'description' => '<p>吉薩金字塔是地球上被拍攝最多的主題之一，但要拍出真正令人滿意的照片，需要充分的計劃、時機把握和一些內行技巧。以下是如何帶回讓您引以為傲的照片的方法。</p><p><strong>黃金時刻至關重要</strong>——在日出前抵達。吉薩高原官方開放時間是早上8點，但在早上6-7點，當天空從深藍色變為琥珀色時，柔和的金色光線照射在金字塔上，值得向駱駝主人行賄以獲得進入高處的機會。</p><p><strong>獅身人面像觀景台</strong>——經典的獅身人面像與金字塔合影拍攝地點位於東部高原的獅身人面像全景觀景台。請早早到達；早上9點之後，這裡就會擠滿旅遊團。</p><p><strong>避開正午強光</strong>——嚴酷的正午陽光會將石灰岩漂白至近乎白色，並產生不討好的平板光線。請在早晨拍攝，或在閉館前返回享受下午晚些時候的黃金時刻。</p>',
                    'meta_title' => '金字塔攝影技巧——在吉薩拍出最佳照片',
                    'meta_description' => '學習如何拍攝吉薩金字塔——最佳觀景點、光線、時機和相機設置。',
                ],
                'subheads' => [
                    ['en' => 'Best Viewpoints',    'zh' => '最佳观景点',  'zh-Hant' => '最佳觀景點'],
                    ['en' => 'Camera Settings',    'zh' => '相机设置',    'zh-Hant' => '相機設置'],
                    ['en' => 'Drone Photography',  'zh' => '无人机摄影', 'zh-Hant' => '無人機攝影'],
                ],
            ],

            [
                'category' => 2, // Interest
                'en' => [
                    'title' => 'Solo Travel in Egypt',
                    'slug' => 'solo-travel-in-egypt',
                    'head' => 'Is Egypt Safe for Solo Travellers?',
                    'description' => '<p>Egypt is one of the most welcoming countries in the world for solo travellers. Egyptians are famously hospitable, and the country\'s well-established tourist infrastructure makes navigation straightforward even for first-time visitors travelling alone.</p><p><strong>Safety</strong> — The main tourist areas (Cairo, Luxor, Aswan, Hurghada, Sharm El Sheikh) are extremely well-policed and generally safe. Use the same common sense you would in any major city: don\'t flash expensive jewellery, be aware of your surroundings at night, and keep copies of your passport and visa separate from the originals.</p><p><strong>Getting Around</strong> — Uber works in Cairo and Alexandria. For inter-city travel, the train network is reliable and affordable. For Luxor and Aswan, hiring a private driver for the day gives you flexibility and safety at a reasonable cost.</p>',
                    'meta_title' => 'Solo Travel in Egypt — Safety, Tips & Itinerary Ideas',
                    'meta_description' => 'Everything you need to know about solo travel in Egypt — safety, transport, costs, and best places to visit alone.',
                ],
                'zh' => [
                    'title' => '独自一人游埃及',
                    'slug' => 'solo-travel-in-egypt',
                    'head' => '埃及对独行旅客安全吗？',
                    'description' => '<p>埃及是世界上对独行旅客最友好的国家之一。埃及人以热情好客著称，而该国成熟的旅游基础设施即使对第一次独自旅行的游客来说，导航也非常便捷。</p><p><strong>安全性</strong>——主要旅游区（开罗、卢克索、阿斯旺、赫尔格达、沙姆沙伊赫）警察部署完善，总体安全。请和在任何大城市一样保持常识：不要炫耀昂贵的珠宝，夜间注意周围环境，并将护照和签证的副本与正本分开存放。</p><p><strong>出行方式</strong>——优步在开罗和亚历山大均可使用。城际旅行方面，火车网络可靠且实惠。在卢克索和阿斯旺，包车一日游可以以合理的费用提供灵活性和安全感。</p>',
                    'meta_title' => '独自一人游埃及——安全须知、旅行建议和行程创意',
                    'meta_description' => '关于独自游埃及您需要了解的一切——安全、交通、费用和最佳独行目的地。',
                ],
                'zh-Hant' => [
                    'title' => '獨自一人遊埃及',
                    'slug' => 'solo-travel-in-egypt',
                    'head' => '埃及對獨行旅客安全嗎？',
                    'description' => '<p>埃及是世界上對獨行旅客最友好的國家之一。埃及人以熱情好客著稱，而該國成熟的旅遊基礎設施即使對第一次獨自旅行的遊客來說，導航也非常便捷。</p><p><strong>安全性</strong>——主要旅遊區（開羅、盧克索、阿斯旺、赫爾格達、沙姆沙伊赫）警察部署完善，總體安全。請和在任何大城市一樣保持常識：不要炫耀昂貴的珠寶，夜間注意周圍環境，並將護照和簽證的副本與正本分開存放。</p><p><strong>出行方式</strong>——優步在開羅和亞歷山大均可使用。城際旅行方面，火車網絡可靠且實惠。在盧克索和阿斯旺，包車一日遊可以以合理的費用提供靈活性和安全感。</p>',
                    'meta_title' => '獨自一人遊埃及——安全須知、旅行建議和行程創意',
                    'meta_description' => '關於獨自遊埃及您需要了解的一切——安全、交通、費用和最佳獨行目的地。',
                ],
                'subheads' => [
                    ['en' => 'Safety Overview',     'zh' => '安全概况',     'zh-Hant' => '安全概況'],
                    ['en' => 'Transport Options',   'zh' => '交通选择',     'zh-Hant' => '交通選擇'],
                    ['en' => 'Solo Female Travel',  'zh' => '女性独行旅游',  'zh-Hant' => '女性獨行旅遊'],
                ],
            ],

            [
                'category' => 1, // Destination
                'en' => [
                    'title' => 'Family Travel to Egypt',
                    'slug' => 'family-travel-to-egypt',
                    'head' => 'Bringing the Kids to Egypt',
                    'description' => '<p>Egypt is an outstanding family destination — the combination of world-famous ancient history, sunshine, beaches, and the novelty of camel rides makes it uniquely appealing for children and adults alike. Here\'s what you need to know to plan a successful family trip.</p><p><strong>Best Age Groups</strong> — Children aged 8 and above tend to get the most from Egypt\'s historical sites. Younger children can enjoy the Red Sea beach resorts like Hurghada and Sharm El Sheikh regardless of age.</p><p><strong>Family-Friendly Hotels</strong> — The major beach resorts offer excellent children\'s clubs, pools, and entertainment. For historical tours, choose hotels in central Luxor or Aswan that are close to the sites to minimise transit time for younger travellers.</p><p><strong>Health & Vaccination</strong> — No specific vaccinations are required for Egypt, but routine immunisations should be up to date. Bring plenty of high-SPF sunscreen — the Egyptian sun is intense, and children\'s skin burns quickly.</p>',
                    'meta_title' => 'Family Travel to Egypt — Tips, Hotels & Kid-Friendly Activities',
                    'meta_description' => 'Plan the perfect family trip to Egypt — best family hotels, kid-friendly tours, health tips, and itinerary advice.',
                ],
                'zh' => [
                    'title' => '埃及家庭旅游',
                    'slug' => 'family-travel-to-egypt',
                    'head' => '带孩子游埃及',
                    'description' => '<p>埃及是一个出色的家庭旅行目的地——举世闻名的古代历史、阳光、海滩以及骑骆驼的新奇体验，使其对孩子和成人同样具有独特的吸引力。以下是规划一次成功家庭旅行的必要知识。</p><p><strong>适合年龄</strong>——8岁及以上的孩子往往能从埃及的历史遗址中获得最多收获。年幼的孩子可以享受赫尔格达和沙姆沙伊赫等红海海滩度假村，不受年龄限制。</p><p><strong>家庭友好型酒店</strong>——主要海滩度假村提供出色的儿童俱乐部、游泳池和娱乐设施。对于历史观光游，请选择靠近景点的卢克索或阿斯旺市中心酒店，以减少年幼旅行者的在途时间。</p><p><strong>健康与疫苗接种</strong>——埃及不需要特定疫苗，但常规免疫接种应保持最新状态。请携带大量高SPF防晒霜——埃及的阳光非常强烈，孩子的皮肤很容易晒伤。</p>',
                    'meta_title' => '埃及家庭旅游——建议、酒店和适合儿童的活动',
                    'meta_description' => '规划完美的埃及家庭旅行——最佳家庭酒店、适合儿童的旅游活动、健康提示和行程建议。',
                ],
                'zh-Hant' => [
                    'title' => '埃及家庭旅遊',
                    'slug' => 'family-travel-to-egypt',
                    'head' => '帶孩子遊埃及',
                    'description' => '<p>埃及是一個出色的家庭旅行目的地——舉世聞名的古代歷史、陽光、海灘以及騎駱駝的新奇體驗，使其對孩子和成人同樣具有獨特的吸引力。以下是規劃一次成功家庭旅行的必要知識。</p><p><strong>適合年齡</strong>——8歲及以上的孩子往往能從埃及的歷史遺址中獲得最多收穫。年幼的孩子可以享受赫爾格達和沙姆沙伊赫等紅海海灘度假村，不受年齡限制。</p><p><strong>家庭友好型酒店</strong>——主要海灘度假村提供出色的兒童俱樂部、游泳池和娛樂設施。對於歷史觀光遊，請選擇靠近景點的盧克索或阿斯旺市中心酒店，以減少年幼旅行者的在途時間。</p><p><strong>健康與疫苗接種</strong>——埃及不需要特定疫苗，但常規免疫接種應保持最新狀態。請攜帶大量高SPF防曬霜——埃及的陽光非常強烈，孩子的皮膚很容易曬傷。</p>',
                    'meta_title' => '埃及家庭旅遊——建議、酒店和適合兒童的活動',
                    'meta_description' => '規劃完美的埃及家庭旅行——最佳家庭酒店、適合兒童的旅遊活動、健康提示和行程建議。',
                ],
                'subheads' => [
                    ['en' => 'Best Family Destinations', 'zh' => '最佳家庭目的地',   'zh-Hant' => '最佳家庭目的地'],
                    ['en' => 'Packing for Kids',         'zh' => '为孩子准备行李',   'zh-Hant' => '為孩子準備行李'],
                ],
            ],

            [
                'category' => 0, // Tips
                'en' => [
                    'title' => 'Egypt Visa Guide',
                    'slug' => 'egypt-visa-guide',
                    'head' => 'How to Get a Tourist Visa for Egypt',
                    'description' => '<p>Getting a tourist visa for Egypt is straightforward for most nationalities. Most visitors can apply for an e-Visa online before travel, obtain a visa on arrival at major airports, or get a visa through their local Egyptian embassy or consulate.</p><p><strong>e-Visa (Recommended)</strong> — Apply at visa2egypt.gov.eg. Cost is $25 USD for a single entry or $60 USD for a multiple entry visa (valid 90 days). Processing takes 3–5 business days. Print the approval and bring it with your passport.</p><p><strong>Visa on Arrival</strong> — Available at Cairo, Luxor, Aswan, Hurghada, and Sharm El Sheikh airports. Cost is $25 USD, payable in cash (USD, EUR, or GBP). Long queues during peak season — the e-Visa is faster.</p><p><strong>Countries Exempt</strong> — Arab League members and some African and Asian nations are exempt from visa requirements. Check the Egyptian Ministry of Foreign Affairs website for the current list.</p>',
                    'meta_title' => 'Egypt Tourist Visa Guide 2024 — e-Visa, On Arrival & Embassy',
                    'meta_description' => 'Complete guide to getting an Egypt tourist visa — e-visa, visa on arrival, costs, processing time, and eligibility.',
                ],
                'zh' => [
                    'title' => '埃及签证指南',
                    'slug' => 'egypt-visa-guide',
                    'head' => '如何申请埃及旅游签证',
                    'description' => '<p>对于大多数国籍的人来说，申请埃及旅游签证非常简单。大多数游客可以在出行前在线申请电子签证，或在主要机场落地签证，也可以通过当地的埃及大使馆或领事馆办理签证。</p><p><strong>电子签证（推荐）</strong>——在visa2egypt.gov.eg申请。单次入境费用为25美元，多次入境签证为60美元（有效期90天）。处理时间为3-5个工作日。请打印批准函并随护照携带。</p><p><strong>落地签证</strong>——可在开罗、卢克索、阿斯旺、赫尔格达和沙姆沙伊赫机场办理。费用为25美元，以现金支付（美元、欧元或英镑）。旺季期间排队时间较长——电子签证更快捷。</p><p><strong>免签国家</strong>——阿拉伯联盟成员国以及部分非洲和亚洲国家免于签证要求。请查看埃及外交部网站获取最新名单。</p>',
                    'meta_title' => '2024年埃及旅游签证指南——电子签证、落地签证和大使馆',
                    'meta_description' => '埃及旅游签证完整指南——电子签证、落地签证、费用、处理时间和资格条件。',
                ],
                'zh-Hant' => [
                    'title' => '埃及簽證指南',
                    'slug' => 'egypt-visa-guide',
                    'head' => '如何申請埃及旅遊簽證',
                    'description' => '<p>對於大多數國籍的人來說，申請埃及旅遊簽證非常簡單。大多數遊客可以在出行前在線申請電子簽證，或在主要機場落地簽證，也可以通過當地的埃及大使館或領事館辦理簽證。</p><p><strong>電子簽證（推薦）</strong>——在visa2egypt.gov.eg申請。單次入境費用為25美元，多次入境簽證為60美元（有效期90天）。處理時間為3-5個工作日。請打印批准函並隨護照攜帶。</p><p><strong>落地簽證</strong>——可在開羅、盧克索、阿斯旺、赫爾格達和沙姆沙伊赫機場辦理。費用為25美元，以現金支付（美元、歐元或英鎊）。旺季期間排隊時間較長——電子簽證更快捷。</p><p><strong>免簽國家</strong>——阿拉伯聯盟成員國以及部分非洲和亞洲國家免於簽證要求。請查看埃及外交部網站獲取最新名單。</p>',
                    'meta_title' => '2024年埃及旅遊簽證指南——電子簽證、落地簽證和大使館',
                    'meta_description' => '埃及旅遊簽證完整指南——電子簽證、落地簽證、費用、處理時間和資格條件。',
                ],
                'subheads' => [
                    ['en' => 'e-Visa Step by Step', 'zh' => '电子签证步骤详解', 'zh-Hant' => '電子簽證步驟詳解'],
                    ['en' => 'Visa on Arrival FAQ',  'zh' => '落地签证常见问题', 'zh-Hant' => '落地簽證常見問題'],
                ],
            ],

            [
                'category' => 1, // Destination
                'en' => [
                    'title' => 'Best Beaches in Egypt',
                    'slug' => 'best-beaches-in-egypt',
                    'head' => "Egypt's Top Beach Destinations",
                    'description' => '<p>Egypt boasts some of the finest beaches in the world, stretching along the Red Sea coast and the Mediterranean. With warm, clear water, world-class coral reefs, and all-inclusive resorts at budget-friendly prices, Egypt\'s beaches attract millions of sun-seekers every year.</p><p><strong>Hurghada</strong> — Egypt\'s most popular beach resort, stretching 40km along the Red Sea. Excellent for snorkelling, diving, and watersports. Easy to reach from Cairo by plane or bus.</p><p><strong>Sharm El Sheikh</strong> — At the tip of the Sinai Peninsula, Sharm offers the most dramatic reef diving in the Red Sea alongside luxury resorts. Ras Mohammed National Park is a 30-minute drive away.</p><p><strong>Dahab</strong> — A relaxed backpacker town on the Gulf of Aqaba with legendary diving at the Blue Hole. Much quieter than Sharm or Hurghada — perfect for longer stays.</p><p><strong>Marsa Alam</strong> — Egypt\'s most pristine stretch of Red Sea coast. Dugong sightings and pristine untouched reefs. Fewer mass-market tourists — ideal for eco-conscious divers.</p>',
                    'meta_title' => 'Best Beaches in Egypt — Red Sea & Mediterranean Guide',
                    'meta_description' => "Discover Egypt's best beaches — Hurghada, Sharm El Sheikh, Dahab, and Marsa Alam on the Red Sea.",
                ],
                'zh' => [
                    'title' => '埃及最佳海滩',
                    'slug' => 'best-beaches-in-egypt',
                    'head' => '埃及顶级海滩目的地',
                    'description' => '<p>埃及拥有世界上一些最优质的海滩，沿红海海岸和地中海绵延分布。温暖清澈的海水、世界级珊瑚礁和以亲民价格提供的全包度假村，每年吸引数百万寻求阳光的旅客。</p><p><strong>赫尔格达</strong>——埃及最受欢迎的海滩度假区，沿红海绵延40公里。极适合浮潜、潜水和水上运动。从开罗乘飞机或大巴可轻松到达。</p><p><strong>沙姆沙伊赫</strong>——位于西奈半岛的顶端，沙姆提供红海最壮观的礁石潜水体验，同时拥有豪华度假村。拉斯穆罕默德国家公园距离车程仅30分钟。</p><p><strong>达哈卜</strong>——阿卡巴湾上一个悠闲的背包客小镇，以蓝洞的传奇潜水而闻名。比沙姆或赫尔格达安静得多——非常适合长期停留。</p><p><strong>马萨阿拉姆</strong>——埃及最原始的红海海岸线。常有儒艮出没，珊瑚礁保存完好。大众旅游较少——是注重生态的潜水者的理想之地。</p>',
                    'meta_title' => '埃及最佳海滩——红海和地中海指南',
                    'meta_description' => '探索埃及最佳海滩——红海上的赫尔格达、沙姆沙伊赫、达哈卜和马萨阿拉姆。',
                ],
                'zh-Hant' => [
                    'title' => '埃及最佳海灘',
                    'slug' => 'best-beaches-in-egypt',
                    'head' => '埃及頂級海灘目的地',
                    'description' => '<p>埃及擁有世界上一些最優質的海灘，沿紅海海岸和地中海綿延分佈。溫暖清澈的海水、世界級珊瑚礁和以親民價格提供的全包度假村，每年吸引數百萬尋求陽光的旅客。</p><p><strong>赫爾格達</strong>——埃及最受歡迎的海灘度假區，沿紅海綿延40公里。極適合浮潛、潛水和水上運動。從開羅乘飛機或大巴可輕鬆到達。</p><p><strong>沙姆沙伊赫</strong>——位於西奈半島的頂端，沙姆提供紅海最壯觀的礁石潛水體驗，同時擁有豪華度假村。拉斯穆罕默德國家公園距離車程僅30分鐘。</p><p><strong>達哈卜</strong>——阿卡巴灣上一個悠閒的背包客小鎮，以藍洞的傳奇潛水而聞名。比沙姆或赫爾格達安靜得多——非常適合長期停留。</p><p><strong>馬薩阿拉姆</strong>——埃及最原始的紅海海岸線。常有儒艮出沒，珊瑚礁保存完好。大眾旅遊較少——是注重生態的潛水者的理想之地。</p>',
                    'meta_title' => '埃及最佳海灘——紅海和地中海指南',
                    'meta_description' => '探索埃及最佳海灘——紅海上的赫爾格達、沙姆沙伊赫、達哈卜和馬薩阿拉姆。',
                ],
                'subheads' => [
                    ['en' => 'Red Sea Resorts',      'zh' => '红海度假村',  'zh-Hant' => '紅海度假村'],
                    ['en' => 'Mediterranean Beaches', 'zh' => '地中海海滩', 'zh-Hant' => '地中海海灘'],
                ],
            ],
        ];
    }
}
