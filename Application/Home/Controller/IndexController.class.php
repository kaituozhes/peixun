<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    private $goods = '';
    private $area = '';
    private $mc = '';
    private $article = '';
    public function __construct()
    {   

        parent::__construct();
        $title = D('basic');
        $tit = $title->where(array('bid'=>22))->find();
        $this->assign('title',$tit['basic_key']);
        $this->goods = M('goods');
        $this->area = M('area');
        $this->mc = M('music_cate');
        $this->article = M('article');
        //play img
        $this->pic = M('gear');
    }
    public function index(){
        $goods_data = $this->goods->where(array('if_index'=>1))->find();
        $goods_area = $this->area->where(array('id'=>$goods_data['cityid']))->field('name')->find();
        $pic = $this->pic->select();
        $goods_data['cityid'] = $goods_area['name'];
        //歌手
        $mcdata = $this->mc->select();
        //新闻资讯
        $weninfo = $this->article->where(array('cate_id'=>101))->order('pubdate desc')->limit('0,5')->select();
        //About
        $about = $this->article->where(array('cate_id'=>95))->order('sort asc')->limit('0,1')->select();
       	//notice
        $notice = $this->article->where(array('cate_id'=>96))->order('sort asc')->limit('0,3')->select();
        $category = D('category');
            $catea = $category->where('id=97')->find();
            $cateb = $category->where('id=98')->find();
            $catec = $category->where('id=99')->find();
            $cated = $category->where('id=100')->find();
        //play img
        $this->assign('hs_mess',$pic);
        //About
        $this->assign('about',$about);
        //Notice
        $this->assign('notice',$notice);

        $this->assign('catea',$catea);
        $this->assign('cateb',$cateb);
        $this->assign('catec',$catec);
        $this->assign('cated',$cated);
        $this->assign('weninfo',$weninfo);
        $this->assign('mcdata',$mcdata);
        $this->assign('index_goods',$goods_data);
        $this->display();
    }
    public function search()
    {
        $search = I('post.search');
        $article = M('article');
        $where['title'] = array('like',"%$search%");
        
        //实例化分页类(总数据条数，每页数据条数)
        $page = new \Think\Page($article->where($where)->count(),16);
        $page->setConfig('header', '共 %TOTAL_ROW% 条记录');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");        
        $this->assign('show',$page->show());
        $art_search = $article->where($where)->limit("$page->firstRow,$page->listRows")->select();
        $this->assign('wen',$art_search);
        $this->display();
    }
}