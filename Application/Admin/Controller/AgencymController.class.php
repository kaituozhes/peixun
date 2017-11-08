<?php
namespace Admin\Controller;
use Think\Controller;
class AgencymController extends CommonController {
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

   public function lst(){
   		$user = D('user');
        $agency = D('agency');
   		$map['agency_id']  = array('NEQ',0);
   		$res = $user->where($map)->select();
        $i = 0;
        foreach ($res as $key => $value) {
            $agres = $agency->where(array('agency_id'=>$value['agency_id']))->find();

            $res[$i]['agency'] = !empty($agres) ? $agres['agencyrealname']:1;

            $i++;

        }

   		$this->assign('agencylst',$res);


    $this->display();
   }

   public function add(){
   		if(IS_POST){
			$user = D('user');
			$_POST['password'] = md5(I('post.password'));
            $_POST['useraddtime'] = time();

			if($user->add($_POST)){
				$this->redirect('agencym/lst');
			}else{
				$this->error('添加失败');
			}
    		}
		    	$agency = D('agency');
		    	$res = $agency -> where(array('agencyclass'=>1))->select();
		    	$this->assign('agency',$res);
    $this->display();
   }


public function edit($id){
  $agency = D('agency');
  $res = $agency ->where(array('agencyclass'=>1))-> select();
  $this->assign('agency',$res);

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
            $_POST['useraddtime'] = time();
            $user = M('user');
            $res = $user->create();
            if($res){
                $da = $user->save();
                if($da){
                    $this->redirect('agencym/lst');
                }else{
                    $this->error('添加用户失败',U('agencym/lst'),1);
                }
            }else{
                    $this->error($gear->getError());
            }
        }

    }


            public function del($id){
            $member = M('user');
            $res = $member->delete($id);
            if($res){
                $this->redirect('agencym/lst');
            }else{
                $this->error('删除失败',U('agencym/lst'),1);
            }
            }


}
