<?php

namespace Database\Seeders;

use App\Models\aboutUs\AboutUs;

class AboutUsSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        foreach ($this->aboutUsData() as $spec) {
            $enTitle = $spec['en']['title'];
            if ($this->translationExists(AboutUs::class, $enTitle, 'title')) {
                $this->command->line("  skip AboutUs: {$enTitle}");

                continue;
            }
            try {
                AboutUs::create([
                    'image' => $this->getImage('about_us'),
                    'status' => $spec['status'],
                    'en' => $spec['en'],
                    'zh' => $spec['zh'],
                    'zh-Hant' => $spec['zh-Hant'],
                ]);
                $this->command->info("  seeded AboutUs: {$enTitle}");
            } catch (\Throwable $e) {
                $this->command->error("  AboutUs '{$enTitle}': {$e->getMessage()}");
            }
        }
    }

    private function aboutUsData(): array
    {
        return [
            [
                'status' => 1,
                'en' => [
                    'title' => 'Who We Are',
                    'slug' => 'who-we-are',
                    'description' => '<p>We are a passionate team of travel enthusiasts dedicated to showcasing the wonders of Egypt. With years of experience in the tourism industry, we curate unforgettable journeys that blend ancient history, vibrant culture, and breathtaking landscapes.</p><p>Our mission is to provide travelers with authentic, immersive experiences that go beyond typical sightseeing. From the majestic Pyramids of Giza to the serene waters of the Nile, every tour is crafted with care and expertise.</p>',
                    'meta_title' => 'Who We Are â€” Discover Egypt with Us',
                    'meta_description' => 'Learn about our team and our passion for creating unforgettable Egyptian travel experiences.',
                ],
                'zh' => [
                    'title' => 'æˆ‘ä»¬æ˜¯è°',
                    'slug' => 'who-we-are',
                    'description' => '<p>æˆ‘ä»¬æ˜¯ä¸€æ”¯å……æ»¡çƒ­æƒ…çš„æ—…è¡Œçˆ±å¥½è€…å›¢é˜Ÿï¼Œè‡´åŠ›äºŽå±•ç¤ºåŸƒåŠçš„å¥‡è¿¹ã€‚å‡­å€Ÿå¤šå¹´çš„æ—…æ¸¸ä¸šç»éªŒï¼Œæˆ‘ä»¬ç­–åˆ’äº†å°†å¤ä»£åŽ†å²ã€å……æ»¡æ´»åŠ›çš„æ–‡åŒ–å’Œå£®ä¸½æ™¯è§‚èžä¸ºä¸€ä½“çš„éš¾å¿˜æ—…ç¨‹ã€‚</p><p>æˆ‘ä»¬çš„ä½¿å‘½æ˜¯ä¸ºæ—…è¡Œè€…æä¾›çœŸå®žã€æ²‰æµ¸å¼çš„ä½“éªŒï¼Œè¶…è¶Š typical è§‚å…‰ã€‚ä»Žé›„ä¼Ÿçš„å‰è¨é‡‘å­—å¡”åˆ°å®é™çš„å°¼ç½—æ²³æ°´ï¼Œæ¯ä¸€æ¬¡æ—…è¡Œéƒ½ç»è¿‡ç²¾å¿ƒè®¾è®¡å’Œä¸“ä¸šæ‰“é€ ã€‚</p>',
                    'meta_title' => 'æˆ‘ä»¬æ˜¯è°â€”â€”ä¸Žæˆ‘ä»¬ä¸€èµ·æŽ¢ç´¢åŸƒåŠ',
                    'meta_description' => 'äº†è§£æˆ‘ä»¬çš„å›¢é˜Ÿä»¥åŠæˆ‘ä»¬å¯¹åˆ›é€ éš¾å¿˜åŸƒåŠæ—…è¡Œä½“éªŒçš„çƒ­æƒ…ã€‚',
                ],
                'zh-Hant' => [
                    'title' => 'æˆ‘å€‘æ˜¯èª°',
                    'slug' => 'who-we-are',
                    'description' => '<p>æˆ‘å€‘æ˜¯ä¸€æ”¯å……æ»¿ç†±æƒ…çš„æ—…è¡Œæ„›å¥½è€…åœ˜éšŠï¼Œè‡´åŠ›æ–¼å±•ç¤ºåŸƒåŠçš„å¥‡è¹Ÿã€‚æ†‘è—‰å¤šå¹´çš„æ—…éŠæ¥­ç¶“é©—ï¼Œæˆ‘å€‘ç­–åŠƒäº†å°‡å¤ä»£æ­·å²ã€å……æ»¿æ´»åŠ›çš„æ–‡åŒ–å’Œå£¯éº—æ™¯è§€èžç‚ºä¸€é«”çš„é›£å¿˜æ—…ç¨‹ã€‚</p><p>æˆ‘å€‘çš„ä½¿å‘½æ˜¯ç‚ºæ—…è¡Œè€…æä¾›çœŸå¯¦ã€æ²‰æµ¸å¼çš„é«”é©—ï¼Œè¶…è¶Š typical è§€å…‰ã€‚å¾žé›„å‰çš„å‰è–©é‡‘å­—å¡”åˆ°å¯§éœçš„å°¼ç¾…æ²³æ°´ï¼Œæ¯ä¸€æ¬¡æ—…è¡Œéƒ½ç¶“éŽç²¾å¿ƒè¨­è¨ˆå’Œå°ˆæ¥­æ‰“é€ ã€‚</p>',
                    'meta_title' => 'æˆ‘å€‘æ˜¯èª°â€”â€”èˆ‡æˆ‘å€‘ä¸€èµ·æŽ¢ç´¢åŸƒåŠ',
                    'meta_description' => 'äº†è§£æˆ‘å€‘çš„åœ˜éšŠä»¥åŠæˆ‘å€‘å°å‰µé€ é›£å¿˜åŸƒåŠæ—…è¡Œé«”é©—çš„ç†±æƒ…ã€‚',
                ],
            ],
            [
                'status' => 2,
                'en' => [
                    'title' => 'Our Mission',
                    'slug' => 'our-mission',
                    'description' => '<p>Our mission is to make Egypt accessible to every traveler by offering personalized, high-quality tours that respect local culture and support local communities. We believe travel should be transformative â€” opening minds, building bridges, and creating lasting memories.</p><p>We work directly with local guides, artisans, and family-run businesses to ensure that every journey benefits the people and places you visit.</p>',
                    'meta_title' => 'Our Mission â€” Transformative Travel in Egypt',
                    'meta_description' => 'Discover our mission to create meaningful, responsible travel experiences across Egypt.',
                ],
                'zh' => [
                    'title' => 'æˆ‘ä»¬çš„ä½¿å‘½',
                    'slug' => 'our-mission',
                    'description' => '<p>æˆ‘ä»¬çš„ä½¿å‘½æ˜¯é€šè¿‡æä¾›ä¸ªæ€§åŒ–ã€é«˜å“è´¨çš„æ—…è¡Œï¼Œè®©æ¯ä½æ—…è¡Œè€…éƒ½èƒ½è½»æ¾æŽ¢ç´¢åŸƒåŠï¼ŒåŒæ—¶å°Šé‡å½“åœ°æ–‡åŒ–å¹¶æ”¯æŒå½“åœ°ç¤¾åŒºã€‚æˆ‘ä»¬ç›¸ä¿¡æ—…è¡Œåº”è¯¥æ˜¯å˜é©æ€§çš„â€”â€”å¼€é˜”æ€ç»´ã€æ­å»ºæ¡¥æ¢ã€åˆ›é€ æŒä¹…å›žå¿†ã€‚</p><p>æˆ‘ä»¬ç›´æŽ¥ä¸Žå½“åœ°å¯¼æ¸¸ã€æ‰‹å·¥è‰ºäººå’Œå®¶åº­ç»è¥çš„ä¼ä¸šåˆä½œï¼Œç¡®ä¿æ¯ä¸€æ¬¡æ—…ç¨‹éƒ½èƒ½è®©æ‚¨æ‰€è®¿é—®çš„äººå’Œåœ°æ–¹å—ç›Šã€‚</p>',
                    'meta_title' => 'æˆ‘ä»¬çš„ä½¿å‘½â€”â€”åŸƒåŠçš„å˜é©æ€§æ—…è¡Œ',
                    'meta_description' => 'äº†è§£æˆ‘ä»¬åˆ›é€ æœ‰æ„ä¹‰ã€è´Ÿè´£ä»»çš„åŸƒåŠæ—…è¡Œä½“éªŒçš„ä½¿å‘½ã€‚',
                ],
                'zh-Hant' => [
                    'title' => 'æˆ‘å€‘çš„ä½¿å‘½',
                    'slug' => 'our-mission',
                    'description' => '<p>æˆ‘å€‘çš„ä½¿å‘½æ˜¯é€šéŽæä¾›å€‹æ€§åŒ–ã€é«˜å“è³ªçš„æ—…è¡Œï¼Œè®“æ¯ä½æ—…è¡Œè€…éƒ½èƒ½è¼•é¬†æŽ¢ç´¢åŸƒåŠï¼ŒåŒæ™‚å°Šé‡ç•¶åœ°æ–‡åŒ–ä¸¦æ”¯æŒç•¶åœ°ç¤¾å€ã€‚æˆ‘å€‘ç›¸ä¿¡æ—…è¡Œæ‡‰è©²æ˜¯è®Šé©æ€§çš„â€”â€”é–‹é—Šæ€ç¶­ã€æ­å»ºæ©‹æ¨‘ã€å‰µé€ æŒä¹…å›žæ†¶ã€‚</p><p>æˆ‘å€‘ç›´æŽ¥èˆ‡ç•¶åœ°å°ŽéŠã€æ‰‹å·¥è—äººå’Œå®¶åº­ç¶“ç‡Ÿçš„ä¼æ¥­åˆä½œï¼Œç¢ºä¿æ¯ä¸€æ¬¡æ—…ç¨‹éƒ½èƒ½è®“æ‚¨æ‰€è¨ªå•çš„äººå’Œåœ°æ–¹å—ç›Šã€‚</p>',
                    'meta_title' => 'æˆ‘å€‘çš„ä½¿å‘½â€”â€”åŸƒåŠçš„è®Šé©æ€§æ—…è¡Œ',
                    'meta_description' => 'äº†è§£æˆ‘å€‘å‰µé€ æœ‰æ„ç¾©ã€è² è²¬ä»»çš„åŸƒåŠæ—…è¡Œé«”é©—çš„ä½¿å‘½ã€‚',
                ],
            ],
            [
                'status' => 3,
                'en' => [
                    'title' => 'Our Vision',
                    'slug' => 'our-vision',
                    'description' => '<p>We envision a world where travel fosters understanding and connection across cultures. Our goal is to become the most trusted name in Egyptian tourism â€” known for exceptional service, authentic experiences, and a deep commitment to sustainable travel practices.</p><p>By 2030, we aim to welcome one million travelers to Egypt, each leaving with a richer understanding of this ancient land and its warm-hearted people.</p>',
                    'meta_title' => 'Our Vision â€” The Future of Egyptian Tourism',
                    'meta_description' => 'Explore our vision for connecting travelers with the heart and soul of Egypt.',
                ],
                'zh' => [
                    'title' => 'æˆ‘ä»¬çš„æ„¿æ™¯',
                    'slug' => 'our-vision',
                    'description' => '<p>æˆ‘ä»¬è®¾æƒ³ä¸€ä¸ªæ—…è¡Œèƒ½å¤Ÿä¿ƒè¿›è·¨æ–‡åŒ–ç†è§£å’Œè”ç³»çš„ä¸–ç•Œã€‚æˆ‘ä»¬çš„ç›®æ ‡æ˜¯æˆä¸ºåŸƒåŠæ—…æ¸¸ä¸šæœ€å€¼å¾—ä¿¡èµ–çš„å“ç‰Œâ€”â€”ä»¥å“è¶Šçš„æœåŠ¡ã€çœŸå®žçš„ä½“éªŒå’Œå¯¹å¯æŒç»­æ—…è¡Œå®žè·µçš„æ·±åˆ‡æ‰¿è¯ºè€Œé—»åã€‚</p><p>åˆ°2030å¹´ï¼Œæˆ‘ä»¬çš„ç›®æ ‡æ˜¯è¿ŽæŽ¥ä¸€ç™¾ä¸‡åæ—…è¡Œè€…æ¥åˆ°åŸƒåŠï¼Œæ¯ä½æ—…è¡Œè€…éƒ½èƒ½å¸¦ç€å¯¹è¿™ç‰‡å¤è€åœŸåœ°å’Œå…¶çƒ­æƒ…äººæ°‘æ›´æ·±åˆ»çš„ç†è§£ç¦»å¼€ã€‚</p>',
                    'meta_title' => 'æˆ‘ä»¬çš„æ„¿æ™¯â€”â€”åŸƒåŠæ—…æ¸¸ä¸šçš„æœªæ¥',
                    'meta_description' => 'æŽ¢ç´¢æˆ‘ä»¬å°†æ—…è¡Œè€…ä¸ŽåŸƒåŠçš„å¿ƒçµå’Œçµé­‚è”ç³»èµ·æ¥çš„æ„¿æ™¯ã€‚',
                ],
                'zh-Hant' => [
                    'title' => 'æˆ‘å€‘çš„é¡˜æ™¯',
                    'slug' => 'our-vision',
                    'description' => '<p>æˆ‘å€‘è¨­æƒ³ä¸€å€‹æ—…è¡Œèƒ½å¤ ä¿ƒé€²è·¨æ–‡åŒ–ç†è§£å’Œè¯ç¹«çš„ä¸–ç•Œã€‚æˆ‘å€‘çš„ç›®æ¨™æ˜¯æˆç‚ºåŸƒåŠæ—…éŠæ¥­æœ€å€¼å¾—ä¿¡è³´çš„å“ç‰Œâ€”â€”ä»¥å“è¶Šçš„æœå‹™ã€çœŸå¯¦çš„é«”é©—å’Œå°å¯æŒçºŒæ—…è¡Œå¯¦è¸çš„æ·±åˆ‡æ‰¿è«¾è€Œèžåã€‚</p><p>åˆ°2030å¹´ï¼Œæˆ‘å€‘çš„ç›®æ¨™æ˜¯è¿ŽæŽ¥ä¸€ç™¾è¬åæ—…è¡Œè€…ä¾†åˆ°åŸƒåŠï¼Œæ¯ä½æ—…è¡Œè€…éƒ½èƒ½å¸¶è‘—å°é€™ç‰‡å¤è€åœŸåœ°å’Œå…¶ç†±æƒ…äººæ°‘æ›´æ·±åˆ»çš„ç†è§£é›¢é–‹ã€‚</p>',
                    'meta_title' => 'æˆ‘å€‘çš„é¡˜æ™¯â€”â€”åŸƒåŠæ—…éŠæ¥­çš„æœªä¾†',
                    'meta_description' => 'æŽ¢ç´¢æˆ‘å€‘å°‡æ—…è¡Œè€…èˆ‡åŸƒåŠçš„å¿ƒéˆå’Œéˆé­‚è¯ç¹«èµ·ä¾†çš„é¡˜æ™¯ã€‚',
                ],
            ],
            [
                'status' => 4,
                'en' => [
                    'title' => 'Our Services',
                    'slug' => 'our-services',
                    'description' => '<p>We offer a comprehensive range of travel services designed to make your Egyptian adventure seamless and unforgettable. From guided historical tours and Nile cruises to desert safaris and diving expeditions, every experience is tailored to your interests.</p><p>Our dedicated team handles all logistics â€” accommodation, transportation, permits, and expert guides â€” so you can focus on immersing yourself in the magic of Egypt.</p>',
                    'meta_title' => 'Our Services â€” Tours, Cruises & Safaris in Egypt',
                    'meta_description' => 'Browse our full range of Egyptian travel services including guided tours, Nile cruises, and desert adventures.',
                ],
                'zh' => [
                    'title' => 'æˆ‘ä»¬çš„æœåŠ¡',
                    'slug' => 'our-services',
                    'description' => '<p>æˆ‘ä»¬æä¾›å…¨é¢çš„æ—…è¡ŒæœåŠ¡ï¼Œæ—¨åœ¨è®©æ‚¨çš„åŸƒåŠå†’é™©ä¹‹æ—…æ— ç¼ä¸”éš¾å¿˜ã€‚ä»Žå¯¼æ¸¸åŽ†å²æ¸¸å’Œå°¼ç½—æ²³æ¸¸èˆ¹åˆ°æ²™æ¼ æŽ¢é™©å’Œæ½œæ°´è¿œå¾ï¼Œæ¯ä¸€æ¬¡ä½“éªŒéƒ½æ ¹æ®æ‚¨çš„å…´è¶£é‡èº«å®šåˆ¶ã€‚</p><p>æˆ‘ä»¬çš„ä¸“èŒå›¢é˜Ÿå¤„ç†æ‰€æœ‰åŽå‹¤äº‹å®œâ€”â€”ä½å®¿ã€äº¤é€šã€è®¸å¯è¯å’Œä¸“å®¶å¯¼æ¸¸â€”â€”è®©æ‚¨å¯ä»¥ä¸“æ³¨äºŽæ²‰æµ¸åœ¨åŸƒåŠçš„é­”åŠ›ä¸­ã€‚</p>',
                    'meta_title' => 'æˆ‘ä»¬çš„æœåŠ¡â€”â€”åŸƒåŠçš„æ—…æ¸¸ã€æ¸¸èˆ¹å’ŒæŽ¢é™©',
                    'meta_description' => 'æµè§ˆæˆ‘ä»¬å…¨é¢çš„åŸƒåŠæ—…è¡ŒæœåŠ¡ï¼ŒåŒ…æ‹¬å¯¼æ¸¸æ¸¸ã€å°¼ç½—æ²³æ¸¸èˆ¹å’Œæ²™æ¼ æŽ¢é™©ã€‚',
                ],
                'zh-Hant' => [
                    'title' => 'æˆ‘å€‘çš„æœå‹™',
                    'slug' => 'our-services',
                    'description' => '<p>æˆ‘å€‘æä¾›å…¨é¢çš„æ—…è¡Œæœå‹™ï¼Œæ—¨åœ¨è®“æ‚¨çš„åŸƒåŠå†’éšªä¹‹æ—…ç„¡ç¸«ä¸”é›£å¿˜ã€‚å¾žå°ŽéŠæ­·å²éŠå’Œå°¼ç¾…æ²³éŠèˆ¹åˆ°æ²™æ¼ æŽ¢éšªå’Œæ½›æ°´é å¾ï¼Œæ¯ä¸€æ¬¡é«”é©—éƒ½æ ¹æ“šæ‚¨çš„èˆˆè¶£é‡èº«å®šåˆ¶ã€‚</p><p>æˆ‘å€‘çš„å°ˆè·åœ˜éšŠè™•ç†æ‰€æœ‰å¾Œå‹¤äº‹å®œâ€”â€”ä½å®¿ã€äº¤é€šã€è¨±å¯è­‰å’Œå°ˆå®¶å°ŽéŠâ€”â€”è®“æ‚¨å¯ä»¥å°ˆæ³¨æ–¼æ²‰æµ¸åœ¨åŸƒåŠçš„é­”åŠ›ä¸­ã€‚</p>',
                    'meta_title' => 'æˆ‘å€‘çš„æœå‹™â€”â€”åŸƒåŠçš„æ—…éŠã€éŠèˆ¹å’ŒæŽ¢éšª',
                    'meta_description' => 'ç€è¦½æˆ‘å€‘å…¨é¢çš„åŸƒåŠæ—…è¡Œæœå‹™ï¼ŒåŒ…æ‹¬å°ŽéŠéŠã€å°¼ç¾…æ²³éŠèˆ¹å’Œæ²™æ¼ æŽ¢éšªã€‚',
                ],
            ],
            [
                'status' => 5,
                'en' => [
                    'title' => 'Meet the Team',
                    'slug' => 'meet-the-team',
                    'description' => '<p>Behind every unforgettable journey is a team of passionate professionals. Our guides are licensed Egyptologists with deep knowledge of ancient history, our operations team ensures flawless logistics, and our customer care specialists are available around the clock.</p><p>We are proud to be a diverse team of Egyptians and international experts united by a shared love for this remarkable country.</p>',
                    'meta_title' => 'Meet the Team â€” Expert Guides & Travel Specialists',
                    'meta_description' => 'Meet the dedicated team of Egyptologists, guides, and travel specialists behind our tours.',
                ],
                'zh' => [
                    'title' => 'è®¤è¯†æˆ‘ä»¬çš„å›¢é˜Ÿ',
                    'slug' => 'meet-the-team',
                    'description' => '<p>æ¯ä¸€æ¬¡éš¾å¿˜çš„æ—…ç¨‹èƒŒåŽéƒ½æœ‰ä¸€æ”¯å……æ»¡çƒ­æƒ…çš„ä¸“ä¸šå›¢é˜Ÿã€‚æˆ‘ä»¬çš„å¯¼æ¸¸æ˜¯æŒç‰ŒåŸƒåŠå­¦å®¶ï¼Œå¯¹å¤ä»£åŽ†å²æœ‰æ·±å…¥äº†è§£ï¼Œæˆ‘ä»¬çš„è¿è¥å›¢é˜Ÿç¡®ä¿ 完善çš„åŽå‹勤ä¿éšœï¼Œæˆ‘ä»¬çš„å®¢æˆ·å…³æ€€ä¸“å‘˜å…¨å¤©å€™ä¸ºæ‚¨æœåŠ¡ã€‚</p><p>æˆ‘ä»¬æ˜¯ä¸€æ”¯ç”±åŸƒåŠäººå’Œå›½é™…ä¸“å®¶ç»„æˆçš„å¤šå…ƒåŒ–å›¢é˜Ÿï¼Œå› å¯¹è¿™ç‰‡éžå‡¡åœŸåœ°çš„å…±åŒçƒ­çˆ±è€Œå›¢ç»“åœ¨ä¸€èµ·ã€‚</p>',
                    'meta_title' => 'è®¤è¯†æˆ‘ä»¬çš„å›¢é˜Ÿâ€”â€”ä¸“å®¶å¯¼æ¸¸å’Œæ—…è¡Œä¸“å‘˜',
                    'meta_description' => 'è®¤è¯†æˆ‘ä»¬æ—…æ¸¸å›¢é˜ŸèƒŒåŽçš„åŸƒåŠå­¦å®¶ã€å¯¼æ¸¸å’Œæ—…è¡Œä¸“å‘˜ã€‚',
                ],
                'zh-Hant' => [
                    'title' => 'èªè­˜æˆ‘å€‘çš„åœ˜éšŠ',
                    'slug' => 'meet-the-team',
                    'description' => '<p>æ¯ä¸€æ¬¡é›£å¿˜çš„æ—…ç¨‹èƒŒå¾Œéƒ½æœ‰ä¸€æ”¯å……æ»¿ç†±æƒ…çš„å°ˆæ¥­åœ˜éšŠã€‚æˆ‘å€‘çš„å°ŽéŠæ˜¯æŒç‰ŒåŸƒåŠå­¸å®¶ï¼Œå°å¤ä»£æ­·å²æœ‰æ·±å…¥äº†è§£ï¼Œæˆ‘å€‘çš„é‹ç‡Ÿåœ˜éšŠç¢ºä¿ 完善çš„å¾Œå‹¤ä¿éšœï¼Œæˆ‘å€‘çš„å®¢æˆ¶é—œæ‡·å°ˆå“¡å…¨å¤©å€™ç‚ºæ‚¨æœå‹™ã€‚</p><p>æˆ‘å€‘æ˜¯ä¸€æ”¯ç”±åŸƒåŠäººå’Œåœ‹éš›å°ˆå®¶çµ„æˆçš„å¤šå…ƒåŒ–åœ˜éšŠï¼Œå› å°é€™ç‰‡éžå‡¡åœŸåœ°çš„å…±åŒç†±æ„›è€Œåœ˜çµåœ¨ä¸€èµ·ã€‚</p>',
                    'meta_title' => 'èªè­˜æˆ‘å€‘çš„åœ˜éšŠâ€”â€”å°ˆå®¶å°ŽéŠå’Œæ—…è¡Œå°ˆå“¡',
                    'meta_description' => 'èªè­˜æˆ‘å€‘æ—…éŠåœ˜éšŠèƒŒå¾Œçš„åŸƒåŠå­¸å®¶ã€å°ŽéŠå’Œæ—…è¡Œå°ˆå“¡ã€‚',
                ],
            ],
        ];
    }
}
