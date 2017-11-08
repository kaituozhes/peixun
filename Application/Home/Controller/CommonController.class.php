<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $cate = M('category');
        //顶部分类 底部分类
        $top_cate = $cate->where(array('pid'=>0,'position'=>1,'hidden'=>2))->order('sort asc')->select();
        $bottom_cate = $cate->where(array('pid'=>0,'position'=>2,'hidden'=>2))->select();
        foreach ($bottom_cate as $k => $v) {
            $bottom_cate[$k]['son'] = $cate->where(array('pid'=>$v['id']))->select();
        }
        $this->assign("topcate",$top_cate);
        $this->assign("bottom_cate",$bottom_cate);
        //分类ID
        $cateid = strlen(I('get.id')) != 0 ? I('get.id') : 0;
        if($cateid != 0){
            $onecate = $cate->where(array('id'=>$cateid))->find();
            $this->assign('hs_mess',$onecate);
        }else{
            $gear = M('gear');
            $gear_data = $gear->order('sort asc')->select();
            $this->assign('hs_mess',$gear_data);
            $this->assign('tag','index');
        }

        //获取登录信息
        $visitor = $this->get_homeuser();
        if(!empty($visitor)){
            $this->assign('logintype',1);
            $this->assign('visitor',$visitor);
        }else{
            $this->assign('logintype',2);
        } 
    }
    //调用基本信息
    public function get_basic($dom)
    {
        $basic = M('basic');
        if(strlen($dom) == 0){
            return;
        }
        $data = $basic->where(array('basic_key'=>$dom))->find();
        return $data;
    }
    //调用附加信息
    public function get_fujia($dom)
    {
        $basic = M('additional');
        if(strlen($dom) == 0){
            return;
        }
        $data = $basic->where(array('fujia_key'=>$dom))->find();
        return $data;
    }
    //调用赞助商信息
    public function get_sponsor($dom)
    {
        $sr = M('sponsor');
        if(strlen($dom) == 0){
            return;
        }
        $srdata = $sr->where(array('srcate'=>$dom))->select();
        return $srdata;
    }
    //获取登录状态
    public function get_homeuser($dom)
    {
        if(empty($_SESSION['homeuser'])){
            return;
        }
        if($dom == ''){
            return $_SESSION['homeuser'];
        }else{
            return $_SESSION['homeuser'][$dom];
        }
    }
    //获取当前文章的上一篇 下一篇
    public function get_sortart($tid,$cateid = '')
    {
        if(!is_numeric($tid)){
            return;
        }
        $article = M('article');
        //没有传入分类Id的情况下根据文章查出分类id
        if($cateid == ''){
            $cate = $article->where(array('tid'=>$tid))->field('cate_id')->find();
            $cateid = $cate['cate_id'];
        }
        //上一篇 下一篇的ID
        $nextid = M()->query("select tid from hao_article where tid > $tid and cate_id = $cateid order by tid asc limit 0,1");
        $previd = M()->query("select tid from hao_article where tid < $tid and cate_id = $cateid order by tid desc limit 0,1"); 
        $next = $article->where(array('tid'=>$nextid[0]['tid']))->find();
        $prev = $article->where(array('tid'=>$previd[0]['tid']))->find();
        if(!empty($next) && !empty($prev)){
            $art = array(
                'prev' => 
                    array(
                        'tid' => $prev['tid'],
                        'name' => $prev['title']
                    ),
                'next' => 
                    array(
                        'tid' => $next['tid'],
                        'name' => $next['title']
                    )
            );
        }else if(empty($next) && !empty($prev)){
            $art = array(
                'prev' => 
                    array(
                        'tid' => $prev['tid'],
                        'name' => $prev['title']
                    ),
                'next' => '没有了'
            );
        }else if(!empty($next) && empty($prev)){
            $art = array(
                'prev' => '没有了',
                'next' => 
                    array(
                        'tid' => $next['tid'],
                        'name' => $next['title']
                    )
            );
        }else if(empty($next) && empty($prev)){
            $art = array(
                'prev' => '没有了',
                'next' => '没有了'
            );
        }
        return $art;
    }
    //根据当前ID获取父栏目的所有子栏目
    public function common_get_family($id)
    {
        $cate = M('category');
        $one = $cate->where(array('id'=>$id))->find();
        
        if($one['pid'] == 0){
            $soncate = $cate->where(array('pid'=>$id))->select();      
            return  $soncate;      
        }else{
            $two = $cate->where(array('id'=>$one['pid']))->find();
            return $this->common_get_family($two['id']);
        }
    }

    //根据当前id获取面包屑
    public function familytree($arr,$id) {
    $tree = array();    
    foreach($arr as $v) {
        if($v['id'] == $id) {
            if($v['pid'] > 0) {
                $tree = array_merge($tree,$this->familytree($arr,$v['pid']));
            }
 
            $tree[] = $v; 
        }
    }
 
    return $tree;
}
    public function get_parent($arr,$id){

        foreach ($arr as $key => $value) {
            
                $arr[] = $value;
            }
            return $arr;

        }



}