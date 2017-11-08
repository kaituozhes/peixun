<?php
namespace Admin\Controller;
use Think\Controller;
class UdeController extends Controller {
        public function index(){
        $ude = M('udetail');
        $user = M('user');
    	//实例化分页类(总数据条数，每页数据条数)
    	$page = new \Think\Page($ude->count(),5);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme',"共 %TOTAL_ROW% 条记录 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"
);
    	$this->assign('show',$page->show());
    	$data = $ude->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('data',$data);
    	// dump($data);die;
    	$this->display();
    }

    public function edit($uid){
    	$ude = M('udetail');
        $data = $ude->table('shop_udetail')->where("shop_udetail.uid = $uid")->find();
        // dump($data);die;
        $this->assign('data',$data);
        $this->display();
    }

    public function update(){
    	$ude = M('udetail');
        $res = $ude->create();
        if($res){
            $da = $ude->save();
            if($da){
                $this->success('修改用户成功',U('Ude/index'),1);
            }else{
                $this->error('修改用户失败','',1);
            }
        }
    }

   
    	public function del($uid){
        $ude = M('ude');
        $res = $ude->delete($uid);
        if($res){
            $this->success('删除用户成功',U('Ude/index'),1);
        }else{
            $this->error('删除用户失败',U('Ude/index'),1);
        }
    }   
}