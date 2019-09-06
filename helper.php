<?php
function helper($nomeStr,$data=null){
  $arr=explode('/',$nomeStr);
  $nomeDoRepositorioStr=@$arr[0];
  $nomeDoPacoteStr=@$arr[1];
  $str=ROOT.'call/callgnomo/'.$nomeDoRepositorioStr;
  if(isset($_ENV['CALL'],$_ENV['SITE_MODE'])){
    if($_ENV['SITE_MODE']=='dev'){
      $str=ROOT.$nomeDoRepositorioStr;
    }
  }
  $str.='/helper/'.$nomeDoPacoteStr.'.php';
  if(file_exists($str)){
    if(is_array($data)){
      extract($data);
    }
    return require_once($str);
  }else{
    die('o helper '.$str.' não existe');
  }
}
