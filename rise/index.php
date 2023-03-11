<?php
ob_start();
error_reporting(0);
date_Default_timezone_set('Asia/Tashkent');

/*
Ushbu script @AlijonovUz ( Alijonov Abdulbosit ) tomonidan tuzib chiqilgan.
Manba: @AlijonovUz

Har doimgiday manba bilan olamiz ( choparlar ).
*/

define("AlijonovUz",'5613626789:AAFxtp9ydGHi9SbNyCHS6pKGrtB2UoUcGpI');
$AlijonovUz = "5086714658";
$admins = file_get_contents("tizim/admins.txt");
$admin = explode("\n", $admins);
array_push($admin,$AlijonovUz);
$user = "IBuilderPHP";
$bot = bot('getme',['bot'])->result->username;
$soat = date('H:i');
$clock = date('H:i:s');
$sana = date("d.m.Y");

require ("sql.php");

function getAdmin($chat){
$url = "https://api.telegram.org/bot".AlijonovUz."/getChatAdministrators?chat_id=@".$chat;
$result = file_get_contents($url);
$result = json_decode ($result);
return $result->ok;
}

function deleteFolder($path){
if(is_dir($path) === true){
$files = array_diff(scandir($path), array('.', '..'));
foreach ($files as $file)
deleteFolder(realpath($path) . '/' . $file);
return rmdir($path);
}else if (is_file($path) === true)
return unlink($path);
return false;
}

function token($str,$begin,$end){
for($i = $begin; $i < $end; $i++) $str[$i] = '*';
return $str;
}

function joinchat($id){
global $mid;
$array = array("inline_keyboard");
$get = file_get_contents("tizim/kanal.txt");
$ex = explode("\n",$get);
if($get == null){
return true;
}else{
for($i=0;$i<=count($ex) -1;$i++){
$first_line = $ex[$i];
$first_ex = explode("-",$first_line);
$name = $first_ex[0];
$url = $first_ex[1];
     $ret = bot("getChatMember",[
         "chat_id"=>"@$url",
         "user_id"=>$id,
         ]);
$stat = $ret->result->status;
         if((($stat=="creator" or $stat=="administrator" or $stat=="member"))){
      $array['inline_keyboard']["$i"][0]['text'] = "✅ ". $name;
$array['inline_keyboard']["$i"][0]['url'] = "https://t.me/$url";
         }else{
$array['inline_keyboard']["$i"][0]['text'] = "❌ ". $name;
$array['inline_keyboard']["$i"][0]['url'] = "https://t.me/$url";
$uns = true;
}
}
$array['inline_keyboard']["$i"][0]['text'] = "🔄 Tekshirish";
$array['inline_keyboard']["$i"][0]['callback_data'] = "result";
if($uns == true){
     bot('sendMessage',[
         'chat_id'=>$id,
         'text'=>"⚠️ <b>Botdan foydalanish uchun, quyidagi kanallarga obuna bo'ling:</b>",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode($array),
]);  
exit();
return false;
}else{
return true;
}
}
}



function bot($method,$datas=[]){
	$url = "https://api.telegram.org/bot".AlijonovUz."/".$method;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
	$res = curl_exec($ch);
	if(curl_error($ch)){
		var_dump(curl_error($ch));
	}else{
		return json_decode($res);
	}
}

$alijonov = json_decode(file_get_contents('php://input'));
$message = $alijonov->message;
$cid = $message->chat->id;
$name = $message->chat->first_name;
$tx = $message->text;
$step = file_get_contents("step/$cid.step");
$mid = $message->message_id;
$type = $message->chat->type;
$text = $message->text;
$uid = $message->from->id;
$name = $message->from->first_name;
$familya = $message->from->last_name;
$premium = $message->from->is_premium;
$bio = $message->from->about;
$username = $message->from->username;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$reply = $message->reply_to_message->text;
$nameru = "<a href='tg://user?id=$uid'>$name $familya</a>";

$doc = $alijonov->message->document;
$doc_id = $doc->file_id;

//inline uchun metodlar
$data = $alijonov->callback_query->data;
$qid = $alijonov->callback_query->id;
$id = $alijonov->inline_query->id;
$query = $alijonov->inline_query->query;
$query_id = $alijonov->inline_query->from->id;
$cid2 = $alijonov->callback_query->message->chat->id;
$mid2 = $alijonov->callback_query->message->message_id;
$callfrid = $alijonov->callback_query->from->id;
$callname = $alijonov->callback_query->from->first_name;
$calluser = $alijonov->callback_query->from->username;
$surname = $alijonov->callback_query->from->last_name;
$about = $alijonov->callback_query->from->about;
$nameuz = "<a href='tg://user?id=$callfrid'>$callname $surname</a>";

if(file_get_contents("tizim/holat.txt")){
	}else{
if(file_put_contents("tizim/holat.txt",'✅'));
}
if(file_get_contents("tizim/admins.txt")){
}else{
	if(file_put_contents("tizim/admins.txt",$AlijonovUz));
}
if(file_get_contents("tizim/taklif.txt")){
}else{
	if(file_put_contents("tizim/taklif.txt",'500'));
}

$res = mysqli_query($connect,"SELECT*FROM user_id WHERE user_id=$cid");
while($a = mysqli_fetch_assoc($res)){
$user_id = $a['user_id'];
$reg = $a['reg'];
}

$res = mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid");
while($a = mysqli_fetch_assoc($res)){
$kab_id = $a['user_id'];
$pul = $a['pul'];
$sarmoya = $a['sarmoya'];
$pul2 = $a['pul2'];
$odam = $a['odam'];
$ban = $a['ban'];
}

$res = mysqli_query($connect,"SELECT*FROM api WHERE user_id = $cid");
while($a = mysqli_fetch_assoc($res)){
$api_id = $a['user_id'];
$api = $a['api'];
}

$step = file_get_contents("step/$cid.step");
$baza = file_get_contents("step/$cid.txt");
$cid3 = file_get_contents("step/$cid.id");
$qoida = file_get_contents("tizim/qoida.txt");
$holat = file_get_contents("tizim/holat.txt");
$kanal = file_get_contents("tizim/kanal.txt");
$taklif = file_get_contents("tizim/taklif.txt");
$promo = file_get_contents("tizim/kanal2.txt");
$payme = file_get_contents("tizim/payme.txt");
$paymeapi = file_get_contents("tizim/paymeapi.txt");
$paymeparol = file_get_contents("tizim/paymeparol.txt");
$check = file_get_contents("tizim/check.txt");

$kod = file_get_contents("step/kod.txt");
$money = file_get_contents("step/money.txt");
$post = file_get_contents("step/mid.txt");

$auto = file_get_contents("step/auto.txt");
$auto2 = file_get_contents("step/auto2.txt");
$key = uniqid(uniqid());
$mt = file_get_contents("step/$cid.mt");
$mt2 = file_get_contents("step/$cid.mt2");
mkdir("step");
mkdir("tizim");
mkdir("bonus");
mkdir("bot");
mkdir("baza");
mkdir("bots");

$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📢 Kanallarni sozlash"]],
[['text'=>"📊 Statistika"],['text'=>"✉ Xabar yuborish"]],
[['text'=>"🔎 Foydalanuvchini boshqarish"]],
[['text'=>"🤖 Bot holati"],['text'=>"🤖 Botlar"]],
[['text'=>"⬆️ Avto yangilash"],['text'=>"🎟 Promokod"]],
[['text'=>"💵 Taklif narxi"],['text'=>"📋 Adminlar"]],
[['text'=>"📓 Qoidalar"],['text'=>"💳 Hamyonlar"]],
[['text'=>"⚙ Avto to'lov"],['text'=>"🔺️ Rubl kursi"]],
[['text'=>"◀️ Orqaga"]]
]
]);

$menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🛠 Botlarni boshqarish"]],
[['text'=>"📱 Kabinet"],['text'=>"💵 Pul ishlash"]],
[['text'=>"☎️ Murojaat"],['text'=>"📋 Ma'lumotlar"]],
]
]);

$menus = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🛠 Botlarni boshqarish"]],
[['text'=>"📱 Kabinet"],['text'=>"💵 Pul ishlash"]],
[['text'=>"☎️ Murojaat"],['text'=>"📋 Ma'lumotlar"]],
[['text'=>"⚙ Boshqarish"]],
]
]);

$boshqar = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"➕ Yangi bot ochish"]],
[['text'=>"⚙ Botlarni sozlash"],['text'=>"💵 To'lovlar"]],
[['text'=>"◀️ Orqaga"]],
]
]);

$back = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"◀️ Orqaga"]],
]
]);

$bosh = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⚙ Boshqarish"]],
]
]);

if(in_array($cid, $admin)){
	$menu = $menus;
}else{
	$menu = $menu;
}

if(in_array($cid2, $admin)){
	$menyu = $menus;
}else{
	$menyu = $menu;
}


if($text){
	if($ban == "ban"){
	exit();
}else{
}
}
if($data){
$ban = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['ban'];
	if($ban == "ban"){
	exit();
}else{
}
}

if($text){
 if($holat == "❌"){
	if(in_array($cid,$admin)){
}else{
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"⛔️ <b>Bot vaqtinchalik o'chirilgan!</b>

<i>Botda ta'mirlash ishlari olib borilayotgan bo'lishi mumkin!</i>",
'parse_mode'=>'html',
]);
exit();
}
}else{
}
}

if($data){
 if($holat == "❌"){
	if(in_array($cid2,$admin)){
}else{
	bot('answerCallbackQuery',[
		'callback_query_id'=>$qid,
		'text'=>"⛔️ Bot vaqtinchalik o'chirilgan!

Botda ta'mirlash ishlari olib borilayotgan bo'lishi mumkin!",
		'show_alert'=>true,
		]);
exit();
}
}else{
}
}

if(isset($message)){
$result = mysqli_query($connect,"SELECT * FROM user_id WHERE user_id = $cid");
$rew = mysqli_fetch_assoc($result);
if($rew){
}else{
mysqli_query($connect,"INSERT INTO user_id(`user_id`,`reg`) VALUES ('$cid','$sana | $soat')");
}
}

if(isset($message)){
$result = mysqli_query($connect,"SELECT * FROM kabinet WHERE user_id = $cid");
$rew = mysqli_fetch_assoc($result);
if($rew){
}else{
mysqli_query($connect,"INSERT INTO kabinet(`user_id`,`pul`,`sarmoya`,`pul2`,`odam`,`ban`) VALUES ('$cid','0','0','0','0','unban')");
}
}

if(isset($message)){
$result = mysqli_query($connect,"SELECT * FROM api WHERE user_id = $cid");
$rew = mysqli_fetch_assoc($result);
if($rew){
}else{
mysqli_query($connect,"INSERT INTO api(`user_id`,`api`) VALUES ('$cid','$key')");
}
}

if($text == "/start"){
	if(mb_stripos($user_id,$cid)!==false){
		bot('sendMessage',[
		'chat_id'=>$cid,
		'text'=>"🖥 <b>Asosiy menyudasiz.</b>",
		'parse_mode'=>'html',
		'reply_markup'=>$menyu,
		]);
exit();
}else{
	bot('sendMessage',[
		'chat_id'=>$cid,
    'text'=>"💎 <b>Salom $name!</b>

@$bot ga xush kelibsiz!",
    'parse_mode'=>'html',
		'reply_markup'=>$menyu,
		]);
exit();
}
}

if(mb_stripos($text,"RISE")!==false){
$refid = str_replace("/start RISE","",$text);
if(strlen($refid)>0 and $refid>0){
if($refid == $cid){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"🖥 <b>Asosiy menyudasiz.</b>",
'parse_mode'=>'html',
'reply_markup'=>$menyu,
]);
exit();
}else{
if(mb_stripos($user_id,"$cid")!==false){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"🖥 <b>Asosiy menyudasiz.</b>",
'parse_mode'=>'html',
'reply_markup'=>$menyu
]);
exit();
}else{
if($kanal == null){
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id=$refid"))['pul'];
$odam = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $refid"))['odam'];
$a = $pul + $taklif;
$b = $odam + 1;
mysqli_query($connect,"UPDATE kabinet SET pul = $a WHERE user_id = $refid");
mysqli_query($connect,"UPDATE kabinet SET odam = $b WHERE user_id = $refid");
mysqli_query($connect,"UPDATE user_id SET refid = $refid WHERE user_id = $cid");
$text = "📳 <b>Sizda yangi</b> <a href='tg://user?id=$cid'>taklif</a> <b>mavjud!</b>

Hisobingizga $taklif so'm qo'shildi!";
}else{
file_put_contents("step/$cid.id",$refid);
file_put_contents("step/$cid.txt",$refid);
$odam = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $refid"))['odam'];
$a = $odam + 1;
mysqli_query($connect, "UPDATE kabinet SET odam = '$a' WHERE user_id = $refid");
$text = "📳 <b>Sizda yangi</b> <a href='tg://user?id=$cid'>taklif</a> <b>mavjud!</b>";
}
bot('sendMessage',[
'chat_id'=>$cid,
    'text'=>"💎 <b>Salom $name!</b>

@$bot ga xush kelibsiz!",
    'parse_mode'=>'html',
'reply_markup'=>$menyu,
]);
bot('SendMessage',[
'chat_id'=>$refid,
'text'=>$text,
'parse_mode'=>'html',
]);
exit();
}
}
}
}

if($data == "result"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2
]);
if(joinchat($cid2)==true){
$baza = file_get_contents("step/$cid2.txt");
$cid3 = file_get_contents("step/$cid2.id");
if($baza != $cid3){
bot('SendMessage',[
'chat_id'=>$cid2,
	'text'=>"🖥 <b>Asosiy menyuga qaytdingiz.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$menyus,
]);
exit();
}else{
	$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid3"))['pul'];
	$a = $pul + 500;
	mysqli_query($connect, "UPDATE kabinet SET pul = '$a' WHERE user_id = $cid3");
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"🖥 <b>Asosiy menyudasiz.</b>",
'parse_mode'=>'html',
'reply_markup'=>$menyus,
]);
bot('SendMessage',[
'chat_id'=>$cid3,
'text'=>"✅ <b>Hisobingizga 500 so'm qo'shildi!</b>",
'parse_mode'=>'html',
]);
unlink("step/$cid2.txt");
unlink("step/$cid2.id");
exit();
}
}
}

if($text == "◀️ Orqaga"){
	bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"🏠",
]);
		bot('sendMessage',[
		'chat_id'=>$cid,
		'text'=>"🖥 <b>Asosiy menyuga qaytdingiz.</b>",
		'parse_mode'=>'html',
		'reply_markup'=>$menyu,
		]);
