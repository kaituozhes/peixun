<?php 
namespace Home\Model;
use Think\Model;
class MemberModel extends Model{
   $rules = array(
     array('agencynumber','','机构编号已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
);
}

 ?>