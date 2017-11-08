<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends Controller {
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['Administrator'])){
            $this->redirect('Login/login');
        }
        elseif($_SESSION['Administrator']['ugroup']==1)
        {
            $this->redirect('Login/login');       
        }
    }

    public function index(){
    	$user = M('main');
        $name=$_GET['main_name'];
        $where['main_name']=array('like','%'.$name.'%');
    	//实例化分页类(总数据条数，每页数据条数)
    	$page = new \Think\Page($user->where($where)->count(),5);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme',"共 %TOTAL_ROW% 条记录 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
    	$this->assign('show',$page->show());
    	$data = $user->where($where)->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('data',$data);
    	$this->display();
    }

    public function add()
    {
    	$this->display();
    }

     public function insert(){
        $user = M('main');
        $res = $user->create();
        if($res){
            $da = $user->add();
            if($da){
                $this->redirect('Link/index');
            }else{
                $this->error('添加信息失败',U('Link/add'),1);
            }
        }
    }

    public function edit($id)
    {
        $link=M('main');
        $data=$link->find($id);
        $this->assign('data',$data);
        $this->display();
    }

    public function update()
    {
        $link=M('main');
        $res=$link->create();
        if($res){
            $r=$link->save();
            if($r){
                $this->redirect('Link/index');
            }else{
                $this->error('修改失败',U('Link/edit'),2);
            }
        }
    }
    public function del($id)
    {
        $link=M('main');
        $res=$link->delete($id);
        if($res){
            $this->redirect('Link/index');
        }else{
            $this->error('删除失败',U('Link/index'),2);
        }
    }
    //以下是网站基本信息添加
    public function basic()
    {
        $basic = M('basic');
        $page = new \Think\Page($basic->count(),6);
        $page->setConfig('header', '共 %TOTAL_ROW% 条记录');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme',"%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
        $this->assign('show',$page->show());
        $message = $basic->order('bid desc')->limit($page->firstRow,$page->listRows)->select();
        $this->assign('message',$message);
        $this->display();
    }
    public function basic_add()
    {
        if(!IS_POST){
            $this->display();
        }else{
            $basic = M('basic');
            $res = $basic->create();
            if($res){
                $r = $basic->add();
                if($r){
                    $this->redirect('link/basic');
                }else{
                    $this->error('添加失败',U('Link/basic'));
                }
            }else{
                $this->error($basic->geterror());
            }
        }
    }
    public function base_edit()
    {
        if(!IS_POST){
            $id = I('get.id');
            $basic = M('basic');
            $one_limit = array('bid'=>$id);
            $message_one = $basic->where($one_limit)->find();
            $this->assign('data',$message_one);
            $this->display();   
        }else{
            $basic = M('basic');
            $res = $basic->create();
            if($res){
                $r = $basic->save();
                if($r){
                    $this->redirect('link/basic');
                }else{
                    $this->error('修改失败',U('Link/basic'));
                }
            }else{
                $this->error($basic->geterror());
            }  
        }
        
    }
    public function base_del()
    {
        $id = I('get.id');
        $basic=M('basic');
        $res=$basic->delete($id);
        if($res){
            $this->redirect('Link/basic');
        }else{
            $this->error('删除失败',U('Link/basic'),2);
        }
    }
    //以下是网站广告位信息
    public function itv()
    {
        $itv = M('itv');
        $itv_message = $itv->select();
        $this->assign('itv_message',$itv_message);
        $this->display();
    }
    public function itv_add()
    {
        $this->display();
    }
    public function itv_insert()
    {
        $itv = M('itv');
        $res = $itv->create();
        if($res){
            $r = $itv->add();
            if($r){
                $this->redirect('link/itv');
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->error($itv->geterror());
        }
    }
    public function itv_edit()
    {
        $id = I('get.id');
        $itv = M('itv');
        $one_limit = array('vid'=>$id);
        $itv_one = $itv->where($one_limit)->find();
        $this->assign('itv_one',$itv_one);
        $this->display();
    }
    public function itv_update()
    {
        $itv = M('itv');
        $res = $itv->create();
        if($res){
            $r = $itv->save();
            if($r){
                $this->redirect('link/itv');
            }else{
                $this->error('修改失败');
            }
        }else{
            $this->error($itv->geterror());
        }
    }
    public function itv_del()
    {
        $id = I('get.id');
        $itv = M('itv');
        $r = $itv->delete($id);
        if($r){
            $this->redirect('link/itv');
        }else{
            $this->error('删除失败');
        }
    }
    public function down_file()
    {
        $down = M('down');
        $cate = M('category');
        $down_data = $down->select();
        foreach ($down_data as $key => $value) {
            $where = array('id'=>$value['cate_id']);
            $cate_one = $cate->where($where)->find();
            $down_data[$key]['catename'] = $cate_one['catename'];
        }
        $this->assign('down',$down_data);
        $this->display();
    }
    public function add_down_file()
    {
        $this->assign('lanmu',$this->cate_message());
        $this->display();
    }
    public function down_insert()
    {
        $config = array(
            'rootPath'  => 'Public/',
            'savePath'  => 'Uploads'
            );
        $upload = new \Think\Upload($config);
        $info = $upload->uploadone($_FILES['catefile']);
        if($info){
                $str_img = $info['savepath'].$info['savename'];
                $_POST['file_path'] = $str_img;
        }else{
                $this->error($upload->getError());
        }
        $down = M('down');

        $res = $down->create();
        if($res){
            $da = $down->add();
            if($da){
                $this->redirect('link/down_file');
            }else{
                $this->error('添加用户失败',U('link/add_down_file'),1);
            }
        }else{
                $this->error($gear->getError());
        } 
    }
    public function down_del()
    {
        $id = I('get.id');
        $say = M('down');
        $res=$say->delete($id);
        if($res){
            $this->redirect('Link/down_file');
        }else{
            $this->error('删除失败',U('Link/down_file'),2);
        }
    }
    //公共部分 栏目信息
    public function cate_message()
    {
        //查出栏目信息
        $cate = M('category');
        $cate_limit = array('pid'=>0);
        $cate_all = $cate->where($cate_limit)->select();
        foreach ($cate_all as $key => $value) {
                $cate_all[$key]['son'] = $cate->query("select * from hao_category where pid = ".$value['id']);
        }
        return $cate_all;
    }
    //网站附加信息
    public function fujia()
    {
        $fujia = M('additional');
        $page = new \Think\Page($fujia->count(),6);
        $page->setConfig('header', '共 %TOTAL_ROW% 条记录');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme',"%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
        $this->assign('show',$page->show());
        $message = $fujia->order('fujia_id desc')->limit($page->firstRow,$page->listRows)->select();
        $data = $fujia->select();
        $this->assign('message',$data);
        $this->display();
    }
    public function fujia_add()
    {
        if(!IS_POST){
            $this->display();
        }else{
           $config = array(
                'rootPath'  => 'Public/',
                'savePath'  => 'Uploads',
                'exts'      => array('gif','png','jpg')
                );
            if(!empty($_FILES)){
                if($_FILES['fujia_value']['error'] != 4){
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadone($_FILES['fujia_value']); 
                    if($info){
                        $str_img = $info['savepath'].$info['savename'];
                        $_POST['fujia_value'] = $str_img;
                    }else{
                            $this->error($upload->getError());
                    }  
                }
            }
            $fujia = M('additional');
            $res = $fujia->create();
            if($res){
                $r = $fujia->add();
                if($r){
                    $this->redirect("link/fujia");
                }else{
                    $this->error('失败');
                }
            }else{
                $this->error($fujia->geterror());
            } 
        } 
    }
    public function fujia_edit()
    {
        if(!IS_POST){
            $id = I('get.id');
            $fujia = M('additional');
            $data = $fujia->where(array('fujia_id'=>$id))->find();
            $this->assign('data',$data);
            $this->display();
        }else{
            $config = array(
                'rootPath'  => 'Public/',
                'savePath'  => 'Uploads',
                'exts'      => array('gif','png','jpg')
            );
            if(!empty($_FILES)){
                if($_FILES['fujia_value']['error'] != 4){
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadone($_FILES['fujia_value']); 
                    if($info){
                        $str_img = $info['savepath'].$info['savename'];
                        $_POST['fujia_value'] = $str_img;
                    }else{
                        $this->error($upload->getError());
                    }  
                }
            }
            $fujia = M('additional');
            $res = $fujia->create();
            if($res){
                $r = $fujia->save();
                if($r){
                    $this->redirect("link/fujia");
                }else{
                    $this->error('失败');
                }
            }else{
                $this->error($fujia->geterror());
            }
        }
    }
    public function fujia_del()
    {
        $id = I('get.id');
        $say = M('additional');
        $res=$say->delete($id);
        if($res){
            $this->redirect('Link/fujia');
        }else{
            $this->error('删除失败',U('Link/fujia'),2);
        }
    }
    /**
     * 音乐上传
     * 
     * 
     */
    public function music()
    {
        $data = M()->query("select * from hao_music as hm,hao_music_cate as hmc where hm.mc_id = hmc.mc_id order by hm.music_addtime desc");
        $this->assign('data',$data);
        $this->display();
    }
    public function add_music()
    {
        if(!IS_POST){
            $mc = M('music_cate');
            $mcdata = $mc->select();
            $this->assign('mcdata',$mcdata);
            $this->display();
        }else{
            if(!empty($_FILES)){
                $config = array(
                    'rootPath'  => 'Public/',
                    'savePath'  => 'qingchunpao/home/songs',
                    'maxSize'   => 3*1024*1024,
                    'allowExts' => array('mp3','mp4','jpg','zip')
                );
                $upload = new \Think\Upload($config);// 实例化上传类
                //上传试听文件
                if($_FILES['music_try']['error'] != 4){
                    // 上传文件 
                    $info = $upload->uploadOne($_FILES['music_try']);
                    if($info) {// 上传错误提示错误信息
                        $_POST['music_try'] = $info['savepath'].$info['savename'];
                    }else{// 上传成功
                        $this->error('试听版本上传出错,请重试!');
                    } 
                }
                //上传正式文件
                if($_FILES['music_formal']['error'] != 4){
                    //上传文件
                    $info2 = $upload->uploadOne($_FILES['music_formal']);
                    if($info2){
                        $_POST['music_formal'] = $info2['savepath'].$info2['savename'];
                    }else{
                        $this->error('正式版本上传出错,请重试!');
                    } 
                }
            }
            $_POST['music_addtime'] = time();
            $music = M('music');
            $create = $music->create();
            if($create){
                $add = $music->add();
                if($add){
                    $this->redirect('link/music');
                }else{
                    $this->error('增加音乐信息出错,请重试');
                }
            }else{
                $this->error($music->geterror());
            }
            
        }
    }
    public function edit_music()
    {
        if(!IS_POST){
            $id = I('get.id');
            $music = M('music');
            $mc = M('music_cate');
            $mcdata = $mc->select();
            $data = $music->where(array('music_id'=>$id))->find();
            $this->assign('mcdata',$mcdata);
            $this->assign('data',$data);
            $this->display();
        }else{
            if(!empty($_FILES)){
                $config = array(
                    'rootPath'  => 'Public/',
                    'savePath'  => 'Uploads',
                    'maxSize'   => 3*1024*1024,
                    'allowExts' => array('mp3','mp4','jpg','zip')
                );
                $upload = new \Think\Upload($config);// 实例化上传类
                //上传试听文件
                if($_FILES['music_try']['error'] != 4){
                    // 上传文件 
                    $info = $upload->uploadOne($_FILES['music_try']);
                    if($info) {// 上传错误提示错误信息
                        $_POST['music_try'] = $info['savepath'].$info['savename'];
                    }else{// 上传成功
                        $this->error('试听版本上传出错,请重试!');
                    }
                    
                }
                //上传正式文件
                if($_FILES['music_formal']['error'] != 4){
                    //上传文件
                    $info2 = $upload->uploadOne($_FILES['music_formal']);
                    if($info2){
                        $_POST['music_formal'] = $info2['savepath'].$info2['savename'];
                    }else{
                        $this->error('正式版本上传出错,请重试!');
                    } 
                }
            }
            $music = M('music');
            $create = $music->create();
            if($create){
                $add = $music->save();
                if($add){
                    $this->redirect('link/music');
                }else{
                    $this->error('增加音乐信息出错,请重试');
                }
            }else{
                $this->error($music->geterror());
            }
        }
    }
    public function del_music()
    {
        $id = I('get.id');
        $music = M('music');
        $del = $music->delete($id);
        if($del){
            $this->redirect('link/music');
        }else{
            $this->error('敏感操作,请稍后重试');
        }
    }
    /**
     * 音乐分类修改
     * 
     */
    public function musiccate()
    {
        $mc = M('music_cate');
        $mc_data = $mc->select();
        $this->assign("data",$mc_data);
        $this->display();
    }
    public function add_musiccate()
    {
        if(!IS_POST){
            $this->display();
        }else{
            $config = array(
            'rootPath'  => 'Public/',
            'savePath'  => 'Uploads',
            'exts'      => array('gif','png','jpg')
            );
            if(!empty($_FILES)){
                if($_FILES['mc_logo']['error'] != 4){
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadone($_FILES['mc_logo']); 
                    if($info){
                        $_POST['mc_logo'] = $info['savepath'].$info['savename'];
                    }else{
                        $this->error($upload->getError());
                    }
                }
            }
            $_POST['mc_addtime'] = time();
            $mc = M('music_cate');
            $create = $mc->create();
            if($create){
                $add = $mc->add();
                if($add){
                    $this->redirect("link/musiccate");
                }else{
                    $this->error('添加失败');
                }
            }else{
                $this->error('添加失败');
            }
        }
        
    }
    public function edit_musiccate()
    {
        $mc = M('music_cate');
        if(!IS_POST){
            $id = I('get.id');
            $mcdata = $mc->where(array('mc_id'=>$id))->find();
            $this->assign('data',$mcdata);
            $this->display();
        }else{
            $config = array(
            'rootPath'  => 'Public/',
            'savePath'  => 'Uploads',
            'exts'      => array('gif','png','jpg')
            );
            if(!empty($_FILES)){
                if($_FILES['mc_logo']['error'] != 4){
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadone($_FILES['mc_logo']); 
                    if($info){
                        $_POST['mc_logo'] = $info['savepath'].$info['savename'];
                    }else{
                        $this->error($upload->getError());
                    }
                }
            }
            $mc = M('music_cate');
            $create = $mc->create();
            if($create){
                $add = $mc->save();
                if($add){
                    $this->redirect("link/musiccate");
                }else{
                    $this->error('添加失败');
                }
            }else{
                $this->error('添加失败');
            }
        }
        
    }
    public function del_musiccate()
    {
        $mc = M('music_cate');
        $id = I('get.id');
        $del = $mc->delete($id);
        if($del){
            $this->redirect("link/musiccate");
        }else{
            $this->error('敏感操作,请稍后重试');
        }
    }
}
