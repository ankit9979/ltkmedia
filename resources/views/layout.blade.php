<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FullStack Engineer, PHP : Ankit Jogani 25-5-2022 : 10:31 AM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style>
            .second-content{
                margin-top: 20px;
            }
            .mg-10
            {
                margin-bottom: 5px;
            }
        </style>

    </head>
    <body>
        <div class="col-md-12">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
