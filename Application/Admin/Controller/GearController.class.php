<?php
namespace Admin\Controller;
use Think\Controller;
class GearController extends CommonController {
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
    	$gear = M('gear');
    	//实例化分页类(总数据条数，每页数据条数)
    	$page = new \Think\Page($gear->count(),9);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
    	$this->assign('show',$page->show());
    	$data = $gear->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('data',$data);
    	$this->display();
    }

   public function add()
   {

     $this->display();
   }

   public function insert()
   {

        $config = array(
                'rootPath' => 'Public/',
                'savePath' => 'Uploads/',
                'exts'     => array('gif','png','jpg')
        );
        $upload = new \Think\Upload($config);

        // 2.执行图片上传
        $info = $upload->uploadOne($_FILES['image']);

        // 3. 判断图片是否上传成功
        if ($info) {
            // 只需要从Public的下一级目录开始存储
            $_POST['image'] = $info['savepath'].$info['savename'];
            $_POST['addtime'] = time();
            // 4.实例化Model类
            $gear = M('gear');
            // 5.创建数据对象
            $res = $gear->create();

            // 6.判断
            if ($res) {
                // 7.执行添加操作
                $r = $gear->add();
                if ($r) {
                    $this->redirect('Gear/index');
                } else {
                    $this->error('error',U('Gear/add'),3);
                }
            } else {
                $this->error($gear->getError());
            }
        } else {
            $this->error($upload->getError());
        }
    }

    public function edit($id)
    {
        $gear=M('gear');
        $data=$gear->find($id);
        $this->assign('data',$data);
        $this->display();
    }

    public function update()
    {
        $config = array(
                'rootPath' => 'Public/',
                'savePath' => 'Uploads/',
                'exts'     => array('gif','png','jpg')
            );
        if(!empty($_FILES)){
            if($_FILES['image']['error'] != 4){
                $upload = new \Think\Upload($config);
                // 2.执行图片上传
                $info = $upload->uploadOne($_FILES['image']);

                // 3. 判断图片是否上传成功
                if ($info) {
                    // 只需要从Public的下一级目录开始存储
                    $_POST['image'] = $info['savepath'].$info['savename'];
                } else {
                    $this->error($upload->getError());
                }
            }
        }
        // 4.实例化Model类
        $gear = M('gear');
        // 5.创建数据对象
        $res = $gear->create();
        // 6.判断
        if ($res) {
            // 7.执行添加操作
            $r = $gear->save();
            if ($r) {
                $this->redirect('Gear/index');
            } else {
                $this->error('error',U('Gear/add'),3);
            }
        } else {
            $this->error($gear->getError());
        }
    }

    public function  del($id)
    {
        $gear=M('gear');
        $res=$gear->delete($id);
        if ($res) {
            $this->redirect('Gear/index');
        }else{
             $this->success('error!!',U('Gear/index'),2);
        }
    }


}