unlink("step/$cid.step");
unlink("step/$cid.mt");
exit();
}

if($text == "📱 Kabinet" and joinchat($cid)==true){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"🗄 <b>Kabinetingizga xush kelibsiz!</b>

🔎 <i>ID:</i> <code>$cid</code>
💵 <i>Asosiy balans:</i> <b>$pul so'm</b>
🪪 <i>Sarmoya balans:</i> <b>$sarmoya so'm</b>

👥 <i>Takliflaringiz soni:</i> <b>$odam ta</b>

💳 <i>Botga kiritgan pullaringiz:</i> <b>$pul2 so'm</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"➕ Pul kiritish",'callback_data'=>"oplata"],['text'=>"🔁 Pul o'tkazish",'callback_data'=>"almashish"]],
	[['text'=>"🔄 Almashtirish",'callback_data'=>"transfer"],['text'=>"⚙ Sozlamalar",'callback_data'=>"sozlama"]],
]
])
]);
exit();
}



if($data == "kabinet"){
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul'];
$sarmoya = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['sarmoya'];
$pul2 = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul2'];
$odam = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['odam'];
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('sendMessage',[
	'chat_id'=>$cid2,
	'text'=>"🗄 <b>Kabinetingizga xush kelibsiz!</b>

🔎 <i>ID:</i> <code>$cid2</code>
💵 <i>Asosiy balans:</i> <b>$pul so'm</b>
🪪 <i>Sarmoya balans:</i> <b>$sarmoya so'm</b>

👥 <i>Takliflaringiz soni:</i> <b>$odam ta</b>

💳 <i>Botga kiritgan pullaringiz:</i> <b>$pul2 so'm</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"➕ Pul kiritish",'callback_data'=>"oplata"],['text'=>"🔁 Pul o'tkazish",'callback_data'=>"almashish"]],
	[['text'=>"🔄 Almashtirish",'callback_data'=>"transfer"],['text'=>"⚙ Sozlamalar",'callback_data'=>"sozlama"]],
]
])
]);
exit();
}

if($data == "transfer"){
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"Asosiy balans -> Sarmoya balans",'callback_data'=>"asosiy_Sarmoya"]],
[['text'=>"Sarmoya balans -> Asosiy balans",'callback_data'=>"Sarmoya_asosiy"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"kabinet"]],
]
])
]);
}

if($data == "asosiy_Sarmoya"){
	$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul'];
if($pul >= "0"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>💵 Qancha miqdordagi pulni Sarmoya hisobga oʻtkazmoqchisiz:</b>",
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
file_put_contents("step/$cid2.step","asosiy_insvest");
exit();
		}else{
			bot('answerCallbackQuery',[
			'callback_query_id'=>$qid,
			'text'=>"Hisobingizda minimal o'tkazma uchun yetarli mablag' mavjud emas.

Minimal o'tkazma miqdori: 0 so'm",
			'show_alert'=>true,
			]);
		}
	}
	
if($step == "asosiy_insvest"){
	if(is_numeric($text)=="true"){	
	$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid"))['pul'];
	if($pul>=$text and $text>=1000){
	$p = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid"))['sarmoya'];
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid"))['pul'];
$a = $pul - $text;
mysqli_query($connect, "UPDATE kabinet SET pul = '$a' WHERE user_id = $cid");
$b = $p + $text;
mysqli_query($connect, "UPDATE kabinet SET sarmoya = '$b' WHERE user_id = $cid");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>✅ Almashuv muvaffaqiyatli boʻldi!</b>

<i>Asosiy balansdan $text Sarmoya balansga oʻtkazildi.</i>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
unlink("step/$cid.step");
exit();
}else{
bot("sendMessage",[
"chat_id"=>$cid,
"text"=>"<b>Hisobingizda yetarli mablagʻ yoʻq!</b>

<i>Boshqa miqdorni kiriting:</i>",
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
exit();
}
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
}
exit();
}

if($data == "Sarmoya_asosiy"){
	$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['sarmoya'];
if($pul >= "0"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>💵 Qancha miqdordagi pulni Asosiy hisobga oʻtkazmoqchisiz:</b>",
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
file_put_contents("step/$cid2.step","Sarmoya_asosiy");
exit();
		}else{
			bot('answerCallbackQuery',[
			'callback_query_id'=>$qid,
			'text'=>"Hisobingizda minimal o'tkazma uchun yetarli mablag' mavjud emas.

Minimal o'tkazma miqdori: 0 so'm",
			'show_alert'=>true,
			]);
		}
	}
	
if($step == "Sarmoya_asosiy"){
	if(is_numeric($text)=="true"){	
	$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid"))['sarmoya'];
	if($pul>=$text and $text>=1000){
	$p = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid"))['pul'];
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid"))['sarmoya'];
$a = $pul - $text;
mysqli_query($connect, "UPDATE kabinet SET sarmoya = '$a' WHERE user_id = $cid");
$b = $p + $text;
mysqli_query($connect, "UPDATE kabinet SET pul = '$b' WHERE user_id = $cid");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>✅ Almashuv muvaffaqiyatli boʻldi!</b>

<i>Asosiy balansdan $text Sarmoya balansga oʻtkazildi.</i>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
unlink("step/$cid.step");
exit();
}else{
bot("sendMessage",[
"chat_id"=>$cid,
"text"=>"<b>Hisobingizda yetarli mablagʻ yoʻq!</b>

<i>Boshqa miqdorni kiriting:</i>",
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
exit();
}
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
}
exit();
}


if($data == "sozlama"){
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🏷 HASH kalit",'callback_data'=>"kalit"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"kabinet"]]
]
])
]);
}

if($data == "kalit"){
	$api = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM api WHERE user_id = $cid2"))['api'];
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"🏷 <b>Sizning HASH kalitingiz:</b> <pre>$api</pre>

‼️ <i>Diqqat, HASH kalitni qayta o'rnatsangiz (yangisiga almashtirsangiz), eski HASH kalitdan foydalanib bo'lmaydi.</i>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🔄 Qayta o'rnatish",'callback_data'=>"reset_api"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"kabinet"]]
]
])
]);
}

if($data == "reset_api"){
mysqli_query($connect, "DELETE FROM `api` WHERE user_id = '$cid2'");
mysqli_query($connect,"INSERT INTO api(`user_id`,`api`) VALUES ('$cid2','$key')");
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
   'text'=>"✅ <b><u>HASH Kalitingiz yangisiga almashtirildi!</u>

🏷 Sizning yangi HASH kalitingiz:</b> <pre>$key</pre>

‼️ <i>Diqqat, HASH kalitni qayta o'rnatsangiz (yangisiga almashtirsangiz), eski HASH kalitdan foydalanib bo'lmaydi.</i>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🔄 Qayta o'rnatish",'callback_data'=>"reset_api"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"sozlama"]]
]
])
]);
}

if($data == "almashish"){
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul'];
	if($pul >= "0"){
			bot('deleteMessage',[			
			'chat_id'=>$cid2,
			'message_id'=>$mid2,
			]);
			bot('sendMessage',[
			'chat_id'=>$cid2,
				'text'=>"<b>Qancha mablag'ingizni o'tkazmoqchisiz?</b>",
			'parse_mode'=>'html',
			'reply_markup'=>$back,
			]);		
			file_put_contents("step/$cid2.step",'almashish');
			exit();
		}else{
			bot('answerCallbackQuery',[
			'callback_query_id'=>$qid,
			'text'=>"Hisobingizda minimal o'tkazma uchun yetarli mablag' mavjud emas.

Minimal o'tkazma miqdori: 0 so'm",
			'show_alert'=>true,
			]);
		}
	}

	if($step == "almashish"){		
if(is_numeric($text)=="true"){	
if($text >= "0"){
	if($pul >= $text){	
			bot('SendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Kerakli foydalanuvchi ID raqamini yuboring:</b>",
			'parse_mode'=>'html',
			]);		
				file_put_contents("step/$cid.step","tran-$text");
				exit();
		}else{	
			bot('SendMessage',[
			'chat_id'=>$cid,
				'text'=>"<b>Qancha mablag'ingizni o'tkazmoqchisiz?</b>",
			'parse_mode'=>'html',
			]);		
			exit();
}
}else{
bot('SendMessage',[
			'chat_id'=>$cid,
				'text'=>"<b>Qancha mablag'ingizni o'tkazmoqchisiz?</b>",
			'parse_mode'=>'html',
			]);		
			exit();
}
}else{
bot('SendMessage',[
	'chat_id'=>$cid,
			'text'=>"<b>Qancha mablag'ingizni o'tkazmoqchisiz?</b>",
			'parse_mode'=>'html',
			]);		
			exit();
}
}



if(mb_stripos($step, "tran-")!==false){
$ex = explode("-",$step);
$miqdor = $ex[1];
$result = mysqli_query($connect,"SELECT * FROM user_id WHERE user_id = '$text'");
$row = mysqli_fetch_assoc($result);
if(!$row){
	bot('SendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Foydalanuvchi topilmadi.</b>

Qayta urinib ko'ring:",
			'parse_mode'=>'html',
]);
exit();
}else{
$pul2 = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $text"))['pul'];
$a = $pul2 + $miqdor;
$b = $pul - $miqdor;
mysqli_query($connect, "UPDATE kabinet SET pul = '$a' WHERE user_id = $text");
mysqli_query($connect, "UPDATE kabinet SET pul = '$b' WHERE user_id = $cid");
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"$cid <b>tomonidan hisobingizga $miqdor so'm o'tkazildi.</b>",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
]);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"$text <b>ga $miqdor so'm o'tkazildi. Hisobingizdan $miqdor so'm olib tashlandi.</b>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
unlink("step/$cid.step");
exit();
}
}

$turi = file_get_contents("tizim/turi.txt");
$more = explode("\n",$turi);
$soni = substr_count($turi,"\n");
$keys=[];
for ($for = 1; $for <= $soni; $for++) {
$title=str_replace("\n","",$more[$for]);
$keys[]=["text"=>"$title","callback_data"=>"pay-$title"];
$keysboard2 = array_chunk($keys, 2);
$keysboard2[] = [['text'=>"🔹️ PAYME",'callback_data'=>"payme"]];
$keysboard2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"kabinet"]];
$payment = json_encode([
'inline_keyboard'=>$keysboard2,
]);
}

if($data == "payme"){
if($payme != null){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"💵 <b>To'lov miqdorini kiriting:</b>

<i>Minimal miqdor:</i> 1000 UZS",
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
file_put_contents("step/$cid2.step","payme");
exit();
}else{
	bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"To'lov tizimi aktiv holatda emas!",
	'show_alert'=>true,
	]);
}
}

if($step == "payme"){
if(is_numeric($text)){
if($text >= 1000){
$amount = $text;
$card = $payme;
$description = "@$bot uchun to'lov!";
$json = json_decode(file_get_contents("$paymeapi?parol=$paymeparol&action=create&amount=".$amount."&description=".urlencode($description)."&card=".$card.""),true);
$url = $json['_result']['_details']['_pay_url'];
$check_id = $json['_result']['_details']['_id'];
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"✅ <b>To'lov miqdori qabul qilindi.</b>

Endi esa pastdagi tugma orqali to'lov qiling va to'lovingizni tasdiqlang!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💵 To'lov qilish (Ilova/Brauzer)",'url'=>"$url"]],
[['text'=>"💵 To'lov qilish (Telegram)",'web_app'=>['url'=>"$url"]]],
[['text'=>"✅ To'lovni tekshirish",'callback_data'=>"checkout=$check_id=$amount"]]
]
])
]);
unlink("step/$cid.step");
exit();
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"💵 <b>To'lov miqdorini kiriting:</b>

<i>Minimal miqdor:</i> 1000 UZS",
'parse_mode'=>'html',
]);
exit();
}
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"💵 <b>To'lov miqdorini kiriting:</b>

<i>Minimal miqdor:</i> 1000 UZS",
'parse_mode'=>'html',
]);
exit();
}
}

if(mb_stripos($data,"checkout=")!==false){
$check_id = explode("=", $data)[1];
$amount = explode("=", $data)[2];
if(mb_stripos($check, $check_id) !== false){
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"⚠ Ushbu toʻlov amalga oshirilgan!",
'show_alert'=>true
]);
exit();
}else{
$json = json_decode(file_get_contents("$paymeapi?parol=$paymeparol&id=$check_id&action=info"), true);
$pay_time = $json['mess'];
if(empty($pay_time)){
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"⚠ Ushbu to'lov amalga oshirilmagan!",
'show_alert'=>true,
]);
exit();
}else{
file_put_contents("tizim/check.txt", "\n".$check_id,FILE_APPEND);
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul'];
$pul2 = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul2'];
$a = $pul + $amount;
$b = $pul2 + $amount;
mysqli_query($connect,"UPDATE kabinet SET pul = $a WHERE user_id = $cid2");
mysqli_query($connect,"UPDATE kabinet SET pul2 = $b WHERE user_id = $cid2");
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"✅ <b>Hisobingizga $amount so'm qabul qilindi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
bot('sendMessage',[
'chat_id'=>$AlijonovUz,
'text'=>"✅ <b><a href='https://t.me/$calluser'>Foydalanuvchi</a> PAYME to'lov tizimi orqali to'lov qildi va hisobiga $amount so'm qo'shildi!</b>",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
]);
exit();
}
}
}

if($data == "oplata"){
	if($turi == null){
			bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"To'lov tizimlari topilmadi!",
	'show_alert'=>true,
	]);
}else{
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
                'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>"html",
        'reply_markup'=>$payment
]);
}
}

if($data == "orqa"){
        bot('editMessageText',[
        'chat_id'=>$cid2,
        'message_id'=>$mid2,
        'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>"html",
        'reply_markup'=>$payment
]);
}

if(mb_stripos($data, "pay-")!==false){
	$ex = explode("-",$data);
	$tur = $ex[1];
	$addition = file_get_contents("tizim/$tur/addition.txt");
   $wallet = file_get_contents("tizim/$tur/wallet.txt");
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
	'text'=>"<b>📋 To'lov tizimi:</b> $tur

<i>💳 Hamyon ( yoki karta ):</i> <code>$wallet</code>
<i>📝 Izoh:</i> <code>$cid2</code>

<b>Qo'shimcha:</b> $addition",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✍ Murojaat",'url'=>"https://t.me/$user"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"orqa"]],
]
])
]);
}

if($text == "💵 Pul ishlash" and joinchat($cid)==true){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🔗 Takliflar",'callback_data'=>"taklif"]],
	[['text'=>"🎟 Promokod",'callback_data'=>"kodpromo"]],
[['text'=>"🎁 Kunlik bonus",'callback_data'=>"bonus"]]
]
])
]);
exit();
}

