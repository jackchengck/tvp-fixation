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
            'cheungfat.bingo-hk-tech.com/livewire',
            'wishflowershop.bingo-hk-tech.com/livewire',
            'lokyiu.epochal-tech-hk.com/livewire',
            'deargems.epochal-tech-hk.com/livewire',
            'bethlehem.epochal-tech-hk.com/livewire',
            'chongqingwahsun.epochal-tech-hk.com/livewire',
            'hangseon.epochal-tech-hk.com/livewire',
            'kobayashiramen.epochal-tech-hk.com/livewire',
            'jnjtrading.epochal-tech-hk.com/livewire',
            'pollylawbeauty.futurustechshk.com/livewire',
            'vsbeauty.futurustechshk.com/livewire',
            'skylineproducts.futurustechshk.com/livewire',
            'auntiesweet.futurustechshk.com/livewire',
            'nicolebeauty.futurustechshk.com/livewire',
            'imtgroup.futurustechshk.com/livewire',
            'tastydiner.futurustechshk.com/livewire',
            'wahyuendessert.futurustechshk.com/livewire',
            'guardwell.gosmartltdhk.com/livewire',
            'newyanrestaurant.iitdhk.com/livewire',
            'tongyanfong.iitdhk.com/livewire',
            'chungwahcentury.iitdhk.com/livewire',
            'wallenjewellery.iitdhk.com/livewire',
            'jarvistreatment.iitdhk.com/livewire',
            'avlhk.iitdhk.com/livewire',
            'inglasses.iitdhk.com/livewire',
            'reneebeauty.lotechsolutionshk.com/livewire',
            'wingyatlighting.lotechsolutionshk.com/livewire',
            'cyclepet.lotechsolutionshk.com/livewire',
            'mokchi.lotechsolutionshk.com/livewire',
            'manakamana.lotechsolutionshk.com/livewire',
            'salaamnamaste.lotechsolutionshk.com/livewire',
            'genesisdream.lotechsolutionshk.com/livewire',
            'happyyi.lotechsolutionshk.com/livewire',
            'kaifai.lotechsolutionshk.com/livewire',
            'superdongenesis.lotechsolutionshk.com/livewire',
            'shanmuk.ctcfuture.com/livewire',
            'artofcrystal.ctcfuture.com/livewire',
            'chcrystal.ctcfuture.com/livewire',
            'ajfithub.ctcfuture.com/livewire',
            'sunkee.ctcfuture.com/livewire',
            'apyramidra.ctcfuture.com/livewire',
            'hoishing.varomatic-hk.com/livewire',
            'mouseworkshop.varomatic-hk.com/livewire',
            'hkrinternationaltrading.benison.tech/livewire',
            'wellchamp.benison.tech/livewire',
            'gracejade.chispashk.com/livewire',
            'papermax.gosmartltdhk.com/livewire',
            'graceplover.china-net-hk.com/livewire',
            'beautyplace.futurustechshk.com/livewire',
            'eastasia.gosmartltdhk.com/livewire',
            'wongsnoodle.chispashk.com/livewire',
            'deluxbeauty.deluxbeauty.shop/livewire',
            'flowermoon.melaleucahk.co/livewire'
        ];
    }
