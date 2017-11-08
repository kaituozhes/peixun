<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends CommonController {
	private $ath = array();
	private $role;
	public function __construct()
	{
		parent::__construct();
		if(!$this->get_homeuser()){
			$this->redirect('user/login');
		}
		$this->role = $auth = $this->get_homeuser('member_auth');
		$group = M('auth_group');
		$ate = M('authcate');

		$auth_group = $group->where(array('group_id'=>$auth))->find();
		$auth_cate = array();
		if(strstr($auth_group['group_list'],',')){
			$ag = explode(',',$auth_group['group_list']);
			foreach ($ag as $v) {
				array_push($auth_cate,$ate->where(array('id'=>$v))->find());
			}
		}else{
			array_push($auth_cate,$ate->where(array('id'=>$auth_group['group_list']))->find());
		}
		$this->ath = $auth_cate;
		$this->assign('auth_cate',$auth_cate);

		//获取机构列表
		$agency = M('agency');
		$agency_data = $agency->select();
		$this->assign('agency_data',$agency_data);

		//权限
		$this->assign('role',$this->role);
	}

	public function index()
	{

		if(!empty($this->ath)){
			$function = $this->ath[0]['function'];
			$this->redirect("member/$function");
		}
	}

	/*成绩查询*/
	public function results()
	{

	$this->assign('title','成绩查询');
	//身份
	$student = M('student');
	$arr = $student->where('ids="'.$_SESSION['homeuser']['code'].'"')->find();
	$this->assign('student',$arr);
	$studentid = $arr['student_id'];
	$subres = explode(',',$arr['subject_id']);
	$achievement = D('achievement');
	$subject = D('subject');
	$agency = D('agency');
	$i = 0;
	foreach ($subres as $key => $value) {
		$gf = $subject->where(array('subject_id'=>$value))->find();
		$selec[$i]['subject_name'] = $gf[subject_name];
		$map['student_id'] = array('EQ',$studentid);
		$map['subject_id'] = array('EQ',$value);
		$jieduan = $achievement->where($map)->find();
		$selec[$i]['stage'] = $jieduan['stage'];
		$selec[$i]['fen'] = $jieduan['fen'];
		$gg = $agency->where(array('agency_id'=>$gf[agency_id]))->find();
		$selec[$i]['agencyname'] = $gg[agencyrealname];
		$i++;
	}

	$this->assign('datas',$selec);
		$this->display();
	}

	/*学籍查询*/
	public function schoolroll()
	{
		//--------------------------
		$this->assign('title','学籍查询');
		$achievement = M('achievement');
		$data = M()->query("select ag.agencyrealname,ac.course,ce.certifi_number from hao_achievement as ac,hao_agency as ag,hao_certifi as ce where ac.agency = ag.agency_id and ac.ids = ce.ids and ac.ids = '".$_SESSION['homeuser']['code']."'");
		/*var_dump($data);*/
		$this->assign('dataa',$data);

		$member = M('member');
		$huiyuanlst = $member->where(array('code'=>$_SESSION['homeuser']['code']))->find();
		$this->assign('huiyuanlst',$huiyuanlst);


		//--------------------------
		$mid = $this->get_homeuser('member_id');
		$student = M('student');
		$data = $student->where(array('ids'=>$_SESSION['homeuser']['code']))->select();

		$this->assign('data',$data);
		$this->display();
	}

	/*学生信息管理*/
	public function studentinfo()
	{
		$student = M('student');
		$course = M('course');
		if($this->role == 3){
			$agency = M('agency');
			$agency_data = $agency->where(array('mid'=>$this->get_homeuser('member_id')))->find();
			$student_data = $student->field('hao_student.*,ag.agencyrealname')->join('hao_agency as ag ON hao_student.agency = ag.agency_id')->where(array('agency'=>$agency_data['agency_id']))->select();
		}else{
			$student_data = $student->field('hao_student.*,ag.agencyrealname')->join('hao_agency as ag ON hao_student.agency = ag.agency_id')->select();
		}
		foreach ($student_data as $k => $v) {
			$cou = $course->where(array('course_id'=>$v['course']))->find();
			$student_data[$k]['course'] = $cou['course_name'];
		}
		$this->assign('student',$student_data);
		$this->display();
	}

	public function student_add()
	{
		if(!IS_POST){
			$this->display();
		}else{
			$student = M('student');
			$elective = M('elective');
			$st = array(
				'numeric' => I('post.numeric'),
				'realname' => I('post.realname'),
				'sex' => I('post.sex'),
				'birth' => I('post.birth'),
				'agency' => I('post.agency'),
				'course' => I('post.course'),
				'addtime' => time()
			);
			$add = $student->add($st);
			$chengji = array(
					'student_id' => $add,
					'course_id' => I('post.course'),
				);
			$add2 = $elective->add($chengji);
            if($add2){
                $this->redirect("member/studentinfo");
            }else{
                $this->error('添加有误');
            }
		}
	}

/*课程信息管理*/
	public function course()
	{
		$course = M('course');
		if($this->role == 3){
			$agency = M('agency');
			$mid = $this->get_homeuser('member_id');
			$agency_data = $agency->where(array('mid'=>$mid))->find();
			$course_data = $course->join('hao_agency as ag ON hao_course.course_agency = ag.agency_id')->where(array('course_agency'=>$agency_data['agency_id']))->select();
		}else{
			$course_data = $course->join('hao_agency as ag ON hao_course.course_agency = ag.agency_id')->select();
		}


		$this->assign('course',$course_data);
		$this->display();
	}

	public function course_add()
	{
		$this->display();
	}

	public function course_edit()
	{
		$id = I('get.id');
		$course = M('course');
		$data = $course->where(array('course_id'=>$id))->find();
		$this->assign('data',$data);
		$this->display();
	}


	/*讲师管理*/
	public function lecturer()
	{
		$member = M('member');
		$huiyuanlst = $member->where(array('code'=>$_SESSION['homeuser']['code']))->find();
		$this->assign('huiyuanlst',$huiyuanlst);

		$this->assign('title','讲师');
		$lecturer = M('lecturer');
		$ids = $_SESSION['homeuser']['bianhao'];
		$arr = $lecturer->where(array('numbering'=>$ids))->find();


/*		$course = M('course');
		if($this->role == 3){
			$agency = M('agency');

			$agency_data = $agency->where(array('mid'=>$this->get_homeuser('member_id')))->find();
			$lecturer_data = $lecturer->field('hao_lecturer.*,ag.agencyrealname')->join('hao_agency as ag ON hao_lecturer.agency = ag.agency_id')->where(array('agency'=>$agency_data['agency_id']))->select();
		}else{

			$lecturer_data = $lecturer->where('numbering="'.$_SESSION['homeuser']['code'].'"')->find();

		}*/
/*		foreach ($lecturer_data as $k => $v) {
			$cou = $course->where(array('course_id'=>$v['subject']))->find();
			$lecturer_data[$k]['subject'] = $cou['course_name'];
		}*/

		$this->assign('lecturer',$arr);
		$this->display();
	}

	public function lecturer_add()
	{
		$this->display();
	}

	public function lecturer_edit()
	{
		if(IS_POST){

	        $table = I('post.table');
	        $jump = I('post.jump');
	        $_POST['edit'] = time();
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
		$id = I('id');
		$lecturer = M('lecturer');
		$data = $lecturer->where(array('lecturer_id'=>$id))->find();
		$this->assign('data',$data);
		$course = M('course');
		$course_data = $course->where(array('course_agency'=>$data['agency']))->select();
		$this->assign('course',$course_data);
		$this->display();
	}

	/*学生成绩管理*/
	public function studentresults()
	{

		$elective = M('elective');
		$data = $elective->join('hao_student as st ON hao_elective.student_id = st.student_id')->join('hao_course as cou ON hao_elective.course_id = cou.course_id')->select();
		$this->assign('data',$data);
		$this->display();
	}

	/*证书管理*/
	public function certificate()
	{
		$this->display();
	}

	/*培训机构管理*/
	public function train()
	{
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
    	$table = I('post.table');
        $jump = I('post.jump');
        $object = M($table);
        $create = $object->create();
        if($create){
            $save = $object->save();
            if($save){
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
    		$this->error('删除失败');
    	}
    }


    public function ajax_get_course()
    {
    	$agid = I('get.agid');
    	$course = M('course');
    	$data = $course->where(array('course_agency'=>$agid))->select();
    	$this->ajaxReturn($data);
    }

	public function ajax_get_schoolroll()
	{
		$search = I('get.search');//学号或者姓名
		$data = M()->query("select * from hao_student as st,hao_agency as ag,hao_course as co where st.agency = ag.agency_id and st.course = co.course_id and (st.realname = '{$search}' or st.numeric = '{$search}')");
		$this->ajaxReturn($data);
	}

	public function ajax_bind_st()
	{
		$sid = I('get.sid');
		$mid = $this->get_homeuser('member_id');
		$sm = array(
			'mid' => $mid,
		);
		$student = M('student');

		$edit = $student->where(array('student_id'=>$sid))->save($sm);
		if($edit){
			echo 1;
		}else{
			echo 2;
		}

	}
	/*公共修改方法*/
    public function schoolrolledit()
    {
			$this->assign('title','修改资料');
    	if(IS_POST){

	    	$table = I('post.table');
	        $jump = I('post.jump');
	        $object = M($table);
	        $_POST['edit'] = time();
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
    	$students = D(student);
    	$id = I('id');
    	$arr = $students->where(array('student_id'=>$id))->find();
    	$this->assign('arr',$arr);
    	$this->display();

    }

		public function pasedit(){
			$this->assign('title','修改密码');
			$id = I('get.id');
			$member = M('member');
			$huiyuanlst = $member->where(array('code'=>$_SESSION['homeuser']['code']))->find();
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
								$this->redirect('member/schoolroll');
						}else{
								$this->error('修改失败,密码重复',U('member/schoolroll'),1);
						}
				}else{
								$this->error($da->getError());
				}
			}
			$this->assign('huiyuanlst',$huiyuanlst);
			$this->display();
		}
		public function passedit(){
			$id = I('get.id');
			$member = M('member');
			$huiyuanlst = $member->where(array('code'=>$_SESSION['homeuser']['code']))->find();
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
								$this->redirect('member/lecturer');
						}else{
								$this->error('修改失败,密码重复',U('member/lecturer'),1);
						}
				}else{
								$this->error($da->getError());
				}
			}
			$this->assign('huiyuanlst',$huiyuanlst);
			$this->display();
		}



}
