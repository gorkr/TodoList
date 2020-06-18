<?php

namespace App\Http\Controllers;

use App\homepage;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class MyController extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function loginCheck(Request $request){
        $name = $request->get('name');
        $password = $request->get('password');
        $email = $request->get('email');

        $users = User::all();
        $flag = false;
        foreach ($users as $user){
            if ($user->name == $name && $user->password == $password && $user-> email ==$email){
                $flag = true;
            }
        }
        if ($flag){
            Session::put('name',$name);
            return redirect("/loginSuccess");
        }else{
            print ("登录失败,请");
            print ("<a href='login'>重新登录</a>！");
        }
    }


    public function add(Request $request){
        $var = User::create([
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'email' => $request->get('email')
        ]);
        if ($var){
            return redirect('/login');
        }else{
            dump("aaa");
        }

    }

    public function loginSuccess(Request $request){
        $name = Session::get('name');
        $data = DB::table('homepage')->where('name',$name)->orWhere('share','like','%'.$name.'%')->paginate(100);
        return view('homepage',compact('data'));
    }

    public function insert(){
        return view('insert');
    }

    public function insert_homepage(Request $request){
        $name = Session::get('name');
        $work = $request->get('work');
        $status = $request->get('status');
        $share = $request->get('share');
        $result = homepage::create(['name'=>$name,'work' => $work, 'status' => $status, 'share' => $share.' ']);
        if ($result){
            //添加成功
            return redirect("/loginSuccess");
        }else{
            //添加失败
            print ("添加失败,请");
            print ("<a href='insert'>重新添加</a>！");
        }
    }
    public function out(){
        //return view('login'); 路径不变
        return redirect('login');
    }

    public function update_homepage(Request $request){
        $id = $request->get('id');
        Session::put('id',$id);
        $data = homepage::find($id);
        return view('update_homepage',compact('data'));
    }

    public function update_homepage_op(Request $request){
        $id = Session::get('id');
        $work = $request->get('work');
        $status = $request->get('status');
        $share = $request->get('share');
        homepage::where('id', $id) -> update(['work' => $work, 'status' => $status, 'share' => $share.' ']);
        return redirect("/loginSuccess");
    }

    public function delete_homepage(Request $request){
        $id = $request->get('id');
        $result = homepage::where('id', $id)->delete();
        if ($result){
            return redirect("/loginSuccess");
        }else{
            print ("删除失败,请");
            print ("<a href='loginSuccess'>重新删除</a>！");
        }
    }






}
