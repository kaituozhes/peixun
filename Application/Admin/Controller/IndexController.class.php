<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        if(!isset($_SESSION['Administrator'])){
         $this->redirect('Login/login');
        }

        $cou = D('student');
        $studentres = $cou -> select();
        $this->assign('studentcount',count($studentres));

        $agency = D('agency');
        $agencyres = $agency->select();
        $this->assign('agencycount',count($agencyres));

        $lecturer = D('lecturer');
        $lecturerres = $lecturer->select();
        $this->assign('lecturercount',count($lecturerres));

        $certifi = D('certifi');
        $certifires = $certifi->select();
        $this->assign('certificount',count($certifires));


		
    	$this->display();
    }
    public function area()
    {
    	// 1.实例化Model
    	$area = M('area');

    	// 2.查询数据（只查询省份）
    	$upid = I('get.upid', 0);
        $city_data['upid'] = array('eq',$upid);
    	$data = $area->where($city_data)->select();
    	// dump($data);
    	

    	// 3.返回结果
    	$this->ajaxReturn($data);
    }
}