<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        <div>
            @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif

        @if(isset($error))
            {{ $error }}
        @endif
            <form method="post" action="{{ route('admin') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="text" name="email" placeholder="Admin Email"><br>
                <input type="password" name="password" placeholder="Password"> <br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
