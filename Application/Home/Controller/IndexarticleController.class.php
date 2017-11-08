<?php
namespace Home\Controller;
use Think\Controller;
class IndexarticleController extends CommonController {
	private $cateid;
	public function __construct()
	{
		parent::__construct();
		$title = D('category');
		$title = $title->where('id='.I('id'))->find();
		$this->assign('title',$title[catename]);
		
		$this->cateid = I('get.id');
	}
	public function index()
	{
		$cate = M('category');
		$catedata = $cate->where(array('id'=>$this->cateid))->find();
		$this->assign('catedata',$catedata);
		$this->display();
	}
}