<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequentlyAskedQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faqs = [
            [
                "question" => "我在網上商店購買商品並選擇送貨上門，需時多久才會收到商品？",
                "answer" => "本公司會於確認訂單後2個工作日內將商品寄出。閣下的商品將經由順豐速運派送至閣下提供的地址。配送時間根據順豐快遞情況為準。貨物寄出後，如有任何疑問或需要，請致電 (852) 2730 0273與順豐速運客戶服務聯繫 。"
            ],

            [
                "question" => "我在網上商店購買商品並選擇自取服務，該如何領取商品？",
                "answer" => "本公司會於確認訂單後向閣下發出一封訂單確認電郵，當訂單確認後，請閣下再自行前往預約頁面選擇到店取貨時間，預約成功後憑二維碼到店即可取貨。本公司取貨服務時間：週一至週五：中午12時至下午7時；週六：中午12時至下午3時；週日及公眾假期休息"
            ],


            [
                "question" => "當我落單後，可否取消訂單或更改訂單內容？",
                "answer" => "本公司確認訂單後，閣下不可取消或更改訂單。若有關商品因缺貨或其他原因導致無法交付，本公司會替閣下取消訂單，屆時本公司會通知閣下並安排退款或更改訂單內容。"
            ],

            [
                "question" => "若我收貨後發現商品有問題，可以退貨或退款嗎？",
                "answer" => "本公司售賣的所有商品均提供「七天非人為損壞質素保證」，即收貨後七天內，若閣下發現商品出現問題，請聯絡我們作進一步跟進。一旦核實商品並非人為損壞而出現問題，本公司會安排更換相同商品或向閣下退款。"
            ],

            [
                "question" => "我可以在網上商店內預留商品嗎？",
                "answer" => "若有關商品在網上商店內顯示「預購／需等2-3天」，即代表可供閣下預購商品，若顯示「缺貨」，則本公司未能為閣下預留商品。"
            ],

            [
                "question" => "如何追蹤訂單狀態？",
                "answer" => "閣下登入手機應用程式後，點選「帳戶」->「訂單紀錄」，即可查看現時訂單狀態。"
            ],

            [
                "question" => "我已經在網上落單，為何我收不到任何通知？",
                "answer" => "本公司會於確認訂單後向閣下發出一封訂單確認電郵，若未收到通知，請先查看電郵內的垃圾郵件，以及登入手機應用程式查看有否成功落單，如有任何疑問，請聯絡本公司作進一步查詢。"
            ],

            [
                "question" => "我可以更改已確認訂單的送貨地址或更改取貨方式嗎？",
                "answer" => "本公司確認訂單後，閣下是不可以更改送貨地址或更改取貨方式。"
            ],

            [
                "question" => "如何更新我的個人／聯絡資料？",
                "answer" => "閣下登入手機應用程式後，點選「帳戶」->「帳號編輯」，即可更新個人／聯絡資料。"
            ],

            [
                "question" => "我在瀏覽網上商店時發現喜愛的商品，如何保存紀錄供再次查閱？",
                "answer" => "閣下可於商品欄內點按「心心」圖案，即可將商品收藏，並可於「帳戶」->「收藏清單」查閱相關紀錄。"
            ],

        ];

        $businesses = Business::all();


        foreach ($businesses as $business) {
            foreach ($faqs as $faq) {
                DB::table('frequently_asked_questions')->insert([
                    ...$faq,
                    'business_id' => $business->id,
                ]);
            }
        }
    }
}
