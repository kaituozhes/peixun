<?php
namespace Admin\Controller;
use Think\Controller;

class GroupController extends CommonController
{
	/*
	* 用户权限展示
	*/
	public function index(){
		$auth = M('authcate');
		$group = M('auth_group');
		$data = $group->select();
		foreach ($data as $k => $v) {
			if(strstr($v['group_list'],',')){
				$aid = explode(',',$v['group_list']);
				foreach ($aid as $v) {
					$aname = $auth->where(array('id'=>$v))->find();
					$agname .= $aname['authcate_name'].' ';
				}
				$data[$k]['group_list'] = $agname;
				$agname = '';//放空自我
			}
		}
		$this->assign('data',$data);
		$this->display();
	}


	/**
		用户权限写入
	**/
	public function add(){
		if(!IS_POST){
			$auth = M('authcate');
			$data = $auth->select();
			$this->assign('data',$data);
			$this->display();
		}else{
			
			$group = M('auth_group');
			$aid = I('post.aid');
			$_POST['group_list'] = implode(',',$aid);
			$_POST['entrytime'] = time();
			$create = $group->create();
			if($create){
				$add = $group->add();
				if($add){
					$this->redirect('group/index');
				}else{
					$this->error('修改出错');
				}
			}else{
				$this->error($group->geterror());
			}
		}
		
	}

	/**
		用户组的编辑
	**/
	public function edit(){
		if(!IS_POST){
			$id = I('get.id');
			$group = M('auth_group');
			$group_data = $group->where(array('group_id'=>$id))->find();
			if(strstr($group_data['group_list'],',')){
				$group_data['group_list'] = explode(',',$group_data['group_list']);
				$group_data['is_array'] = 1;
			}

			$this->assign('group_data',$group_data);
			//权限分类
			$auth = M('authcate');
			$data = $auth->select();
			var_dump($group_data);exit;
			$this->assign('data',$data);
			$this->display();
		}else{
			$group = M('auth_group');
			$aid = I('post.aid');
			$_POST['group_list'] = implode(',',$aid);
			$create = $group->create();
			if($create){
				$save = $group->save();
				if($save){
					$this->redirect('group/index');
				}else{
					$this->error('修改出错');
				}
			}else{
				$this->error($group->geterror());
			}
		}
	}

	/**
		用户组的删除
	**/
	public function delete(){
		$id = I('id');
		$group = M('auth_group');
		$arr = array("id"=>$id);
		$res = $group->delete($arr);
		if($res){
			$this->redirect('group/index');
		}else{
			$this->error('删除失败');
			// redirect(U('Admin/Group/index'));
		}
	}
}