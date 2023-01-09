<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{--    <link rel="stylesheet"--}}
    {{--          href="https://fonts.googleapis.com/css?family=Noto+Sans+TC">--}}

    <style>

        @font-face {
            font-family: NotoSansTC;
            src: url('{{ public_path('fonts/NotoSansTC.otf') }}') format('opentype');
        }

        @font-face {
            font-family: NotoSansTCBold;
            src: url('{{ public_path('fonts/NotoSansTC_Bold.otf') }}') format('opentype');
        }
    </style>

    <style type="text/css">

        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            /*font-family: PMingLiU, STKaiti, Verdana, Arial, sans-serif;*/
            font-family: NotoSansTC, Verdana, Arial, sans-serif;
            /*font-family: source-han-sans-traditional,sans-serif;*/
            font-weight: 400;
            font-style: normal;
        }

        h1, h2, h3, h4, h5, h6, p {
            margin: 1px;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
            /*font-family: 'NotoSans TC' !important;*/
        }

        tfoot tr td {
            /*font-weight: bold;*/
            font-size: x-small;
            /*font-family: 'notosanstc';*/
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #60A7A6;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }

        .invoice table {
            margin: 15px auto;
            border-collapse: collapse;
        }

        /*.invoice table, */
        .invoice td, .invoice th {
            border: 1px #555555 solid;

        }

        .invoice th {
            text-align: left;
            background: #EEEEEE;
            padding: 5px;
        }

        .invoice td {
            padding: 5px;

        }

        .remark table {
            padding: 10px;
        }

        .remark td {
            padding: 5px;
        }

        .remark td.title {
            text-align: right;
        }

        .company_name {

        }
    </style>
    @yield('css')
</head>
<body>
    @section('body')
    @show
    <div class="information" style="position: absolute; bottom: 0;">
        <table width="100%">
            <tr>
                <td align="left" style="width: 50%;">
                    &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
                </td>
                <td align="right" style="width: 50%;">
                    {{$curUser->business->title}}
                    {{--                Company Slogan--}}
                </td>
            </tr>

        </table>
    </div>
</body>
</html>
