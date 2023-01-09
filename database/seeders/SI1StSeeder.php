<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SI1StSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sis = [
            "Bingo (HK)",
            "Epochal Tech Holding Limited",
            "Futurus Innovations Limited",
            "Gosmart Limited",
            "Isaac IT Development Company",
            "Lloyds Oyman Technology Solutions Limited",
            "CTC Future Limited",
            "Varomatic Limited",
            "Benison IT Solutions Limited",
        ];

        $domains = [
            "bingo-hk-tech.com",
            "epochal-tech-hk.com",
            "futurustechhk.com",
            "gosmartltdhk.com",
            "iitdhk.com",
            "lotechsolutionshk.com",
            "ctcfuture.com",
            "varomatic-hk.com",
            "benison.tech",
        ];

        $businesses = [
            "祥發搬屋（香港）有限公司",
            "心願花藝設計",
            "洛瑤⼯程公司",
            "Dear. Gems",
            "百利⾏控股有限公司",
            "重慶華神麻辣火煱",
            "恒信紡織有限公司",
            "小林札幌拉麵",
            "J&J貿易公司",
            "Polly Law Beauty Centre",
            "VS Beauty & Slimming Limited",
            "Skyline Products Limited",
            "甜姨姨有限公司 ",
            "Nicole Beauty Limited",
            "IMT Group Limited",
            "滋味食堂",
            "華園甜品專家",
            "嘉和⽔電鎖類⼯程公司 ",
            "New Yan Restaurant Company Limited ",
            "唐⼈坊泰式海南雞餐廳",
            "中華世紀實業有限公司",
            "Wallen Jewellery Company Limited",
            "Jarvis Treatment Center Limited",
            "Absolute Vitality Limited",
            "潮眼鏡 ",
            "Renee Beauty Group Limited",
            "永逸燈飾",
            "⽝寶寶寵物美容店",
            "Mokchi Digital Limited ",
            "Manakamana Nepali Restaurant",
            "Salaam Namaste",
            "Genesis Dream Group Limited ",
            "Happy Yi Company Limited ",
            "佳輝飲食有限公司 ",
            "Genesis Dream Food And Beverage Limited",
            "⼭⽊傢俬有限公司 ",
            "晶藝軒精品公司",
            "聚靈軒⽔晶店 ",
            "AJ Fithub Limited",
            "新記鹵味 ",
            "Apyramidra Company Limited ",
            "海城中⻄葯⾏ ",
            "Mouse Workshop ",
            "柏奇國際集團貿易有限公司",
            "薈銓同沁教育有限公司",
        ];

        $emails = [
            "info@cheungfat.net",
            "wish.flower.info@gmail.com",
            "lokyiu.hk@gmail.com",
            "info.deargems@gmail.com",
            "sales@bethlehem-hk.com",
            "info.Hot.hotpot@gmail.com",
            "info@hstl-hk.com",
            "kobayashsappororamen@gmail.com",
            "cs.J.JTrading@gmail.com",
            "info.pollylawbeauty@gmail.com",
            "vsbeautyjd@gmail.com",
            "cs.skylineproduct@gmail.com",
            "Auntie.Sweet.info@gmail.com",
            "info.NicoleBeauty01@gmail.com",
            "cs.imt.group@gmail.com",
            "james.tastydiner@gmail.com",
            "Wahyuendessertspk@gmail.com",
            "info@guard-well.com",
            "restaurant.newyan@gmail.com",
            "tongyanfong@gmail.com",
            "info.chungwah@gmail.com",
            "info.Wallen.Jewellery@gmail.com",
            "jarvistcl007@gmail.com",
            "cs.avl.hk@gmail.com",
            "in.glasses@yahoo.com",
            "cs.renee.beauty@gmail.com ",
            "info.wingyatlighting@gmail.com",
            "info.cyclepet@gmail.com",
            "hk.mokchi@gmail.com",
            "cs.Manakamana@gmail.com",
            "order.SalaamNamaste@gmail.com",
            "info.genesisdream@gmail.com",
            "happyyi.ltd@gmail.com",
            "easythai.kaifai@gmail.com",
            "superdon.genesis@gmail.com",
            "admin2@shan-muk.com",
            "Artofcrystal.info@gmail.com",
            "c.h.crystal.shop@gmail.com",
            "Cs.ajfithub@gmail.com",
            "info.sunkee@gmail.com",
            "info.adprymidria@gmail.com",
            "info.hoishing@gmail.com",
            "Info.mouseworkshop@gmail.com",
            "info.hk.r.it@gmail.com",
            "cs.wellchamp.coheart@gmail.com",
        ];

        $contacts = [
            "61656161",
            "96787090",
            "97797832",
            "66446673",
            "24049081",
            "94873666",
            "39968100",
            "67016689",
            "97741717",
            "94399414",
            "63388655",
            "91931118",
            "25086962",
            "66881308",
            "66280115",
            "94655937",
            "68033296",
            "23313828",
            "39564838",
            "98723878",
            "23162388",
            "28902286",
            "31049283",
            "23078933",
            "67627444",
            "97048733",
            "24071683",
            "28121618",
            "61613628",
            "23852070",
            "24471401",
            "91857085",
            "67075828",
            "98777987",
            "61571922",
            "97504576",
            "96460706",
            "21211301",
            "60197911",
            "27898298",
            "39562369",
            "27554572",
            "29470737",
            "69006680",
            "53013943",
        ];

        $subdomains = [
            "cheungfat",
            "wishflowershop",
            "lokyiu",
            "deargems",
            "bethlehem",
            "chongqingwahsun",
            "hangseon",
            "kobayashiramen",
            "jnjtrading",
            "pollylawbeauty",
            "vsbeauty",
            "skylineproducts",
            "auntiesweet",
            "nicolebeauty",
            "imtgroup",
            "tastydiner",
            "wahyuendessert",
            "guardwell",
            "newyanrestaurant",
            "tongyanfong",
            "chungwahcentury",
            "wallenjewellery",
            "jarvistreatment",
            "avlhk",
            "inglasses",
            "reneebeauty",
            "wingyatlighting",
            "cyclepet",
            "mokchi",
            "manakamana",
            "salaamnamaste",
            "genesisdream",
            "happyyi",
            "kaifai",
            "superdongenesis",
            "shanmuk",
            "artofcrystal",
            "chcrystal",
            "ajfithub",
            "sunkee",
            "apyramidra",
            "hoishing",
            "mouseworkshop",
            "hkrinternationaltrading",
            "wellchamp",
        ];

        $siId = [
            "2",
            "2",
            "3",
            "3",
            "3",
            "3",
            "3",
            "3",
            "3",
            "4",
            "4",
            "4",
            "4",
            "4",
            "4",
            "4",
            "4",
            "5",
            "6",
            "6",
            "6",
            "6",
            "6",
            "6",
            "6",
            "7",
            "7",
            "7",
            "7",
            "7",
            "7",
            "7",
            "7",
            "7",
            "7",
            "8",
            "8",
            "8",
            "8",
            "8",
            "8",
            "9",
            "9",
            "10",
            "10",
        ];

        $accounts = [
            "jQWrfAdmin",
            "yrMchAdmin",
            "zBbJfAdmin",
            "fBOpZAdmin",
            "SXJZSAdmin",
            "emwPEAdmin",
            "ASxaeAdmin",
            "MiBuwAdmin",
            "mZvSxAdmin",
            "HSVmjAdmin",
            "aSaKEAdmin",
            "gEjoIAdmin",
            "yLfpvAdmin",
            "GCvkfAdmin",
            "wowNoAdmin",
            "axbMaAdmin",
            "FEetkAdmin",
            "gUeryAdmin",
            "GRIKKAdmin",
            "SzrSLAdmin",
            "nvGAGAdmin",
            "dsCagAdmin",
            "aDuaLAdmin",
            "BrpTEAdmin",
            "zqBSxAdmin",
            "wzDOcAdmin",
            "KAWSjAdmin",
            "QMYUjAdmin",
            "pLiXJAdmin",
            "XEjbAAdmin",
            "BHsmjAdmin",
            "fMirjAdmin",
            "OidmEAdmin",
            "gfdTwAdmin",
            "kPFuHAdmin",
            "MiGHcAdmin",
            "mZUroAdmin",
            "lDpjQAdmin",
            "CYSZkAdmin",
            "MZKqmAdmin",
            "LGGVBAdmin",
            "vCTMcAdmin",
            "uCRHvAdmin",
            "CzGtDAdmin",
            "bmewVAdmin",
        ];

        $passwords = [
            "7JGmDSAU",
            "GevbBnlz",
            "Lec0Ke38",
            "2e9kPs8f",
            "slT4Ub4G",
            "vjfkki3W",
            "RLD7ZnWL",
            "LOhytbXh",
            "OG7Q0Is7",
            "FUSUZbni",
            "bcXLZlkY",
            "z8XO3U55",
            "x7XwNzTm",
            "mR306aGm",
            "MNLgfZBJ",
            "5Zbh0Dfa",
            "ZKPDZQ9O",
            "C0YcWpoX",
            "8ykw1wtN",
            "gtUIsrYG",
            "8etRzm3H",
            "E1X3rMYv",
            "U8JC4u5V",
            "adJRVvT5",
            "QHvPRt75",
            "XGQvgFzP",
            "6jRTdp2O",
            "i8X1bNCi",
            "qLbmepIN",
            "Ol2u1htp",
            "gvQ0IGtn",
            "BK0oWsof",
            "An7LyNKD",
            "3Xn8Qhga",
            "S0LfResZ",
            "x1eCsKtk",
            "8Wnm9wXC",
            "xw43ZCbG",
            "z3MCu9GD",
            "aC2vMC4X",
            "Ecfy9S0D",
            "Fz2Lezev",
            "72Q1uLpm",
            "2TCnHiMu",
            "hFavDja6",
        ];

        $services = [
            ["全屋搬運服務", "傢私搬運服務",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約到店諮詢",],
            ["預約到店諮詢", "批發協商預約",],
            ["批發協商預約",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約（1-2人）", "預約（3-4人）",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約推廣療程試做",],
            ["預約推廣療程試做",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約推廣療程試做",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約到店諮詢",],
            ["預約到店諮詢",],
            ["預約到店諮詢", "預約推廣療程試做",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約到店諮詢", "預約維修",],
            ["預約推廣療程試做",],
            ["批發協商預約",],
            ["批發協商預約", "寵物美容（貓）預約", "寵物美容（狗）預約",],
            ["預約維修",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["批發協商預約",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約到店諮詢", "批發協商預約",],
            ["預約試堂",],
            ["預約（1-2人）", "預約（3-4人）", "預約（5-6人）",],
            ["預約到店諮詢", "批發協商預約",],
            ["批發協商預約", "中醫診症預約",],
            ["Design consulting",],
            ["預約到店諮詢", "批發合作討論預約", "貼膜",],
            ["預約試堂",],
        ];

        $supplierProducts = [
            [["title" => "紙箱", "email" => "daniel.carton@gmail.com", "products" => ["大號", "中號", "小號",],],],
            [["title" => "包裝", "email" => "Jackie.chowlk@gmail.com", "products" => ["大", "中", "小",],], ["title" => "花", "email" => "candyfu.flower@gmail.com", "products" => ["配花", "主花",],],],
            [["title" => "油漆", "email" => "audreanne32@ruecker.com.hk", "products" => ["白", "灰", "黑",],], ["title" => "建材2", "email" => "ygutkowski@yahoo.com", "products" => ["英泥", "大釘",],],],
            [["title" => "水晶", "email" => "irenebibibi@gmail.com", "products" => ["冰種海藍寶8mm", "密髮級鈦晶8mm", "黑金太陽石10mm",],],],
            [["title" => "有機食材", "email" => "alford.dicki@mills.com", "products" => ["台灣梅子釀製酒", "台灣鳳梨釀製酒", "桂花蘋果釀造醋",],], ["title" => "酒水", "email" => "kamille69@hotmail.com.hk", "products" => ["以色列紅葡萄酒",],],],
            [["title" => "凍肉", "email" => "skiles.bertrand@lowe.com.hk", "products" => ["牛腩", "雞子", "豬皮",],], ["title" => "菜", "email" => "sales.chunjaifreshfood@gmail.com", "products" => ["生菜", "白菜仔",],],],
            [["title" => "布", "email" => "zebert@reinger.com.hk", "products" => ["R0078", "Y390",],],],
            [["title" => "凍肉", "email" => "rodriguez.lucile@hotmail.com.hk", "products" => ["豬骨(5斤)", "豬軟骨", "雞中翼",],], ["title" => "油/醬", "email" => "cmayer@yahoo.com", "products" => ["純正麻油", "特級辣醬",],],],
            [["title" => "包裝", "email" => "wsipes@kling.com", "products" => ["大", "中", "小",],], ["title" => "衫", "email" => "kylekoreanpro@gmail.com", "products" => ["韓國針織女裝冷衫 (啡)", "韓國針織女裝冷衫 (白)",],],],
            [["title" => "精華補充", "email" => "brandy80@moore.biz", "products" => ["大", "中", "小",],],],
            [["title" => "精華補充", "email" => "brandy80@moore.biz", "products" => ["大", "中", "小",],],],
            [["title" => "suppliment", "email" => "rhianna.schamberger@hotmail.com.hk", "products" => ["維生素D3", "Multi 1 + DHA", "黑籽油膠囊",],], ["title" => "DFS", "email" => "fuyingdfssupply@gmail.com", "products" => ["益生菌-ENHANCE IMMUNITY", "益生菌-SUPPORT IMMUE",],],],
            [["title" => "調味", "email" => "cmayer@yahoo.com", "products" => ["韓國白砂糖", "泰國椰汁", "淡奶",],], ["title" => "生果", "email" => "kaiji28thaifruit@gmail.com", "products" => ["芒果", "榴槤",],],],
            [["title" => "精華補充", "email" => "stanton.candida@yahoo.com", "products" => ["大", "中", "小",],],],
            [["title" => "素", "email" => "hfeeney@hotmail.com.hk", "products" => ["素蠔仔", "素花枝丸", "素叉燒",],], ["title" => "菜", "email" => "yuhong.naturalveges@gmail.com", "products" => ["白菜", "苦瓜",],],],
            [["title" => "凍肉", "email" => "rmayer@klein.com", "products" => ["牛腩", "鳳爪", "雞軟骨",],], ["title" => "油/醬", "email" => "tungshingfood@gmail.com", "products" => ["黃辣椒醬", "芝麻油",],],],
            [["title" => "生果", "email" => "keara.pollich@yahoo.com", "products" => ["木瓜", "芒果", "西瓜",],],],
            [["title" => "建材", "email" => "kaiseryaucontact@gmail.com", "products" => ["日本五合一乳膠漆", "英國包膠銅喉", "食水膠喉",],], ["title" => "浴室配件", "email" => "kwaicheungceramic@gmail.com", "products" => ["TOTO座廁SW781", "TOTO洗手盆",],],],
            [["title" => "凍肉", "email" => "jarod220390@gmail.com", "products" => ["原隻豬手", "駝鳥肉", "鵝腸",],], ["title" => "油/醬", "email" => "faitsunwong@yahoo.com.hk", "products" => ["花生油", "老干媽風味豆豉",],],],
            [["title" => "麵", "email" => "jameslukfood@gmail.com", "products" => ["出前一丁麻油味(餐廳專用)", "東莞米粉", "江西米線",],], ["title" => "肉", "email" => "king17@hotmail.com.hk", "products" => ["牛肉丸", "巴西豬扒",],],],
            [["title" => "金器", "email" => "karamgoldproduct@gmail.com", "products" => ["18k足金手鏈", "999.9黃金金幣", "黃金金粒三錢",],],],
            [["title" => "鑽", "email" => "wdickens@boyle.com", "products" => ["18K紅寶鑽石耳環", "典雅綠寶石鑽石戒指", "黄白分色綠寶鑽石耳環",],], ["title" => "銀", "email" => "jillian51@pacocha.net", "products" => ["925銀飾", "999銀條",],],],
            [["title" => "藥水", "email" => "thomasstyle@gmail.com", "products" => ["1L裝", "3件散裝",],],],
            [["title" => "水機", "email" => "bins.miles@gmail.com", "products" => ["純水RO機", "Micron PP濾芯", "RO膜",],], ["title" => "補充", "email" => "bins.miles@gmail.com", "products" => ["逆止閥", "接駁喉",],],],
            [["title" => "鏡框", "email" => "daiju.contact@gmail.com", "products" => ["藤井黑框001", "藤井藍幼框163",],], ["title" => "鏡片", "email" => "daiju.contact@gmail.com", "products" => ["藤井防藍光", "藤井高透鏡片",],],],
            [["title" => "精華補充", "email" => "vandervort.mae@gmail.com", "products" => ["大", "中", "小",],],],
            [["title" => "陳生", "email" => "fatchan199@gmail.com", "products" => ["麗聲掛鐘style001", "927 星星吊燈",],], ["title" => "黃生", "email" => "kelvinwongwaiyip@gmail.com", "products" => ["304 白水晶吊燈", "305 紅水晶吊燈",],],],
            [["title" => "藥水", "email" => "demetrius.schmitt@moen.com.hk", "products" => ["神仙耳水100ml", "眼藥水100ml",],], ["title" => "Wellnesscore", "email" => "kakapetfood@gmail.com", "products" => ["貓糧-無穀物經典原味配方", "貓糧-海洋魚配方",],],],
            [["title" => "零件", "email" => "wuyunmonitor@qq.com", "products" => ["iPhone 12屏幕總成", "三星S20+屏幕總成",],], ["title" => "Accessories", "email" => "huaxin2002@yahoo.com.cn", "products" => ["iPhone 13 透明軟膠套", "iPhone 13 Pro 全黑硬膠殼",],],],
            [["title" => "Frozen", "email" => "dileitamohamed@gmail.com", "products" => ["Lamb", "Whole Chicken Wings",],], ["title" => "Others ingredients", "email" => "dileitamohamed@gmail.com", "products" => ["masala", "chilli sauce",],],],
            [["title" => "Frozen", "email" => "paul.singh20031130@yahoo.com", "products" => ["ox tongue", "Lamb",],], ["title" => "Others ingredients", "email" => "paul.singh20031130@yahoo.com", "products" => ["masala", "white sugar",],],],
            [["title" => "肉", "email" => "king17@hotmail.com.hk", "products" => ["牛腩", "牛肉丸", "牛柳粒",],], ["title" => "菜", "email" => "yuhong.naturalveges@gmail.com", "products" => ["生菜", "通菜",],],],
            [["title" => "肉", "email" => "johnnyfoodsupply@gmail.com", "products" => ["巴西豬扒", "安格斯肥牛", "豬手",],], ["title" => "油/醬", "email" => "tungshingfood@gmail.com", "products" => ["特級花生油", "豆瓣醬",],],],
            [["title" => "凍肉", "email" => "321thaifoodcs@gmail.com", "products" => ["雞腎", "雞軟骨", "泰式生蝦",],], ["title" => "frozen food", "email" => "cs.yanchihong@gmail.com", "products" => ["春卷", "炸蝦餅",],],],
            [["title" => "魚生", "email" => "king17@hotmail.com.hk", "products" => ["挪威三文魚", "特上油甘魚", "牡丹蝦",],], ["title" => "米", "email" => "hfnrice@gmail.com", "products" => ["特級珍珠米",],],],
            [["title" => "木製廠", "email" => "stokes.august@yahoo.com.hk", "products" => ["梳化K080", "梳化K080-2",],], ["title" => "膠版製廠", "email" => "yungguoplasticcn@qq.com", "products" => ["櫃門P99", "櫃門P100",],],],
            [["title" => "水晶", "email" => "kellyyung8080@gmail.com", "products" => ["紫水晶洞", "原珠",],], ["title" => "天珠", "email" => "bebecfu99@gmail.com", "products" => ["開光", "原珠",],],],
            [["title" => "水晶", "email" => "chunkicrystaldotdot@hotmail.com", "products" => ["髮晶手鏈", "黑曜石", "原珠",],],],
            [["title" => "equipments", "email" => "kiosleungchiho@gmail.com", "products" => ["拳套", "護膝", "護腕",],],],
            [["title" => "肉", "email" => "kaifungfood@yahoo.com.hk", "products" => ["紅腸", "全鴨", "鵝翼",],], ["title" => "蛋", "email" => "tofaieggs@yahoo.com.hk", "products" => ["湖北大啡蛋",],],],
            [["title" => "原料", "email" => "edisonmilestone@gmail.com", "products" => ["Cleaning Card", "Ojo Card", "Nugnokve Card",],], ["title" => "水晶", "email" => "irenebibibi@gmail.com", "products" => ["紫水晶洞", "太陽石",],],],
            [["title" => "藥材", "email" => "takkeeyeung@yahoo.com.hk", "products" => ["紅棗", "花旗蓼", "黨蓼",],], ["title" => "成藥", "email" => "sales.apmedicine@gmail.com", "products" => ["撲熱息痛500mg", "布洛芬200mg",],],],
            [["title" => "foam board", "email" => "tungyuenboard@gmail.com", "products" => ["L", "M", "S",],], ["title" => "陳生紙廠", "email" => "keithpaper@gmail.com", "products" => ["BPC-031", "BPK-330", "LCU-420",],],],
            [["title" => "Rolex-852", "email" => "carl.ling168168@gmail.com", "products" => ["綠水鬼系列", "Rolex Daytona with black diamonds",],], ["title" => "貼膜", "email" => "johnnychanyau@gmail.com", "products" => ["A13-M", "A14-PM",],],],
            [["title" => "教材", "email" => "schamberger.nettie@kuhlman.edu.hk", "products" => ["教材",],],],
        ];


//        $faker = Faker\Factory::create();

        foreach ($sis as $key => $value) {
            DB::table('solution_integrators')->insert([
                "title" => $value,
                "domain" => $domains[$key],
            ]);
        }

        foreach ($businesses as $key => $value) {
            $business_id = DB::table('businesses')->insertGetId([
                "title" => $value,
//                "address" => $faker->address,
                "phone" => $contacts[$key],
                'email' => $emails[$key],
                'solution_integrator_id' => $siId[$key],
                'subdomain' => $subdomains[$key],
            ]);

            $userId = DB::table('users')->insertGetId([
                "name" => $businesses[$key] . " Admin",
                "username" => $accounts[$key],
                "password" => Hash::make($passwords[$key]),
                "business_id" => $business_id,
            ]);

            User::find($userId)->assignRole('superAdmin');

            DB::table('opening_hours')->insert([
                ['day' => '0', 'start' => '10:00', 'end' => '22:00', 'business_id' => $business_id],
                ['day' => '1', 'start' => '10:00', 'end' => '22:00', 'business_id' => $business_id],
                ['day' => '2', 'start' => '10:00', 'end' => '22:00', 'business_id' => $business_id],
                ['day' => '3', 'start' => '10:00', 'end' => '22:00', 'business_id' => $business_id],
                ['day' => '4', 'start' => '10:00', 'end' => '22:00', 'business_id' => $business_id],
                ['day' => '5', 'start' => '10:00', 'end' => '22:00', 'business_id' => $business_id],
                ['day' => '6', 'start' => '10:00', 'end' => '22:00', 'business_id' => $business_id],
            ]);

            $locationId = DB::table('locations')->insertGetId(
                ['title' => 'Warehouse', 'business_id' => $business_id]
            );

            DB::table('locations')->insert(
                ['title' => 'Store', 'business_id' => $business_id]
            );

            foreach ($services[$key] as $service) {
                $serviceId = DB::table('services')->insertGetId([
                        'title' => $service,
                        'cost' => rand(100, 250),
                        'price' => rand(300, 400),
                        'business_id' => $business_id,
                        'division' => 30,
                    ]
                );
                $name = fake()->name;
                for ($x = 0; $x <= rand(1, 4); $x++) {
                    $d = $this->randomDate('2022-12-01', '2022-12-31');
                    DB::table('bookings')->insert([
                        'service_id' => $serviceId,
                        'customer_name' => $name,
                        'customer_email' => 'test@test.com',
                        'customer_phone' => '+85266922577',
                        'customer_password' => '123456',
                        'booking_date' => $d['date'],
                        'booking_time' => $d['time'],
                        'business_id' => $business_id,
                        'order_num' => fake()->ean13(),

                    ]);
                }
                for ($x = 0; $x <= rand(3, 10); $x++) {
                    $d = $this->randomDate('2022-12-01', '2022-12-31');
                    DB::table('bookings')->insert([
                        'service_id' => $serviceId,
                        'customer_name' => fake()->name,
                        'customer_email' => fake()->email,
                        'customer_phone' => '+85266922577',
                        'customer_password' => '123456',
                        'booking_date' => $d['date'],
                        'booking_time' => $d['time'],
                        'business_id' => $business_id,
                        'order_num' => fake()->ean13(),

                    ]);
                }
            }


            foreach ($supplierProducts[$key] as $supplier) {
                $supplierId = DB::table('suppliers')->insertGetId([
                    'name' => $supplier['title'],
                    'email' => $supplier['email'],
                    'business_id' => $business_id,
                ]);
                foreach ($supplier['products'] as $product) {
                    $productId = DB::table('products')->insertGetId([
                        'title' => $product,
                        'cost' => rand(100, 250),
                        'price' => rand(300, 400),
                        'minimum_inventory' => 5,
                        'alert_quantity' => 10,
                        'business_id' => $business_id,
                        'supplier_id' => $supplierId,
                    ]);
                    DB::table('inventory_logs')->insert([
                        'type' => 'move_in',
                        'quantity' => 10,
                        'business_id' => $business_id,
                        'location_id' => $locationId,
                        'product_id' => $productId,
                        'user_id' => $userId,
                    ]);
                    $supplierOrderId = DB::table('supplier_orders')->insertGetId([
                        'supplier_id' => $supplierId,
                        'user_id' => $userId,
                        'business_id' => $business_id,
                    ]);
                    DB::table('supplier_order_items')->insert([
                        'supplier_order_id' => $supplierOrderId,
                        'product_id' => $productId,
                        'quantity' => rand(50, 120),
                    ]);
                }
            }
        };


//        foreach ($accounts as $key => $value) {
//            DB::table('users')->insert([
//                "name" => $businesses[$key] . " Admin",
//                "username" => $value,
//                "password" => Hash::make($passwords[$key]),
//                "business_id" => $key + 3,
//            ]);
//            User::find($key + 3)->assignRole('superAdmin');
//        }

    }

    public function randomDate($start_date, $end_date)
    {
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        $val = rand($min, $max);

        return [
            'date' => date('Y-m-d', $val),
            'time' => date('H:i', $val),
        ];
    }
}
