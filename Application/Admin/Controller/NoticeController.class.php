<?php
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends Controller {
   public function index(){
    	$keyword = M('keyword');
    	//实例化分页类(总数据条数，每页数据条数)
    	$page = new \Think\Page($keyword->count(),2);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme',"共 %TOTAL_ROW% 条记录 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"
);
    	$this->assign('show',$page->show());
    	$data = $keyword->field('shop_keyword.*,shop_store.trade')->table('shop_keyword,shop_store')->where("shop_keyword.tid = shop_store.id")->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('data',$data);
    	$this->display();
    }
    public function add(){
    	$id = I('get.id');
    	//根据传过来的店铺id在公告表里查询，一个店铺只能发一则公告，如果想要更新公告的话要么删除，要么修改
    	//实例化公告表
    	$keyword = M('keyword');
    	$data = $keyword->table('shop_keyword')->where("shop_keyword.tid = $id")->find();
    	if(!$data){
    		$this->assign('id',$id);
    		$this->display();
    	}else{
    		$this->success('一个店铺只能添加一则公告，如要更新，要么删除，要么修改',U('store/index'),3);
    	}
    }
    public function insert(){
    	//实例化公告表
    	$keyword = M('keyword');
    	//创建安全对象
    	$res = $keyword->create();
    	if($res){
    		$r = $keyword->add();
    		if($r){
    			$this->success('添加成功',U('Notice/index'),1);
    		}else{
    			$this->error('添加失败',U('store/index'),1);
    		}
    	}
    }
    public function edit(){
    	$id = I('get.id');
    	//实例化公告表
    	$keyword = M('keyword');
    	//查询出对应的id的内容
    	$data = $keyword->find($id);
    	//发送给前台接收
    	$this->assign('data',$data);
    	$this->display();
    }
    public function update(){
    	//实例化公告表
    	$keyword = M('keyword');
    	//创建安全对象
    	$res = $keyword->create();
    	if($res){
    		$r = $keyword->save();
    		if($r){
    			$this->success('修改成功',U('Notice/index'),1);
    		}else{
    			$this->error('修改失败');
    		}
    	}
    }
    public function del(){
    	//接收由前台传过来的id值
    	$id = I('get.id');
    	//实例化公告表
    	$keyword = M('keyword');
    	//执行删除的操作
    	$res = $keyword->delete($id);
    	if($res){
    		$this->success('删除公告',U('Notice/index'),1);
    	}else{
    		$this->error('还是别删除了');
    	}
    }
}