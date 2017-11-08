<?php
namespace Home\Controller;
use Think\Controller;
class ListarticleController extends CommonController {
	private static $cateid;
	public function __construct()
	{
		parent::__construct();
		//title

		$ass = D('category');
		$title = $ass->where('id='.I('id'))->find();
		$res = $ass->where('pid='.I('id'))->select();
		$this->assign('title',$title[catename]);
		$this->assign('data',$res);
		//根据当前ID获取父栏目的所有子栏目
		$asd = $this->common_get_family(I('id'));

		$res = $ass->where('id='.$asd[0][pid])->find();
		$this->assign('res',$res);
		$this->assign('catef',$asd);


		$categroy = $ass->where('id='.I('id'))->find();
		$this->assign('categroy',$categroy);
		$cateres = $ass->select();
		//面包屑
		$abc= $this->familytree($cateres,I('id'));
		$this->assign('abc',$abc);

		if(I('get.id')){
			self::$cateid = I('get.id');	
		}

	}

	public function index()
	{
		$ass = D('category');
		$id = I('get.id');
		$arr = $ass -> select();
		$res = $this->get_parent($arr,$id);
/*		var_dump($res);exit;*/


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
		$this->display('jieshao');

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