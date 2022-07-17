<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Menus\AllSubMenu;
use App\Models\Menus\MenuPermission;
use App\Models\Menus\Submenu;
use Illuminate\Http\Request;

class MenuDataController extends Controller
{
    //
    public function allPermissions($id)
    {
        $MenuPermissions = MenuPermission::where('teacher_id', $id)->get();
        return $MenuPermissions;
    }

    public function store(Request $request)
    {
        $submenu = AllSubMenu::find($request->submenu_id);
        $route = $submenu->route;
        $menu_id = $submenu->menu->id;
        $MenuPermission = new MenuPermission();
        $MenuPermission->menu_id = $menu_id;
        $MenuPermission->route = $route;
        $MenuPermission->submenu_id = $request->submenu_id;
        $MenuPermission->teacher_id = $request->teacher_id;

        if ($MenuPermission->save()) {
            return response("success")->status(200);
        }
        return response('failed')->status(404);
    }

    public function destroy(Request $request)
    {
        $submenu_id = $request->submenu_id;
        $teacher_id = $request->teacher_id;
        $menuPermission = MenuPermission::where('submenu_id', $submenu_id)->where('teacher_id', $teacher_id)->first();
        if ($menuPermission->delete()) {
            return response("Success")->status(200);
        }
        return response('failed')->status(404);
    }
}
