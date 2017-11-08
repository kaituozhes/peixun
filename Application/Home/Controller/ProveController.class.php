<?php
namespace Home\Controller;
use Think\Controller;
class ProveController extends CommonController {
	private static $cateid;
	public function __construct()
	{
		parent::__construct();
		$ass = D('category');
		$res = $ass->where('pid='.I('id'))->select();
		$this->assign('data',$res);

		$categroy = $ass->where('id='.I('id'))->find();
		$this->assign('categroy',$categroy);

		if(I('get.id')){
			self::$cateid = I('get.id');
		}

	}

	public function index()
	{
		$this->assign('title','证书查询');
		if(IS_POST){

			$certifi = M('certifi');
			$sub = D('subject');
			$agency = D('agency');
			if(!empty($_POST['code'])){
				// var_dump($_POST['code']);exit;
			// $res = M()->query("select ce.*,ag.* from hao_certifi as ce,hao_agency as ag where ce.agency = ag.agency_id and ce.certifi_number='".$_POST['code']."'limit 1");
				$res = M()->query("select * from hao_certifi where certifi_number='".$_POST['code']."'limit 1");

			}
			$fenge = explode(',',$res[0][subject_id]);
			foreach ($fenge as $key => $value) {
				 $i = $sub->where(array('subject_id'=>$value))->find();
				 $ag[] = $i[agency_id];
			}
			$ags = array_unique($ag);
			foreach ($ags as $key => $value) {
				$agb = $agency->where(array('agency_id'=>$value))->find();
				$agname .= $agb['agencyrealname'];
				$agname .= ',';
			}
			$agencyname =  rtrim($agname, ',');
			$this->assign('aname',$agencyname);
			$this->assign('a',$res);
		}
		$this->display();
	}

	public function detail()
	{
		$article = M('article');
		$tid = I('get.tid');
		$duart = $article->where(array('tid'=>$tid))->find();
		$this->assign('duart',$duart);
		$this->assign("sortart",$this->get_sortart($tid,$duart['cate_id']));//获取上一篇 下一篇
		$this->display();
	}

/*	public function chengji(){
		$ass = D('category');
		$res = $ass->where('pid=88')->select();
		$this->assign('data',$res);
		$project = $ass->where('id='.I('id'))->find();
		$this->assign('project',$project);
		$this->display();
	}*/


/*	public function xueji(){
		$ass = D('category');
		$res = $ass->where('pid=88')->select();
		$this->assign('data',$res);

		$project = $ass->where('id='.I('id'))->find();
		$this->assign('project',$project);
		$this->display('');

	}*/

	public function xuesheng(){
		$this->assign('title','学生成绩查询');
		if(IS_POST){
				//身份
			$student = M('student');
			$arr = $student->where(array('numeric'=>$_POST['code']))->find();
			$this->assign('student',$arr);
			$achievement = D('achievement');
			$subject = D('subject');
			$agency = D('agency');
			$selec = $achievement->where(array('student_id'=>$arr['student_id']))->select();

			$asdfds = array();
			$i = 0;
			foreach ($selec as $key => $value) {
				$gf = $subject->where(array('subject_id'=>$value[subject_id]))->find();
				$selec[$i]['subject_name'] = $gf[subject_name];

				$gg = $agency->where(array('agency_id'=>$gf[agency_id]))->find();
				$selec[$i]['agencyname'] = $gg[agencyrealname];
				$i++;
			}


		    $this->assign('datas',$selec);
		}

		$this->display();

	}

	public function jiangshi(){
		$this->assign('title','讲师信息查询');
		if(IS_POST){
			$lecturer = D(lecturer);
			$res = $lecturer->where(array('numbering '=>$_POST['code']))->find();
		}

		$arr = explode(',', $res[subject]);
		$subject = D('subject');
		$i = 0;
		foreach ($arr as $key => $value) {
			$kemu = $subject->where(array('subject_id'=>$value))->find();
			$kemus .= $kemu[subject_name].',';
			$i++;
		}
		$res[subject] = $kemus;

		$this->assign('res',$res);
		$this->display();

	}


}
