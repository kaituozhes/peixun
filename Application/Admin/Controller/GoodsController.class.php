<?php
namespace Admin\Controller;
use Think\Controller;
use Org\LAMP\CatTree;
class GoodsController extends CommonController {
	public function __construct()
	{
		parent::__construct();
		$goods = M('goods');
   		$gda = $goods->select();
   		$this->assign('gda',$gda);
	}
   public function index()
   {
   		$goods = M('goods');
   		$page = new \Think\Page($goods->count(),9);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
    	$this->assign('show',$page->show());
    	$data = $goods->join('hao_area as ha ON hao_goods.cityid = ha.id')->limit($page->firstRow,$page->listRows)->select();
    	foreach($data as $k => $v){
    		$data[$k]['doingmess'] = html_entity_decode($data[$k]['doingmess']);
    		$data[$k]['imgpath'] = explode(',',$v['imgpath']);
    	}
    	$this->assign('data',$data);
   		$this->display();
   }
   public function add()
   {
   		if(!IS_POST){
   			$this->display();
   		}else{
   			if(!empty($_FILES)){
   				if($_FILES['topbanner']['error'] != 4){//错误为4表示没有文件上传
   					$config = array(
		                'rootPath' => 'Public/',
		                'savePath' => 'Uploads/',
		                'exts'     => array('gif','png','jpg')
			        );
			        $upload = new \Think\Upload($config);
			        $info = $upload->uploadOne($_FILES['topbanner']);
			        if($info){
			        	$_POST['topbanner'] = $info['savepath'].$info['savename'];
			        }else{
			        	$this->error($upload->geterror());
			        }
   				}
   			}
   			$patharr = explode(',',I('post.imgpath'));
   			foreach ($patharr as $k => $v) {
   				if(empty($v)){
   					unset($patharr[$k]);
   				}
   			}
   			$_POST['imgpath'] = implode(',', $patharr);
   			$_POST['gaddtime'] = time();
   			$goods = M('goods');
   			$create = $goods->create();
   			if($create){
   				$add = $goods->add();
   				if($add){
   					$this->redirect('goods/index');
   				}else{
   					$this->error('数据格式有误');
   				}
   			}else{
   				$this->error('数据格式有误');
   			}
   			
   		}
   }
   /**
    *  套餐
    * 
    */
   public function package()
   {
   		$pack = M('package');
   		$page = new \Think\Page($pack->count(),9);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
    	$this->assign('show',$page->show());
    	$data = $pack->join('hao_goods as hg ON hao_package.gid = hg.gid')->limit($page->firstRow,$page->listRows)->select();
    	$this->assign("data",$data);
   		$this->display();
   }
   public function add_package()
   {
   		if(!IS_POST){
   			$this->display();
   		}else{
   			if(!empty($_FILES)){
   				if($_FILES['packimg']['error'] != 4){
   					$config = array(
		                'rootPath' => 'Public/',
		                'savePath' => 'Uploads/',
		                'exts'     => array('gif','png','jpg')
			        );
			        $upload = new \Think\Upload($config);
			        $info = $upload->uploadOne($_FILES['packimg']);
			        $_POST['packimg'] = $info['savepath'].$info['savename'];
   				}
   			}
   			$_POST['packaddtime'] = time();
   			$pack = M('package');
   			$create = $pack->create();
   			if($create){
   				$add = $pack->add();
   				if($add){
   					$this->redirect('goods/package');
   				}else{
   					$this->error('数据格式有误,请重试!!!');
   				}
   			}else{
   				$this->error('数据格式有误,请重试!!!');
   			}
   			
   		}
   		
   }
   public function edit_package()
   {
   		if(!IS_POST){
   			$id = I('get.id');
   			$pack = M('package');
   			$onemess = $pack->where(array('pid'=>$id))->find();
   			$this->assign('onemess',$onemess);
   			$this->display();
   		}else{
   			if(!empty($_FILES)){
   				if($_FILES['packimg']['error'] != 4){
   					$config = array(
		                'rootPath' => 'Public/',
		                'savePath' => 'Uploads/',
		                'exts'     => array('gif','png','jpg')
			        );
			        $upload = new \Think\Upload($config);
			        $info = $upload->uploadOne($_FILES['packimg']);
			        if($info){
			        	 $_POST['packimg'] = $info['savepath'].$info['savename'];
			        }else{
			        	$this->error($upload->geterror());
			        }
			       
   				}
   			}
   			$pack = M('package');
   			$create = $pack->create();
   			if($create){
   				$add = $pack->save();
   				if($add){
   					$this->redirect('goods/package');
   				}else{
   					$this->error('数据格式有误,请重试!!!');
   				}
   			}else{
   				$this->error('数据格式有误,请重试!!!');
   			}
   		}
   }
   public function del_package()
   {
   		$id = I('get.id');
   		$pack = M('package');
   		$del = $pack->delete($id);
   		if($del){
   			$this->redirect('goods/package');
   		}else{
   			$this->error('敏感操作失败,请重试');
   		}
   }
   /**
    * 赞助商业务代码
    * 
    */
   public function sponsor()
   {
   		$sponsor = M('sponsor');
   		$goods = M('goods');
   		$page = new \Think\Page($sponsor->count(),9);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
    	$this->assign('show',$page->show());
    	$data = $sponsor->limit($page->firstRow,$page->listRows)->select();
    	foreach ($data as $k => $v) {
    		if($v['srcate'] == 'chief'){
    			$data[$k]['srcate'] = '首席赞助商';
    		}elseif($v['srcate'] == 'union'){
    			$data[$k]['srcate'] = '联合赞助商';
    		}elseif($v['srcate'] == 'officer'){
    			$data[$k]['srcate'] = '官方赞助商';
    		}elseif(is_numeric($v['srcate'])){
    			$gbc = $goods->where(array('gid'=>$v['srcate']))->find();
    			$data[$k]['srcate'] = $gbc['itemtime'].$gbc['gaddress'];
    		}
    		if(strstr(',',$v['srimg'])){
    			$data[$k]['srimg'] = explode(',',$v['srimg']);
    			$data[$k]['is_img'] = 1;
    		}else{
    			$data[$k]['is_img'] = 2;
    		}
    	}
    	$this->assign("data",$data);
   		$this->display();
   }
   public function add_sponsor()
   {
   		if(!IS_POST){
   			$this->display();
   		}else{
   			$sponsor = M('sponsor');
   			if(!empty($_FILES)){
                if($_FILES['srimg']['error'] != 4){
                    $config = array(
                        'rootPath' => 'Public/',
                        'savePath' => 'Uploads/',
                        'exts'     => array('gif','png','jpg')
                    );
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadOne($_FILES['srimg']);
                    if($info){
                         $_POST['srimg'] = $info['savepath'].$info['savename'];
                    }else{
                        $this->error($upload->geterror());
                    }
                }
            }

   			$_POST['sraddtime'] = time();
   			$create = $sponsor->create();
   			if($create){
   				$add = $sponsor->add();
   				if($add){
   					$this->redirect('goods/sponsor');
   				}else{
   					$this->error('数据格式有误,请重试');
   				}
   			}
   		}
   }
   public function edit_sponsor()
   {
   		if(!IS_POST){
            $id = I('get.id');
            $sponsor = M('sponsor');
            $data = $sponsor->where(array('srid'=>$id))->find();
            $this->assign('data',$data);
   			$this->display();
   		}else{
   			$sponsor = M('sponsor');
            if(!empty($_FILES)){
                if($_FILES['srimg']['error'] != 4){
                    $config = array(
                        'rootPath' => 'Public/',
                        'savePath' => 'Uploads/',
                        'exts'     => array('gif','png','jpg')
                    );
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadOne($_FILES['srimg']);
                    if($info){
                         $_POST['srimg'] = $info['savepath'].$info['savename'];
                    }else{
                        $this->error($upload->geterror());
                    }
                }
            }
            
            $_POST['sraddtime'] = time();
            $create = $sponsor->create();
            if($create){
                $add = $sponsor->save();
                if($add){
                    $this->redirect('goods/sponsor');
                }else{
                    $this->error('数据格式有误,请重试');
                }
            }
   		}
   }
   public function del_sponsor()
   {
   		$id = I('get.id');
   		$sponsor = M('sponsor');
   		$del = $sponsor->delete($id);
   		if($del){
   			$this->redirect('goods/sponsor');
   		}else{
   			$this->error('敏感操作失败,请重试');
   		}
   }

   /*webuploadr 上传后台业务代码*/
   public function uploadfile()
   {
   		if(!empty($_FILES)){
   			if($_FILES['file']['error'] != 4){
   				$config = array(
	                'rootPath' => 'Public/',
	                'savePath' => 'Uploads/',
	                'exts'     => array('gif','png','jpg')
		        );
		        $upload = new \Think\Upload($config);

		        // 2.执行图片上传
		        $info = $upload->uploadOne($_FILES['file']);
		        if($info){
		        	$path = $info['savepath'].$info['savename'];	
		        	echo $path;
		        }else{
		        	echo 'nofile';
		        }
   			}
   		}else{
   			echo 'nofile';
   		}
   }
}