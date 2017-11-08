<?php
namespace Admin\Controller;
use Think\Controller;
class JudgeController extends Controller {
   public function index(){
    	$judge = M('judge');
    	//实例化分页类(总数据条数，每页数据条数)
    	$page = new \Think\Page($judge->count(),5);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme',"共 %TOTAL_ROW% 条记录 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"
);
    	$this->assign('show',$page->show());
    	$data = $judge->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('data',$data);
    	$this->display();
    }

    public function add()
    {
    	$this->display();
    }
   	public function insert()
   	{
   		$judge=M('judge');
   		$res = $judge->create();
        if($res){
            $da = $judge->add();
            if($da){
                $this->success('添加用户成功',U('Judge/index'),1);
            }else{
                $this->error('添加用户失败',U('Judge/add'),1);
            }
        }
   	}

    public function del($id)
    {
    	$judge=M('judge');
    	$res=$judge->delete($id);
    	if($res){
    		$this->success('删除成功',U('Judge/index'),2);
    	}else{
    		$this->error('删除失败',U('Judge/index'),2);
    	}
    }

    public function edit($id)
    {
    	$judge=M('judge');
    	$data=$judge->find($id);
    	$this->assign('data',$data);
    	$this->display();
    }

	public function update()
	{
		$judge=M('judge');
		$res=$judge->create();
		if($res){
			$r=$judge->save();
			if($r){
				$this->success('修改成功',U('Judge/index'),2);
			}else{
				$this->success('修改失败',U('Judge/edit'),2);
			}
		}
	}
}