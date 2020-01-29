
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
              height: 100vh;
              margin: 0;
            }

            .full-height {
              background-image: url("mychili.jpg");
              background-size: 100%;
              /* background-color: #000; */
              color: #636b6f;
              font-family: 'Nunito', sans-serif;
              font-weight: 200;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }


            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 24px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .title {
              font-size: 84px;
              color: white;
              font-weight: 600;
              text-transform: uppercase;
            }

            .btn-get-started {
              background-color: #cf0c0c;
              color: white;
              height: 75px;
              font-size: 20px;
              font-weight: 600;
              padding-left: 25px;
              padding-right: 25px;
              border: 0;
              border-radius: 25px;
            }


        </style>
    </head>


    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif



            <div class="content">

                <div class="title m-b-md">
                    My Chili Recipe
                </div>

                <button type="button" class="btn btn-get-started">
                  GET STARTED
                </button>



            </div>
        </div>

    </body>
</html>
