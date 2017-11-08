<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 用户管理
 * 
 */
class StudentController extends CommonController {
    public function __construct()
    {
        parent::__construct();
        //用户权限组
        $group = M('auth_group');
        $group_data = $group->select();
        $this->assign('group_data',$group_data);
        //培训机构列表
        $agency = M('agency');
        $agency_data = $agency->select();
        $this->assign('agency_data',$agency_data);
    }
    public function index(){
    	$member = M('member');
    	//实例化分页类(总数据条数，每页数据条数)
    	$page = new \Think\Page($member->count(),5);
    	$page->setConfig('header', '共 %TOTAL_ROW% 条记录');
    	$page->setConfig('first', '首页');
    	$page->setConfig('last', '末页');
    	$page->setConfig('prev','上一页');
    	$page->setConfig('next','下一页');
    	$page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
    	$this->assign('show',$page->show());
    	$data = $member->limit($page->firstRow,$page->listRows)->select();
    	$this->assign('data',$data);
    	$this->display();
    }
    public function add(){
        if(!IS_POST){
            $this->display();
        }else{
            if(!empty($_FILES)){
                if($_FILES['memberimg']['error'] != 4){
                    $config = array(
                        'rootPath'  => 'Public/',
                        'savePath'  => 'Uploads',
                        'exts'      => array('gif','png','jpg')
                        );
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadOne($_FILES['memberimg']);
                    if($info){
                        $_POST['memberimg'] = $info['savepath'].$info['savename'];
                    }else{
                        $this->error($upload->getError());
                    }
                }
            }
            $_POST['member_password'] = md5(I('post.member_password'));
            $_POST['member_addtime'] = time();
            $member = M('member');
            $res = $member->create();
            if($res){
                $da = $member->add();
                if($da){
                    $this->redirect('member/index');
                }else{
                    $this->error('添加用户失败',U('member/add'),1);
                }
            }else{
                    $this->error($gear->getError());
            }
        } 
    }
    public function edit(){
        $id = I('id');
    	$member = M('student');
        $agency = M('agency');
        $group_data = $member->join('hao_agency as b ON hao_student.agency = b.agency_id ')->where(array('student_id'=>$id))->field('hao_student.*,b.agency_id,b.agencyrealname')->find();
        $this->assign('d',$group_data);
            if(strstr($group_data['agency'],',')){
                $group_data['agency'] = explode(',',$group_data['agency']);
                $group_data['is_array'] = 1;
            }

            $this->assign('group_data',$group_data);
            //权限分类
            $auth = M('agency');
            $data = $auth->select();

            $this->assign('data',$data);
            $this->display();
        if(!IS_POST){ 

        }else{
            if(!empty($_FILES)){
                if($_FILES['memberimg']['error'] != 4){
                    $config = array(
                        'rootPath'  => 'Public/',
                        'savePath'  => 'Uploads',
                        'exts'      => array('gif','png','jpg')
                        );
                    $upload = new \Think\Upload($config);
                    $info = $upload->uploadOne($_FILES['memberimg']);
                    if($info){
                        $_POST['memberimg'] = $info['savepath'].$info['savename'];
                    }else{
                        $this->error($upload->getError());
                    }
                }
            }
            if($data['member_password'] != I('post.member_password')){
                $_POST['member_password'] = md5(I('post.member_password'));
            }
            $member = M('member');
            $res = $member->create();
            if($res){
                $da = $member->save();
                if($da){
                    $this->redirect('member/index');
                }else{
                    $this->error('添加用户失败',U('member/add'),1);
                }
            }else{
                    $this->error($gear->getError());
            }
        } 
    }
    public function del($id){
        $member = M('member');
        $res = $member->delete($id);
        if($res){
            $this->redirect('member/index');
        }else{
            $this->error('删除用户失败',U('member/index'),1);
        }
    }
    //学员
    public function student()
    {
        $student = M('student');
        $arr = $student->select();
        $this->assign('member',$arr);
        //实例化分页类(总数据条数，每页数据条数)
        $page = new \Think\Page($student->count(),10);
        $page->setConfig('header', '共 %TOTAL_ROW% 条记录');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");

        $agency_data = $student->join('hao_auth_group as hag ON hao_student.auth = hag.group_id')->join('hao_agency as hcy ON hao_student.agency = hcy.agency_id')->limit($page->firstRow,$page->listRows)->select();
        $this->assign('show',$page->show());
        $this->assign('data',$agency_data);
        $this->display();
    }
    public function student_add()
    {
    	$a = D('agency');
    	$jigou = $a->select();
    	$this->assign('jigou',$jigou);

        $this->display();
    }
    public function student_edit()
    {
        $this->display();
    }

    //讲师
    public function lecturer()
    {
        $lecturer = M('lecturer');
        //实例化分页类(总数据条数，每页数据条数)
        $page = new \Think\Page($lecturer->count(),10);
        $page->setConfig('header', '共 %TOTAL_ROW% 条记录');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
        
        $agency_data = $lecturer->join('hao_auth_group as hag ON hao_lecturer.auth = hag.group_id')->join('hao_agency as hcy ON hao_lecturer.agency = hcy.agency_id')->limit($page->firstRow,$page->listRows)->select();
        $this->assign('show',$page->show());
        $this->assign('data',$agency_data);
        $this->display();
    }
    public function lecturer_add()
    {
        $this->display();
    }
    public function lecturer_edit()
    {
        $this->display();
    }


    //培训机构
    public function agency()
    {
        $agency = M('agency');
        //实例化分页类(总数据条数，每页数据条数)
        $page = new \Think\Page($agency->count(),10);
        $page->setConfig('header', '共 %TOTAL_ROW% 条记录');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
        
        $agency_data = $agency->join('hao_auth_group as hag ON hao_agency.auth = hag.group_id')->limit($page->firstRow,$page->listRows)->select();

        $this->assign('show',$page->show());
        $this->assign('data',$agency_data);
        $this->display();
    }
    public function agency_add()
    {

        $this->display();
    }
    public function agency_edit()
    {	
    	$agencyModel = M('agency');
    	$id = I('get.id');
    	$res = $agencyModel -> where('agency_id='.$id) ->find();
    	$this->assign('agencyres',$res);
        $this->display();
    }

    

    /*公共添加方法*/
    public function common_insert()
    {   

        $table = I('post.table');
        $jump = I('post.jump');
        $object = M($table);
        $_POST['addtime'] = time();
        $create = $object->create();
        if($create){
            $add = $object->add();
            if($add){
                $this->redirect("member/$jump");
            }else{
                $this->error('添加有误');
            }
        }else{
            $this->error($object->geterror());
        }
    }

    /*公共修改方法*/
    public function common_update()
    {   
        var_dump($_POST);exit;
        $table = I('post.table');
        $jump = I('post.jump');
        $object = M($table);
        $create = $object->create();
        if($create){
            $edit = $object->save();
            if($edit){
                $this->redirect("member/$jump");
            }else{
                $this->error('添加有误');
            }
        }else{
            $this->error($object->geterror());
        }
    }

    /*公共删除方法*/
    public function common_del()
    {
        $id = I('get.id');
        $table = I('get.table');
        $jump = I('get.jump');
        $object = M($table);
        $del = $object->delete($id);
        if($del){
            $this->redirect("member/$jump");
        }else{
            $this->error('删除有误');
        }
    }
}