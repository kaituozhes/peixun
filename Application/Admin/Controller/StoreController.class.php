<?php
namespace Admin\Controller;
use Think\Controller;
class StoreController extends Controller {
   public function index(){
    	$user = M('store');
    	//实例化分页类(总数据条数，每页数据条数)
         $trade=$_GET['trade'];
        $where['trade']=array('like','%'.$trade.'%');
    	$page = new \Think\Page($user->where($where)->count(),5);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme',"共 %TOTAL_ROW% 条记录 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"
);
    	$this->assign('show',$page->show());
    	$data = $user->where($where)->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('data',$data);
    	$this->display();
    }

    public function add()
    {
    	$this->display();
    }
   	public function insert()
   	{
        header('content-type:text/html;charset=utf-8');
   		$store=M('store');

             $config = array(
                'rootPath' => 'Public/',
                'savePath' => 'Uploads/',
                'exts'     => ['gif','png','jpg']
            );
        $upload = new \Think\Upload($config);

        // 2.执行图片上传
        $info = $upload->uploadOne($_FILES['logo']);

        // 3. 判断图片是否上传成功
        if ($info) {
            // 只需要从Public的下一级目录开始存储
            $_POST['logo'] = $info['savepath'].$info['savename'];
            $res = $store->create();
            // 6.判断
            if ($res) {
            // 7.执行添加操作
                $r = $store->add();
                if ($r) {
                    $this->success('ok',U('store/index'),2);
                } else {
                    $this->error('error',U('store/add'),3);
                }

            } else {
             $this->error($store->getError());
                }
        } else {
            $this->error($upload->getError());
        }
            
   	}

    public function del($id)
    {
    	$store=M('store');
    	$res=$store->delete($id);
    	if($res){
    		$this->success('删除成功',U('Store/index'),2);
    	}else{
    		$this->error('删除失败',U('Store/index'),2);
    	}
    }

    public function edit($id)
    {
    	$store=M('store');
    	$data=$store->find($id);
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
        $info = $upload->uploadOne($_FILES['logo']);

        // 3. 判断图片是否上传成功
        if ($info) {
            // 只需要从Public的下一级目录开始存储
            $_POST['logo'] = $info['savepath'].$info['savename'];
            // 4.实例化Model类
            $store = M('store');
            // 5.创建数据对象
            $res = $store->create();
            // 6.判断
            if ($res) {
                // 7.执行添加操作
                $r = $store->save();
                if ($r) {
                    $this->success('ok',U('store/index'),2);
                } else {
                    $this->error('error',U('store/add'),3);
                }
            } else {
                $this->error($store->getError());
            }
        } else {
            $this->error($upload->getError());
        }
    }
	
}