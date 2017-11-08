<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 删除控制器
 * qq：87080912
 */
class DelController extends CommonController {
    public function agencydel(){
        $id = I('id');
        $delsubject = $this->delsubject($id);
        if($delsubject == 1 ){
          echo '科目删除成功...<br>';
          $agencyok = $this->delagency($id);
          if ($agencyok == 1) {
            $this->success('机构删除成功','');
          }
        }elseif($delsubject == 2 ){
          echo '该机构没有科目';
          $agencyok = $this->delagency($id);
          if ($agencyok == 1) {
            $this->success('机构删除成功','');
          }
        }else{
          echo '删除失败';
        }

        //删除学生student
    }
    //删除科目
    public function delsubject($id){
      $delsubject = D('subject');
      $res = $delsubject->where(array('agency_id'=>$id))->select();
      if(!empty($res)){
        if($delsubject->where(array('agency_id'=>$id))->delete()){
          return 1;
        }else{
          return 3;
        }
      }else{
        return 2;
      }
    }

    public function delagency($id){
      $agencyres = D('agency');
      if($agencyres->where(array('agency_id'=>$id))->delete()){
        return 1;
      }else{
        return 2;
      }

    }



}