if($data == "ishlash"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('sendMessage',[
	'chat_id'=>$cid2,
	'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🔗 Takliflar",'callback_data'=>"taklif"]],
	[['text'=>"🎟 Promokod",'callback_data'=>"kodpromo"]],
[['text'=>"🎁 Kunlik bonus",'callback_data'=>"bonus"]]
]
])
]);
exit();
}

if($data == "taklif"){
	$odam = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['odam'];
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"⚡️ <b>Sizning taklif havolalaringiz:</b>

<pre>https://t.me/$bot?start=RISE$cid2</pre>
<pre>tg://resolve?domain=$bot&start=RISE$cid2</pre>

<b>1 ta taklif uchun $taklif so'm beriladi.

Sizning takliflaringiz: $odam ta</b>",
'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"↗️ Ulashish",'url'=>"https://t.me/share/url?url=https://t.me/$bot?start=RISE$cid2"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"ishlash"]]
]
])
]);
}

if($data == "bonus"){
$bonus = file_get_contents("bonus/$cid2.txt");
if($bonus != $sana){
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul'];
$miqdor = rand(100,1000);
$a = $pul + $miqdor;
mysqli_query($connect, "UPDATE kabinet SET pul = '$a' WHERE user_id = $cid2");
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"💸 <b>Kunlik bonus</b> - $miqdor so'm",
'parse_mode'=>'html',
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"ishlash"]],
]
])
]);
file_put_contents("bonus/$cid2.txt","$sana");
}else{
	bot("answerCallbackQuery",[
        "callback_query_id"=>$qid,
'text'=>"❌ Bugun bonus olgansiz!",
        "show_alert"=>true,
 ]);
}
}

if($data == "kodpromo"){
bot('DeleteMessage',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       ]);
       bot('SendMessage',[
          'chat_id'=>$cid2,
	'text'=>"<b>Promokodni kiriting:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$back,
	]);
		file_put_contents("step/$cid2.step",'AlijonovUz');
		exit();
}

if($step == "AlijonovUz"){
$kod = file_get_contents("step/kod.txt");
$money = file_get_contents("step/money.txt");
	if($text == $kod){
$a = $pul + $money;
mysqli_query($connect,"UPDATE kabinet SET pul = $a WHERE user_id = $cid");   
		bot('SendMessage',[
		'chat_id'=>$cid,
			'text'=>"✅ <b>Promokodni to'g'ri yubordingiz va hisobingizga $money $valyuta qo'shildi!</b>",
		'parse_mode'=>'html',
		'reply_markup'=>$menyu,
		]);
        bot('editMessageText',[
	'chat_id'=>$promo,
	'message_id'=>$post,
		'text'=>"🎫 — <b><del>$kod</del></b>
💰 — <b>$money $valyuta</b>

✅ <a href='tg://user?id=$cid'>$name</a>",
'disable_web_page_preview'=>true,
		'parse_mode'=>'html',
]);
unlink("step/money.txt");
unlink("step/kod.txt");
unlink("step/mid.txt");
unlink("step/$cid.step");
exit();
}else{
		bot('SendMessage',[
		'chat_id'=>$cid,
		'text'=>"<b>🙁 Qabul qilinmadi</b>
   Qayta urinib ko'ring:",
		'parse_mode'=>'html',
		]);
		exit();
	}
}

if($text == "🛠 Botlarni boshqarish" and joinchat($cid)==true){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"🤖 <b>Botlarni boshqarish bo'limiga xush kelibsiz!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$boshqar,
]);
exit();
}

if($soat == "00:00"){
$res = mysqli_query($connect, "SELECT * FROM `kunlik`");
while($a = mysqli_fetch_assoc($res)){
$useri = $a['useri'];
$kun = $a['kun'];
if($kun != "0"){
$day = $kun - 1;
mysqli_query($connect, "UPDATE kunlik SET kun = '$day' WHERE useri = $useri");
}
}
}

if(isset($message)){
	if(mb_stripos($kun, "-")!==false){
		mysqli_query($connect, "UPDATE kunlik SET kun = '0' WHERE user_id = $cid");
}
}

if($soat == $auto){
$res = mysqli_query($connect, "SELECT * FROM `kunlik`");
while($a = mysqli_fetch_assoc($res)){
$useri = $a['useri'];
$turi = $a['turi'];
$tokeni = $a['tokeni'];
$avto = $a['avto'];
if($auto2 == $turi and $avto == "✅"){
$kod = file_get_contents("bot/$auto2.php");
$kod = str_replace("API_TOKEN", "$tokeni", $kod);
$kod = str_replace("ADMIN_ID", "$id", $kod);
file_put_contents("bots/$useri/index.php","$kod");	
unlink("step/auto.txt");
unlink("step/auto2.txt");
}
}
}

if($soat == "00:00"){
deleteFolder("step");
}

if($data == "boshqarish"){	
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🤖 Botlarni boshqarish bo'limiga xush kelibsiz!</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqar,
]);
exit();
}


if($text == "⚙ Botlarni sozlash" and joinchat($cid)==true){
$bot = file_get_contents("baza/$cid/bots.txt");
if($bot != null){
$more = explode("\n",$bot);
$soni = substr_count($bot,"\n");
$key=[];
for ($for = 1; $for <= $soni; $for++) {
$title = str_replace("\n","",$more[$for]);
$key[]=["text"=>"⚙ $for. $title","callback_data"=>"settings=$title"];
$key2 = array_chunk($key, 2);
$key2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"boshqarish"]];
$sozlash = json_encode([
'inline_keyboard'=>$key2,
]);
}
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>$sozlash,
]);
exit();
}else{
	bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"📂 <b>Sizda hech qanday bot yo'q!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Yangi bot qo'shish",'callback_data'=>"apilar"]],
]
])
]);
exit();
}
}

if($data == "botlar"){
$bot = file_get_contents("baza/$cid2/bots.txt");
if($bot != null){
$more = explode("\n",$bot);
$soni = substr_count($bot,"\n");
$key=[];
for ($for = 1; $for <= $soni; $for++) {
$title = str_replace("\n","",$more[$for]);
$key[]=["text"=>"⚙ $for. $title","callback_data"=>"settings=$title"];
$key2 = array_chunk($key, 2);
$key2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"boshqarish"]];
$sozlash = json_encode([
'inline_keyboard'=>$key2,
]);
}
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
   bot('sendMessage',[
   'chat_id'=>$cid2,
    'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
    'reply_markup'=>$sozlash,
]);
exit();
}else{
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
	bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"📂 <b>Sizda hech qanday bot yo'q!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Yangi bot qo'shish",'callback_data'=>"apilar"]],
]
])
]);
exit();
}
}

if(mb_stripos($data,"settings=") !== false){
    $ex = explode("=",$data);
    $ismi = $ex[1];
$turi = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['turi'];
$tokeni = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['tokeni'];
$token = token("$tokeni", 15,32);
$vaqti = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['vaqti'];
$kun = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['kun'];
$times = "$sana — $soat";
$b_time = explode(" — ",$times)[1];
$s_time = explode(":",$b_time)[0]*60;
$m_time = explode(":",$b_time)[1];
$minutes = $s_time + $m_time;
$minus = 24*60;
$qoldi = ($minus - $minutes)*60;
$hours = str_pad(floor($qoldi / (60*60)), 2, '0', STR_PAD_LEFT);
$minutes = str_pad(floor(($qoldi - $hours*60*60)/60), 2, '0', STR_PAD_LEFT);
if(($kun == "0") or (mb_stripos($kun, "-") !== false)){
	$tolov = "Muddati tugagan!";
}else{
	$tolov = "$kun kun, $hours soat, $minutes daqiqa.";
}
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>"✅ <b>@$ismi tanlandi!

🔑 Bot tokeni:</b> <code>$token</code>
🗓 <b>Bot ochilgan vaqt:</b> $vaqti
📂<b> Bot turi:</b> <i>$turi</i>

⏳ <b>To'lov holati:</b> <i>$tolov</i>
  
🔽 <i>Quyidagi tugmalar yordamida botingizni sozlashingiz mumkin:</i>",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"⚙ Qo'shimcha sozlamalar",'callback_data'=>"sozlamalar=$ismi"]],
[['text'=>"⬆️ Yangilash",'callback_data'=>"yangilash=$ismi"],['text'=>"🔁 Botni o'tkazish",'callback_data'=>"trans=$ismi"]],
[['text'=>"🗑 O'chirish",'callback_data'=>"ochirish=$ismi"],['text'=>"◀️ Orqaga",'callback_data'=>"botlar"]],
]
])
]);
}

if(mb_stripos($data, "sozlamalar=") !== false){
    $ex = explode("=",$data);
    $ismi = $ex[1];
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"🔑 Tokenni yangilash",'callback_data'=>"token=$ismi"]],
[['text'=>"💡 Avto yangilanish",'callback_data'=>"avto=$ismi"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"settings=$ismi"]],
]
])
]);
}


if(mb_stripos($data,"avto=") !== false){
    $ex = explode("=",$data);
    $ismi = $ex[1];
    $avto = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['avto'];
if($avto == "✅"){
$avto2 = "«✅»";
$avtos2 = "❌";
}
if($avto == "❌"){
$avto2 = "✅";
$avtos2 = "«❌»";
}
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"💡 <b>Avto yangilanish holati:</b> $avto",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"$avto2",'callback_data'=>"avton=$ismi"],['text'=>"$avtos2",'callback_data'=>"avtoff=$ismi"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"sozlamalar=$ismi"]],
]
])
]);
}

if(mb_stripos($data, "avton=") !== false){
$ex = explode("=",$data);
$ismi = $ex[1];
mysqli_query($connect, "UPDATE kunlik SET avto = '✅' WHERE useri = '$ismi'");
$avto = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['avto'];
if($avto == "✅"){
$avto2 = "«✅»";
$avtos2 = "❌";
}
if($avto == "❌"){
$avto2 = "✅";
$avtos2 = "«❌»";
}
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"💡 <b>Avto yangilanish holati:</b> $avto",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"$avto2",'callback_data'=>"avton=$ismi"],['text'=>"$avtos2",'callback_data'=>"avtoff=$ismi"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"sozlamalar=$ismi"]],
]
])
]);
}

if(mb_stripos($data, "avtoff=") !== false){
$ex = explode("=",$data);
$ismi = $ex[1];
mysqli_query($connect, "UPDATE kunlik SET avto = '❌' WHERE nomi = '$ismi'");
$avto = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE nomi = '$ismi'"))['avto'];
if($avto == "✅"){
$avto2 = "«✅»";
$avtos2 = "❌";
}
if($avto == "❌"){
$avto2 = "✅";
$avtos2 = "«❌»";
}
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"💡 <b>Avto yangilanish holati:</b> $avto",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"$avto2",'callback_data'=>"avton=$ismi"],['text'=>"$avtos2",'callback_data'=>"avtoff=$ismi"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"sozlamalar=$ismi"]],
]
])
]);
}

if(mb_stripos($data,"yangilash=") !== false){
  $ex = explode("=",$data);
    $ismi = $ex[1];
    $turi = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['turi'];
    $tokeni = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['tokeni'];
    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tokeni/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/RiseBuilder/bots/$ismi/index.php"))->result;
if($get){
    $kod = file_get_contents("bot/$turi.php");
    $kod = str_replace("API_TOKEN", "$tokeni", $kod);
    $kod = str_replace("ADMIN_ID", "$cid2", $kod);
file_put_contents("bots/$ismi/index.php","$kod");
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"<b>✅ Botingiz muvaffaqiyatli yangilandi.</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"➡️ Botga o'tish",'url'=>"https://t.me/$ismi"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"settings=$ismi"]],
]
])
]);
}else{
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⚠️ <b>Diqqat, Botingiz yangilanish uchun yaroqsiz! Iltimos, botingizning tokenini yangilang!</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"🔑 Tokenni yangilash",'callback_data'=>"token=$ismi"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"settings=$ismi"]],
]
])
]);
}
}

if(mb_stripos($data,"ochirish=") !== false){
    $ex = explode("=",$data);
    $ismi = $ex[1];
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"<b>⚠️ @$ismi ni o'chirib yuborishga ishonchingiz komilmi? </b>

<i> ‼️ Diqqat, Botingizni o'chirganingizdan so'ng bu botga bog'liq bo'lgan barcha ma'lumotlar yo'q qilinadi va buni qayta tiklashning imkoni bo'lmaydi, hamda, bot uchun sarflagan pullaringiz qaytarib berilmaydi!</i>",
    'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Ha, roziman",'callback_data'=>"ha=$ismi"]],
[['text'=>"❌ Yo‘q, o‘chirilmasin",'callback_data'=>"settings=$ismi"]],
]
])
]);
}

if(mb_stripos($data,"ha=") !== false){
    $ex = explode("=",$data);
    $ismi = $ex[1];
    $turi = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['turi'];
    $tokeni = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['tokeni'];
    mysqli_query($connect,"DELETE FROM kunlik WHERE useri = '$ismi'"); 
    $bots = file_get_contents("baza/$cid2/bots.txt");
    $a = str_replace("\n".$ismi."","",$bots);
    file_put_contents("baza/$cid2/bots.txt","$a");
   $bots2 = file_get_contents("baza/$cid2/bots2.txt");
  $b = str_replace("\n".$turi."","",$bots2);
  file_put_contents("baza/$cid2/bots2.txt","$b");
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
   'text'=>"🗑 <b>@$ismi ni o'chirish yakunlandi.</b>",
    'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"botlar"]],
]
])
]);
deleteFolder("bots/$ismi");
}

if(mb_stripos($data,"token=") !== false){
    $ex = explode("=",$data);
    $ismi = $ex[1];     
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🔑 Botingizni yangi tokenini yuboring:</b>

<i>Diqqat, yangi token tanlangan botga tegishli bo'lmasa, qabul qilinmaydi!</i>",
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
file_put_contents("step/$cid2.step","token=$ismi");
}

if(mb_stripos($step, "token=")!==false){
	$ex = explode("=",$step);
	$ismi = $ex[1];
    $tokeni = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['tokeni'];
   $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
   if(mb_stripos($text, ":")!==false){
	if($ismi == $user){
    $kod = file_get_contents("bots/$ismi/index.php");
    $kod = str_replace("$tokeni", "$tx", $kod);
file_put_contents("bots/$ismi/index.php","$kod");
mysqli_query($connect, "UPDATE kunlik SET tokeni = '$tx' WHERE useri = '$ismi'");
$get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/RiseBuilder/bots/$ismi/index.php"))->result;
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"✅ <b>Yangi token qabul qilindi.</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqar,
]);
unlink("step/$cid.step");
exit();
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"⚠️ <b>Token qabul qilinmadi, qayta urinib ko'ring:</b>",
'parse_mode'=>'html',
]);
exit();
}
}else{
	bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"⚠️ <b>Token qabul qilinmadi, qayta urinib ko'ring:</b>",
'parse_mode'=>'html',
]);
exit();
}
}

