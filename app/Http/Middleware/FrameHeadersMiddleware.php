<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;

    class FrameHeadersMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
         * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
         */
        public function handle(Request $request, Closure $next)
        {
            $response = $next($request);

            $dict = [
                'jnjtrading.epochal-tech-hk.com'     => 'https://jjtrading.ibusiness.com.hk/',
                'jnjtrading.localhost'               => 'https://jjtrading.ibusiness.com.hk/test',
                'tastydiner.futurustechshk.com'      => 'https://tastydiner.ibusiness.com.hk/',
                'kobayashiramen.epochal-tech-hk.com' => 'https://kobayashi.ibusiness.com.hk/',
                'guardwell.gosmartltdhk.com'         => 'https://guardwellmall.ibusiness.com.hk/',
            ];


            $getHost = request()->getHost();
            foreach ($dict as $key => $value) {
                if ($getHost == $key) {
//                $response->header('X-Frame-Options', 'ALLOW FROM https://jjtrading.ibusiness.com.hk/');
                    $response->headers->set('X-Frame-Options', 'ALLOW FROM ' . $value, true);
                }
            }

//            if ($getHost == 'jnjtrading.epochal-tech-hk.com') {
////            if ($getHost == 'jnjtrading.localhost') {
////                $response->header('X-Frame-Options', 'ALLOW FROM https://jjtrading.ibusiness.com.hk/');
//                $response->headers->set('X-Frame-Options', 'ALLOW FROM https://jjtrading.ibusiness.com.hk/', true);
//            }

            return $response;
        }
    }
