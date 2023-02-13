<?php

namespace  Netgsm\Netsantral;

use Exception;

class Package
{

  private $username;
  private $password;
  public function __construct()
  {
      if(isset($_ENV['NETGSM_USERCODE']))
      {
          $this->username=$_ENV['NETGSM_USERCODE'];
      }
      else{
          $this->username='x';
      }
      if(isset($_ENV['NETGSM_PASSWORD']))
      {
          $this->password=$_ENV['NETGSM_PASSWORD'];
      }
      else{
          $this->password='x';
      }
      
  }
    public function cagribaslat(array $data):array
    {
       
        !isset($data['customer_num']) ? $data['customer_num']=null:$data['customer_num']=$data['customer_num'];
        !isset($data['pbxnum']) ? $data['pbxnum']=null:$data['pbxnum']=$data['pbxnum'];
        !isset($data['internal_num']) ? $data['internal_num']=null:$data['internal_num']=$data['internal_num'];
        !isset($data['ring_timeout']) ? $data['ring_timeout']=null:$data['ring_timeout']=$data['ring_timeout'];
        !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id'];
        !isset($data['originate_order']) ? $data['originate_order']="if":$data['originate_order']=$data['originate_order'];
        !isset($data['trunk']) ? $data['trunk']=null:$data['trunk']=$data['trunk'];   
        !isset($data['hide_callerid']) ? $data['hide_callerid']=null:$data['hide_callerid']=$data['hide_callerid'];
        !isset($data['caller_text']) ? $data['caller_text']=null:$data['caller_text']=$data['caller_text'];
        !isset($data['called_text']) ? $data['called_text']=null:$data['called_text']=$data['called_text'];
        !isset($data['caller_record']) ? $data['caller_record']=null:$data['caller_record']=$data['caller_record'];
        !isset($data['called_record']) ? $data['called_record']=null:$data['called_record']=$data['called_record'];
        !isset($data['wait_response']) ? $data['wait_response']=0:$data['wait_response']=$data['wait_response'];
       
        $url= "http://crmsntrl.netgsm.com.tr:9111/".$this->username."/originate?username=".$this->username."&password=".$this->password."&customer_num=".$data["customer_num"]."&pbxnum=".$data['pbxnum']."&internal_num=".$data['internal_num']."&ring_timeout=".$data['ring_timeout']."&crm_id=".$data['crm_id']."&wait_response=".$data['wait_response']."&originate_order=".$data["originate_order"]."&trunk=".$data["trunk"];
      
        if(isset($data['call_time'])){
          $url.="&call_time=".$data['call_time'];
        }
        if(isset($data['hide_callerid'])){
          $url.="&hide_callerid=".$data['hide_callerid'];
        }
        if(isset($data['caller_text'])){
          $url.="&caller_text=".$data['caller_text'];
        }
        if(isset($data['called_text'])){
          $url.="&called_text=".$data['called_text'];
        }
        if(isset($data['caller_record'])){
          $url.="&caller_record=".$data['caller_record'];
        }
        if(isset($data['called_record'])){
          $url.="&called_record=".$data['called_record'];
        }
       
        /* İç dahiliye başlatılacak çağrılar için;
        $url="http://crmsntrl.netgsm.com.tr:9111/850XXXXXXX/local?username=kullaniciadi&password=sifre&called=XXX&pbxnum=850XXXXXXX&caller=XXX&ring_timeout=20&crm_id=XXX&wait_response=1";
      
        */
        
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
        $http_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      
        if($http_code != 200){
          echo "$http_code $http_response\n";
          return false;
        }
        $Info = $http_response;
        $Info=(array)json_decode($Info);
        
        return $Info;
      
        
    }
    public function icDahiliCagriBaslat(array $data):array
    {
        
       
        !isset($data['pbxnum']) ? $data['pbxnum']=null:$data['pbxnum']=$data['pbxnum'];
        !isset($data['called']) ? $data['called']=null:$data['called']=$data['called'];
        !isset($data['caller']) ? $data['caller']=null:$data['caller']=$data['caller'];
        !isset($data['ring_timeout']) ? $data['ring_timeout']=null:$data['ring_timeout']=$data['ring_timeout'];
        !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id']; 
        !isset($data['hide_callerid']) ? $data['hide_callerid']=null:$data['hide_callerid']=$data['hide_callerid'];      
        !isset($data['wait_response']) ? $data['wait_response']=0:$data['wait_response']=$data['wait_response'];
        
        $url="http://crmsntrl.netgsm.com.tr:9111/".$this->username."/local?username=".$this->username."&password=".$this->password."&called=".$data['called']."&pbxnum=".$data['pbxnum']."&caller=".$data['caller']."&ring_timeout=".$data['ring_timeout']."&crm_id=".$data['crm_id']."&wait_response=".$data['wait_response'];
       
      
        if(isset($data['call_time'])){
          $url.="&call_time=".$data['call_time'];
        }
        if(isset($data['hide_callerid'])){
          $url.="&hide_callerid=".$data['hide_callerid'];
        }
        if(isset($data['caller_text'])){
          $url.="&caller_text=".$data['caller_text'];
        }
        if(isset($data['called_text'])){
          $url.="&called_text=".$data['called_text'];
        }
        if(isset($data['caller_record'])){
          $url.="&caller_record=".$data['caller_record'];
        }
        if(isset($data['called_record'])){
          $url.="&called_record=".$data['called_record'];
        }
       
        /* İç dahiliye başlatılacak çağrılar için;
        $url="http://crmsntrl.netgsm.com.tr:9111/850XXXXXXX/local?username=kullaniciadi&password=sifre&called=XXX&pbxnum=850XXXXXXX&caller=XXX&ring_timeout=20&crm_id=XXX&wait_response=1";
      
        */
        
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
        $http_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      
        if($http_code != 200){
          echo "$http_code $http_response\n";
          return false;
        }
        $Info = $http_response;
        $Info=(array)json_decode($Info);
        
        return $Info;
      
        
    }
    public function cagrisessizeal(array $data)
    {
      
      if(!isset($data['unique_id']) || !isset($data['crm_id']) || !isset($data['direction']) || !isset($data['state']) )
      {
          $response['message']="Eksik yada yanlis parametre!";
          return $response;
      }
      $url= 'http://crmsntrl.netgsm.com.tr:9111/'.$this->username.'/muteaudio?username='.$this->username.'&password='.$this->password.'&unique_id='.$data['unique_id'].'&crm_id='.$data['crm_id'].'&direction='.$data['direction'].'&state='.$data['state'];

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
      $http_response = curl_exec($ch);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
      if($http_code != 200){
        echo "$http_code $http_response\n";
        return false;
      }
      $Info = $http_response;
      $Info=(array)json_decode($Info);
      return $Info;

    }
    public function cagrisonlandirma(array $data):array
    {
     
       if(!isset($data['unique_id']) || !isset($data['crm_id'])    )
       {
           $response['message']="Eksik parametre!";
           return $response;
       }
      $url= "http://crmsntrl.netgsm.com.tr:9111/".$this->username."/hangup?username=".$this->username."&password=".$this->password."&unique_id=".$data['unique_id']."&crm_id=".$data['crm_id'];

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
      $http_response = curl_exec($ch);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
      if($http_code != 200){
        echo "$http_code $http_response\n";
        return false;
      }
      $Info = $http_response;
      $Info=(array)json_decode($Info);
      return $Info;
    }
    public function cagribagla($data):array
    {
        !isset($data['caller']) ? $data['caller']=null:$data['caller']=$data['caller'];
        !isset($data['called']) ? $data['called']=null:$data['called']=$data['called'];
        !isset($data['pbxnum']) ? $data['pbxnum']=null:$data['pbxnum']=$data['pbxnum'];
        !isset($data['internal_num']) ? $data['internal_num']=null:$data['internal_num']=$data['internal_num'];
        !isset($data['ring_timeout']) ? $data['ring_timeout']=null:$data['ring_timeout']=$data['ring_timeout'];
        !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id'];
        !isset($data['originate_order']) ? $data['originate_order']="if":$data['originate_order']=$data['originate_order'];
        !isset($data['trunk']) ? $data['trunk']=null:$data['trunk']=$data['trunk'];   
        !isset($data['hide_callerid']) ? $data['hide_callerid']=null:$data['hide_callerid']=$data['hide_callerid'];
        !isset($data['caller_text']) ? $data['caller_text']=null:$data['caller_text']=$data['caller_text'];
        !isset($data['called_text']) ? $data['called_text']=null:$data['called_text']=$data['called_text'];
        !isset($data['caller_record']) ? $data['caller_record']=null:$data['caller_record']=$data['caller_record'];
        !isset($data['called_record']) ? $data['called_record']=null:$data['called_record']=$data['called_record'];
        !isset($data['wait_response']) ? $data['wait_response']=0:$data['wait_response']=$data['wait_response'];

      $url= 'http://crmsntrl.netgsm.com.tr:9111/'.$this->username.'/linkup?username='.$this->username.'&password='.$this->password.'&caller='.$data['caller'].'&called='.$data['called'].'&ring_timeout='.$data['ring_timeout'].'&crm_id='.$data['crm_id'].'&wait_response='.$data['wait_response'].'&originate_order='.$data['originate_order'].'&trunk='.$data['trunk'];
      if(isset($data['call_time'])){
        $url.="&call_time=".$data['call_time'];
      }
      if(isset($data['caller_text'])){
        $url.="&caller_text=".$data['caller_text'];
      }
      if(isset($data['called_text'])){
        $url.="&called_text=".$data['called_text'];
      }
      if(isset($data['caller_record'])){
        $url.="&caller_record=".$data['caller_record'];
      }
      if(isset($data['called_record'])){
        $url.="&called_record=".$data['called_record'];
      }
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
      $http_response = curl_exec($ch);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
      if($http_code != 200){
        echo "$http_code $http_response\n";
        return false;
      }
      $Info = $http_response;
      $Info=(array)json_decode($Info);
      return $Info;
    }
    public function cagritransfer(array $data):array
    {
      if(!isset($data['type'])){
        $response['durum']="Lütfen type giriniz.";
        return $response;
      }
      if(!isset($data['exten'])){
        $response['durum']="Lütfen exten giriniz.";
        return $response;
      }
      
      !isset($data['unique_id']) ? $data['unique_id']=null:$data['unique_id']=$data['unique_id'];
      !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id'];
      $url= "http://crmsntrl.netgsm.com.tr:9111/".$this->username."/".$data['type']."?username=".$this->username."&password=".$this->password."&exten=".$data['exten']."&unique_id=".$data["unique_id"]."&crm_id=".$data["crm_id"];
      
      
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
      $http_response = curl_exec($ch);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
      if($http_code != 200){
        echo "$http_code $http_response\n";
        return false;
      }
      $Info = $http_response;
      $Info=(array)json_decode($Info);
      return $Info;
    }
    public function kuyrukEkle(array $data):array
    {

      !isset($data['exten']) ? $data['exten']=null:$data['exten']=$data['exten'];
      !isset($data['queue']) ? $data['queue']=null:$data['queue']=$data['queue'];
      !isset($data['paused']) ? $data['paused']=null:$data['paused']=$data['paused'];
      !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id'];
      !isset($data['penalty']) ? $data['penalty']=null:$data['penalty']=$data['penalty'];

      $url= "http://crmsntrl.netgsm.com.tr:9111/".$this->username."/agentlogin?username=".$this->username."&password=".$this->password."&crm_id=".$data['crm_id']."&exten=".$data['exten']."&queue=".$data['queue']."&paused=".$data['paused']."&penalty=".$data['penalty'];
      
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
      $http_response = curl_exec($ch);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      if($http_code != 200){
        echo "$http_code $http_response\n";
        return false;
      }
      $Info = $http_response;
      $Info=(array)json_decode($Info);
      return $Info;
        }
    public function kuyrukCikar(array $data):array
    {
      !isset($data['exten']) ? $data['exten']=null:$data['exten']=$data['exten'];
      !isset($data['queue']) ? $data['queue']=null:$data['queue']=$data['queue'];
      !isset($data['paused']) ? $data['paused']=null:$data['paused']=$data['paused'];
      !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id'];
      $url= "http://crmsntrl.netgsm.com.tr:9111/8xxxxxxxxx/agentlogoff?username=".$this->username."&password=".$this->password."&crm_id=".$data["crm_id"]."&exten=".$data['exten']."&queue=".$data['queue'];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
        $http_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($http_code != 200){
          echo "$http_code $http_response\n";
          return false;
        }
        $Info = $http_response;
        $Info=(array)json_decode($Info);
        return $Info;
    }
    public function kuyrukSorgula(array $data):array
    {
      !isset($data['queue']) ? $data['queue']=null:$data['queue']=$data['queue'];
      !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id'];
      $url= 'http://crmsntrl.netgsm.com.tr:9111/'.$this->username.'/queuestats?username='.$this->username.'&password='.$this->password.'&queue='.$data['queue'].'&crm_id='.$data['crm_id'];
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
      $http_response = curl_exec($ch);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
      if($http_code != 200){
        echo "$http_code $http_response\n";
        return false;
      }
      $Info = $http_response;
        $Info=(array)json_decode($Info);
        return $Info;
    }
    public function mola(array $data):array
    {
      !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id'];
      !isset($data['exten']) ? $data['exten']=null:$data['exten']=$data['exten'];
      !isset($data['queue']) ? $data['queue']=null:$data['queue']=$data['queue'];
      !isset($data['paused']) ? $data['paused']=null:$data['paused']=$data['paused'];
      !isset($data['reason']) ? $data['reason']=null:$data['reason']=$data['reason'];
      $url= "http://crmsntrl.netgsm.com.tr:9111/".$this->username."/agentpause?username=".$this->username."&password=".$this->password."&crm_id=".$data['crm_id']."&exten=".$data['exten']."&queue=".$data['queue']."&paused=".$data['paused']."&reason=".$data['reason'];
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
      $http_response = curl_exec($ch);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
      if($http_code != 200){
        echo "$http_code $http_response\n";
        return false;
      }
      $Info = $http_response;
      $Info=(array)json_decode($Info);
      return $Info;
    }
    public function kuyrukDisNum(array $data):array
    {
      !isset($data['command']) ? $data['command']=null:$data['command']=$data['command'];
      !isset($data['tenant']) ? $data['tenant']=null:$data['tenant']=$data['tenant'];
      !isset($data['queue']) ? $data['queue']=null:$data['queue']=$data['queue'];
      !isset($data['no']) ? $data['no']=null:$data['no']=$data['no'];
      !isset($data['penalty']) ? $data['penalty']=null:$data['penalty']=$data['penalty'];

      try {
        $arr_acc = array('username' => $this->username, 'password' => $this->password, 'command' => $data['command'], 'tenant' => $data['tenant'], 'queue' => $this->username.'-queue-'.$data['queue'] ,'no' => $data['no'], 'penalty' => $data['penalty']);				
        $url_acc = "https://api.netgsm.com.tr/netsantral/queue";  
        $content_acc = json_encode($arr_acc);				
        $curl = curl_init($url_acc);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content_acc);				
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);	
        $response = (array)json_decode($json_response);

