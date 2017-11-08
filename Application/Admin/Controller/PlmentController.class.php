<?php
namespace Admin\Controller;
use Think\Controller;
use Org\LAMP\CatTree;
/**
 * 配置支付方式
 * 
 */
class PlmentController extends CommonController {

	public function index()
	{
		$plment = M('plemnt');
		$data = $plment->select();
		$this->assign('data',$data);
		$this->display();
	}

	public function add()
	{
		if(!IS_POST){
			$this->display();
		}else{
			$plment = M('plment');
			if(!empty($_FILES)){
				if($_FILES['logo']['error'] != 4){
					$config = array(
		                'rootPath' => 'Public/',
		                'savePath' => 'Uploads/',
		                'exts'     => array('gif','png','jpg')
			        );
			        $upload = new \Think\Upload($config);
			        $info = $upload->uploadOne($_FILES['logo']);
			        if($info){
			        	$_POST['logo'] = $info['savepath'].$info['savename'];
			        }else{
			        	$this->error($upload->geterror());
			        }
				}
			}
			$_POST['pladdtime'] = time();
			$create = $plment->create();
			if($create){
				$add = $plment->add();
				if($add){
					$this->redirect("plment/index");
				}else{
					$this->error("数据格式有误,请重试!!");
				}
			}else{
				$this->error("数据格式有误,请重试!!!");
			}
		}
	}

	public function edit()
	{
		if(!IS_POST){
			$this->display();
		}else{
			$plment = M('plment');
			if(!empty($_FILES)){
				if($_FILES['logo']['error'] != 4){
					$config = array(
		                'rootPath' => 'Public/',
		                'savePath' => 'Uploads/',
		                'exts'     => array('gif','png','jpg')
			        );
			        $upload = new \Think\Upload($config);
			        $info = $upload->uploadOne($_FILES['logo']);
			        if($info){
			        	$_POST['logo'] = $info['savepath'].$info['savename'];
			        }else{
			        	$this->error($upload->geterror());
			        }
				}
			}
			$create = $plment->create();
			if($create){
				$add = $plment->save();
				if($add){
					$this->redirect("plment/index");
				}else{
					$this->error("数据格式有误,请重试!!");
				}
			}else{
				$this->error("数据格式有误,请重试!!!");
			}
		}
	}

	public function del()
	{
		$plment = M('plment');
		$id = I('get.id');
		$del = $plemnt->delete($id);
		if($del){
			$this->redirect("plment/index");
		}else{
			$this->error("敏感操作,请稍候重试!!");
		}
	}
}
