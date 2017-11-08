<?php
namespace Home\Controller;
use Think\Controller;
class articleController extends CommonController {
	private static $cateid;
	public function __construct()
	{
		parent::__construct();

		$title = D('article');
		$title = $title->where('tid='.I('id'))->find();
		$this->assign('title',$title[title]);

		if(I('get.id')){
			self::$cateid = I('get.id');	
		}
	}

	public function index()
	{	
		$arc = D('article');
		$id = I('get.id');
		$cate = D('category');

		$res = $arc->where('tid='.$id)->find();
		$cateres = $cate->where('id='.$res[cate_id])->find();
		$cateid = $res[cate_id];
		$this->assign('cateid',$cateid);
		$this->assign('cate',$cateres);
		$this->assign('data',$this->common_get_family($res[cate_id]));

		$fenye = $this->get_sortart($id);
		$this->assign('sortart',$fenye);
		$arcres = $arc->where('tid='.$id)->find();
		$this->assign('arclst',$arcres);
		$this->display();
	}

	
}