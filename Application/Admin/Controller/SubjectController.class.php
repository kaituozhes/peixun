<?php
namespace Admin\Controller;
use Think\Controller;
class SubjectController extends CommonController {
    public function __construct()
    {
        parent::__construct();
        //用户权限组
        //机构
        $agency = D('agency');
        $agencyres = $agency->where(array('agencyclass'=>1))->select();
        $this->assign('jigou',$agencyres);
    }

   public function search(){
        $subject = D('subject');
        $agency = D('agency');
        $res = $subject->where(array('subject_name'=>$_POST['search']))->order('addtime desc')->select();
        $i = 0;
        foreach ($res as $key => $value) {
            $agencyname = $agency->where(array('agency_id'=>$value['agency_id']))->find();
            $res[$i][agencyname] = $agencyname[agencyrealname];
            $i++;
        }

        $this->assign('sub',$res);
        $this->display('lst');
   }
    //科目列表页分权
   public function lst(){
    $agencyid = $_SESSION['Administrator']['agency_id'];
    if(is_null($agencyid)) {
        $this->redirect('Login/login');
    }elseif($agencyid == 0){
        $subject = D('subject');
        $agency = D('agency');
        $res = $subject->order('addtime desc')->select();
        $i = 0;
        foreach ($res as $key => $value) {
        	$agencyname = $agency->where(array('agency_id'=>$value['agency_id']))->find();
        	$res[$i][agencyname] = $agencyname[agencyrealname];
        	$i++;
        }
        $this->assign('sub',$res);
        $this->display();
    }else{
        $subject = D('subject');
        $agency = D('agency');
        $res = $subject->order('addtime desc')->where(array('agency_id'=>$agencyid))->select();
        $i = 0;
        foreach ($res as $key => $value) {
        	$agencyname = $agency->where(array('agency_id'=>$value['agency_id']))->find();
        	$res[$i][agencyname] = $agencyname[agencyrealname];
        	$i++;
        }
        $this->assign('sub',$res);
        $this->display();
    }

    }
     //科目添加页分权
    public function add(){
    $agencyid = $_SESSION['Administrator']['agency_id'];
        if(is_null($agencyid)) {
        $this->redirect('Login/login');
    }elseif($agencyid == 0){
        $agency = D('agency');
        $agencyre = $agency->where(array('agencyclass'=>1))->select();
        $this->assign('jigous',$agencyre);
        $this->display();
    }else{
        $agency = D('agency');
        $agencyre = $agency->where(array('agency_id'=>$agencyid))->select();
        $this->assign('jigous',$agencyre);
        $this->display();
    }

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
                $this->redirect("subject/$jump");
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
        $table = I('post.table');
        $jump = I('post.jump');
        $object = M($table);
        $create = $object->create();
        if($create){
            $edit = $object->save();
            if($edit){
                $this->redirect("subject/$jump");
            }else{
                $this->error('修改有误');
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
            $this->redirect("subject/$jump");
        }else{
            $this->error('删除有误');
        }
    }

    /**
     agency add subject
    **/
    public function subjectadd()
    {
        $_POST['addtime'] = time();
        $object = D('subject');
       if($object->add($_POST)){
            $this->success('添加完成','/index.php/admin/subject/lst',3);
       }else{
            $this->error('操作失败','',3);;
       }

    }

    /**
    修改
    **/
   public function edit(){
    $subject = D('subject');
    if(IS_POST){

        $_POST['addtime'] = time();
        $ok = $subject->where(array('subject_id'=>$_POST['subject_id']))->save($_POST);
        if($ok){
            $this->success('更新完成','/index.php/Admin/subject/lst',2);
        }else{
            $this->error('更新失败');
        }
    }
    $map['agency_id'] = array('EQ',$subjectres['agency_id']);
    //分布权限
    $agencyid = $_SESSION['Administrator']['agency_id'];
        if(is_null($agencyid)) {
        $this->redirect('Login/login');
    }elseif($agencyid == 0){
        $subjectres = $subject->where('subject_id='.I('id'))->find();
        $agency = D('agency');
        $agencyco = $agency->where(array('agencyclass'=>1))->select();
        $this->assign('agencyco',$agencyco);
        // $map['agency_id'] = array('EQ',$subjectres['agency_id']);
        // $map['agencyclass'] = array('EQ','1');
        $agencyres = $agency->where(array('agency_id'=>$subjectres['agency_id']))->find();
        $this->assign('agency',$agencyres);
        $this->assign('data',$subjectres);
        $this->display();
    }else{
        $subjectres = $subject->where('subject_id='.I('id'))->find();
        $agency = D('agency');
        $agencyco = $agency->where(array('agency_id'=>$agencyid))->select();
        $this->assign('agencyco',$agencyco);
        $agencyres = $agency->where(array('agency_id'=>$subjectres['agency_id']))->find();
        $this->assign('agency',$agencyres);
        $this->assign('data',$subjectres);
        $this->display();
    }
   }



}
