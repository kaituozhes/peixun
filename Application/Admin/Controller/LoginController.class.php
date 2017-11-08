<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login()
    {
    	$this->display();
    }
    public function dologin()
    {
    	$username=I('post.username');
        $password=md5(I('post.password'));
        $user=M('user');
        $login_data = array('username'=>$username,'password'=>$password);
        $userinfo=$user->where($login_data)->find();
        if(empty($userinfo)){
            $this->error('请输入正确的账号密码！',U('Login/login'),2);
        }elseif($userinfo['ugroup']==1){
            /*$this->error('对不起！您不适合登录后台。！！',U('Login/login'),2);*/
            $_SESSION['Administrator']=$userinfo;
                

             $this->redirect('Subject/lst');
          
        }elseif($userinfo['ugroup']==2){
            //存入塞申！
             $_SESSION['Administrator']=$userinfo;
             $this->redirect('Index/index');
        }
    }

     public function out(){
    	session(null);
    	$this->redirect('Login/login');
    }
   
}