if(mb_stripos($data,"trans=") !== false){
$ex = explode("=",$data);
$ismi = $ex[1];
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>@$ismi ni kimga o'tkazmoqchisiz?</b>

<i>Kerakli foydalanuvchi ID raqamini yuboring:</i>",
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
file_put_contents("step/$cid2.step","trans=$ismi");
exit();
}

if(mb_stripos($step, "trans=")!==false){
$ex = explode("=",$step);
$ismi = $ex[1];
$turi = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['turi'];
$result = mysqli_query($connect,"SELECT * FROM user_id WHERE user_id = '$text'");
$row = mysqli_fetch_assoc($result);
if(!$row){
bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Foydalanuvchi topilmadi.</b>

Qayta urinib ko'ring:",
'parse_mode'=>'html',
]);
exit();
}else{
$bots = file_get_contents("baza/$text/bots2.txt");
if(($text == $cid) or (mb_stripos($bots, $turi) !== false)){
if($text == $cid){
$sabab = "Bu ID o'zingizga tegishli!";
}else{
$sabab = "Foydalanuvchida bu turdagi bot mavjud!";
} 
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"⛔ <b>@$ismi ni $text ga o'tkaza olmaysiz.</b>

<i>Sababi: $sabab</i>",
'parse_mode'=>'html',
]);
exit();
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📑 <b>@$ismi ni $text ga o'tkazishga ishonchingiz komilmi?</b>

<i>Bot ushbu foydalanuvchiga o'tgach, botning to'liq boshqaruviga ega bo'ladi!</i>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Tasdiqlash",'callback_data'=>"confirm=$ismi=$text"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"settings=$ismi"]],
]
])
]);
unlink("step/$cid.step");
exit();
}
}
}

if(mb_stripos($data, "confirm=")!==false){
$ex = explode("=",$data);
$ismi = $ex[1];
$id = $ex[2];
mkdir("baza/$id");
$turi = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$ismi'"))['turi'];
file_put_contents("baza/$id/bots.txt", "\n".$ismi, FILE_APPEND);
file_put_contents("baza/$id/bots2.txt", "\n".$turi, FILE_APPEND);
$bots = file_get_contents("baza/$cid2/bots.txt");
$a = str_replace("\n".$ismi."","",$bots);
file_put_contents("baza/$cid2/bots.txt","$a");
$bots2 = file_get_contents("baza/$cid2/bots2.txt");
$b = str_replace("\n".$turi."","",$bots2);
file_put_contents("baza/$cid2/bots2.txt","$b");
mysqli_query($connect, "UPDATE kunlik SET user_id = '$id' WHERE user_id = $cid2");
bot('editMessageText',[
        'chat_id'=>$cid2,
        'message_id'=>$mid2,
        'text'=>"⏱ <b>Yuklanmoqda...</b>",
       'parse_mode'=>'html',
]);
       bot('editMessageText',[
      'chat_id'=>$cid2,
     'message_id'=>$mid2 + 1,
     'text'=>"⏱ <b>Yuklanmoqda...</b>",
       'parse_mode'=>'html',
]);
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>✅ Botingiz $id ga o'tkazildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$boshqar,
]);
bot('SendMessage',[
'chat_id'=>$id,
'text'=>"🔔 <b>Sizga bot o'tkazishdi!

🔗  Havola:</b> @$ismi
📨 <b>Yuboruvchi:</b> <a href='tg://user?id=$cid2'>$callname</a>

<i>Bot to'liq sizni boshqaruvingizga o'tishi uchun, yangilab olishni unutmang!</i>",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
]);
exit();
}

if($text == "💵 To'lovlar" and joinchat($cid) == true){
$bot = file_get_contents("baza/$cid/bots.txt");
if($bot != null){
$more = explode("\n",$bot);
$soni = substr_count($bot,"\n");
$key=[];
for ($for = 1; $for <= $soni; $for++) {
$title = str_replace("\n","",$more[$for]);
$key[]=["text"=>"💵 $for. $title","callback_data"=>"tolovlar=$title"];
$key2 = array_chunk($key, 2);
$key2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"boshqarish"]];
$sozlash = json_encode([
'inline_keyboard'=>$key2,
]);
}
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>$sozlash,
]);
exit();
}else{
	bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"📂 <b>Sizda hech qanday bot yo'q!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Yangi bot qo'shish",'callback_data'=>"orqaga"]],
]
])
]);
exit();
}
}

if($data == "tolov"){
$bot = file_get_contents("baza/$cid2/bots.txt");
if($bot != null){
$more = explode("\n",$bot);
$soni = substr_count($bot,"\n");
$key=[];
for ($for = 1; $for <= $soni; $for++) {
$title = str_replace("\n","",$more[$for]);
$key[]=["text"=>"💵 $for. $title","callback_data"=>"tolovlar=$title"];
$key2 = array_chunk($key, 2);
$key2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"boshqarish"]];
$sozlash = json_encode([
'inline_keyboard'=>$key2,
]);
}
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
   bot('sendMessage',[
   'chat_id'=>$cid2,
    'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
    'reply_markup'=>$sozlash,
]);
exit();
}else{
	bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"📂 <b>Sizda hech qanday bot yo'q!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Yangi bot qo'shish",'callback_data'=>"orqaga"]],
]
])
]);
exit();
}
}

if(mb_stripos($data,"tolovlar=") !== false){
    $ex = explode("=",$data);
    $bot = $ex[1];
    $narx = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$bot'"))['narxi'];
    $n31 = $narx * 31;
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>"✅ @$bot <b>tanlandi!

🗓 1 kunlik to'lov:</b> $narx so'm
    <b>31 kunlik to'lov:</b> $n31 so'm",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
    [['text'=>"➕ To'lov qilish",'callback_data'=>"tolash=$bot=$narx"]],
    [['text'=>"◀️ Orqaga",'callback_data'=>"tolov"]],
]
])
]);
}

if(mb_stripos($data,"tolash=") !== false){
    $ex = explode("=",$data);
    $bot = $ex[1];
    $narx = $ex[2];
    $n3 = $narx * 3;
    $n7 = $narx * 7;
    $n10 = $narx * 10;
    $n31 = $narx * 31;
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
    'text'=>"⏱ <b>Yuklanmoqda...</b>",
    'parse_mode'=>'html',
]);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>"<b>🗓 Necha kunlik to'lovni amalga oshirmoqchisiz?</b>

<i>1 kunlik to'lov - $narx so'm
3 kunlik to'lov - $n3 so'm
7 kunlik to'lov - $n7 so'm
10 kunlik to'lov - $n10 so'm
31 kunlik to'lov - $n31 so'm</i>",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
    [['text'=>"1",'callback_data'=>"narx=1=$bot=$narx"],['text'=>"3",'callback_data'=>"narx=3=$bot=$n3"],['text'=>"7",'callback_data'=>"narx=7=$bot=$n7"],['text'=>"10",'callback_data'=>"narx=10=$bot=$n10"],['text'=>"31",'callback_data'=>"narx=31=$bot=$n31"]],
    [['text'=>"◀️ Orqaga",'callback_data'=>"tolovlar=$bot"]],
]
])
]);
}

if(mb_stripos($data, "narx=") !== false){
$ex = explode("=",$data);
$day = $ex[1];
$bot = $ex[2];
$narx = $ex[3];
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = '$cid2'"))['pul'];
$kun = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kunlik WHERE useri = '$bot'"))['kun'];
if($pul >= $narx){
$a = $pul - $narx;
$b = $kun + $day;
mysqli_query($connect, "UPDATE kabinet SET pul = '$a' WHERE user_id = '$cid2'");
mysqli_query($connect, "UPDATE kunlik SET kun = '$b' WHERE useri = '$bot'");
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>"✅ <b>Botingiz uchun $day kunlik to'lov to'landi!</b>

<i>Hisobingizdan $narx so'm olib tashlandi</i>",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"tolovlar=$bot"]],
    ]
    ])
    ]);
}else{
bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"Hisobingizda yetarli mablag' mavjud emas!",
	'show_alert'=>true,
	]);
}
}


if($text == "➕ Yangi bot ochish" and joinchat($cid)==true){
$kategoriya = file_get_contents("bot/kategoriya.txt");
$more = explode("\n",$kategoriya);
$soni = substr_count($kategoriya,"\n");
$key=[];
for ($for = 1; $for <= $soni; $for++) {
$title = str_replace("\n","",$more[$for]);
$key[]=["text"=>"$title","callback_data"=>"bolim=$title"];
$keyboard2 = array_chunk($key, 1);
$bolim = json_encode([
'inline_keyboard'=>$keyboard2,
]);
}
		if($kategoriya == null){
			bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"🤷‍♂️ <b>Bo'limlar mavjud emas!</b>",
	'parse_mode'=>'html',
    ]);
exit();
}else{
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"📋 <b>Quyidagi bo‘limlardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$bolim
    ]);
exit();
}
}

if($data == "orqaga"){
$kategoriya = file_get_contents("bot/kategoriya.txt");
$more = explode("\n",$kategoriya);
$soni = substr_count($kategoriya,"\n");
$key=[];
for ($for = 1; $for <= $soni; $for++) {
$title = str_replace("\n","",$more[$for]);
$keya[]=["text"=>"$title","callback_data"=>"bolim=$title"];
$keyboard2 = array_chunk($keya, 1);
$bolim = json_encode([
'inline_keyboard'=>$keyboard2,
]);
}
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('sendMessage',[
	'chat_id'=>$cid2,
	'text'=>"📋 <b>Quyidagi bo‘limlardan birini tanlang:</b>",
'parse_mode'=>"html",
	'reply_markup'=>$bolim
]);
exit();
}

if(mb_stripos($data, "bolim=")!==false){
	$ex = explode("=",$data);
	$kat = $ex[1];
$royxat = file_get_contents("bot/$kat/royxat.txt");
$more = explode("\n",$royxat);
$soni = substr_count($royxat,"\n");
$key=[];
for ($for = 1; $for <= $soni; $for++) {
$title = str_replace("\n","",$more[$for]);
$keya[]=["text"=>"$title","callback_data"=>"ichki=$title=$kat"];
$keyboard2 = array_chunk($keya, 2);
$keyboard2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"orqaga"]];
$key = json_encode([
'inline_keyboard'=>$keyboard2,
]);
}
if($royxat != null){
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>'html',
'reply_markup'=>$key
]);
}else{
	bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"📂 Botlar mavjud emas!",
	'show_alert'=>true,
	]);
}
}

if(mb_stripos($data, "ichki=")!==false){
$ex = explode("=",$data);
$royxat = $ex[1];
$kategoriya = $ex[2];
$type = file_get_contents("bot/$kategoriya/$royxat/turi.txt");
$narx = file_get_contents("bot/$kategoriya/$royxat/narx.txt");
$kunlik = file_get_contents("bot/$kategoriya/$royxat/kunlik.txt");
$tavsif = file_get_contents("bot/$kategoriya/$royxat/tavsif.txt");
$versiya = file_get_contents("bot/$kategoriya/$royxat/versiya.txt");
$til = file_get_contents("bot/$kategoriya/$royxat/til.txt");
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul'];
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<i> $royxat</i>
—————————————————
💬 Interfeys tili: <i>$til</i>
💵 Bot ochish narxi: <i>$narx so'm</i>
—————————————————
🎁 Bonus sifatida 31 kunlik
🗓 1 kunlik to'lov narxi: <i>$kunlik so'm</i>
—————————————————
*️⃣ Qo'shimcha ma'lumotlar: <i>$tavsif</i>
—————————————————
🔝 Versiya: <i>$versiya</i>
—————————————————
💵 Balansingiz: $pul so'm",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Tanlash",'callback_data'=>"bots=$type=$narx=$kunlik=$royxat=$kategoriya"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"orqaga"]],
]
])
]);
}

if($data == "RiseBuilder"){
	bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"🔒 Kechirasiz, ushbu bot aktiv holatda emas!",
	'show_alert'=>true,
	]);
}

if(mb_stripos($data, "bots=")!==false){
	$ex = explode("=",$data);
	$turi = $ex[1];
	$narx = $ex[2];
	$kun = $ex[3];
	$kategoriya = $ex[4];
	$royxat = $ex[5];
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid2"))['pul'];
$botlar = file_get_contents("baza/$cid2/bots2.txt");
if(mb_stripos($botlar, $turi) !== false){
	bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"Limitga yetib kelgansiz!",
	'show_alert'=>true,
	]);
	}else{
 if($pul >= $narx){
 bot('deleteMessage',[
    'chat_id'=>$cid2,
    'message_id'=>$mid2,
]);
    bot('SendMessage',[
   'chat_id'=>$cid2,
    'text'=>"<b>🔑 Botingizni tokenini yuboring:</b>

<i>Token haqida ma'lumotga ega bo'lmasangiz qo'llanma bilan tanishib chiqing:</i>",
'parse_mode'=>'html',
    'reply_markup'=>$back
    ]);
    file_put_contents("step/$cid2.step","bots=$turi=$narx=$kun");
exit();
    }else{
bot('editMessageText',[
    'chat_id'=>$cid2,
   'message_id'=>$mid2,
    'text'=>"😞 <b>Kechirasiz, hisobingizda yetarli mablag' mavjud emas.</b>",
    'parse_mode'=>"html",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"➕ Pul kiritish",'callback_data'=>"oplata"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"ichki=$royxat=$kategoriya"]]
    ]
    ])
    ]);
}
}
}

