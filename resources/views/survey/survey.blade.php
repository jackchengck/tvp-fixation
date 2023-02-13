<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$business->title}} {{$business->lang=='zh'?'客戶跟進表':'Customer Follow up Questionnaire'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    @include("components.navbar",['business'=>$business,'si'=>$si])
    <div class="container mt-3 ">
        <div class="row justify-content-center mb-4">
            <h2 class="text-center mb-2">{{$business->lang=='zh'?'客戶跟進表':'Customer Follow up Questionnaire'}}</h2>
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card p-3 col-md-8">
                    <form name="customer-survey-form" id="customer-survey-form" method="post"
                          action="{{url('store-customer-survey')}}">
                        @csrf
                        <div class="container  pt-3">
                            <input type="text" hidden id="business" name="business" value={{$business->id}}>
                            <div class="mb-3">
                                <label for="occupation"
                                       class="form-label">{{$business->lang=='zh'?'職業':'Occupation'}} <span
                                        style="color: red">*</span></label>
                                <select name="occupation" id="occupation" class="form-select">
                                    <option selected disabled>職業</option>
                                    <option value="公務員">公務員</option>
                                    <option value="無業">無業</option>
                                    <option value="退休人士">退休人士</option>
                                    <option value="學生">學生</option>
                                    <option value="零售及服務">零售及服務</option>
                                    <option value="飲食">飲食</option>
                                    <option value="運輸、物流及維修">運輸、物流及維修</option>
                                    <option value="地產及金融">地產及金融</option>
                                    <option value="娛樂及藝術">娛樂及藝術</option>
                                    <option value="教育及社福">教育及社福</option>
                                    <option value="行政、保安、建造">行政、保安、建造</option>
                                    <option value="其他">其他</option>
                                </select>
                                {{--                                <input class="form-control" type="text" id="occupation" name="occupation">--}}
                            </div>
                            <div class="mb-3">
                                <label for="age_group"
                                       class="form-label">{{$business->lang=='zh'?'年齡組別':'Age Group'}} <span
                                        style="color: red">*</span></label>
                                {{--                                <input class="form-control" type="text" id="customer_name" name="customer_name">--}}
                                <select name="age_group" id="age_group" class="form-select">
                                    <option selected disabled>年齡組別</option>
                                    <option value="15-20">15-20</option>
                                    <option value="21-30">21-30</option>
                                    <option value="31-40">31-40</option>
                                    <option value="41-50">41-50</option>
                                    <option value="其他">其他</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="district"
                                       class="form-label">{{$business->lang=='zh'?'地區':'District'}} <span
                                        style="color: red">*</span></label>
                                {{--                                <input class="form-control" type="text" id="customer_name" name="customer_name">--}}
                                <select name="district" id="district" class="form-select">
                                    <option selected disabled>地區</option>
                                    <option value="中西區">中西區</option>
                                    <option value="灣仔">灣仔</option>
                                    <option value="東區">東區</option>
                                    <option value="南區">南區</option>
                                    <option value="深水埗">深水埗</option>
                                    <option value="油尖旺">油尖旺</option>
                                    <option value="九龍城">九龍城</option>
                                    <option value="黃大仙">黃大仙</option>
                                    <option value="觀塘">觀塘</option>
                                    <option value="沙田">沙田</option>
                                    <option value="大埔">大埔</option>
                                    <option value="北區">北區</option>
                                    <option value="元朗">元朗</option>
                                    <option value="屯門">屯門</option>
                                    <option value="西貢">西貢</option>
                                    <option value="離島">離島</option>
                                    <option value="荃灣">荃灣</option>
                                    <option value="葵青">葵青</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="other"
                                       class="form-label">{{$business->lang=='zh'?'其他意見':'Others'}}</label>
                                <textarea class="form-control" id="other" name="other"></textarea>
                            </div>
                            <input type="submit" class="form-control mb-5">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    @livewireScripts--}}
</body>
</html>
