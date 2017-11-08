<?php
namespace Admin\Controller;
use Think\Controller;
use Org\LAMP\CatTree;
class ArticleController extends Controller {
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

		$cate = M('category');
		
		$cate_all = $cate->select();
		foreach ($cate_all as $key => $value) {
			$cate_all[$key]['son'] = $cate->query("select * from hao_category where pid = ".$value['id']);
		}
		$this->assign('cate_all',$cate_all);
	}
	public function index()
	{
		$article = M('article');
		$page = new \Think\Page($article->count(),10);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme',"%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
    	$this->assign('show',$page->show());
		$wen_info = $article->query("select ha.*,hc.catename from hao_article as ha,hao_category as hc where ha.cate_id = hc.id order by ha.pubdate desc limit $page->firstRow,$page->listRows");
		$this->assign('wen',$wen_info);
		$this->display();
	}
	public function add()
	{
		if(!IS_POST){		
			$this->display();
		}else{
			
			$_POST['pubdate'] = time();
			$_POST['body'] = I('post.editorValue');
			unset($_POST['editorValue']);
			if(!empty($_FILES['litpic'])){
				$config = array(
					'rootPath' => 'Public/',
					'savePath' => 'Uploads/',
					'exts'	=> array('gif','png','jpg')
				);
				if($_FILES['litpic']['error'] != 4){
					$upload = new \Think\Upload($config);
					$up_info = $upload->uploadOne($_FILES['litpic']);
					if(!empty($up_info)){
						$_POST['litpic'] = $up_info['savepath'].$up_info['savename'];
					}else{
						$this->error($upload->geterror());
					}
				}
			}
			$article = M('article');
			$res = $article->create();
			if($res){
				$r = $article->add();
				if($r){
					$this->redirect('Article/index');
				}else{
					$this->error('添加出错，请重试');
				}
			}else{
				$this->error($article->geterror());
			}
		}
		
	}
	public function edit()
	{
		if(!IS_POST){
			$id = I('get.id');
			$article = M('article');
			$wen_info_one = $article->where(array('tid'=>$id))->find();
			$wen_info_one['body'] = html_entity_decode($wen_info_one['body']);
			$this->assign('data',$wen_info_one);
			$this->display();
		}else{
			$_POST['body'] = I('post.editorValue');
			unset($_POST['editorValue']);
			if(!empty($_FILES['litpic'])){
				$config = array(
					'rootPath' => 'Public/',
					'savePath' => 'Uploads/',
					'exts'	=> array('gif','png','jpg')
				);
				if($_FILES['litpic']['error'] != 4){
					$upload = new \Think\Upload($config);
					$up_info = $upload->uploadOne($_FILES['litpic']);
					if(!empty($up_info)){
						$_POST['litpic'] = $up_info['savepath'].$up_info['savename'];
					}else{
						$this->error($upload->geterror());
					}
				}
			}
			$article = M('article');
			$res = $article->create();
			if($res){
				$r = $article->save();
				if($r){
					$this->redirect('Article/index');
				}else{
					$this->error('修改出错，请重试');
				}
			}else{
				$this->error($article->geterror());
			}
		}
		
	}
	public function delete()
	{
		$id = I('get.id');
		$article = M('article');
		$res = $article->delete($id);
		if($res){
			$this->redirect('Article/index');
		}else{
			$this->error('删除出错,请重试');
		}
	}
	public function ajax_article()
	{
		$id = I('get.id');
		$article = M('article');
		$wen_info = $article->query("select ha.*,hc.catename from hao_article as ha,hao_category as hc where ha.cate_id = hc.id and ha.cate_id = $id order by ha.tid asc");
		$this->ajaxReturn($wen_info);
	}
	/*批量删除*/
	public function delart()
	{
		$check = 1;//验证变量
		$delid = I('post.delid');
		if(strlen($delid) == 0){
			return false;
		}
		$delid = explode(',',$delid);
		$art = M('article');
		foreach($delid as $v){
			$del = $art->delete($v);
			if(!$del){
				$check = 2;
			}
		}
		$this->ajaxReturn($check);
	}
	/*根据分类获取数据*/
	public function ajax_cate_article()
	{
		$cateid = I('get.cateid');
		$cate_article = M()->query("select ha.*,hc.catename from hao_article as ha,hao_category as hc where ha.cate_id = hc.id and ha.cate_id = $cateid order by ha.pubdate desc");
		$this->ajaxReturn($cate_article);
	}
}
