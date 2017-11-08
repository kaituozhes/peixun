<?php
namespace Admin\Controller;

use Think\Controller;

// 定义总控制器，做权限判断，如果登陆者有对应的权限，就放行，如果没有对应的权限，则阻止用户
class CommonController extends Controller {
 // _initialize():TP是封装之后的方法，会自动执行的方法（相当于__construct()）
	public function _initialize(){

		//权限判定
		$auth = new \Think\Auth();
		//判断
		$a = CONTROLLER_NAME.'/'.ACTION_NAME;
		// // $auth->check(权限,用户id)
		// if(!$auth->check($a,16)){
		// 	$this->error('没有权限');
		$this->assign('session',$_SESSION['Administrator']['username']);
		}
//二维数组去重
	public function clear_arr_unique($arr_item)
	{
	    if(empty($arr_item) && !is_array($arr_item)){
	        return false;
	    }
	    $att = array();
	    foreach ($arr_item as $key => $value) {
	        if(!in_array($value['numeric'],$att)){
	            $att[] = $value['numeric'];
	        }else{
	            unset($arr_item[$key]);
	        }
	    }
	    return $arr_item;
	}
//二维数组去重
	public function clear_arr_uniques($arr_item)
	{
	    if(empty($arr_item) && !is_array($arr_item)){
	        return false;
	    }
	    $att = array();
	    foreach ($arr_item as $key => $value) {
	        if(!in_array($value['lecturer_id'],$att)){
	            $att[] = $value['lecturer_id'];
	        }else{
	            unset($arr_item[$key]);
	        }
	    }
	    return $arr_item;
	}


	//二维数组去重
	public function clear_cer_uniques($arr_item)
	{
	    if(empty($arr_item) && !is_array($arr_item)){
	        return false;
	    }
	    $att = array();
	    foreach ($arr_item as $key => $value) {
	        if(!in_array($value['certifi_id'],$att)){
	            $att[] = $value['certifi_id'];
	        }else{
	            unset($arr_item[$key]);
	        }
	    }
	    return $arr_item;
	}

	//删除学生选择的科目去重
	public function clear_stu_uniques($arr_item)
	{
	    if(empty($arr_item) && !is_array($arr_item)){
	        return false;
	    }
	    $att = array();
	    foreach ($arr_item as $key => $value) {
	        if(!in_array($value['student_id'],$att)){
	            $att[] = $value['student_id'];
	        }else{
	            unset($arr_item[$key]);
	        }
	    }
	    return $arr_item;
	}


	//查找改学员报考的科目还存不存在
	public function delsub($id){
			$studentres = D('student');
			$ach = D('achievement');
			$sub = D('subject');
			$subject_lst = $studentres -> where(array('student_id'=>$id))->find();
			$str = explode(',',$subject_lst[subject_id]);
			foreach ($str as $key => $value) {
				$subres = $sub->where(array('subject_id'=>$value))->find();
				if(!is_null($subres[subject_id])){
					$strs .= $subres['subject_id'];
					$strs .= ",";
				}else{
					 $this->delach($value);
				}
			}
			$subject_id = rtrim($strs, ',');
			return $subject_id;
	}
			//删除科目
			public  function delach($ids){
				$achres = D('achievement');
				$achres->where('subject_id='.$ids)->delete();
			}








	}
