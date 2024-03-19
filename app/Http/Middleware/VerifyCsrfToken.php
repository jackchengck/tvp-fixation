<?php

    namespace App\Http\Middleware;

    use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

    class VerifyCsrfToken extends Middleware
    {
        /**
         * The URIs that should be excluded from CSRF verification.
         *
         * @var array<int, string>
         */
        protected $except = [
            //
            'cheungfat.bingo-hk-tech.com',
            'wishflowershop.bingo-hk-tech.com',
            'lokyiu.epochal-tech-hk.com',
            'deargems.epochal-tech-hk.com',
            'bethlehem.epochal-tech-hk.com',
            'chongqingwahsun.epochal-tech-hk.com',
            'hangseon.epochal-tech-hk.com',
            'kobayashiramen.epochal-tech-hk.com',
            'jnjtrading.epochal-tech-hk.com',
            'pollylawbeauty.futurustechshk.com',
            'vsbeauty.futurustechshk.com',
            'skylineproducts.futurustechshk.com',
            'auntiesweet.futurustechshk.com',
            'nicolebeauty.futurustechshk.com',
            'imtgroup.futurustechshk.com',
            'tastydiner.futurustechshk.com',
            'wahyuendessert.futurustechshk.com',
            'guardwell.gosmartltdhk.com',
            'newyanrestaurant.iitdhk.com',
            'tongyanfong.iitdhk.com',
            'chungwahcentury.iitdhk.com',
            'wallenjewellery.iitdhk.com',
            'jarvistreatment.iitdhk.com',
            'avlhk.iitdhk.com',
            'inglasses.iitdhk.com',
            'reneebeauty.lotechsolutionshk.com',
            'wingyatlighting.lotechsolutionshk.com',
            'cyclepet.lotechsolutionshk.com',
            'mokchi.lotechsolutionshk.com',
            'manakamana.lotechsolutionshk.com',
            'salaamnamaste.lotechsolutionshk.com',
            'genesisdream.lotechsolutionshk.com',
            'happyyi.lotechsolutionshk.com',
            'kaifai.lotechsolutionshk.com',
            'superdongenesis.lotechsolutionshk.com',
            'shanmuk.ctcfuture.com',
            'artofcrystal.ctcfuture.com',
            'chcrystal.ctcfuture.com',
            'ajfithub.ctcfuture.com',
            'sunkee.ctcfuture.com',
            'apyramidra.ctcfuture.com',
            'hoishing.varomatic-hk.com',
            'mouseworkshop.varomatic-hk.com',
            'hkrinternationaltrading.benison.tech',
            'wellchamp.benison.tech',
            'gracejade.chispashk.com',
            'papermax.gosmartltdhk.com',
            'graceplover.china-net-hk.com',
            'beautyplace.futurustechshk.com',
            'eastasia.gosmartltdhk.com',
            'wongsnoodle.chispashk.com',
            'deluxbeauty.deluxbeauty.shop',
            'flowermoon.melaleucahk.co'
        ];
    }
