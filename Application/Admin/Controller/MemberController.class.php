<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 用户管理
 *
 */
class MemberController extends CommonController {
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['Administrator'])){
         $this->redirect('Login/login');
        }

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
    public function edit($id){
    	$member = M('member');
        $data = $member->find($id);
        if(!IS_POST){
            $this->assign('data',$data);
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
    //搜索
    public function search()
    {
        $student = M('student');
        $searchcontent = $_POST['search'];
        $agency_data = $student->where(array('ids'=>$searchcontent))->select();

        $this->assign('data',$agency_data);
        $this->display('student');
    }

    //-----------------------------STUDENT START-----------------
    public function student()
    {
        $student = M('student');
        $student->where('subject_id=""')->delete();
        $agencyid = $_SESSION['Administrator']['agency_id'];
        if(is_null($agencyid)) {
            $this->redirect('Login/login');
        }elseif($agencyid == 0){
            $student = M('student');
            $agency_data = $student->order('student_id desc')->select();
            $this->assign('data',$agency_data);
            $this->display();
        }else{
            //获取当前session中登录者所有的机构权限
            $agencyid = $_SESSION['Administrator']['agency_id'];
            //查找本机构下的科目
            $subject = D('subject');
            $student = D('student');
            $subjectres = $subject->where(array('agency_id'=>$agencyid))->select();
            foreach ($subjectres as $key => $value) {
                $id = $value[subject_id];
                $map['subject_id'] = array('LIKE',"%".$id."%");
                $studentres[] = $student->where($map)->select();
            }
            foreach ($studentres as $key => $value) {
                foreach ($value as $k => $v) {
                    $ar[] = $v;
                }
            }
            $res = $this->clear_arr_unique($ar);
            $this->assign('data',$res);
            $this->display();
        }
    }
    public function student_add()
    {
        $agencyid = $_SESSION['Administrator']['agency_id'];
        if(is_null($agencyid)) {
            $this->redirect('Login/login');
        }elseif($agencyid == 0){
            $a = M('subject');
            $ass = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
            $this->assign('ass',$ass);

            $this->display();
        }else{

            $a = M('subject');
            $ass = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id='.$agencyid)->select();
            $this->assign('ass',$ass);
            $abb = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id!='.$agencyid)->select();
            $this->assign('abb',$abb);
            $this->display();
        }
    }
    //student ADD
    public function student_adds(){
        if($_POST['student_id'])
        {
            //更新
            foreach ($_POST[subject_id] as $key => $value) {
                $str .= $value;
                $str .= ',';
            }
            $str = rtrim($str,',');
            $_POST['subject_id'] = $str;
            $_POST['addtime'] = time();
            $stu = D('student');
            $res = $stu->create();
                if($res){
                    $da = $stu->save();
                    if($da){
                        $this->redirect('member/student');
                    }else{
                        $this->error('添加用户失败',U('member/student_add'),1);
                    }
                }else{
                        $this->error($stu->getError());
                }


            //更新
        }else{
            //添加
            foreach ($_POST[subject_id] as $key => $value) {
                $str .= $value;
                $str .= ',';
            }
            $str = rtrim($str,',');
            $_POST['subject_id'] = $str;
            $_POST['addtime'] = time();
            $stu = D('student');

            $rules = array(
                     array('numeric','','学生学号已经存在',0,'unique',1), // 在新增的时候验证name字段是否唯一
                );
            $res = $stu->validate($rules)->create();
                if($res){
                    $da = $stu->add();
                    if($da){
                        $this->redirect('member/student');
                    }else{
                        $this->error('添加用户失败',U('member/student_add'),1);
                    }
                }else{
                        $this->error($stu->getError());
                }
            }

    }
    public function student_edit()
    {
        if(IS_POST)
        {
            foreach ($_POST[subject_id] as $key => $value)
            {
            $str .= $value;
            $str .= ',';
            }
            $str = rtrim($str,',');
            $_POST['subject_id'] = $str;
            /*$_POST['addtime'] = time();*/
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
        //分权 stsrt
        $agencyid = $_SESSION['Administrator']['agency_id'];
        if(is_null($agencyid)) {
            $this->redirect('Login/login');
            }elseif($agencyid == 0){
                $id = I('id');
                $student = D('student');
                $studentres = $student->where(array('student_id'=>$id))->find();
                $arr = explode(",",$studentres[subject_id]);
                $subject = D('subject');
                $subjectres = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
                $data = $subjectres;
                $this->assign('ass',$data);
                $this->assign('subjectres',$subjectres);
                $choicessubject = array();
                foreach ($arr as $key => $value) {
                    $choicessubject[] = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->where(array('subject_id'=>$value))->find();
                }
                $group_data = $student->where(array('student_id'=>$id))->find();
                    if(strstr($group_data['subject_id'],',')){
                        $group_data['subject_id'] = explode(',',$group_data['subject_id']);
                        $group_data['is_array'] = 1;
                    }
                $this->assign('group_data',$group_data);
                $this->assign('studentres',$studentres);
                $this->assign('choicessubject',$choicessubject);
                $this->display();
        }else{

                $agencyid = $_SESSION['Administrator']['agency_id'];
                $id = I('id');
                //当前学员的基本信息
                $student = D('student');
                $studentres = $student->where(array('student_id'=>$id))->find();
                $arr = explode(",",$studentres[subject_id]);
                $subject = D('subject');
                //全部科目
                $subjectres = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
                $data = $subjectres;
                $this->assign('data',$data);

                //当前机构科目
                $ass = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id='.$agencyid)->select();
                $this->assign('ass',$ass);
                //不是当前机构
                $abb = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id!='.$agencyid)->select();
                $this->assign('abb',$abb);


                $this->assign('subjectres',$subjectres);
                //选择的科目以及对应的机构
                $choicessubject = array();
                foreach ($arr as $key => $value) {
                    $choicessubject[] = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->where(array('subject_id'=>$value))->find();
                }
                //科目选定,分隔成数组
                $group_data = $student->where(array('student_id'=>$id))->find();
                    if(strstr($group_data['subject_id'],',')){
                        $group_data['subject_id'] = explode(',',$group_data['subject_id']);
                        $group_data['is_array'] = 1;
                    }
                $this->assign('group_data',$group_data);
                $this->assign('studentres',$studentres);
                $this->assign('choicessubject',$choicessubject);
                $this->display();

        }






    }


    public function student_del()
    {
        $id = I('id');
        $member = M('student');
        $me = M('certifi');
        $huiyuan = M('member');
        $achievement = M('achievement');
        $abc = $member->where(array('student_id'=>$id))->find();
        $ids = $abc['ids'];
        $bianhao = $abc['numeric'];
        if($member->delete($id)){
                $me->where(array('ids'=>$ids))->delete();
                $huiyuan->where(array('bianhao'=>$bianhao))->delete();
                $this->success('删除成功','');
        }else{
            $this->error('删除用户失败','',1);
        }
    }
    //-------------------------STUDENT OVER---------------------
    public function lecturersearch(){
        $lecturer = M('lecturer');
        $agency_data = $lecturer->where(array('numbering'=>$_POST['search']))->select();
        $this->assign('data',$agency_data);
        $this->display('lecturer');
    }
    //讲师
    public function lecturer()
    {
        $lecturer = M('lecturer');
        $lecturer->where('subject=""')->delete();
        $agencyid = $_SESSION['Administrator']['agency_id'];
        if(is_null($agencyid)) {
            $this->redirect('Login/login');
        }elseif($agencyid == 0){
            $lecturer = M('lecturer');
            $arrUsers = $lecturer->select();
            //二位数组排序
            $sort = array(
             'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
             'field'     => 'addtime',       //排序字段
             );
             $arrSort = array();
             foreach($arrUsers AS $uniqid => $row){
                 foreach($row AS $key=>$value){
                     $arrSort[$key][$uniqid] = $value;
                 }
             }
             if($sort['direction']){
                 array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arrUsers);
             }
            //二位数组排序
            $this->assign('data',$arrUsers);
            $this->display();
        }else{
            //获取当前session中登录者所有的机构权限
            $agencyid = $_SESSION['Administrator']['agency_id'];
            //查找本机构下的科目
            $subject = D('subject');
            $lecturer = D('lecturer');
            $subjectres = $subject->where(array('agency_id'=>$agencyid))->select();
            foreach ($subjectres as $key => $value) {
                $id = $value[subject_id];
                $map['subject'] = array('LIKE',"%".$id."%");
                $lecturerres[] = $lecturer->where($map)->select();
            }
            foreach ($lecturerres as $key => $value) {
                foreach ($value as $k => $v) {
                    $ar[] = $v;
                }
            }
            $arrUsers = $this->clear_arr_uniques($ar);
            //二位数组排序
            $sort = array(
             'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
             'field'     => 'addtime',       //排序字段
             );
             $arrSort = array();
             foreach($arrUsers AS $uniqid => $row){
                 foreach($row AS $key=>$value){
                     $arrSort[$key][$uniqid] = $value;
                 }
             }
             if($sort['direction']){
                 array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arrUsers);
             }
            //二位数组排序
            $this->assign('data',$arrUsers);
            $this->display();
        }
        //实例化分页类(总数据条数，每页数据条数)
/*        $page = new \Think\Page($lecturer->count(),10);
        $page->setConfig('header', '共 %TOTAL_ROW% 条记录');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");*/
/*        $agencyid = $_SESSION['Administrator']['agency_id'];

        $lecturer = M('lecturer');
        $agency_data = $lecturer->select();
        $this->assign('data',$agency_data);
        $this->display();*/
    }
    public function lecturer_add()
    {
        $agencyid = $_SESSION['Administrator']['agency_id'];
        if(!IS_POST){
            $agencyid = $_SESSION['Administrator']['agency_id'];
            if(is_null($agencyid)) {
                $this->redirect('Login/login');
            }elseif($agencyid == 0){
                $subject = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
                $this->assign('ass',$subject);
                $this->display();
            }else{
                $a = M('subject');
                $ass = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id='.$agencyid)->select();
                $this->assign('ass',$ass);
                $abb = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id!='.$agencyid)->select();
                $this->assign('abb',$abb);
                $this->display();
            }
        }else{
            if($_POST['lecturer_id'])
            {
                //更新
                $_POST['addtime'] = time();
                foreach ($_POST[subject] as $key => $value) {
                    $str .= $value;
                    $str .= ',';
                }
                $str = rtrim($str,',');
                $_POST['subject'] = $str;
                $article = M('lecturer');
                $res = $article->create();
                if($res){
                    $r = $article->save();
                    if($r){
                        $this->redirect('member/lecturer');
                    }else{
                        $this->error('添加出错，请重试');
                    }
                }else{
                    $this->error($article->geterror());
                }
            }else{
                //添加
                $_POST['addtime'] = time();
                foreach ($_POST[subject] as $key => $value) {
                    $str .= $value;
                    $str .= ',';
                }
                $str = rtrim($str,',');
                $_POST['subject'] = $str;
                $rules = array(
                     array('numbering','','讲师编号已经存在',0,'unique',1), // 在新增的时候验证name字段是否唯一
                );
                $article = M('lecturer');
                $res = $article->validate($rules)->create();
                if($res){
                    $r = $article->add();
                    if($r){
                        $this->redirect('member/lecturer');
                    }else{
                        $this->error('添加出错，请重试');
                    }
                }else{
                    $this->error($article->geterror());
                }
            }
        }
    }
    public function lecturer_edit()
    {
        if(!IS_POST){
                $agencyid = $_SESSION['Administrator']['agency_id'];
                if(is_null($agencyid)) {
                $this->redirect('Login/login');
                }elseif($agencyid == 0){
                    $id = I('id');
                    //当前讲师的基本信息
                    $lecturer = D('lecturer');
                    $lectureres = $lecturer->where(array('lecturer_id'=>$id))->find();
                    $arr = explode(",",$lectureres[subject]);
                    $subject = D('subject');
                    //全部科目
                    $subjectres = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
                    $data = $subjectres;

                    $this->assign('ass',$data);

                    $this->assign('lectureres',$lectureres);
                    //选择的科目以及对应的机构
                    $choicessubject = array();
                    foreach ($arr as $key => $value) {
                        $choicessubject[] = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->where(array('subject_id'=>$value))->find();

                    }

                    //科目选定,分隔成数组
                    $group_data = $lecturer->where(array('lecturer_id'=>$id))->find();
                        if(strstr($group_data['subject'],',')){
                            $group_data['subject'] = explode(',',$group_data['subject']);
                            $group_data['is_array'] = 1;
                        }
                    $this->assign('group_data',$group_data);
                    $this->display();
                }else{

                    $agencyid = $_SESSION['Administrator']['agency_id'];
                    $id = I('id');
                    //当前学员的基本信息
                    $lecturer = D('lecturer');
                    $lecturerres = $lecturer->where(array('lecturer_id'=>$id))->find();
                    $arr = explode(",",$studentres[subject]);
                    $subject = D('subject');
                    //全部科目
                    $subjectres = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
                    $data = $subjectres;

                    $this->assign('data',$data);

                    //当前机构科目
                    $ass = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id='.$agencyid)->select();
                    $this->assign('ass',$ass);
                    //不是当前机构
                    $abb = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id!='.$agencyid)->select();
                    $this->assign('abb',$abb);


                    $this->assign('subjectres',$subjectres);
                    //选择的科目以及对应的机构
                    $choicessubject = array();
                    foreach ($arr as $key => $value) {
                        $choicessubject[] = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->where(array('subject_id'=>$value))->find();
                    }
                    //科目选定,分隔成数组
                    $group_data = $lecturer->where(array('lecturer_id'=>$id))->find();
                        if(strstr($group_data['subject'],',')){
                            $group_data['subject'] = explode(',',$group_data['subject']);
                            $group_data['is_array'] = 1;
                        }
/*                        var_dump($group_data);exit;*/
                    $this->assign('group_data',$group_data);
                    $this->assign('lectureres',$lecturerres);
/*                    $this->assign('choicessubject',$choicessubject);*/
                    $this->display();

            }

            exit;
        }else{


            $article = M('lecturer');
            /*$_POST['addtime'] = time();*/
            foreach ($_POST[subject] as $key => $value) {
                $str .= $value;
                $str .= ',';
            }
            $str = rtrim($str,',');
            $_POST['subject'] = $str;

            $res = $article->create();
            if($res){
                $r = $article->save();
                if($r){
                    $this->redirect('member/lecturer');
                }else{
                    $this->error('修改出错，请重试');
                }
            }else{
                $this->error($article->geterror());
            }
        }
        $this->display();
    }
    /*机构搜索*/
    public function agencysearch(){
        $agency = M('agency');
        $agency_data = $agency->where(array('agencynumber'=>$_POST['search']))->select();

        $this->assign('data',$agency_data);
        $this->display('agency');

    }



    //培训机构
    public function agency()
    {
        if(I('id') == 2)
        {
            $agency = M('agency');
            $arrUsers = $agency->where(array('agencyclass'=>2))->select();
            $sort = array(
             'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
             'field'     => 'addtime',       //排序字段
             );
             $arrSort = array();
             foreach($arrUsers AS $uniqid => $row){
                 foreach($row AS $key=>$value){
                     $arrSort[$key][$uniqid] = $value;
                 }
             }
             if($sort['direction']){
                 array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arrUsers);
             }
            $this->assign('data',$arrUsers);
            $this->display();
        }elseif(I('id') == 1)
        {
            $agency = M('agency');
            $arrUsers = $agency->where(array('agencyclass'=>1))->select();
            $sort = array(
             'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
             'field'     => 'addtime',       //排序字段
             );
             $arrSort = array();
             foreach($arrUsers AS $uniqid => $row){
                 foreach($row AS $key=>$value){
                     $arrSort[$key][$uniqid] = $value;
                 }
             }
             if($sort['direction']){
                 array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arrUsers);
             }
            $this->assign('data',$arrUsers);
            $this->display();
        }else{
            $agency = M('agency');
            $arrUsers = $agency->select();
            $sort = array(
             'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
             'field'     => 'addtime',       //排序字段
             );
             $arrSort = array();
             foreach($arrUsers AS $uniqid => $row){
                 foreach($row AS $key=>$value){
                     $arrSort[$key][$uniqid] = $value;
                 }
             }
             if($sort['direction']){
                 array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arrUsers);
             }
            $this->assign('data',$arrUsers);
            $this->display();
        }
    }
    //机构
    public function agency_add()
    {
        if(IS_POST){
            /*foreach ($_POST['agencyclass'] as $key => $value) {
                $c .= $value . ',';
            }
            $c = rtrim($c,',');
            $_POST['agencyclass'] = $c;*/

            $table = I('post.table');
            $jump = I('post.jump');
            $object = M($table);
            $_POST['addtime'] = time();
            $rules = array(
                             array('agencynumber','','机构编号已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
                             array('agencyrealname','','机构名称已经存在！',0,'unique',1),
                        );
            $create = $object->validate($rules)->create();
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

    public function agencycommon_update()
    {


        $table = I('post.table');
        $jump = I('post.jump');
        $object = M($table);
        $rules = array(
                         array('agencynumber','','机构编号已经存在！',0,'unique',2), // 在新增的时候验证name字段是否唯一
                         array('agencyrealname','','机构名称已经存在！',0,'unique',2),
                    );
        $create = $object->validate($rules)->create();
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



    /*公共添加方法*/
    public function common_insert()
    {


        $table = I('post.table');
        $jump = I('post.jump');
        $object = M($table);
        $_POST['addtime'] = time();
        $rules = array(
             array('certifi_number','','证书编号已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        );
        $create = $object->validate($rules)->create();
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


    //学员成绩录入[分权]
    public function achievement(){
        $agencyid = $_SESSION['Administrator']['agency_id'];
        if(is_null($agencyid)) {
            $this->redirect('Login/login');
        }elseif($agencyid == 0){
            $id = I('id');
            //查找改学员报考的科目还存不存在
            $aaa = $this->delsub($id);
            $data['subject_id'] = $aaa;
            $student = D('student');
            $student->where(array('student_id'=>$id))->save($data);

            $achievement = M('student');
            $subject = M('subject');
            $achievement_data = $achievement->where(array('student_id'=>I('id')))->find();
            $fenge = explode(',',$achievement_data['subject_id']);
            $subjectres = array();

            foreach ($fenge as $key => $value) {
                $subjectres[] = $subject->where(array('subject_id'=>$value))->find();

            }
            $i = 0;
            $ac = D('achievement');
            $agency = D('agency');
            foreach ($subjectres as $key => $value) {
                $map['student_id'] = array('EQ',$id);
                $map['subject_id'] = array('EQ',$value['subject_id']);
                $acres = $ac->where($map)->find();
                $arr = $agency->where(array('agency_id'=>$value['agency_id']))->find();
                $subjectres[$i]['agency'] = $arr['agencyrealname'];
                $subjectres[$i]['stage'] = $acres['stage'];
                $subjectres[$i]['fen'] = $acres['fen'];
                $i++;
            }
            $this->assign('subjectres',$subjectres);
            $this->assign('data',$achievement_data);
            $this->display();
        }else{
            $id = I('id');

            //↓↓↓↓↓↓↓↓↓查找改学员报考的科目还存不存在
            $aaa = $this->delsub($id);
            $data['subject_id'] = $aaa;
            $student = D('student');
            $student->where(array('student_id'=>$id))->save($data);
            //↑↑↑↑↑↑↑↑↑查找改学员报考的科目还存不存在
            $agencyid = $_SESSION['Administrator']['agency_id'];
            $achievement = M('student');
            $subject = M('subject');
            $achievement_data = $achievement->where(array('student_id'=>I('id')))->find();
            $fenge = explode(',',$achievement_data['subject_id']);
            $subjectres = array();
            foreach ($fenge as $key => $value) {
                $map['subject_id'] = array('EQ',$value);
                $map['agency_id'] = array('EQ',$agencyid);
                $subjectres[] = $subject->where($map)->find();
            }
            foreach ($subjectres as $key => $val) {
            if (empty($val)) {
                continue;
            }
            $arr[] = $val;
            }
            $subjectres = $arr;
            $i = 0;
            $agency = D('agency');
            $ac = D('achievement');
            foreach ($subjectres as $key => $value) {
/*               $map['student_id'] = array('EQ',$id);
                $map['subject_id'] = array('EQ',$value['subject_id']);*/
                $acres = $ac->query('select * from hao_achievement where student_id='.$id.' and subject_id='.$value['subject_id']);

                $arr = $agency->where(array('agency_id'=>$value['agency_id']))->find();
                $subjectres[$i]['agency'] = $arr['agencyrealname'];

                $subjectres[$i]['stage'] = $acres[0]['stage'];
                $subjectres[$i]['fen'] = $acres[0]['fen'];
                $i++;
            }
            $this->assign('subjectres',$subjectres);
            $this->assign('data',$achievement_data);
            $this->display();
        }








    }
    public function achievement_add(){
        $id = I(student_id);
        $member = M('achievement');
        $_POST['addtime'] = time();
        if($member->add($_POST))
        {
/*            $this->success('新增成功',"/index.php/Admin/member/achievement/id/$id");*/
            $this->redirect('Member/achievement', array('id' => $id));
        }else{
            $this->error('添加有误');
        }

        $this->display();

    }
    public function achievement_edit(){
        if(IS_POST)
        {
            $table = I('post.table');
            $jump = I('post.jump');
            $id = I('post.studentid');
            $object = M($table);
            $create = $object->create();
            if($create){
                $edit = $object->save();
                if($edit){
                    /*$this->success('修改成功',"/index.php/Admin/member/achievement/id/$id");*/
                    $this->redirect('Member/achievement', array('id' => $id));
                }else{
                    $this->error('修改出错');
                }
            }else{
                $this->error($object->geterror());
            }

        }
            $studentid =  I('student_id');
            $subjectid =  I('subject_id');
            $member = M('achievement');
            $map['student_id'] = array('EQ',$studentid);
            $map['subject_id'] = array('EQ',$subjectid);
            $data = $member->where($map)->find();
            if($data){

                $this->assign('studentid',$studentid);
                $this->assign('subjectid',$subjectid);
                $this->assign('data',$data);
                $this->display();
            }else{
                $this->assign('studentid',$studentid);
                $this->assign('subjectid',$subjectid);
                $this->display('achievement_add');
            }



    }
    public function certifisearch(){
        $certifi = M('certifi');
        $certifi_data = $certifi->where(array('certifi_number'=>$_POST['search']))->select();
        /*var_dump($certifi_data);exit;*/
/*        $this->assign('show',$page->show());*/
        $this->assign('data',$certifi_data);
        $this->display('certifi');
    }
    //------------------------------------------CERTIFI START---------------
    //CERTIFI LST Authority distribution
    public function certifi(){
            $certifi = M('certifi');
            //删除没有机构证书的成员
            $certifi->where('subject_id=""')->delete();
            $agencyid = $_SESSION['Administrator']['agency_id'];
            if(is_null($agencyid)) {
                $this->redirect('Login/login');
            }elseif($agencyid == 0){
            $student = M('certifi');
            $agency_data = $student->order('certifi_id desc')->select();
            $this->assign('data',$agency_data);
            $this->display();
            }else{
            //获取当前session中登录者所有的机构权限
            $agencyid = $_SESSION['Administrator']['agency_id'];
            $subject = D('subject');
            $student = D('certifi');
            //根据机构ID查找所有该机构下的科目
            $subjectres = $subject->where(array('agency_id'=>$agencyid))->select();
            //根据科目ID查找所有属于该科目的证书
            foreach ($subjectres as $key => $value) {
                $id = $value[subject_id];
                $map['subject_id'] = array('LIKE',"%".$id."%");
                $studentres[] = $student->where($map)->select();
            }
            foreach ($studentres as $key => $value) {
                foreach ($value as $k => $v) {
                    $ar[] = $v;
                }
            }
            //得到结果去重
            $res = $this->clear_cer_uniques($ar);
            $this->assign('data',$res);
            $this->display();

            }

    }
    //CERTIFI ADD Authority distribution
    public function certifi_add(){

        if(!IS_POST)
        {
            $agencyid = $_SESSION['Administrator']['agency_id'];
            if(is_null($agencyid)) {
                $this->redirect('Login/login');
            }elseif($agencyid == 0){
                $a = M('subject');
                $ass = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
                $this->assign('ass',$ass);

                $this->display();
            }else{

                $a = M('subject');
                $ass = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id='.$agencyid)->select();
                $this->assign('ass',$ass);
                $abb = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id!='.$agencyid)->select();
                $this->assign('abb',$abb);
                $this->display();
            }
        }else{
                if($_POST['certifi_id'])
                {
                    foreach ($_POST['subject_id'] as $key => $value)
                    {
                    $str .= $value;
                    $str .= ',';
                    }
                    $str = rtrim($str,',');
                    $_POST['subject_id'] = $str;


                    $object = M(certifi);
                    $create = $object->create();
                    if($create){
                        $edit = $object->save();
                        if($edit){
                            $this->redirect("member/certifi");
                        }else{
                            $this->error('添加有误');
                        }
                    }else{
                        $this->error($object->geterror());
                    }
                }else{
                foreach ($_POST[subject_id] as $key => $value) {
                    $str .= $value;
                    $str .= ',';
                }
                $str = rtrim($str,',');
                $_POST['subject_id'] = $str;
                $_POST['addtime'] = time();

                $stu = D('certifi');

                $res = $stu->create();
                    if($res){
                        $da = $stu->add();
                        if($da){
                            $this->redirect('member/certifi');
                        }else{
                            $this->error('添加用户失败',U('member/certifi_add'),1);
                        }
                    }else{
                            $this->error($stu->getError());
                    }

                }

        }


    }
    //CERTIFI EDIT
    public function certifi_edit(){

        if(IS_POST)
            {
            foreach ($_POST['subject_id'] as $key => $value)
            {
            $str .= $value;
            $str .= ',';
            }
            $str = rtrim($str,',');
            $_POST['subject_id'] = $str;
/*            var_dump($_POST);exit;*/
            /*$_POST['addtime'] = time();*/
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

            $agencyid = $_SESSION['Administrator']['agency_id'];
            if(is_null($agencyid)) {
            $this->redirect('Login/login');
            }elseif($agencyid == 0){
                $id = I('id');
                $student = D('certifi');
                $studentres = $student->where(array('certifi_id'=>$id))->find();
                $arr = explode(",",$studentres[subject_id]);
                $subject = D('subject');
                $subjectres = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
                $data = $subjectres;
                $this->assign('ass',$data);
                $this->assign('subjectres',$subjectres);
                $choicessubject = array();
                foreach ($arr as $key => $value) {
                    $choicessubject[] = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->where(array('subject_id'=>$value))->find();
                }

                $group_data = $student->where(array('certifi_id'=>$id))->find();
                    if(strstr($group_data['subject_id'],',')){
                        $group_data['subject_id'] = explode(',',$group_data['subject_id']);
                        $group_data['is_array'] = 1;
                    }

                $this->assign('group_data',$group_data);
                $this->assign('data',$studentres);
                $this->assign('choicessubject',$choicessubject);
                $this->display();
        }else{

                $agencyid = $_SESSION['Administrator']['agency_id'];
                $id = I('id');
                //当前学员的基本信息
                $student = D('certifi');
                $studentres = $student->where(array('certifi_id'=>$id))->find();
                $arr = explode(",",$studentres[subject_id]);
                $subject = D('subject');
                //全部科目
                $subjectres = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->select();
                $data = $subjectres;
                $this->assign('data',$data);

                //当前机构科目
                $ass = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id='.$agencyid)->select();
                $this->assign('ass',$ass);
                //不是当前机构
                $abb = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id AND a.agency_id!='.$agencyid)->select();
                $this->assign('abb',$abb);


                $this->assign('subjectres',$subjectres);
                //选择的科目以及对应的机构
                $choicessubject = array();
                foreach ($arr as $key => $value) {
                    $choicessubject[] = M('subject as a')->join('hao_agency as b on a.agency_id = b.agency_id')->where(array('subject_id'=>$value))->find();
                }
                //科目选定,分隔成数组
                $group_data = $student->where(array('certifi_id'=>$id))->find();
                    if(strstr($group_data['subject_id'],',')){
                        $group_data['subject_id'] = explode(',',$group_data['subject_id']);
                        $group_data['is_array'] = 1;
                    }
                $this->assign('group_data',$group_data);
                $this->assign('data',$studentres);
                $this->assign('choicessubject',$choicessubject);
                $this->display();

        }
            }

    //------------------------------------------CERTIFI OVER---------------
    public function us(){


        $member = M('member');
        $data = $member->select();
        $this->assign('data',$data);
        /*var_dump($data);exit;*/
        $this->display();

    }
    public function user(){
      $member = M('member');
      $data = $member->where(array('bianhao'=>$_POST['search']))->select();
      $this->assign('data',$data);
      $this->display('us');
    }



    public function useredit(){


        $member = M('lecturer');



        $yizhou = date(strtotime('-7 days'));
        $xianzai = time();
        $map['edit'] = array(array('neq',$xianzai),array('gt',$yizhou),'and');
        $data = $member->where($map)->select();

        $this->assign('jiangshi',$data);
        /*var_dump($data);exit;*/
        $this->display();

    }
    public function medit(){


        $member = M('student');
        $yizhou = date(strtotime('-7 days'));
        $xianzai = time();
        $map['edit'] = array(array('neq',$xianzai),array('gt',$yizhou),'and');
        $data = $member->where($map)->select();

        $this->assign('xueyuan',$data);
        /*var_dump($data);exit;*/
        $this->display();

    }

    /*以下为ajax区域*/
    public function ajax_get_student()
    {
        $ids = I('get.ids');
        $student = M('student');
        $data = $student->where(array('ids'=>$ids))->find();
        $this->ajaxReturn($data);
    }
    /*以下为ajax区域*/
    public function ajax_get_lecturer()
    {

        $ids = I('get.ids');
        $lecturer = M('lecturer');
        $data = $lecturer->where(array('numbering'=>$ids))->find();
        $this->ajaxReturn($data);
    }

    public function ajax_get_certifi()
    {

        $ids = I('get.ids');
        $certifi = M('certifi');
        $data = $certifi->where(array('ids'=>$ids))->find();
        $this->ajaxReturn($data);
    }
    public function ajax_get_stu(){
      $ids = I('get.ids');
      $student = M('student');
      $data = $student->where(array('ids'=>$ids))->find();
      $this->ajaxReturn($data);
    }

    public function us_edit(){
      $id = I('get.id');
      $member = M('member');
      $huiyuanlst = $member->where(array('member_id'=>$id))->find();
      $pwd = $huiyuanlst[member_password];
      if(IS_POST){
        $password = $_POST[member_password];
        if($pwd != $password){
        $_POST['member_password'] = md5($password);
        }
        $res = $member->create();
        if($res){
            $da = $member->save();
            if($da){
                $this->redirect('member/us');
            }else{
                $this->error('修改失败,密码重复',U('member/us'),1);
            }
        }else{
                $this->error($da->getError());
        }
      }
      $this->assign('huiyuanlst',$huiyuanlst);
      $this->display();
    }
    public function us_del(){
      $id = I('get.id');
      $numeric = I('get.numeric');
      $state = I('get.state');
      $member = M('member');
      $student = M('student');
      $lecturer = M('lecturer');
      $data['state'] = 0;
      if($member->where('member_id='.$id)->delete()){
        if($state == 2){
          $student->where(array('numeric'=>$numeric))->save($data);
        }elseif($state == 5){
          $lecturer->where(array('numbering'=>$numeric))->save($data);
        }
        $this->success('删除成功','');
      }else{
        $this->success('删除失败','');
      }
    }


}
