<?php
namespace Admin\Controller;
use Think\Controller;
class StoregearController extends Controller {
   public function index(){
    	$sgear = M('sgear');
    	//实例化分页类(总数据条数，每页数据条数)
    	$page = new \Think\Page($sgear->count(),2);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme',"共 %TOTAL_ROW% 条记录 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"
);
    	$this->assign('show',$page->show());
    	$data = $sgear->field('shop_sgear.*,shop_store.trade')->table('shop_sgear,shop_store')->where("shop_sgear.tid = shop_store.id")->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('data',$data);
    	$this->display();
    }

   public function add()
   {
    $id = I('get.id');
    $this->assign('id',$id);
    $this->display();
   }
   public function insert()
   {
    $config = array(
                'rootPath' => 'Public/',
                'savePath' => 'Uploads/',
                'exts'     => ['gif','png','jpg']
            );
        $upload = new \Think\Upload($config);

        // 2.执行图片上传
        $info = $upload->uploadOne($_FILES['image']);

        // 3. 判断图片是否上传成功
        if ($info) {
            // 只需要从Public的下一级目录开始存储
            $_POST['image'] = $info['savepath'].$info['savename'];
            // 4.实例化Model类
            $sgear = M('sgear');
            // 5.创建数据对象
            $res = $sgear->create();

            // 6.判断
            if ($res) {
                // 7.执行添加操作
                $r = $sgear->add();
                if ($r) {
                    $this->success('ok',U('Storegear/index'),2);
                } else {
                    $this->error('error',U('Storegear/add'),3);
                }
            } else {
                $this->error($sgear->getError());
            }
        } else {
            $this->error($upload->getError());
        }
    }

    public function edit($id)
    {
        $sgear=M('sgear');
        $data=$sgear->find($id);
        $this->assign('data',$data);
        $this->display();
    }

    public function update()
    {
        $config = array(
                'rootPath' => 'Public/',
                'savePath' => 'Uploads/',
                'exts'     => ['gif','png','jpg']
            );
        $upload = new \Think\Upload($config);

        // 2.执行图片上传
        $info = $upload->uploadOne($_FILES['image']);

        // 3. 判断图片是否上传成功
        if ($info) {
            // 只需要从Public的下一级目录开始存储
            $_POST['image'] = $info['savepath'].$info['savename'];
            // 4.实例化Model类
            $sgear = M('sgear');
            // 5.创建数据对象
            $res = $sgear->create();
            // 6.判断
            if ($res) {
                // 7.执行添加操作
                $r = $sgear->save();
                if ($r) {
                    $this->success('ok',U('Storegear/index'),2);
                } else {
                    $this->error('error',U('Storegear/add'),3);
                }
            } else {
                $this->error($gear->getError());
            }
        } else {
            $this->error($upload->getError());
        }
    }

    public function  del($id)
    {
        $sgear=M('sgear');
        $res=$sgear->delete($id);
        if ($res) {
            $this->success('ok!!',U('Storegear/index'),2);
        }else{
             $this->success('error!!',U('Storegear/index'),2);
        }
    }


}