if(mb_stripos($step, "bots=")!==false){
$ex = explode("=",$step);
	$turi = $ex[1];
	$narx = $ex[2];
	$kun = $ex[3];
    if(mb_stripos($tx, ":")!==false){
      $msg =  bot('SendMessage',[
        'chat_id'=>$cid,
        'text'=>"⏱ <b>Yuklanmoqda...</b>",
       'parse_mode'=>'html',
])->result->message_id;
bot('editMessageText',[
        'chat_id'=>$cid,
        'message_id'=>$mid + 1,
        'text'=>"⏱ <b>Yuklanmoqda...</b>",
       'parse_mode'=>'html',
        ]);
       bot('editMessageText',[
        'chat_id'=>$cid,
        'message_id'=>$mid + 1,
        'text'=>"<b>✅ Siz yuborgan bot tokeni qabul qilindi!</b>",
       'parse_mode'=>'html',
        ]);
    $kod = file_get_contents("bot/$turi.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$cid", $kod);
    $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
    mkdir("bots/$user");
    mkdir("baza/$cid");
    file_put_contents("bots/$user/index.php", $kod);
    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/RiseBuilder/bots/$user/index.php"))->result;
    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;       
        file_put_contents("baza/$cid/bots.txt", "\n".$user, FILE_APPEND);
        file_put_contents("baza/$cid/bots2.txt", "\n".$turi, FILE_APPEND);
	     mysqli_query($connect, "INSERT INTO kunlik(`user_id`,`useri`,`turi`,`tokeni`,`vaqti`,`narxi`,`kun`,`avto`) VALUES ('$cid','$user','$turi','$tx','$sana | $soat','$kun','31','❌')");       
        bot('editMessageText',[
        'chat_id'=>$cid,
        'message_id'=>$mid + 1,
        'text'=>"ℹ️ Botingiz tayyor. Quyidagi tugma orqali botingizga o'tishingiz mumkin.",
        'parse_mode'=>"html",
        'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"➡️ Botga o'tish",'url'=>"https://t.me/$user"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"orqaga"]]
    ]
    ])
    ]);
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $cid"))['pul'];
$a = $pul - $narx;
mysqli_query($connect, "UPDATE kabinet SET pul = '$a' WHERE user_id = $cid");
unlink("step/$cid.step");
exit();
}else{
		bot('editMessageText',[
	'chat_id'=>$cid,
'message_id'=>$msg,
	'text'=>"⛔️ <b>Kechirasiz token qabul qilinmadi!</b>

<i>Qayta urinib ko'ring:</i>",
	'parse_mode'=>'html',
]);
exit();
}
}else{
	bot('sendMessage',[
	'chat_id'=>$cid,
'text'=>"⛔️ <b>Kechirasiz token qabul qilinmadi!</b>

<i>Qayta urinib ko'ring:</i>",
	'parse_mode'=>'html',
]);
exit();
}
}

if($text == "📋 Ma'lumotlar" and joinchat($cid)==true){
bot('sendMessage',[
		'chat_id'=>$cid,
		'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
		'parse_mode'=>'html',
        'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"📚 Videolar - YouTube",'url'=>"https://youtube.com/channel/UCUpU6R-VmgNuU5x6uoTkMtA"]],
[['text'=>"📕 Qoidalar",'callback_data'=>"qoida"]],
[['text'=>"👨‍💻 Dasturchilar",'url'=>"https://t.me/MyrixRu"],['text'=>"📢 Kanal",'url'=>"https://t.me/RiseBuilder"]],
[['text'=>"☎️ Texnik Yordam",'url'=>"tg://user?id=5645973996"]],
]
])
]);
exit();
}

if($data == "malumot"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('sendMessage',[
		'chat_id'=>$cid2,
		'text'=>"📋 <b>Quyidagilardan birini tanlang:</b>",
		'parse_mode'=>'html',
        'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"📚 Videolar - YouTube",'url'=>"https://youtube.com/channel/UCUpU6R-VmgNuU5x6uoTkMtA"]],
[['text'=>"📕 Qoidalar",'callback_data'=>"qoida"]],
[['text'=>"👨‍💻 Dasturchilar",'url'=>"https://t.me/MyrixRu"],['text'=>"📢 Kanal",'url'=>"https://t.me/RiseBuilder"]],
[['text'=>"☎️ Texnik Yordam",'url'=>"tg://user?id=5645973996"]],
]
])
]);
exit();
}

if($data == "qoida"){
	if($qoida == null){
		bot('answerCallbackQuery',[
		'callback_query_id'=>$qid,
		'text'=>"Qoidalar qo'shilmagan!",
		'show_alert'=>true,
]);
}else{
	bot('editMessageText',[
		'chat_id'=>$cid2,
                'message_id'=>$mid2,
		'text'=>$qoida,
		'parse_mode'=>'html',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"malumot"]],
]
])
]);
}
}

if($text == "☎️ Murojaat" and joinchat($cid)==true){
if($mt == null){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Murojaat maqsadini yuboring:</b>

<i>Maks. belgilar soni: 16</i>",
'parse_mode'=>'html',
'reply_markup'=>$back
]);
file_put_contents("step/$cid.step","maqsadi");
exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
    'text'=>"<b>Sizda aktiv murojaat mavjud. Quyidagi tugma orqali murojaatingiz ma'lumotlarini ko'rishingiz mumkin:</b>",
'parse_mode'=>'html',
       'reply_markup'=>json_encode([
          'inline_keyboard'=>[          
[['text'=>"$mt",'callback_data'=>"mt"]],           
]
])      
]);
exit();
}
}

if($data == "yordam"){
$mt = file_get_contents("step/$cid2.mt");
if($mt == null){
bot('deleteMessage',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Murojaat maqsadini yuboring:</b>

<i>Maks. belgilar soni: 16</i>",
'parse_mode'=>'html',
'reply_markup'=>$back
]);
file_put_contents("step/$cid2.step","maqsadi");
exit();
}else{
bot('deleteMessage',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
    'text'=>"<b>Sizda aktiv murojaat mavjud. Quyidagi tugma orqali murojaatingiz ma'lumotlarini ko'rishingiz mumkin:</b>",
'parse_mode'=>'html',
       'reply_markup'=>json_encode([
          'inline_keyboard'=>[          
[['text'=>"$mt",'callback_data'=>"mt"]],           
]
])      
]);
exit();
}
}

if($step == "maqsadi"){
if(strlen($text)<"16"){
file_put_contents("step/$cid.mt",$text);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Murojaat matnini yuboring:</b>",
'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step","matni");
exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Murojaat maqsadini yuboring:</b>

<i>Maks. belgilar soni: 16</i>",
'parse_mode'=>'html',
]);
exit();
}
}

if($step == "matni"){
file_put_contents("step/$cid.mt2",$text);
bot('SendMessage',[
'chat_id'=>$admin,
    'text'=>"<b>Yangi murojaat:

Maqsad:</b> $mt

<b>Matn:</b> $text",
'disable_web_page_preview'=>true,
'parse_mode'=>'html',
       'reply_markup'=>json_encode([
          'inline_keyboard'=>[
            [['text'=>"Javob berish",'callback_data'=>"javob-$cid"]],           
            ]
           ])      
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Murojaatingiz asosiy adminga yuborildi.</b>",
'parse_mode'=>"html",
'reply_markup'=>$menyu
]);
unlink("step/$cid.step");
exit();
}

if($data == "mt"){
	$mt = file_get_contents("step/$cid2.mt");
	$mt2 = file_get_contents("step/$cid2.mt2");
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"$mt
	
$mt2",
   'parse_mode'=>'html',
	'reply_markup'=>json_encode([
   'inline_keyboard'=>[          
[['text'=>"O'chirish",'callback_data'=>"delmt"]],   
[['text'=>"Orqaga",'callback_data'=>"yordam"]],  
]
])      
]);
}

if($data == "delmt"){
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"<b>Murojaat o'chirib tashlandi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
   'inline_keyboard'=>[             
[['text'=>"Orqaga",'callback_data'=>"yordam"]],  
]
])      
]);
unlink("step/$cid2.mt");
unlink("step/$cid2.mt2");
}


if(mb_stripos($data, "javob-")!==false){
  $ex = explode("-",$data);
  $id = $ex[1];
$mt = file_get_contents("step/$id.mt");
if($mt != null){
  bot('deleteMessage',[
    'chat_id'=>$cid2,
    'message_id'=>$mid2,
    ]);
    bot('sendMessage',[
      'chat_id'=>$cid2,
      'text'=>"<b>Javob matnini kiriting:</b>",
      'parse_mode'=>'html',
      'reply_markup'=>$back,
    ]);
   file_put_contents("step/$cid2.step","javob-$id");
  exit();
}else{
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"Ushbu murojaatga javob berilgan yoki murojaat o'chirib tashlangan!",
'show_alert'=>true,
]);
}
}

if(mb_stripos($step, "javob-")!==false){
$ex = explode("-",$step);
$id = $ex[1];
  bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>$text,
    'parse_mode'=>'html',
  'reply_markup'=>json_encode([
          'inline_keyboard'=>[
[['text'=>"📨 Yordam",'callback_data'=>"yordam"]],           
]
])      
]);
  bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"<b>Javob yuborildi.</b>",
    'parse_mode'=>'html',
    'reply_markup'=>$menus,
    ]);
    unlink("step/$cid.step");
    unlink("step/$id.mt");
    unlink("step/$id.mt2");
    exit();
}


//<--- Admin panel ----->

if($text == "⚙ Boshqarish"){
	if(in_array($cid,$admin)){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Boshqaruv panelidasiz:</b>",
   'parse_mode'=>'html',
	'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
unlink("step/$cid.txt");
unlink("step/test.txt");
exit();
}
}

if($data == "yopish"){
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
}

if($data == "foydalanuvchi"){
$baza = file_get_contents("step/$cid2.txt");
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $baza"))['pul'];
$odam = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $baza"))['odam'];
$ban = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $baza"))['ban'];
if($ban == unban){
	$bans = "🔔 Banlash";
}
if($ban == "ban"){
	$bans = "🔕 Bandan olish";
}
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Foydalanuvchi topildi!

ID:</b> <a href='tg://user?id=$baza'>$baza</a>
<b>Balans: $pul so'm
Takliflar: $odam ta</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"$bans",'callback_data'=>"ban"]],
	[['text'=>"➕ Pul qo'shish",'callback_data'=>"plus"],['text'=>"➖ Pul ayirish",'callback_data'=>"minus"]]
	]
	])
]);
unlink("step/$cid2.step");
exit();
}

if($text == "🔎 Foydalanuvchini boshqarish"){
			if(in_array($cid,$admin)){
	bot('SendMessage',[
'chat_id'=>$cid,
	'text'=>"<b>Kerakli foydalanuvchining ID raqamini yuboring:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$bosh
	]);
file_put_contents("step/$cid.step",'iD');
exit();
}
}

if($step == "iD"){
			if(in_array($cid,$admin)){
$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $text"));
$result = mysqli_query($connect,"SELECT * FROM user_id WHERE user_id = '$text'");
$row = mysqli_fetch_assoc($result);
if(!$row){
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Foydalanuvchi topilmadi.</b>

Qayta urinib ko'ring:",
'parse_mode'=>'html',
]);
exit();
}else{
file_put_contents("step/$cid.txt",$text);
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $text"))['pul'];
$odam = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $text"))['odam'];
$ban = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $text"))['ban'];
if($ban == unban){
	$bans = "🔔 Banlash";
}
if($ban == "ban"){
	$bans = "🔕 Bandan olish";
}
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Qidirilmoqda...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid,
'message_id'=>$mid + 1,
'text'=>"<b>Qidirilmoqda...</b>",
'parse_mode'=>'html',
]);
bot('editMessageText',[
'chat_id'=>$cid,
'message_id'=>$mid + 1,
'text'=>"<b>Foydalanuvchi topildi!

ID:</b> <a href='tg://user?id=$text'>$text</a>
<b>Balans: $pul so'm
Takliflar: $odam ta</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"$bans",'callback_data'=>"ban"]],
	[['text'=>"➕ Pul qo'shish",'callback_data'=>"plus"],['text'=>"➖ Pul ayirish",'callback_data'=>"minus"]]
	]
	])
]);
unlink("step/$cid.step");
exit();
}
}
}


//qo'shish
if($data == "plus"){
$baza = file_get_contents("step/$cid2.txt");
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<a href='tg://user?id=$baza'>$baza</a> <b>ning hisobiga qancha pul qo'shmoqchisiz?</b>",
'parse_mode'=>"html",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Orqaga",'callback_data'=>"foydalanuvchi"]]
]
])
]);
file_put_contents("step/$cid2.step",'plus');
}

if($step == "plus"){
	if(in_array($cid,$admin)){
if(is_numeric($text)=="true"){
bot('sendMessage',[
'chat_id'=>$baza,
'text'=>"<b>Adminlar tomonidan hisobingiz $text so'm to'ldirildi</b>",
'parse_mode'=>"html",
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Foydalanuvchi hisobiga $text so'm qo'shildi!</b>",
'parse_mode'=>"html",
'reply_markup'=>$panel,
]);
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $baza"))['pul'];
$pul2 = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $baza"))['pul2'];
$a = $pul + $text;
$b = $pul2 + $text;
mysqli_query($connect,"UPDATE kabinet SET pul = $a WHERE user_id = $baza");
mysqli_query($connect,"UPDATE kabinet SET pul2 = $b WHERE user_id = $baza");
unlink("step/$cid.txt");
unlink("step/$cid.step");
exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
'protect_content'=>true,
]);
exit();
}
}
}

//ayirish
if($data=="minus"){
$baza = file_get_contents("step/$cid2.txt");
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<a href='tg://user?id=$baza'>$baza</a> <b>ning hisobiga qancha pul ayirmoqchisiz?</b>",
'parse_mode'=>"html",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Orqaga",'callback_data'=>"foydalanuvchi"]]
]
])
]);
file_put_contents("step/$cid2.step",'minus');
}

if($step == "minus"){
	if(in_array($cid,$admin)){
if(is_numeric($text)=="true"){
bot('sendMessage',[
'chat_id'=>$baza,
'text'=>"<b>Adminlar tomonidan hisobingizdan $text so'm olib tashlandi</b>",
'parse_mode'=>"html",
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Foydalanuvchi hisobidan $text so'm olib tashlandi!</b>",
'parse_mode'=>"html",
'reply_markup'=>$panel,
]);
$pul = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $baza"))['pul'];
$a = $pul - $text;
mysqli_query($connect,"UPDATE kabinet SET pul = $a WHERE user_id = $baza");
unlink("step/$cid.txt");
unlink("step/$cid.step");
exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
exit();
}
}
}

