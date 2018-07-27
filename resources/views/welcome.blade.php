@extends('layouts.master')

@section('title')
    News
@endsection
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                //font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            /* .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            } */

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Welcome to NBA App
                </div>
                <p><a href="/news">Enter here</a></p>
            </div>
        </div>
    </body>
</html>
