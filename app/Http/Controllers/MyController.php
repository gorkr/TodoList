<?php

namespace App\Http\Controllers;

use App\homepage;
use App\TodoList;
use App\User;
use App\Friend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class MyController extends Controller
{

    public function login(){
        session_start();
        return view('login');
    }

    public function logon(){
        return view('logon');
    }

    // 验证账户密码 并 跳转到 homepage
    public function loginCheck(Request $request){
        $name = $request->get('name');
        $password = $request->get('password');
        $users = User::all();
        $flag = false;

        foreach ($users as $user){
            if ($user->password == $password
            && ($user->email == $name || $user->name == $name)){
                $flag = true;
            }
        }
        if ($flag){ // 密码正确
            Session::put('name',$name);
            $_SESSION['userName'] = $name;
            return redirect("/homepage");
        }else{  // 密码错误
            dump("password incorrect");
            return redirect("/login");

        }
    }

    // 注册用户
    public function add(Request $request){

        $name = $request->get('name');
        $password =  $request->get('password');
        $email = $request->get('email');
        // 验证用户是否已存在
        $flag = DB::table('user')->where('name', $name);

        if(!$flag){  // 用户不存在
            User::create([
                'name' => $name,
                'password' => $password,
                'email' => $email
            ]);
            return redirect('/login');
        } else{  // 用户已存在
            dump("user had been registered!");
            return redirect('/logon');
        }

    }

    // 个人主页
    // todo: 增加好友系统
    public function homepage(Request $request){
    if (!isset($_SESSION['name'])) {  // 防止直接登录
        header("Location:login.php");}
        $name = Session::get('name');
        $data = DB::table('homepage')->where('name',$name)->orWhere('share','like','%'.$name.'%')->paginate(100);
        return view('homepage',compact('data'));
    }

    // 添加List的页面
    public function insert(){
        $name = Session::get('name');
        $friends = DB::table('friend')->where('name', $name)->paginate(100);
       return view('insert', compact('friends'));
    }

    // 创建一个List
    public function insert_homepage(Request $request){
        $name = Session::get('name');
        $work = $request->get('work');
//        $status = $request->get('status');
        $status = 'Start';
        $share = $request->get('Share');
        $result = homepage::create(['name'=>$name,'work' => $work, 'status' => $status, 'share' => $share.' ']);
        if ($result){
            //添加成功
            return redirect("/homepage");
        }else{
            //添加失败
            print ("添加失败,请");
            print ("<a href='insert'>重新添加</a>！");
        }
    }

    // 登出
    public function out(){
        return redirect('login');
    }

    // 修改list页面
    public function edit(Request $request){
        $id = $request->get('id');
        Session::put('id',$id);
        $data = homepage::find($id);
        return view('edit',compact('data'));
    }

    public function update_homepage_op(Request $request){
        $id = Session::get('id');
        $work = $request->get('work');
        $status = $request->get('status');
        $share = $request->get('share');
        homepage::where('id', $id) -> update(['work' => $work, 'status' => $status, 'share' => $share.' ']);
        return redirect("/homepage");
    }

    public function delete_homepage(Request $request){
        $id = $request->get('id');
        $result = homepage::where('id', $id)->delete();
        if ($result){
            return redirect("/homepage");
        }else{
            print ("删除失败,请");
            print ("<a href='homepage'>重新删除</a>！");
        }
    }

    public function accept(Request $request){
        $name = Session::get('name');
        $id = $request->get('id');

        //创建用户
        $var = homepage::find($id);
        $share = $var->share;

        if (strpos($share,$name.'已接受 ') !== false){

        }elseif (strpos($share,$name.'未接受 ') !== false){
            $str = str_replace($name.'未接受 ', $name.'已接受 ', $share);
            homepage::where('id',$id) -> update(['status'=>'Start','share'=>$str]);
        }else{
            $str = str_replace($name, $name.'已接受 ', $share);
            homepage::where('id',$id) -> update(['status'=>'Start','share'=>$str]);
        }
        return redirect("/homepage");
    }
    public function un_accept(Request $request){
        $name = Session::get('name');
        $id = $request->get('id');

        //创建用户
        $var = homepage::find($id);
        $share = $var->share;

        if (strpos($share,$name.'未接受 ') !== false){

        }elseif (strpos($share,$name.'已接受 ') !== false){
            $str = str_replace($name.'已接受 ', $name.'未接受 ', $share);
            homepage::where('id',$id) -> update(['status'=>'待接受','share'=>$str]);
        }else{
            $str = str_replace($name, $name.'未接受 ', $share);
            homepage::where('id',$id) -> update(['status'=>'待接受','share'=>$str]);
        }
        return redirect("/homepage");
    }

    public function todo(Request $request){
        $id = $request->get('id');
        Session::put('id',$id);
        return redirect('todolist');
    }

    public function todolist(Request $request){
        $id = Session::get('id');
        $name = Session::get('name');
        if (Session::has('Start')){
            $data = DB::table('todolist')->where('homeid',$id)->where('status','Start')->paginate(100);
            Session::forget('Start');
        }elseif (Session::has('End')){
            $data = DB::table('todolist')->where('homeid',$id)->where('status','End')->paginate(100);
            Session::forget('End');
        }else{
            $data = DB::table('todolist')->where('homeid',$id)->paginate(100);
        }
        $friend = DB::table('friend')->where('name', $name)->get();

        $s_name = $request->get('name');
        $s_email = $request->get('email');
        if ($s_name || $s_email){
            Session::put('s_name',$s_name);
            Session::put('s_email',$s_email);
            if (!$s_email){
                $s_email = '无名氏';
            }
            if (!$s_name){
                $s_name = '123@qq.com';
            }
            $user = DB::table('user')->where('name', 'like', '%' . $s_name . '%')->orwhere('email', 'like', '%' . $s_email . '%')->get();
            return view('todolist',compact('data','friend','user'));
        }else {
            $user = false;
            return view('todolist', compact('data', 'friend','user'));
        }
    }

    public function add_list(){
        return view('add_list');
    }

    public function add_list_op(Request $request){
        $id = Session::get('id');
        $item = $request->get('item');
        $status = $request->get('status');
        $result = Todolist::create(['item' => $item, 'status' => $status, 'homeid' => $id]);
        if ($result){
            return redirect('todolist');
        }else{
            print ("添加失败,请");
            print ("<a href='add_list'>重新添加</a>！");
        }
    }

    public function listall(){
        return redirect('todolist');
    }

    public function ing(){
        Session::put('Start','Start');
        return redirect('todolist');
    }
    public function listend(){
        Session::put('End','End');
        return redirect('todolist');
    }
    public function dellistend(){
        Todolist::where('status','End')->delete();
        return redirect('todolist');
    }

    public function update_list(Request $request){
        $id = $request->get('id');
        $data = Todolist::find($id);
        return view('update_list',compact('data'));

    }
    public function update_list_op(Request $request){
        $id = $request->get('id');
        $item = $request->get('item');
        $status = $request->get('status');
        Todolist::where('id',$id)->update(['item'=>$item,'status'=>$status]);
        return redirect('todolist');
    }

    public function delete_list(Request $request){
        $id = $request->input('uid');
        Todolist::where('id',$id)->delete();
        return redirect('todolist');
    }
    public function add_friend(Request $request){
        $name = Session::get('name');
        $friend = $request->get('friend');
        Friend::create(['name'=>$name,'friend'=>$friend]);
        return redirect('todolist');
    }

    public function delete_friend(Request $request){
        $id = $request->get('id');
        Friend::where('id',$id)->delete();
        return redirect('todolist');
    }

}
