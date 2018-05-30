<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
    public function index($id = null) {
        if ($id == null) {
            return hpl_subCateAll(Menu::orderBy('id', 'asc')->get());
        } else {
            return $this->show($id);
        }
    }
    
    public function store(Request $request) {
        $menu = new Menu;
        $menu->name = $request->input('name');
        $menu->parent_id = $request->input('parent-id');
        $menu->save();
        return 'Đã thêm Menu' . $menu->name;
    }

    public function show($id) {
        return Menu::find($id);
    }

    public function update(Request $request, $id) {
        $menu = Menu::find($id);
        $menu->name = $request->input('name');
        $menu->parent_id = $request->input('parent_id');
        $menu->save();
        return "Cập nhật thành công";
    }

    public function destroy(Request $request, $id) {
        $menu = Menu::find($id);
        $menu->delete();
        return "Xóa thành công";
    }
}
