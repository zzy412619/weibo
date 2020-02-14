<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;


class StatusesController extends Controller
{
    //用Auth中间件来过滤，用户登录后才能执行创建和删除操作
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);
        session()->flash('success', '发布成功！');
        return redirect()->back();
    }
}
 