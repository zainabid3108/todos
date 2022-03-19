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
            <form method="post" action="{{ route('store-todo') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="timezone" id="timezone" value="{{ $timeszone }}" >

                <input type="text" required name="name" placeholder="name"><br>
                <input type="datetime-local" required name="deadline" placeholder="date time"> <br>

                <input type="submit" value="Submit">
            </form>
        </div>
        <div style="margin-top:20px;">
            <table>
                <tr>
                    <td>Title</td>
                    <td>Deadline</td>
                </tr>

                @if(!empty($todos))
                @foreach($todos as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->deadline }}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </body>
</html>