if($data=="ban"){
$baza = file_get_contents("step/$cid2.txt");
if($admin == $baza){
bot('answerCallbackQuery',[
'callback_query_id'=>$qid,
'text'=>"Asosiy adminlarni blocklash mumkin emas!",
'show_alert'=>true,
]);
}else{
$ban = mysqli_fetch_assoc(mysqli_query($connect,"SELECT*FROM kabinet WHERE user_id = $baza"))['ban'];
	if($ban == "ban"){
		mysqli_query($connect,"UPDATE kabinet SET ban = 'unban' WHERE user_id = $baza");
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Foydalanuvchi ($baza) bandan olindi!</b>",
'parse_mode'=>"html",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Orqaga",'callback_data'=>"foydalanuvchi"]]
]
])
]);
}else{
mysqli_query($connect,"UPDATE kabinet SET ban = 'ban' WHERE user_id = $baza");
mysqli_query($connect, "DELETE FROM `kunlik` WHERE user_id = '$baza'");
bot('editMessageText',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
'text'=>"<b>Foydalanuvchi ($baza) banlandi!</b>",
'parse_mode'=>"html",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Orqaga",'callback_data'=>"foydalanuvchi"]]
]
])
]);
deleteFolder("baza/$baza");
deleteFolder("bots/$baza");
}
}
}

if($text == "✉ Xabar yuborish"){
	if(in_array($cid,$admin)){
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Yuboriladigan xabar turini tanlang;</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"Userga",'callback_data'=>"user"]],
	[['text'=>"Oddiy",'callback_data'=>"send"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
	]
	])
	]);
	exit();
}
}

if($data == "user"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Foydalanuvchi iD raqamini kiriting:</b>",
'parse_mode'=>'html',
'reply_markup'=>$bosh,
]);
file_put_contents("step/$cid2.step",'user');
exit();
}

if($step == "user"){
	if(in_array($cid,$admin)){
if(is_numeric($text)=="true"){
file_put_contents("step/$cid.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Xabaringizni kiriting:</b>",
	'parse_mode'=>'html',
	]);
file_put_contents("step/$cid.step",'xabar');
exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
exit();
}
}
}

if($step == "xabar"){
	if(in_array($cid,$admin)){
	bot('SendMessage',[
	'chat_id'=>$baza,
	'text'=>"$text",
        'parse_mode'=>'html',
'disable_web_page_preview'=>true,
'protect_content'=>true,
	]);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Xabaringiz yuborildi ✅</b>",
       'parse_mode'=>'html',
        'reply_markup'=>$panel,
	]);
	unlink("step/$cid.step");
	unlink("step/$cid.txt");
	exit();
}
}

if($data == "send"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
    'text'=>"*Xabar matnini kiriting:*",
'parse_mode'=>'MarkDown',
'reply_markup'=>$bosh,
    ]);
file_put_contents("step/$cid2.step","sendpost");
exit();
}

if($step == "sendpost"){
	if(in_array($cid,$admin)){
  unlink("step/$chat_id.step");
$res = mysqli_query($connect,"SELECT * FROM `user_id`");
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"✅ <b>Xabar Yuborish Boshlandi!</b>",
'parse_mode'=>'html',
  ]);
$x=0;
$y=0;
while($a = mysqli_fetch_assoc($res)){
$id = $a['user_id'];
	$key=$message->reply_markup;
	$keyboard=json_encode($key);
	$ok=bot('copyMessage',[
'from_chat_id'=>$chat_id,
'chat_id'=>$id,
'message_id'=>$mid,
])->ok;
if($ok==true){
}else{
$okk=bot('copyMessage',[
'from_chat_id'=>$chat_id,
'chat_id'=>$id,
'message_id'=>$mid,
])->ok;
}
if($okk==true or $ok==true){
$x=$x+1;
bot('editMessageText',[
  'chat_id'=>$chat_id,
'message_id'=>$mid,
'text'=>"✅ <b>Yuborildi:</b> $x

❌ <b>Yuborilmadi:</b> $y",
'parse_mode'=>'html',
]);
}elseif($okk==false){
mysqli_query($connect, "DELETE FROM `user_id` WHERE user_id = '$id'");
mysqli_query($connect, "DELETE FROM `kabinet` WHERE user_id = '$id'");
mysqli_query($connect, "DELETE FROM `kunlik` WHERE user_id = '$id'");
$y=$y+1;
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$mid + 1,
'text'=>"✅ <b>Yuborildi:</b> $x

❌ <b>Yuborilmadi:</b> $y",
'parse_mode'=>'html',
]);
}
}
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$mid + 1,
'text'=>"✅ <b>Yuborildi:</b> $x

❌ <b>Yuborilmadi:</b> $y",
'parse_mode'=>'html',
]);
}
exit();
}

if($text == "📊 Statistika"){
	if(in_array($cid,$admin)){
$res = mysqli_query($connect, "SELECT * FROM `user_id`");
$us = mysqli_num_rows($res);
$start_time = round(microtime(true) * 1000);
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
]);
$end_time = round(microtime(true) * 1000);
$ping = $end_time - $start_time;
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"💡 <b>O'rtacha yuklanish:</b> <code>$ping</code>
👥 <b>Foydalanuvchilar:</b> $us ta",
'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"Yopish",'callback_data'=>"yopish"]]
]
])
]);
exit();
}
}


if($text == "/kod"){
		if(in_array($cid,$admin)){
bot('sendDocument',[
'chat_id'=>$admin,
'document'=>new CURLFile(__FILE__),
'caption'=>"<b>@$bot kodi</b>",
'parse_mode'=>'html',
]);
exit();
}
}

if($text == "🤖 Bot holati"){
	if(in_array($cid,$admin)){
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Hozirgi holat:</b> $holat",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"✅",'callback_data'=>"holat-✅"],['text'=>"❌",'callback_data'=>"holat-❌"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
]
])
]);
exit();
}
}

if(mb_stripos($data, "holat-")!==false){
$ex = explode("-",$data);
$xolat = $ex[1];
file_put_contents("tizim/holat.txt",$xolat);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       	'text'=>"<b>Hozirgi holat:</b> $xolat",
	'parse_mode'=>'html',
        'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"✅",'callback_data'=>"holat-✅"],['text'=>"❌",'callback_data'=>"holat-❌"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
]
])
]);
}

$delturi = file_get_contents("tizim/turi.txt");
$delmore = explode("\n",$delturi);
$delsoni = substr_count($delturi,"\n");
$key=[];
for ($delfor = 1; $delfor <= $delsoni; $delfor++) {
$title=str_replace("\n","",$delmore[$delfor]);
$key[]=["text"=>"$title - ni o'chirish","callback_data"=>"wallet-$title"];
$keyboard2 = array_chunk($key, 1);
$keyboard2[] = [['text'=>"➕ Yangi to'lov tizimi qo'shish",'callback_data'=>"new"]];
$keyboard2[] = [['text'=>"Yopish",'callback_data'=>"yopish"]];
$delpay = json_encode([
'inline_keyboard'=>$keyboard2,
]);
}

if($text == "💳 Hamyonlar"){
if(in_array($cid,$admin)){
if($turi == null){
bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
		'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Yangi to'lov tizimi qo'shish",'callback_data'=>"new"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
]
])
]);
exit();
}else{
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
		'reply_markup'=>$delpay
]);
exit();
}
}
}

if($data == "hamyon"){
$wallets = file_get_contents("tizim/turi.txt");
if($wallets == null){
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
bot('SendMessage',[
	'chat_id'=>$cid2,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
		'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Yangi to'lov tizimi qo'shish",'callback_data'=>"new"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
]
])
]);
exit();
}else{
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
bot('SendMessage',[
	'chat_id'=>$cid2,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
		'reply_markup'=>$delpay
]);
exit();
}
}

if(mb_stripos($data,"wallet-")!==false){
	$ex = explode("-",$data);
	$tur = $ex[1];
$turi = file_get_contents("tizim/turi.txt");
	$k = str_replace("\n".$tur."","",$turi);
   file_put_contents("tizim/turi.txt",$k);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
	'text'=>"$tur - <b>To'lov tizimi olib tashlandi.</b>",
		'parse_mode'=>'html',
	'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"hamyon"]],
]
])
]);
deleteFolder("tizim/$tur");
}

	/*$test = file_get_contents("step/test.txt");
   $k = str_replace("\n".$test."","",$turi);
   file_put_contents("tizim/turi.txt",$k);
deleteFolder("tizim/$test");
unlink("step/test.txt");
exit();*/

if($data == "new"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
   ]);
   bot('sendMessage',[
   'chat_id'=>$cid2,
   'text'=>"<b>Yangi to'lov tizimi nomini yuboring:</b>",
   'parse_mode'=>'html',
   'reply_markup'=>$bosh
	]);
	file_put_contents("step/$cid2.step",'turi');
	exit();
}

if($step == "turi"){
		if(in_array($cid,$admin)){
	if(isset($text)){
		mkdir("tizim/$text");
file_put_contents("tizim/turi.txt","$turi\n$text");
	file_put_contents("step/test.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Ushbu to'lov tizimidagi hamyoningiz raqamini yuboring:</b>",
	'parse_mode'=>'html',
	]);
	file_put_contents("step/$cid.step",'wallet');
	exit();
}
}
}


if($step == "wallet"){
			if(in_array($cid,$admin)){
	    if(is_numeric($text)=="true"){
file_put_contents("tizim/$test/wallet.txt","$wallet\n$text");
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Ushbu to'lov tizimi orqali hisobni to'ldirish bo'yicha ma'lumotni yuboring:</b>

<i>Misol uchun, Ushbu to'lov tizimi orqali pul yuborish jarayonida izoh kirita olmasligingiz mumkin. Ushbu holatda, biz bilan bog'laning. Havola: @AlijonovUz</i>",
'parse_mode'=>'html',
	]);
	file_put_contents("step/$cid.step",'addition');
	exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
exit();
}
}
}

if($step == "addition"){
	if(in_array($cid,$admin)){
	if(isset($text)){
file_put_contents("tizim/$test/addition.txt","$addition\n$text");
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Yangi to'lov tizimi qo'shildi!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel
	]);
	unlink("step/$cid.step");
	unlink("step/test.txt");
	exit();
}
}
}

if($text == "📢 Kanallarni sozlash"){
if(in_array($cid,$admin)){
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🔐 Majburiy obunalar",'callback_data'=>"majburiy"]],
	[['text'=>"*⃣ Qo'shimcha kanallar",'callback_data'=>"qoshimcha"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
	]
	])
	]);
	exit();
}
}

if($data == "kanallar"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('SendMessage',[
	'chat_id'=>$cid2,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🔐 Majburiy obunalar",'callback_data'=>"majburiy"]],
	[['text'=>"*⃣ Qo'shimcha kanallar",'callback_data'=>"qoshimcha"]],
[['text'=>"Yopish",'callback_data'=>"yopish"]]
	]
	])
	]);
	exit();
}

if($data == "majburiy"){
	bot('editMessageText',[
        'chat_id'=>$cid2,
        'message_id'=>$mid2,
        'text'=>"<b>Kuting...</b>",
       'parse_mode'=>'html',
]);
       bot('editMessageText',[
      'chat_id'=>$cid2,
     'message_id'=>$mid2 + 1,
'text'=>"<b>Kuting...</b>",
       'parse_mode'=>'html',
]);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
'text'=>"<b>Majburiy obunalarni sozlash bo'limidasiz:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Qo'shish",'callback_data'=>"qoshish"]],
[['text'=>"📑 Ro'yxat",'callback_data'=>"royxat"],['text'=>"🗑 O'chirish",'callback_data'=>"ochirish"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"kanallar"]]
]
])
]);
}

if($data == "qoshish"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('SendMessage',[
	'chat_id'=>$cid2,
	'text'=>"<b>Kanalingiz userini kiriting:

Namuna:</b> RiseBuilder-RiseBuilder
( Kanal nomi-Kanal_useri )",
'parse_mode'=>'html',
	'reply_markup'=>$bosh,
	]);
	file_put_contents("step/$cid2.step","qo'shish");
	exit();
}

if($step == "qo'shish"){
if(in_array($cid,$admin)){
if(isset($text)){		
if($kanal == null){
file_put_contents("tizim/kanal.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$admin,
	'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$asosiy
]);
unlink("step/$cid.step");
exit();
}else{
file_put_contents("tizim/kanal.txt","$kanal\n$text");
	bot('SendMessage',[
	'chat_id'=>$admin,
	'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}
}
}
}

if($data == "ochirish"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('SendMessage',[
	'chat_id'=>$cid2,
		'text'=>"<b>Kanalingiz userini kiriting:

Namuna:</b> RiseBuilder-RiseBuilder
( Kanal nomi-Kanal_useri )",
'parse_mode'=>'html',
	'reply_markup'=>$bosh,
	]);
	file_put_contents("step/$cid2.step","Kanal_o'chirish");
	exit();
}

if($step == "Kanal_o'chirish"){
if(in_array($cid,$admin)){
if(isset($text)){	
$files = file_get_contents("tizim/kanal.txt");
$file = str_replace("\n".$text."","",$files);
file_put_contents("tizim/kanal.txt",$file);
	bot('SendMessage',[
	'chat_id'=>$admin,
	'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}
}
}

if($data == "royxat"){
$soni = substr_count($kanal,"-");
if($kanal == null){
bot('editMessageText',[
        'chat_id'=>$cid2,
        'message_id'=>$mid2,
        'text'=>"⏱ <b>Yuklanmoqda...</b>",
       'parse_mode'=>'html',
]);
       bot('editMessageText',[
      'chat_id'=>$cid2,
     'message_id'=>$mid2 + 1,
'text'=>"⏱ <b>Yuklanmoqda...</b>",
       'parse_mode'=>'html',
]);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>"📂 <b>Kanallar ro'yxati bo'sh!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"majburiy"]],
]
])
]);
}else{
bot('editMessageText',[
        'chat_id'=>$cid2,
        'message_id'=>$mid2,
        'text'=>"⏱ <b>Yuklanmoqda...</b>",
       'parse_mode'=>'html',
]);
       bot('editMessageText',[
      'chat_id'=>$cid2,
     'message_id'=>$mid2 + 1,
'text'=>"⏱ <b>Yuklanmoqda...</b>",
       'parse_mode'=>'html',
]);
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>"<b>📢 Kanallar ro'yxati:</b>

$kanal

<b>Ulangan kanallar soni:</b> $soni ta",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Orqaga",'callback_data'=>"majburiy"]],
]
])
]);
}
}


if($text == "📓 Qoidalar"){
	if(in_array($cid,$admin)){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Yangi qiymatni yuboring:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$bosh,
]);
file_put_contents("step/$cid.step",'qoida');
exit();
}
}

if($step == "qoida"){
if(in_array($cid,$admin)){
if(isset($text)){		
file_put_contents("tizim/qoida.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}
}
}

if($text == "⬆️ Avto yangilash"){
	if(in_array($cid,$admin)){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Yangilanish vaqtini yuboring:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$bosh,
]);
file_put_contents("step/$cid.step",'auto');
exit();
}
}

