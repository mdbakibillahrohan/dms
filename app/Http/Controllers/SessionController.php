<?php

namespace App\Http\Controllers;

use App\Models\Student\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function showform()
    {
        return view('global.session.add_session');
    }
    public function show()
    {
        $Sessions = Session::all();
        return view('global.session.list_session', ['Sessions' => $Sessions]);
    }

    public function create(Request $request)
    {
        $session = new Session();
        $session->name = $request->name;
        $session->desc = $request->desc;
        if ($session->save()) {
            $notification = [
                "message" => "Successfully inserted session into database",
                "type" => "success"
            ];
            session()->flash('notification', $notification);
            return back();
        }
        $notification = [
            "message" => "Error occured",
            "type" => "warning"
        ];
        session()->flash('notification', $notification);
        return back();
    }
}