       return $response;

    } catch (Exception $exc)
      {  
      echo $exc->getMessage();
    }
    }
    public function dinamikyonlendirme(array $data)
    {

      !isset($data['called']) ? $data['called']=null:$data['called']=$data['called'];
      !isset($data['redirect_menu']) ? $data['redirect_menu']=null:$data['redirect_menu']=$data['redirect_menu'];
      !isset($data['redirect_type']) ? $data['redirect_type']=null:$data['redirect_type']=$data['redirect_type'];
      !isset($data['ring_timeout']) ? $data['ring_timeout']=null:$data['ring_timeout']=$data['ring_timeout'];
      !isset($data['crm_id']) ? $data['crm_id']=null:$data['crm_id']=$data['crm_id'];
      !isset($data['wait_response']) ? $data['wait_response']=null:$data['wait_response']=$data['wait_response'];
      !isset($data['trunk']) ? $data['trunk']=null:$data['trunk']=$data['trunk'];
      $url= "http://crmsntrl.netgsm.com.tr:9111/".$this->username."/dynamic_redirect?username=".$this->username."&password=".$this->password."&called=".$data['called']."&redirect_menu=".$data['redirect_menu']."&redirect_type=".$data['redirect_type']."&ring_timeout=".$data['ring_timeout']."&crm_id=".$data['crm_id']."&wait_response=".$data['wait_response']."&trunk=".$data['trunk'];

      if(isset($data['call_time'])){
          $url.="&call_time=".$data['call_time'];
      }
      if(isset($data['prefix'])){
        $url.="&prefix=".$data['prefix'];
      }
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
      $http_response = curl_exec($ch);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      if($http_code != 200){
        echo "$http_code $http_response\n";
        return false;
      }
      $Info = $http_response;
      $Info=(array)json_decode($Info);
      return $Info;

    }
    public function otoAramaListeOlustur(array $data):array
    {
      try {    

        $arr_acc = array(
          "header" => array( "username" => $this->username,"password" => $this->password),
          "body" => array(  
          "event" => "addautocall",
          "data" => $data       
                     ));
      
          $url = "https://api.netgsm.com.tr/autocallservice";  
          $content = json_encode($arr_acc);       
      
          $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_HEADER, false);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_HTTPHEADER,
          array("Content-type: application/json"));
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $content);       
          $json_response = curl_exec($curl);
          $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
          curl_close($curl);        
          $json_response=(array)json_decode($json_response);
          
          return (array)$json_response;


          //$send_acc = json_decode($send_acc);
          ;
      } catch (Exception $exc)
        {  
        echo $exc->getMessage();
      }
    }
    public function otomatikAramaList(array $data):array
    {

      !isset($data['list_id']) ? $data['list_id']=null:$data['list_id']=$data['list_id'];
      try {    

        $arr_acc = array(
          "header" => array( "username" => $this->username,"password" => $this->password),
          "body" => array(  
          "event"   => "listautocall",
          "list_id" =>  $data['list_id']     
                        ));
      
          $url = "https://api.netgsm.com.tr/autocallservice";  
          $content = json_encode($arr_acc);       
          
          $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_HEADER, false);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_HTTPHEADER,
          array("Content-type: application/json"));
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $content);       
          $json_response = curl_exec($curl);
          $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
          curl_close($curl); 
          $response=(array)json_decode($json_response);
          return $response;

          
          
      } catch (Exception $exc)
        {  
        echo $exc->getMessage();
      }

    }
    public function listChangeStatus(array $data):array
    {
      if(!isset($data['status']) || !isset($data['list_id']) )
      {
        $response['message']='Eksik parametre!';
        return $response;
      }
      try {    

        $arr_acc = array(
        "header" => array( "username" => $this->username,"password" => $this->password),
        "body" => array(  
        "event" => "updateliststatus",
        "list_id" => $data['list_id'],
        "data" => array(
            "status"  => $data['status']			  
           )       
                      ));
    
        $url = "https://api.netgsm.com.tr/autocallservice";  
        $content = json_encode($arr_acc);       
                    
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);       
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);  
        $response=(array)json_decode($json_response);
        return $response;
        
    } catch (Exception $exc)
      {  
      echo $exc->getMessage();
    }
    }

    public function aramaRapor(array $data):array
    {
      if(!isset($data['list_id']) )
      {
        $response['list_id']='Eksik parametre!';
        return $response;
      }

        try {    

          $arr_acc = array(
          "header" => array( "username" => $this->username,"password" => $this->password),
          "body" => array(  
          "event" => "reportautocall",
          "list_id" => $data['list_id']		
                        ));
      
          $url = "https://api.netgsm.com.tr/autocallservice";  
          $content = json_encode($arr_acc);       
      
          $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_HEADER, false);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_HTTPHEADER,
          array("Content-type: application/json"));
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $content);       
          $json_response = curl_exec($curl);
          $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
          curl_close($curl);        
        
          $response=(array)json_decode($json_response);
          return $response;
          
      } catch (Exception $exc)
        {  
        echo $exc->getMessage();
      }
    }
    public function listeNumEkle(array $data):array
    {

          
      if(!isset($data['list_id']) || !isset($data['numbers']) )
      {
        $response['list_id']='Eksik parametre!';
        return $response;
      }

      try {

        $arr_acc = array(
            "header" => array( "username" => $this->username,"password" => $this->password),
            "body" => array(
                "event" => "addnumber",
                "list_id" => $data['list_id'],
                "data" => array(
                    "numbers"         => [
                        $data['numbers']
                    ]
                )
            ));
    
        $url = "https://api.netgsm.com.tr/autocallservice";
        $content = json_encode($arr_acc);
    
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
          
        $response=(array)json_decode($json_response);
        return $response;
    } catch (Exception $exc)
    {
        echo $exc->getMessage();
    }
    }
    public function listeNumCikar(array $data):array
    {
      
      if(!isset($data['list_id']) || !isset($data['id']) )
      {
        $response['durum']='Eksik parametre!';
        return $response;
      }
      
      
      try {

        $arr_acc = array(
          "header" => array( "username" => $this->username,"password" => $this->password),
          "body" => array(
              "event" => "deletenumber",
              "list_id" => "12505",
              "data" => array(
                  "id"  => "27273235"
                 )  
          ));
    
        $url = "https://api.netgsm.com.tr/autocallservice";
        $content = json_encode($arr_acc);
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $response=(array)json_decode($json_response);
        return $response;
       // $send_acc = json_decode($send_acc);
        
    } catch (Exception $exc)
    {
        echo $exc->getMessage();
    }
    
    }
    public function listeNumGuncelle(array $data):array
    {

      if(!isset($data['list_id'])  )
      {
        $response['list_id']='Eksik parametre!';
        return $response;
      }
      try {

        $arr_acc = array(
            "header" => array( "username" => $this->username,"password" => $this->password),
            "body" => array(
                "event" => "updatenumber",
                "list_id" => $data['list_id'],
                "data" =>$data  
            ));
      
          $url = "https://api.netgsm.com.tr/autocallservice";
          $content = json_encode($arr_acc);
      
          $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_HEADER, false);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_HTTPHEADER,
              array("Content-type: application/json"));
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

          $json_response = curl_exec($curl);
          $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
          curl_close($curl);

          $response=(array)json_decode($json_response);
          return $response;
      } catch (Exception $exc)
      {
          echo $exc->getMessage();
      }
      
    }
    public function gorusmeDetay(array $data):array
    {
      
      try {
        if(isset($data['uniqueid'])){
          $arr_acc = array('usercode' => $this->username, 'password' => $this->password, 'uniqueid' => $data['uniqueid']);
        }
        elseif(isset($data['querytype']))
        {
          if(!isset($data['no']))
          {
            $response['message']='no parametresi giriniz.';
            return $response;
          }
          if(!isset($data['startdate']))
          {
            $response['startdate']='startdate parametresi giriniz.';
            return $response;
          }
          if(!isset($data['stopdate']))
          {
            $response['stopdate']='stopdate parametresi giriniz.';
            return $response;
          }
          $arr_acc = array('usercode' => $this->username, 'password' => $this->password, 'querytype' => $data['querytype'], 'no' => $data['no'],'startdate' => $data['startdate'], 'stopdate' => $data['stopdate']);
        }
        elseif(isset($data['startdate']) && isset($data['stopdate'])){
          $arr_acc = array('usercode' => $this->username, 'password' => $this->password, 'startdate' => $data['startdate'], 'stopdate' => $data['stopdate']);	
        }
        else{
          $response['message']='Hatalı parametre';
          return $response;
        }
        			
        $url = "https://api.netgsm.com.tr/netsantral/report";  
        $content = json_encode($arr_acc);				
    
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);				
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);	

        
        $response=(array)json_decode($json_response);
        
        return $response;
      } catch (Exception $exc)
        {  
        echo $exc->getMessage();
      }
    }
    public function istatistikGelenCagri(array $data):array
    {
      !isset($data['startdate']) ? $data['startdate']=null:$data['startdate']=$data['startdate'];
      !isset($data['stopdate']) ? $data['stopdate']=null:$data['stopdate']=$data['stopdate'];
      $xmlData='<?xml version="1.0"?>
      <mainbody>
         <header>
             <usercode>'.$this->username.'</usercode>
             <password>'.$this->password.'</password>
             <startdate>'.$data['startdate'].'</startdate>
             <stopdate>'.$data['stopdate'].'</stopdate>     
         </header>
      </mainbody>';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,'https://api.netgsm.com.tr/netsantral/statistics');
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,2);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
      $result = curl_exec($ch);
      $result=simplexml_load_string($result) or die("Error: Cannot create object");
      if(isset($result->main->code))
      {
        $res=(array)$result->main;

      }
      elseif(isset($result->main->info->statistics))
      {
        $res=(array)$result->main->info->statistics;
      }
      return $res;



    }

    public function istatistikGunDetay(array $data):array
    {

      if(!isset($data['date']))
          {
            $response['date']='date parametresi giriniz.';
            return $response;
      }
      
      $xmlData='<?xml version="1.0" encoding="UTF-8"?>
        <mainbody>
          <header>
              <usercode>'.$this->username.'</usercode>
              <password>'.$this->password.'</password>
              <date>'.$data['date'].'</date>
               
          </header>
        </mainbody>';

        $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,'https://api.netgsm.com.tr/netsantral/statistics');
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,2);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
      $result = curl_exec($ch);
      
      $result=simplexml_load_string($result) or die("Error: Cannot create object");
      
      if(isset($result->main->code))
      {
        $res=(array)$result->main;

      }
      elseif(isset($result->main->info->statistics))
      {
        $res=(array)$result->main->info->statistics;
      }
      return $res;

    }

}
