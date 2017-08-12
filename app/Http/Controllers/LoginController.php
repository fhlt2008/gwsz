<?php

namespace App\Http\Controllers;

use App\Http\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Classes\PHPExcel;
use Maatwebsite\Excel\Excel;

require_once 'resources/org/Code.class.php';

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function verify(Request $request)
    {
        $name = $request->user;
        $pwd = $request->pwd;
        $code = strtoupper($request->code);
        if($code != strtoupper(session('code')))
        {
            return view('login',['info'=>'验证码输入错误！']);

        }
        $verify = admin::where([['name',$name],['pwd',$pwd]])->first();
        //$verify = DB::table('admin')->where([['name',$name],['pwd',$pwd]])->first();
        if(null == $verify)
        {
            return view('login',['info'=>'用户或密码错误！']);

        }
        else
        {
            session(['data'=>$verify['attributes']]);
            return redirect()->route('index');
        }
        /*if (1<=$verify['id'])
        {
            //echo "登录成功!";
            session(['admin'=>$name]);
            return redirect()->route('index');
        }
        else{
            //echo "<script>alert('用户或密码错误!')</script>";
            return redirect()->route('login');
        }*/

    }

    /*
     * @param null
     * @return image
     *
     */
    public function getCode(){
        try{
            $code = \Code::getInstance();
            $code->doimg();
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
    }



    public function index()
    {
        return view('login',['info'=>null]);
    }


    public function logout()
    {
        session(['data'=>null]);
        return redirect()->route('login');
    }

    public function datainfo(){
        dd($_POST['detail']);
    }
}
