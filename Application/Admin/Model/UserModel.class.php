<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	protected $_auto = array(
		// array('password','md5',3,'function'),
		array('ctime','time',3,'function'),
                // array('addtime','time',3,'function'),
		);
}
?>