<?php
namespace Admin\Controller;
use Think\Controller;
class IndentController extends Controller {
     public function index(){

        header('content-type:text/html;charset=utf-8');
        $user = M('orders');
        //实例化分页类
        // $where=[];
        // $proname=$_GET['proname'];
        // dump($proname);
        $where=array('like','%'.$proname.'%');
        $page = new \Think\Page($user->count(),5);
        $page->setConfig('header', '共 %TOTAL_ROW% 条记录');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme',"共 %TOTAL_ROW% 条记录 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"
);
        $this->assign('show',$page->show());
        $data = $user->join('__USER__ ON __ORDERS__.uid = __USER__.id','LEFT')->join('__DETAILS__ ON __ORDERS__.id = __DETAILS__.oid','LEFT')->limit($page->firstRow,$page->listRows)->select();
        $this->assign('data',$data);
        $this->display();
    }
    public function detail(){
        $user = M('details');
        $id = I('get.id');
        $data = $user->query("select shop_orders.*,shop_details.*,shop_goods.uid,shop_store.area,shop_store.name as cname from shop_details,shop_orders,shop_goods,shop_store where shop_orders.id = shop_details.oid and shop_details.proid = shop_goods.id and shop_goods.uid = shop_store.id and shop_details.id=$id limit 1");
        $this->assign('data',$data);
        $this->display();
    }
    public function change(){
        $order =  M('orders');
        $id = I('get.id');
        //获取在未修改之前的状态，只有在状态为待发货的状态下才能发货，其他状态均不能发货
        $states = $order->field('shop_orders.states,shop_details.id')->table('shop_orders,shop_details')->where("shop_orders.id = shop_details.oid and shop_orders.id = $id")->find();
        $state = $states['states'];
        $did = $states['id'];
        if($state == 1){
            $car['states'] = 2;
            $data = $order->where(['id'=>$id])->save($car);
            $this->redirect('Indent/detail',array('id'=>$did));
        }else{
            $this->error('现在不能点发货哦亲',U('Indent/detail',array('id'=>$did)),2);
        }
    }
    public function fade(){
        //实例化订单表
        $order =  M('orders');
        //获取当前订单表的id
        $id = I('get.id');
        $states = $order->field('shop_orders.states,shop_details.id')->table('shop_orders,shop_details')->where("shop_orders.id = shop_details.oid and shop_orders.id = $id")->find();
        $state = $states['states'];
        $did = $states['id'];
        if($state == 5){
            $car['states'] = 6;
            $data = $order->where(['id'=>$id])->save($car);
            $this->redirect('Indent/detail',array('id'=>$did));
        }else{
            $this->error('现在不能点退款哦亲',U('Indent/detail',array('id'=>$did)),2);
        }
    }
    public function edit($id){
        $user = M('orders');
        $data = $user->join('__USER__ ON __ORDERS__.uid = __USER__.id','LEFT')->join('__DETAILS__ ON __ORDERS__.id = __DETAILS__.oid','LEFT')->find();
        $this->assign('data',$data);
        $this->display();
    }
    public function update(){
        header('content-type:text/html;charset=utf-8');
        $order = D('orders');
        $id = I('post.id');
        $detail = D('details');
        $ord = $order->field('name,phone,place')->create();
        $det = $detail->create();
        if($det || $ord){
            $d = $detail->save();
            $oid = $detail->field('oid')->where(['id'=>$id])->find();
            $o = $order->where(['id'=>$oid['oid']])->setField($ord);
            if($o || $d){
                $this->success('修改成功',U('Indent/index'));
            }else{
                $this->error('修改失败');
            }
        }
    }
    public function del($id){
        $user = M('orders');

        $dat = M('details');
        $oid = $dat->field('oid')->where(['id'=>$id])->find();
        // dump($oid['oid']);die;
        $d = $user->delete($oid['oid']);
        $x = $dat->delete($id);
        if($d && $x){
            $this->success('删除成功',U('indent/index'));
        }else{
            $this->error('删除失败',U('indent/index'));
        }
    }
}
