<?php

namespace App\Http\Controllers\Universal;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ClassRooms = ClassRoom::paginate(3);
        return view('global.class.class_room.all_class_room', ['ClassRooms' => $ClassRooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('global.class.class_room.add_class_room');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Room = new ClassRoom();
        $Room->class_room_no = $request->room_no;
        $Room->class_room_desc = $request->description;
        if ($Room->save()) {
            $notification = [
                "message" => "Successfully added into database",
                "type" => "success"
            ];
            session()->flash('notification', $notification);
            return back();
        }
        $notification = [
            "message" => "Error Occured",
            "type" => "warning"
        ];
        session()->flash('notification', $notification);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $classRoom = ClassRoom::find($id);
        $classRoom->class_room_no = $request->room_no;
        $classRoom->class_room_desc = $request->description;

        if ($classRoom->update()) {
            $notification = [
                "message" => "Successfully updated into database",
                "type" => "success"
            ];
            session()->flash('notification', $notification);
            return back();
        }
        $notification = [
            "message" => "Error Occured",
            "type" => "warning"
        ];
        session()->flash('notification', $notification);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classRoom = ClassRoom::find($id);
        if ($classRoom->delete()) {
            $notification = [
                "message" => "Successfully deleted into database",
                "type" => "success"
            ];
            session()->flash('notification', $notification);
            return back();
        }
        $notification = [
            "message" => "Error Occured",
            "type" => "warning"
        ];
        session()->flash('notification', $notification);
        return back();
    }
}
