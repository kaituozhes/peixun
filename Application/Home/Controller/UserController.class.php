<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
	public function __construct()
	{
		parent::__construct();
		//用户权限组
        $group = M('auth_group');
        $group_data = $group->select();
        $this->assign('group_data',$group_data);
	}
	public function index()
	{

	}
	/*登录方法*/
	public function login()
	{
		if(!IS_POST){
			$this->display();
		}else{
			$username = I('post.username');
			$password = md5(I('post.password'));
			$member = M('member');
			$mem = $member->where(array('member_name'=>$username,'member_password'=>$password))->find();
			if(!empty($mem)){
				$_SESSION['homeuser']  = $mem;
				if($_SESSION['homeuser']){
					$this->redirect("member/index");
				}else{
					$this->error('账号或密码不对');
				}
			}else{
				$this->error('账号或密码不对');
			}
		}

	}
	/*注册方法*/
	public function register()
	{

		if(!IS_POST){
			$this->display();
		}else{

			$member = M('member');
			$_POST['member_password'] = md5(I('post.member_password'));
			$_POST['member_addtime'] = time();
				if(I('post.member_auth') == 2){
					$xueyuan = D('student');
					//根据当前验证码查询当前的成员信息
					$res = $xueyuan->where(array('ids'=>$_POST['code'],'numeric'=>$_POST['number']))->select();
					$_POST['bianhao'] = $res[0][numeric];
					//验证
					$rules = array(
					            array('bianhao','','编号已经存在！请找回',0,'unique',1),
					            array('code','','编号已经存在!请找回',0,'unique',1),
					);

					if($res != null){
					$mem = $member->validate($rules)->create();
			            if($mem){
			                $da = $member->add();
			                if($da){
												//写入状态
												  $data['state'] = 1;
													$xueyuan->where(array('student_id'=>$res[0]['student_id']))->save($data);
			                    $this->success('注册成功','/index.php/Home/user/login');
			                }else{
			                    $this->error('注册失败',U('member/student_add'),1);
			                }
			            }else{
			                    $this->error($member->getError());
			            }

				}
}

				//讲师注册
				if(I('post.member_auth') == 5){
					$jiangshi = D('lecturer');
					/*$res = $jiangshi->where('numbering="'.$_POST['code'].'"')->select();*/

					$res = $jiangshi->where(array('email'=>$_POST['email'],'numbering'=>$_POST['numbering']))->find();

					$_POST['bianhao'] = $res[numbering];
					$_POST['code'] = $_POST['email'];
					$rules = array(
					            array('bianhao','','编号已经存在！请找回',0,'unique',1),
					            array('code','','编号已经存在!请找回',0,'unique',1),
					);
					if($res != null){
					$create = $member->validate($rules)->create();
						if($create){
							$add = $member->add();
							if($add){
								$data['state'] = 1;
								$jiangshi->where(array('lecturer_id'=>$res['lecturer_id']))->save($data);
							}else{
								$this->error('注册失败');
							}
									}else{
										$this->error($member->getError());
									}
				}
				}



				if($add){
					$_SESSION['homeuser'] = $member->where(array('member_id'=>$add))->find();
					$this->redirect('member/index');
				}else{
					$this->error('注册失败');
				}


	}


}
	/*退出*/
	public function loginout()
	{
		unset($_SESSION['homeuser']);
		$this->redirect('/');
	}

	/*检测用户名是否已被其他人注册*/
	public function ajax_username()
	{
		$username = I('get.username');
		$member = M('member');
		$data = $member->where(array('member_name'=>$username))->find();
		if(empty($data)){
			echo 1;
		}else{
			echo 2;
		}
	}

	public function useredit()
	{
		$pass = D('member');
		if (!IS_POST) {

			$this->display();
		}else{
			if($_POST[member_auth] == 2)
			{

				$arr = $pass->where(array('member_auth'=>$_POST[member_auth],'bianhao'=>$_POST[number],'code'=>$_POST[code]))->find();
				if(!is_null($arr)){
					$this->assign('arr',$arr);
				}else{
					$this->success('该会员不存在,请联系管理员！');
				}
				$this->display();
			}elseif($_POST[member_auth] == 5){
				$arr = $pass->where(array('member_auth'=>$_POST[member_auth],'bianhao'=>$_POST[numbers],'code'=>$_POST[codes]))->find();
				if(!is_null($arr)){
					$this->assign('arr',$arr);
				}else{
					$this->success('该会员不存在,请联系管理员！');
				}
				$this->display();

			}
			exit;






		}


	}
	/*公共修改方法*/
    public function common_update()
    {


        $table = I('post.table');
        $jump = I('post.jump');
        $_POST[member_password] = MD5($_POST[member_password]);
        $object = M($table);
        $create = $object->create();
        if($create){
            $edit = $object->save();
            if($edit){
                $this->success('修改成功',"/index.php/home/user/login",3);
            }else{
                $this->error('修改有误');
            }
        }else{
            $this->error($object->geterror());
        }
        }
}
