<?php
namespace Admin\Controller;
use Think\Controller;
use Org\LAMP\CatTree;
class CategoryController extends CommonController {
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

    public function index(){	//查
	    $Category = M('Category');
		$data = $Category->select();
		$list = CatTree::getList($data);
		$this->assign('list',$list);
		$this->display();
    }
	public function add(){	//输出添加模板  
	   $this->display();
	}
	
	public function add_son()
	{
		$id = I('get.id');
		$cate = M('category');
		$data = $cate->where(array('id'=>$id))->find();
		$this->assign('parent',$data);
		$this->display();
	}
	public function insert(){   //添加分类的方法
		$config = array(
			'rootPath' => 'Public/',
            'savePath' => 'Uploads/',
            'exts'     => array('gif','png','jpg')
		);
		$_POST['content'] = I('post.editorValue');
		unset($_POST['editorValue']);
		if(!empty($_FILES['cateimg'])){
			if($_FILES['cateimg']['error'] != 4){
				$upload = new \Think\Upload($config);
				$file_info = $upload->uploadOne($_FILES['cateimg']);
				if(!empty($file_info)){
					$_POST['cateimg'] = $file_info['savepath'].$file_info['savename'];
				}else{
					$this->error($upload->geterror());
				}	
			}
		}
		$category = M('category');
		$res = $category->create();
		if($res){
			$r = $category->add();
			if ($r) {
				$this->redirect('Category/index');
			}else {
				$this->error('添加失败');
			}
		}else{
			$this->error($category->geterror());
		}	
	}
	
	public function edit($id){	//输出修改模板
	    // 1.实例化Model
    	$Category = M('Category');

    	// 2.查询
    	$data = $Category->find($id);
    	$data['content'] = html_entity_decode($data['content']);
    	// 2.查询所有分类信息
    	$info = $Category->select();
    	// 3.将分类进行规整(使用CatTree类进行规整)
    	$list = CatTree::getList($info);
    	$this->assign('list', $list);

    	// 3.分配
    	$this->assign('data', $data);
    	// 4.输出模板
    	$this->display();
	}
	
	public function update(){ 	//修改分类的方法
		$config = array(
			'rootPath' => 'Public/',
            'savePath' => 'Uploads/',
            'exts'     => array('gif','png','jpg')
		);
		$_POST['content'] = I('post.editorValue');
		unset($_POST['editorValue']);
		if(!empty($_FILES['cateimg'])){
			if($_FILES['cateimg']['error'] != 4){
				$upload = new \Think\Upload($config);
				$file_info = $upload->uploadOne($_FILES['cateimg']);
				if(!empty($file_info)){
					$_POST['cateimg'] = $file_info['savepath'].$file_info['savename'];
				}else{
					$this->error($upload->geterror());
				}
			}
		}
	   //1.实例化model
    	$Category = M('Category');
    	// 2.创建数据对象
    	$res = $Category->create();
    	// 3.判断
    	if ($res) {
    		// 执行修改操作
    		$r = $Category->save();
    		if($r){
    		 	$this->redirect('Category/index');
		 	}else{
		     	$this->error('修改失败');
	     	}
		 }
	}
	
	public function del($id){   //删除分类
        $Category = M('Category');
         
         //$sql = "select count(*) from type where pid='{$id}'";
        $one_data['pid'] = array('eq',$id);
       $data= $Category->where($one_data)->select();
        //echo $Category->_sql();die;
        if($data){
           $this->success('该分类下有子类,不能删除',U('Category/index'),3);
        }else{
        	$res = $Category->delete($id);
	        if ($res) {
				$this->redirect('Category/index');
			}else {
				$this->error('删除失败');
			}
        }
	}
	public function delcate()
	{
		$check = 1;//验证变量
		$delid = I('post.delid');
		if(strlen($delid) == 0){
			return false;
		}
		$delid = explode(',',$delid);
		$cate = M('category');
		foreach($delid as $v){
			$del = $cate->delete($v);
			if(!$del){
				$check = 2;
			}
		}
		$this->ajaxReturn($check);
	}
	/***** 权限栏目 *****/
	public function authcate()
	{
		$auth = M('authcate');
		$data = $auth->select();
		$list = CatTree::getList($data);
		$this->assign('list',$list);
		$this->display();
	}

	public function authcate_add()
	{
		if(!IS_POST){
			$this->display();
		}else{
			$config = array(
				'rootPath' => 'Public/',
	            'savePath' => 'Uploads/',
	            'exts'     => array('gif','png','jpg')
			);
			if(!empty($_FILES['cateimg'])){
				if($_FILES['cateimg']['error'] != 4){
					$upload = new \Think\Upload($config);
					$file_info = $upload->uploadOne($_FILES['cateimg']);
					if(!empty($file_info)){
						$_POST['cateimg'] = $file_info['savepath'].$file_info['savename'];
					}else{
						$this->error($upload->geterror());
					}	
				}
			}
			$category = M('authcate');
			$res = $category->create();
			if($res){
				$r = $category->add();
				if ($r) {
					$this->redirect('category/authcate');
				}else {
					$this->error('添加失败');
				}
			}else{
				$this->error($category->geterror());
			}	
		}
	}

	public function authcate_edit()
	{
		if(!IS_POST){
			$id = I('get.id');
			 // 1.实例化Model
	    	$auth = M('authcate');

	    	// 2.查询
	    	$data = $auth->find($id);
	    	// 2.查询所有分类信息
	    	$info = $auth->select();
	    	// 3.将分类进行规整(使用CatTree类进行规整)
	    	$list = CatTree::getList($info);
	    	$this->assign('list', $list);
	    	// 3.分配
	    	$this->assign('data', $data);
			$this->display();
		}else{
			$config = array(
				'rootPath' => 'Public/',
	            'savePath' => 'Uploads/',
	            'exts'     => array('gif','png','jpg')
			);
			if(!empty($_FILES['cateimg'])){
				if($_FILES['cateimg']['error'] != 4){
					$upload = new \Think\Upload($config);
					$file_info = $upload->uploadOne($_FILES['cateimg']);
					if(!empty($file_info)){
						$_POST['cateimg'] = $file_info['savepath'].$file_info['savename'];
					}else{
						$this->error($upload->geterror());
					}
				}
			}
		   //1.实例化model
	    	$Category = M('authcate');
	    	// 2.创建数据对象
	    	$res = $Category->create();
	    	// 3.判断
	    	if ($res) {
	    		// 执行修改操作
	    		$r = $Category->save();
	    		if($r){
	    		 	$this->redirect('category/authcate');
			 	}else{
			     	$this->error('修改失败');
		     	}
			}
		}
	}

	public function authcate_add_son()
	{
		$id = I('get.id');
		$cate = M('authcate');
		$data = $cate->where(array('id'=>$id))->find();
		$this->assign('parent',$data);
		$this->display();
	}

	public function authcate_del($id)
	{
		$auth = M('authcate');
        $one_data['pid'] = array('eq',$id);
       	$data= $auth->where($one_data)->select();
        if($data){
           $this->error('该分类下有子类,不能删除',U('Category/authcate'),3);
        }else{
        	$res = $auth->delete($id);
	        if ($res) {
				$this->redirect('category/authcate');
			}else {
				$this->error('删除失败');
			}
        }
	}
}