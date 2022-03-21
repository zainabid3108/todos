<?php

namespace App\Http\Controllers;

use App\Todo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TodoController extends Controller
{
    function store(Request $request)
    {

            $data = $request->all();

            $name = $data['name'];
            $deadline = $data['deadline'];
            $timeszone = $data['timezone'];

            $todo = new Todo;

            $todo->name = $name;
            $todo->deadline = Carbon::parse($deadline, $timeszone)->setTimezone('UTC');
            $todo->timezone = $timeszone;

            $todo->save();

            return redirect()->route('get-todos');
    }
    function todos()
    {
        $ip = $_SERVER['REMOTE_ADDR']; //"189.240.194.147"; //101.50.127.255 //49.15.255.255 //$_SERVER['REMOTE_ADDR']
        $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
        $ipInfo = json_decode($ipInfo);
        $timezone = $ipInfo->timezone;
        date_default_timezone_set($timezone);
        $timeszone = date_default_timezone_get();

        $todos= Todo::all();
        if(!empty($todos))
        {
            $i = 0;
            foreach($todos as $row)
            {
                $todos[$i]->deadline = Carbon::createFromFormat('Y-m-d H:i:s', $row->deadline, 'UTC')
                ->setTimezone($timeszone);
            $i++;
            }
        }

        return view('todo', compact('todos', 'timeszone'));
    }

}