if($step == "auto"){
if(in_array($cid,$admin)){
if(isset($text)){		
file_put_contents("step/auto.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Yangilanadigan bot turini yuboring:</b>",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step",'auto2');
exit();
}
}
}

if($step == "auto2"){
if(in_array($cid,$admin)){
if(isset($text)){		
file_put_contents("step/auto2.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"✅ <b>Avto yangilanish o'rnatildi!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}
}
}

if($text == "🤖 Botlar"){
	if(in_array($cid,$admin)){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"🤖 <b>Botlarni sozlash bo'limidasiz:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"📂 Kategoriyalar",'callback_data'=>"kategoriya"]],
	[['text'=>"🤖 Botlarni sozlash",'callback_data'=>"BotSet"]],
]
])
]);
exit();
}
}

if($data == "bbosh"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('sendMessage',[
	'chat_id'=>$cid2,
	'text'=>"🤖 <b>Botlarni sozlash bo'limidasiz:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"📂 Kategoriyalar",'callback_data'=>"kategoriya"]],
	[['text'=>"🤖 Botlarni sozlash",'callback_data'=>"BotSet"]],
]
])
]);
exit();
}

if($data == "kategoriya"){
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"🤖 <b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"➕ Kategoriya qo'shish",'callback_data'=>"AdKat"]],
	[['text'=>"📄 Kategoriyalar ro'yxati",'callback_data'=>"listKat"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"bbosh"]]
]
])
]);
}

if($data == "BotSet"){
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"🤖 <b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"➕ Bot qo'shish",'callback_data'=>"AdBot"]],
	[['text'=>"📄 Botlar ro'yxati",'callback_data'=>"listBot"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"bbosh"]]
]
])
]);
}

if($data == "listKat"){
$more = explode("\n",$kategoriya);
$soni = substr_count($kategoriya,"\n");
$keys=[];
for ($for = 1; $for <= $soni; $for++) {
$title=str_replace("\n","",$more[$for]);
$keys[]=["text"=>"$title - ⚙","callback_data"=>"setKat-$title"];
$keysboard2 = array_chunk($keys, 1);
$keysboard2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"bbosh"]];
$key = json_encode([
'inline_keyboard'=>$keysboard2,
]);
}
if($kategoriya != null){
bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"🤖 <b>Quyidagi kategoriyalardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$key,
]);
}else{
	bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"Kategoriyalar mavjud emas!",
	'show_alert'=>true,
]);
}
}

if(mb_stripos($data, "setKat-")!==false){
	$ex = explode("-",$data);
	$kat = $ex[1];
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"📁 <b>Kategoriya nomi:</b> $kat",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"✏ Tahrirlash",'callback_data'=>"tah-$kat"]],
	[['text'=>"🗑 O'chirish",'callback_data'=>"delKat-$kat"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"listKat"]]
]
])
]);
}

if(mb_stripos($data, "tah-")!==false){
	$ex = explode("-",$data);
	$kat = $ex[1];
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"📁 <b>Kategoriya nomi:</b> $kat
	
<i>Quyidagilardan birini tanlang:</i>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"✏ Nomni o'zgartirish",'callback_data'=>"tahrir-$kat"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"listKat"]]
]
])
]);
}


if(mb_stripos($data, "tahrir-")!==false){
	$kat = explode("-",$data)[1];
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Hozirgi holat:</b> $kat

<i>Yangi qiymatni yuboring:</i>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","tahrir-$kat");
exit();
}

if(mb_stripos($step, "tahrir-")!==false){
if(in_array($cid,$admin)){
if(isset($text)){		
	$kat = explode("-",$step)[1];
	$a = str_replace($kat,$text,$kategoriya);
	file_put_contents("bot/kategoriya.txt",$a);
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Muvaffaqiyatli o'zgartirildi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
exit();
}
}
}

if(mb_stripos($data, "delKat-")!==false){
	$ex = explode("-",$data);
	$kat = $ex[1];
	$k = str_replace("\n".$kat."","",$kategoriya);
   file_put_contents("bot/kategoriya.txt",$k);
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"<b>O'chirish yakunlandi!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Orqaga",'callback_data'=>"listKat"]]
]
])
]);
deleteFolder("bot/$kat");
}

if($data == "listBot"){
$kategoriya = file_get_contents("bot/kategoriya.txt");
$more = explode("\n",$kategoriya);
$soni = substr_count($kategoriya,"\n");
$keys=[];
for ($for = 1; $for <= $soni; $for++) {
$title=str_replace("\n","",$more[$for]);
$keys[]=["text"=>"$title","callback_data"=>"setBot-$title"];
$keysboard2 = array_chunk($keys, 1);
$keysboard2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"bbosh"]];
$key = json_encode([
'inline_keyboard'=>$keysboard2,
]);
}
if($kategoriya != null){
bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"🤖 <b>Quyidagi botlardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$key,
]);
}else{
	bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"Hech narsa topilmadi!",
	'show_alert'=>true,
]);
}
}

if(mb_stripos($data, "setBot-")!==false){
$ex = explode("-",$data);
$kat = $ex[1];
$royxat = file_get_contents("bot/$kat/royxat.txt");
$kategoriya = file_get_contents("bot/kategoriya.txt");
$more = explode("\n",$royxat);
$soni = substr_count($royxat,"\n");
$keys=[];
for ($for = 1; $for <= $soni; $for++) {
$title=str_replace("\n","",$more[$for]);
$keys[]=["text"=>"$title - ⚙","callback_data"=>"bset-$title-$kat"];
$keysboard2 = array_chunk($keys, 1);
$keysboard2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"bbosh"]];
$key = json_encode([
'inline_keyboard'=>$keysboard2,
]);
}
if($royxat != null){
bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"🤖 <b>Quyidagi botlardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$key,
]);
}else{
	bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"Botlar mavjud emas!",
	'show_alert'=>true,
]);
}
}

if(mb_stripos($data, "bset-")!==false){
	$ex = explode("-",$data);
	$roy = $ex[1];
	$kat = $ex[2];
	$narx = file_get_contents("bot/$kat/$roy/narx.txt");
	$kunlik = file_get_contents("bot/$kat/$roy/kunlik.txt");
	$tavsif = file_get_contents("bot/$kat/$roy/tavsif.txt");
	$versiya = file_get_contents("bot/$kat/$roy/versiya.txt");
	$type = file_get_contents("bot/$kat/$roy/turi.txt");
	$tili = file_get_contents("bot/$kat/$roy/til.txt");
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"📄 Bot nomi: <b>$roy</b>

💬 Bot tili: <b>$tili</b>
💵 Narxi: <b>$narx so'm</b>
🗓 Kunlik to'lov: <b>$kunlik so'm</b>

Qo'shimcha ma'lumotlar: <b>$tavsif</b>

🔝 Joriy versiya: <b>$versiya</b>

🎁 <i>Bonus sifatida 31 kunlik to'lov bepul taqdim etiladi!</i>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"✏ Tahrirlash",'callback_data'=>"tahrirlash-$kat-$roy"]],
	[['text'=>"🗑 O'chirish",'callback_data'=>"delBot-$kat-$roy-$type"]],
	[['text'=>"◀️ Orqaga",'callback_data'=>"listBot"]]
]
])
]);
}

if(mb_stripos($data, "tahrirlash-")!==false){
	$ex = explode("-",$data);
	$kat = $ex[1];
	$roy = $ex[2];
	$narx = file_get_contents("bot/$kat/$roy/narx.txt");
	$kunlik = file_get_contents("bot/$kat/$roy/kunlik.txt");
	$tavsif = file_get_contents("bot/$kat/$roy/tavsif.txt");
	$versiya = file_get_contents("bot/$kat/$roy/versiya.txt");
	$type = file_get_contents("bot/$kat/$roy/turi.txt");
	$tili = file_get_contents("bot/$kat/$roy/til.txt");
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"📄 Bot nomi: <b>$roy</b>

💬 Bot tili: <b>$tili</b>
💵 Narxi: <b>$narx so'm</b>
🗓 Kunlik to'lov: <b>$kunlik so'm</b>

Qo'shimcha ma'lumotlar: <b>$tavsif</b>

🔝 Joriy versiya: <b>$versiya</b>

🎁 <i>Bonus sifatida 31 kunlik to'lov bepul taqdim etiladi!</i>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"✏ Nomni o'zgartirish",'callback_data'=>"nomi-$kat-$roy"]],
	[['text'=>"✏ Narxni o'zgartirish",'callback_data'=>"editBot-narx-$kat-$roy"],['text'=>"✏ Kunlik to'lovni o'zgartirish",'callback_data'=>"editBot-kunlik-$kat-$roy"]],
	[['text'=>"✏ Tavsifni o'zgartirish",'callback_data'=>"editBot-tavsif-$kat-$roy"]],
	[['text'=>"✏ Turini o'zgartirish",'callback_data'=>"editBot-turi-$kat-$roy"],['text'=>"✏ Bot tilini o'zgartirish",'callback_data'=>"editBot-til-$kat-$roy"]],
	[['text'=>"✏ Versiyani o'zgartirish",'callback_data'=>"editBot-versiya-$kat-$roy"]],
	[['text'=>"✏ Scriptni o'zgartirish",'callback_data'=>"script-$type"],['text'=>"◀️ Orqaga",'callback_data'=>"listBot"]]
]
])
]);
}

if(mb_stripos($data, "nomi-")!==false){
	$kat = explode("-",$data)[1];
	$roy = explode("-",$data)[2];
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Hozirgi holat:</b> $roy

<i>Yangi qiymatni yuboring:</i>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","nomi-$kat-$roy");
exit();
}

if(mb_stripos($step, "nomi-")!==false){
if(in_array($cid,$admin)){
if(isset($text)){		
	$kat = explode("-",$step)[1];
	$roy = explode("-",$step)[2];
	$royxat = file_get_contents("bot/$kat/royxat.txt");
	$a = str_replace($roy,$text,$royxat);
	file_put_contents("bot/$kat/royxat.txt",$a);
	rename("bot/$kat/$roy","bot/$kat/$text");
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Muvaffaqiyatli o'zgartirildi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
exit();
}
}
}

if(mb_stripos($data, "editBot-")!==false){
	$ex = explode("-",$data)[1];
	$kat = explode("-",$data)[2];
	$roy = explode("-",$data)[3];
$holat = file_get_contents("bot/$kat/$roy/$ex.txt");
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Hozirgi holat:</b> $holat

<i>Yangi qiymatni yuboring:</i>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","editBot-$ex-$kat-$roy");
exit();
}

if(mb_stripos($step, "editBot-")!==false){
if(in_array($cid,$admin)){
if(isset($text)){		
	$ex = explode("-",$step)[1];
	$kat = explode("-",$step)[2];
	$roy = explode("-",$step)[3];
	file_put_contents("bot/$kat/$roy/$ex.txt",$text);
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Muvaffaqiyatli o'zgartirildi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
exit();
}
}
}

if(mb_stripos($data, "script-")!==false){
	$ex = explode("-",$data)[1];
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<i>Yangi qiymatni yuboring:</i>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","kod-$ex");
exit();
}

if(mb_stripos($step, "kod-")!==false){
$ex = explode("-",$step);
$type = $ex[1];
if(in_array($cid,$admin)){
if(isset($doc)){		
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.AlijonovUz.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.AlijonovUz.'/'.$path;
$ok = file_put_contents("bot/$type.php",file_get_contents($file));
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Muvaffaqiyatli o'zgartirildi!</b>",
	'parse_mode'=>'html',
        'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}
}
}

if(mb_stripos($data, "delBot-")!==false){
	$ex = explode("-",$data);
	$kat = $ex[1];
	$roy = $ex[2];
	$type = $ex[3];
	$royxat = file_get_contents("bot/$kat/royxat.txt");
	$k = str_replace("\n".$roy."","",$royxat);
   file_put_contents("bot/$kat/royxat.txt",$k);
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"<b>O'chirish yakunlandi!</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Orqaga",'callback_data'=>"listBot"]]
]
])
]);
deleteFolder("bot/$kat/$roy");
unlink("bot/$type.php");
}


if($data == "AdKat"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('sendMessage',[
	'chat_id'=>$cid2,
	'text'=>"<b>Kategoriya uchun nom yuboring:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step",'AdKat');
exit();
}

if($step == "AdKat"){
if(in_array($cid,$admin)){
if(isset($text)){		
$kategoriya = file_get_contents("bot/kategoriya.txt");
file_put_contents("bot/kategoriya.txt","$kategoriya\n$text");
mkdir("bot/$text");
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>nomli kategoriya qo'shildi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}
}
}
	
if($data == "AdBot"){
$kategoriya = file_get_contents("bot/kategoriya.txt");
$more = explode("\n",$kategoriya);
$soni = substr_count($kategoriya,"\n");
$keys=[];
for ($for = 1; $for <= $soni; $for++) {
$title=str_replace("\n","",$more[$for]);
$keys[]=["text"=>"$title","callback_data"=>"addb-$title"];
$keysboard2 = array_chunk($keys, 1);
$keysboard2[] = [['text'=>"◀️ Orqaga",'callback_data'=>"bbosh"]];
$AdBot = json_encode([
'inline_keyboard'=>$keysboard2,
]);
}

	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"<b>Quyidagi kategoriyalardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$AdBot
]);
}

if(mb_stripos($data, "addb-")!==false){
	$ex = explode("-",$data);
	$kat = $ex[1];
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('sendMessage',[
	'chat_id'=>$cid2,
	'text'=>"<b>Tanlandi.</b>

Bot uchun nom yuboring:",
	'parse_mode'=>'html',
	'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","AdBot-$kat");
exit();
}

if(mb_stripos($step, "AdBot-")!==false){
$ex = explode("-",$step);
$kat = $ex[1];
if(in_array($cid,$admin)){
if(isset($text)){		
$royxat = file_get_contents("bot/$kat/royxat.txt");
file_put_contents("bot/$kat/royxat.txt","$royxat\n$text");
mkdir("bot/$kat/$text");
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>nomi qabul qilindi.</b>

Bot turini yuboring:",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step","turi-$kat-$text");
exit();
}
}
}

//@AlijonovUz

if(mb_stripos($step, "turi-")!==false){
$ex = explode("-",$step);
$kat = $ex[1];
$roy = $ex[2];
if(in_array($cid,$admin)){
if(isset($text)){		
file_put_contents("bot/$kat/$roy/turi.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>nomi qabul qilindi.</b>

Bot uchun narx yuboring:",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step","narxi-$kat-$roy-$text");
exit();
}
}
}

if(mb_stripos($step, "narxi-")!==false){
$ex = explode("-",$step);
$kat = $ex[1];
$roy = $ex[2];
$type = $ex[3];
if(in_array($cid,$admin)){
if(is_numeric($text)==true){		
file_put_contents("bot/$kat/$roy/narx.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>so'm narxi qabul qilindi.</b>

Botning kunlik to'lov narxini kiriting:",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step","kunlik-$kat-$roy-$type");
exit();
}else{
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
	'parse_mode'=>'html',
]);
exit();
}
}
}

