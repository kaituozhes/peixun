<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 用户管理
 * 
 */
class UserController extends CommonController {
        public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['Administrator'])){
            $this->redirect('Login/login');
        }
        elseif($_SESSION['Administrator']['ugroup']==1)
        {
            $this->redirect('Login/login');       
        }
    }
    public function index(){
    	$user = M('user');
    	//实例化分页类(总数据条数，每页数据条数)
    	$page = new \Think\Page($user->count(),5);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
    	$this->assign('show',$page->show());
    	$data = $user->limit($page->firstRow,$page->listRows)->where(array('agency_id'=>0))->select();
    	$this->assign('data',$data);
    	$this->display();
    }
    public function add(){
        if(!IS_POST){
            $this->display();
        }else{
            if(!empty($_FILES)){
                if($_FILES['userimg']['error'] != 4){
                    $config = array(
                        'rootPath'  => 'Public/',
                        'savePath'  => 'Uploads',
                        'exts'      => array('gif','png','jpg')
                        );
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadOne($_FILES['userimg']);
                    if($info){
                        $_POST['userimg'] = $info['savepath'].$info['savename'];
                    }else{
                        $this->error($upload->getError());
                    }
                }
            }
            $_POST['password'] = md5(I('post.password'));
            $_POST['agency_id'] = 0;
            $_POST['ugroup'] = 2;
            $_POST['useraddtime'] = time();
            $user = M('user');
            $res = $user->create();
            if($res){
                $da = $user->add();
                if($da){
                    $this->redirect('User/index');
                }else{
                    $this->error('添加用户失败',U('User/add'),1);
                }
            }else{
                    $this->error($gear->getError());
            }
        } 
    }
    public function edit($id){
        $user = M('user');
        $data = $user->find($id);
        if(!IS_POST){    
            $this->assign('data',$data);
            $this->display();
        }else{
            if(!empty($_FILES)){
                if($_FILES['userimg']['error'] != 4){
                    $config = array(
                        'rootPath'  => 'Public/',
                        'savePath'  => 'Uploads',
                        'exts'      => array('gif','png','jpg')
                        );
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadOne($_FILES['userimg']);
                    if($info){
                        $_POST['userimg'] = $info['savepath'].$info['savename'];
                    }else{
                        $this->error($upload->getError());
                    }
                }
            }
            if($data['password'] != I('post.password')){
                $_POST['password'] = md5(I('post.password'));
            }
            $_POST['ugroup'] = 2;
            $_POST['useraddtime'] = time();
            $user = M('user');
            $res = $user->create();
            if($res){
                $da = $user->save();
                if($da){
                    $this->redirect('User/index');
                }else{
                    $this->error('添加用户失败',U('User/add'),1);
                }
            }else{
                    $this->error($gear->getError());
            }
        }
        
    }
    public function del($id){
        $user = M('user');
        $res = $user->delete($id);
        if($res){
            $this->redirect('User/index');
        }else{
            $this->error('删除用户失败',U('User/index'),1);
        }
    }
}