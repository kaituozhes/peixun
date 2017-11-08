<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends CommonController {
	private static $cateid;
	public function __construct()
	{	
		parent::__construct();
		$title = D('category');
		$title = $title->where('id='.I('id'))->find();
		$this->assign('title',$title[catename]);
		
		$ass = D('category');
		$res = $ass->where('pid='.I('id'))->select();
		$this->assign('data',$res);
		$id = I('get.id');
		$this->assign('data',$this->common_get_family($id));
		$categroy = $ass->where('id='.I('id'))->find();
		$this->assign('categroy',$categroy);

		if(I('get.id')){
			self::$cateid = I('get.id');	
		}

	}

	public function index()
	{
		$ass = D('category');
		
		$this->display();
	}

	public function detail()
	{
		$article = M('article');
		$tid = I('get.tid');
		$duart = $article->where(array('tid'=>$tid))->find();
		$this->assign('duart',$duart);
		$this->assign("sortart",$this->get_sortart($tid,$duart['cate_id']));//获取上一篇 下一篇
		$this->display();
	}

	public function jieshao(){
		$ass = D('category');
		$res = $ass->where('pid=88')->select();
		$this->assign('data',$res);
		$project = $ass->where('id='.I('id'))->find();		
		$this->assign('project',$project);
		$this->display();
	}


	public function lianmeng(){
		$ass = D('category');
		$res = $ass->where('pid=88')->select();
		$this->assign('data',$res);

		$project = $ass->where('id='.I('id'))->find();		
		$this->assign('project',$project);
		$this->display();

	}

	public function peixun(){
		$ass = D('category');
		$res = $ass->where('pid=88')->select();
		$this->assign('data',$res);
		$ass = D('article');
		$article = $ass->where('cate_id='.I('id'))->select();		
		$this->assign('article',$article);
		$this->display('lianmeng');

	}


}