if(mb_stripos($step, "kunlik-")!==false){
$ex = explode("-",$step);
$kat = $ex[1];
$roy = $ex[2];
$type = $ex[3];
if(in_array($cid,$admin)){
if(is_numeric($text)==true){		
file_put_contents("bot/$kat/$roy/kunlik.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>so'm kunlik to'lov narxi qabul qilindi.</b>

Bot versiyasini kiriting:",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step","versiya-$kat-$roy-$type");
exit();
}else{
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
	'parse_mode'=>'html',
]);
exit();
}
}
}

if(mb_stripos($step, "versiya-")!==false){
$ex = explode("-",$step);
$kat = $ex[1];
$roy = $ex[2];
$type = $ex[3];
if(in_array($cid,$admin)){
if(isset($text)){		
file_put_contents("bot/$kat/$roy/versiya.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>versiya qabul qilindi.</b>

Bot tilini kiriting:",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step","tili-$kat-$roy-$type");
exit();
}
}
}


if(mb_stripos($step, "tili-")!==false){
$ex = explode("-",$step);
$kat = $ex[1];
$roy = $ex[2];
$type = $ex[3];
if(in_array($cid,$admin)){
if(isset($text)){		
file_put_contents("bot/$kat/$roy/til.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"$text <b>bot tili qabul qilindi.</b>

Bot uchun tavsif kiriting:",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step","tavsif-$kat-$roy-$type");
exit();
}
}
}

if(mb_stripos($step, "tavsif-")!==false){
$ex = explode("-",$step);
$kat = $ex[1];
$roy = $ex[2];
$type = $ex[3];
if(in_array($cid,$admin)){
if(isset($text)){		
file_put_contents("bot/$kat/$roy/tavsif.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Qabul qilindi.</b>

Bot scriptini yuboring:",
	'parse_mode'=>'html',
]);
file_put_contents("step/$cid.step","script-$kat-$roy-$type");
exit();
}
}
}

if(mb_stripos($step, "script-")!==false){
$ex = explode("-",$step);
$kat = $ex[1];
$roy = $ex[2];
$type = $ex[3];
if(in_array($cid,$admin)){
if(isset($doc)){		
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.AlijonovUz.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.AlijonovUz.'/'.$path;
$ok = file_put_contents("bot/$type.php",file_get_contents($file));
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Yangi bot qo'shildi.</b>",
	'parse_mode'=>'html',
        'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}
}
}
	
if($text == "📋 Adminlar"){
if(in_array($cid,$admin)){
	if($cid == $AlijonovUz){
	bot('SendMessage',[
	'chat_id'=>$AlijonovUz,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
   [['text'=>"➕ Yangi admin qo'shish",'callback_data'=>"add"]],
   [['text'=>"📑 Ro'yxat",'callback_data'=>"list"],['text'=>"🗑 O'chirish",'callback_data'=>"remove"]],
	[['text'=>"Orqaga",'callback_data'=>"boshqarish"]]
	]
	])
	]);
	exit();
}else{	
bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
   [['text'=>"📑 Ro'yxat",'callback_data'=>"list"]],
[['text'=>"Orqaga",'callback_data'=>"boshqarish"]]
	]
	])
	]);
	exit();
}
}
}

if($data == "admins"){
if($cid2 == $AlijonovUz){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);	
bot('SendMessage',[
	'chat_id'=>$AlijonovUz,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
   [['text'=>"➕ Yangi admin qo'shish",'callback_data'=>"add"]],
   [['text'=>"📑 Ro'yxat",'callback_data'=>"list"],['text'=>"🗑 O'chirish",'callback_data'=>"remove"]],
	[['text'=>"Orqaga",'callback_data'=>"boshqarish"]]
	]
	])
	]);
	exit();
}else{
bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);	
bot('SendMessage',[
	'chat_id'=>$cid2,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
   [['text'=>"📑 Ro'yxat",'callback_data'=>"list"]],
[['text'=>"Orqaga",'callback_data'=>"boshqarish"]]
	]
	])
	]);
	exit();
}
}

if($data == "list"){
$add = str_replace($AlijonovUz,"",$admins);
if($admins == $AlijonovUz){
	$text = "<b>Yordamchi adminlar topilmadi!</b>";
}else{
		$text = "<b>👮 Adminlar ro'yxati:</b>
$add";
}
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>$text,
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Orqaga",'callback_data'=>"admins"]],
]
])
]);
}

if($data == "add"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$AlijonovUz,
'text'=>"<b>Kerakli foydalanuvchi ID raqamini yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","add-admin");
exit();
}
if($step == "add-admin" and $cid == $AlijonovUz){
$result = mysqli_query($connect,"SELECT * FROM user_id WHERE user_id = '$text'");
$row = mysqli_fetch_assoc($result);
if(!$row){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Ushbu foydalanuvchi botdan foydalanmaydi!</b>

Boshqa ID raqamni kiriting:",
'parse_mode'=>'html',
]);
exit();
}elseif((mb_stripos($admins, $text)!==false) or ($text != $AlijonovUz)){
if($admins == null){
file_put_contents("tizim/admins.txt",$text);
}else{
file_put_contents("tizim/admins.txt","\n".$text,FILE_APPEND);
}
bot('SendMessage',[
'chat_id'=>$AlijonovUz,
'text'=>"<code>$text</code> <b>adminlar ro'yxatiga qo'shildi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Ushbu foydalanuvchi adminlari ro'yxatida mavjud!</b>

Boshqa ID raqamni kiriting:",
'parse_mode'=>'html',
]);
exit();
}
}

if($data == "remove"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$AlijonovUz,
'text'=>"<b>Kerakli foydalanuvchi ID raqamini yuboring:</b>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","remove-admin");
exit();
}

if($step == "remove-admin" and $cid == $AlijonovUz){
$result = mysqli_query($connect,"SELECT * FROM user_id WHERE user_id = '$text'");
$row = mysqli_fetch_assoc($result);
if(!$row){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Ushbu foydalanuvchi botdan foydalanmaydi!</b>

Boshqa ID raqamni kiriting:",
'parse_mode'=>'html',
]);
exit();
}elseif((mb_stripos($admins, $text)!==false) or ($text != $AlijonovUz)){
$files = file_get_contents("tizim/admins.txt");
$file = str_replace("\n".$text."","",$files);
file_put_contents("tizim/admins.txt",$file);
bot('SendMessage',[
'chat_id'=>$AlijonovUz,
'text'=>"<code>$text</code> <b>adminlar ro'yxatidan olib tashlandi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Ushbu foydalanuvchi adminlari ro'yxatida mavjud emas!</b>

Boshqa ID raqamni kiriting:",
'parse_mode'=>'html',
]);
exit();
}
}

if($text == "💵 Taklif narxi"){
	if(in_array($cid, $admin)){
		bot('sendMessage',[
		'chat_id'=>$cid,
		'text'=>"<b>Yangi qiymatni kiriting:</b>",
		'parse_mode'=>'html',
		'reply_markup'=>$bosh
		]);
		file_put_contents("step/$cid.step","taklif");
		exit();
	}
}

if($step == "taklif"){
	if(in_array($cid, $admin)){
		if(is_numeric($text) == true){
file_put_contents("tizim/taklif.txt", $text);
			bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Qabul qilindi!</b>",
			'parse_mode'=>'html',
			'reply_markup'=>$panel
			]);
			unlink("step/$cid.step");
			exit();
		}else{
				bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
			'parse_mode'=>'html',
			]);
		}
	}
}

if($text == "🔺️ Rubl kursi"){
	if(in_array($cid, $admin)){
		bot('sendMessage',[
		'chat_id'=>$cid,
		'text'=>"<b>Yangi qiymatni kiriting:</b>",
		'parse_mode'=>'html',
		'reply_markup'=>$bosh
		]);
		file_put_contents("step/$cid.step","kurs");
		exit();
	}
}

if($step == "kurs"){
	if(in_array($cid, $admin)){
		if(is_numeric($text) == true){
file_put_contents("tizim/kurs.txt", $text);
			bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Qabul qilindi!</b>",
			'parse_mode'=>'html',
			'reply_markup'=>$panel
			]);
			unlink("step/$cid.step");
			exit();
		}else{
				bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
			'parse_mode'=>'html',
			]);
		}
	}
}

if($text == "🎟 Promokod"){
if(in_array($cid,$admin)){
if($promo != null){
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Promokod uchun nom yuboring:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$bosh,
	]);
	file_put_contents("step/$cid.step",'pro');
	exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Promokod yuboriladigan kanal ulanmagan!</b>",
'parse_mode'=>'html',
]);
exit();
}
}
}

if($step == "pro"){
		if(in_array($cid,$admin)){
			if(isset($text)){
	file_put_contents("step/kod.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Qabul qilindi.</b>

Endi esa, promokod qiymatini yuboring:",
	'parse_mode'=>'html',
	]);
	file_put_contents("step/$cid.step",'Next_Promo');
	exit();
}
}
}

if($step == "Next_Promo"){
		if(in_array($cid,$admin)){
if(is_numeric($text)=="true"){
	file_put_contents("step/money.txt",$text);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Tayyor. Promokod $promo kanaliga yuborildi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel,
	]);
$msg = bot('SendMessage',[
	'chat_id'=>$promo,
	'text'=>"🎫 — <code>$kod</code>
💰 — <b>$text $valyuta</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➡️ $bot",'url'=>"https://t.me/$bot"]]
]
])
])->result->message_id;
file_put_contents("step/mid.txt",$msg);
unlink("step/$cid.step");
exit();
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
'parse_mode'=>'html',
]);
exit();
}
}
}

if($data == "qoshimcha"){	
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
'text'=>"<b>Quyidagilardan birini tanlang:</b>

- Promokod uchun kanal: $promo",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🆕️ Promokod uchun",'callback_data'=>"promo"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"kanallar"]]
]
])
]);
}

if($data == "promo"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('SendMessage',[
	'chat_id'=>$cid2,
	'text'=>"<i>Kanalingiz manzilini yuborishdan avval botni kanalingizga admin qilib olishingiz kerak!</i>

📢 <b>Kerakli kanalni manzilini yuboring:

Namuna:</b> <code>@MyrixRu</code>",
	'parse_mode'=>'html',
	'reply_markup'=>$bosh,
	]);
	file_put_contents("step/$cid2.step","promokod");
	exit();
}

if(($step == "promokod") and (in_array($cid,$admin))){
if(mb_stripos($text,"@")!==false){
$get = bot('getChat',[
'chat_id'=>$text
]);
$types = $get->result->type;
$ch_name = $get->result->title;
$ch_user = $get->result->username;
if(getAdmin($ch_user)== true){
file_put_contents("tizim/kanal2.txt","@$ch_user");
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Qabul qilindi!</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
unlink("step/$cid.step");
exit();
}else{
	bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Bot ushbu kanalda admin emas!</b>",
'parse_mode'=>'html',
]);
exit();
}
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Kanal manzilini to'g'ri yuboring:</b>",
'parse_mode'=>'html',
]);
exit();
}
}

if($text == "⚙ Avto to'lov"){
	if(in_array($cid, $admin)){
		bot('sendMessage',[
		'chat_id'=>$cid,
		'text'=>"<b>Quyidagi to'lov tizimlaridan birini tanlang:</b>",
		'parse_mode'=>'html',
		'reply_markup'=>json_encode([
		'inline_keyboard'=>[
	 [['text'=>"🔹️ PAYME",'callback_data'=>"avtopay"]],
		[['text'=>"Orqaga",'callback_data'=>"yopish"]],
		]
		])
		]);
		exit();
	}
}

if($data == "avtopay"){
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
			'reply_markup'=>json_encode([
		'inline_keyboard'=>[
	    [['text'=>"🗑 O'chirish",'callback_data'=>"delpay"],['text'=>"🔹️ PAYME Card",'callback_data'=>"editpay"]],
	[['text'=>"🔹️ PAYME API URL",'callback_data'=>"editpayapi"],['text'=>"🔹️ PAYME API PAROL",'callback_data'=>"editpayapiparol"]],
		[['text'=>"Orqaga",'callback_data'=>"boshqarish"]],
		]
		])
	]);
}

if($data == "delpay"){
	unlink("tizim/payme.txt");
	unlink("tizim/paymeapi.txt");
	unlink("tizim/paymeparol.txt");
	bot('editMessageText',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	'text'=>"✅ <b>PAYME hamyon faolsizlantirildi!</b>
	
	Qayta faollashtirish uchun, PAYME hamyon qo'shishingiz kerak!",
	'parse_mode'=>'html',
			'reply_markup'=>json_encode([
		'inline_keyboard'=>[	   
		[['text'=>"Orqaga",'callback_data'=>"avtopay"]],
		]
		])
	]);
}

if($data == "editpay"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Yangi qiymatni kiriting:</b>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","autopay");
exit();
}

if($step == "autopay"){
	if(in_array($cid, $admin)){
		if(isset($text)){
			file_put_contents("tizim/payme.txt", $text);
			bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Qabul qilindi!</b>",
			'parse_mode'=>'html',
			'reply_markup'=>$panel
			]);
			unlink("step/$cid.step");
			exit();
		}
	}
}

if($data == "editpayapiparol"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Yangi qiymatni kiriting:</b>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","paymeparol");
exit();
}

if($step == "paymeparol"){
	if(in_array($cid, $admin)){
		if(isset($text)){
			file_put_contents("tizim/paymeparol.txt", $text);
			bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Qabul qilindi!</b>",
			'parse_mode'=>'html',
			'reply_markup'=>$panel
			]);
			unlink("step/$cid.step");
			exit();
		}
	}
}

if($data == "editpayapi"){
bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$mid2,
]);
bot('SendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>Yangi qiymatni kiriting:</b>",
'parse_mode'=>'html',
'reply_markup'=>$bosh
]);
file_put_contents("step/$cid2.step","paymeapi");
exit();
}

if($step == "paymeapi"){
	if(in_array($cid, $admin)){
		if(isset($text)){
			file_put_contents("tizim/paymeapi.txt", $text);
			bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"<b>Qabul qilindi!</b>",
			'parse_mode'=>'html',
			'reply_markup'=>$panel
			]);
			unlink("step/$cid.step");
			exit();
		}
	}
}

?>