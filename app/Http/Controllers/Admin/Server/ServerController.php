<?php

namespace App\Http\Controllers\Admin\Server;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $list = Server::all();
        return view('bankend.admin.server.list',[
            'list'=>$list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('bankend.admin.server.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $exitServer = Server::where('name',$request->name)->first();
        if($exitServer){
           
            return redirect()->back()->with("error"," server đã tồn tại");

        }
        $request->validate([
            'name' => 'required',
        ],[
            "name"=>"Không được bỏ chống tên server"
        ]);

        $data = $request->all();
        $server = new Server();
        $server->name = $data['name'];
        $server->slug = $data['slug'];
        $server->status = $data['status'];
     
        $server->save();

        if($server){
            return redirect()->back()->with("success","Thêm server thành công");
        }
        return redirect()->back()->with('error','Thêm server thật bại');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $list_edit = Server::find($id);
        return view('bankend.admin.server.edit',[
            'list_edit'=>$list_edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $server =  Server::find($id);
        $server->name = $data['name'];
        $server->slug = $data['slug'];
        $server->status = $data['status'];
        $server->save();

        if($server){
            return redirect()->back()->with("success","Sửa mới danh mục thành công");
        }
        return redirect()->back()->with('error','Sửa mới danh mục thật bại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $server = Server::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa Thành Công');

    }
}
