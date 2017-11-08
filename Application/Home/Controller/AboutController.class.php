<?php
namespace Home\Controller;
use Think\Controller;
class AboutController extends CommonController {
    
    public function index(){
    	$cateid = I('get.id');
        if(!is_numeric($cateid)){
            $this->error('小朋友不要搞事情！');
        }
        $article = M('article');
        $one = $article->where(array('cate_id'=>70,'tid'=>6))->find();
        $this->assign('one',$one);
        $this->display();
    }
    
}
