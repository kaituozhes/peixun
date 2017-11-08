<?php
namespace Home\Controller;
use Think\Controller;
class micarticleController extends CommonController {
	private static $cateid;
	public function __construct()
	{
		parent::__construct();
		$title = D('category');
		$title = $title->where('id='.I('id'))->find();
		$this->assign('title',$title[catename]);
		if(I('get.id')){
			self::$cateid = I('get.id');
			$id = I('get.id');
			$Crumbs = $this->common_get_family($id);
			$this->assign('Crumbs',$Crumbs);
			$ass = D(category);
			$categroy = $ass->where('id='.$id)->find();
/*			var_dump($categroy);exit;*/
			$this->assign('categroy',$categroy);
			$cateres = $ass->select();

			$abc= $this->familytree($cateres,I('id'));
			$this->assign('abc',$abc);


		}
	}

	public function index()
	{	
		$arc = D('article');
		$id = I('id');
	
		$res = $this->common_get_family($id);
		$ids = I('id').',';
		if(count($res)>=1){
			foreach ($res as $key => $value) {
			$ids .= $value[id].',';
			}
			$ac = trim($ids,',');
			$count = $arc->where(array("cate_id"=>array("in",$ac)))->order("tid desc")->count();
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $arc->where(array("cate_id"=>array("in",$ac)))->order("tid desc")->limit($Page->firstRow.','.$Page->listRows)->select();


			/*$abb = $arc->where(array("cate_id"=>array("in",$ac)))->order("tid desc")->select();*/
			
		}
		$co = $count;
		$desc = 1;
		$this->assign('id',$id);
		$this->assign('num',$co);
		/*$this->assign('catearc',$abb);*/
		$this->assign('catearc',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$desc = 1;
		$this->assign('desc',$desc);
		$this->display();
	}
	public function inde()
	{	

		$arc = D('article');
		$id = I('id');
	
		$res = $this->common_get_family($id);
		$ids = I('id').',';
		if(count($res)>=1){
			foreach ($res as $key => $value) {
			$ids .= $value[id].',';
			}
			$ac = trim($ids,',');
			$count = $arc->where(array("cate_id"=>array("in",$ac)))->order("tid desc")->count();
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $arc->where(array("cate_id"=>array("in",$ac)))->limit($Page->firstRow.','.$Page->listRows)->order("tid desc")->select();
			/*$abb = $arc->where(array("cate_id"=>array("in",$ac)))->order("tid desc")->select();*/
			
		}
		$co = $count;
		$this->assign('num',$co);
		$this->assign('id',$id);
		$this->assign('catearc',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$desc = 1;
		$this->assign('desc',$desc);
		$this->display('index');
	}

	public function indextop()
	{	

		$arc = D('article');
		$id = I('id');
	
		$res = $this->common_get_family($id);
		$ids = I('id').',';
		if(count($res)>=1){
			foreach ($res as $key => $value) {
			$ids .= $value[id].',';
			}
			$ac = trim($ids,',');
			$count = $arc->where(array("cate_id"=>array("in",$ac)))->count();
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $arc->where(array("cate_id"=>array("in",$ac)))->limit($Page->firstRow.','.$Page->listRows)->select();
			/*$abb = $arc->where(array("cate_id"=>array("in",$ac)))->order("tid desc")->select();*/
			
		}
		$co = $count;
		$this->assign('num',$co);
		$this->assign('id',$id);
		/*$this->assign('catearc',$abb);*/
		$this->assign('catearc',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$desc = 2;
		$this->assign('desc',$desc);
		$this->display('');
	}

	
}