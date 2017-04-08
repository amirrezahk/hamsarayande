<?php 

ob_start();

$API_KEY = '372215142:AAGnhhLoX8atS8DZL58W6609RRlDARcjI3w';
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
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
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
function sendphoto($chat_id, $photo, $action){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'action'=>$action
	]);
	}
	//====================ᵗᶦᵏᵃᵖᵖ======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$text = $message->text;
$ali = file_get_contents("ali.txt");
$imgm = file_get_contents("http://buildabot.tk/b/data/men.php");
$imgw = file_get_contents("http://buildabot.tk/b/data/women.php");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
$ADMIN = 102117869;
//====================ᵗᶦᵏᵃᵖᵖ======================//
if($text == '/start'){
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }
sendaction($chat_id,'typing');
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"سلام عجیجم😂
به ربات همسر ایندتون چه شکلیه خوش امدید👻
من میتونم عکس همسر ایندتون را براتون بفرستم😷
کار با من خیلی راحته🤕",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  	  [
	  ['text'=>"بزن بریم🐿",'callback_data'=>"go"]
	  ]
		]
		])
  ]);
}
//====================ᵗᶦᵏᵃᵖᵖ======================//
if($text == '/info'){
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }
sendaction($chat_id,'typing');
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"ربات (همسر آینده تتون چه شکلیه ) یک ربات بسیار جالب و سرگرم کننده هست که می‌تونه شما و اطرافیانتون رو مدتها مشغول کنه.
طرز کار این ربات به این شکل هست که شما نام و نام خانوادگی خودتون یا دوستانتون رو وارد میکنید و ربات عکس احتمالی همسرتون رو به شما نشون میده!
همچنین پس از اینکه عکس همسرتون رو دیدید میتونید با دیگران در گروه ها به اشتراک بگذارید!
این ربات بیشتر جنبه سرگرمی داره پس اگه همسرتون زیادی زشت یا خوشگل شد جدی نگیرید و ما تضمینی برای آشنا کردن شما با شخصی که عکسش براتون نمایش داده میشه نمیدیم😐😂",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  	  [
	  ['text'=>"کانال اطلاع رسانی😎",'url'=>"http://telegram.me/tikapp"]
	  ]
		]
		])
  ]);
}
//====================ᵗᶦᵏᵃᵖᵖ======================//
elseif($text == "/panel" && $chat_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
                'parse_mode'=>'html',
      'reply_markup'=>json_encode([
            'keyboard'=>[
              [
              ['text'=>"آمار"],['text'=>"پیام همگانی"]
              ]
              ],'resize_keyboard'=>true
        ])
            ]);
        }
elseif($text == "آمار" && $chat_id == $ADMIN){
	sendaction($chat_id,'typing');
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , " آمار کاربران : $member_count" , "html");
}
elseif($text == "پیام همگانی" && $chat_id == $ADMIN){
    file_put_contents("ali.txt","bc");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'/panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "bc" && $chat_id == $ADMIN){
    file_put_contents("ali.txt","none");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی فرستاده شد.",
  ]);
	$all_member = fopen( "Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}
//====================ᵗᶦᵏᵃᵖᵖ======================//
elseif ($data == "go") {
sendaction($chat_id,'typing');
  bot('editmessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"خوب اول بهم بگو جنسیتت چیه😑",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [
		['text'=>"پسرم😎",'callback_data'=>"men"],['text'=>"دخترم😑",'callback_data'=>"women"]
	  ]
      ]
    ])
  ]);
 }
elseif ($data == "o") {
sendaction($chat_id,'typing');
  bot('sendmessage',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"خوب اول بهم بگو جنسیتت چیه😑",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [
		['text'=>"پسرم😎",'callback_data'=>"men"],['text'=>"دخترم😑",'callback_data'=>"women"]
	  ]
      ]
    ])
  ]);
 }
elseif($data == "men" ){
    file_put_contents("ali.txt","man");
	sendaction($chat_id,'typing');
	bot('editmessagetext',[
        'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"خوب میشه اسم و فامیلتون را برام بگید😁:",
  ]);
}
elseif($data == "women" ){
    file_put_contents("ali.txt","woman");
	sendaction($chat_id,'typing');
	bot('editmessagetext',[
       'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"خوب میشه اسم و فامیلتون را برام بگید😁:",
  ]);
}
elseif($ali == "man" ){
sendaction($chat_id,'typing');
    file_put_contents("ali.txt","no");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"در حال پردازش.....",
        	    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  	  [
	  ['text'=>"دوباره😂",'callback_data'=>"o"]
	  ]
		]
		])
  ]);
  sendaction($chat_id,'upload_photo');
  bot('sendphoto',[
    'chat_id'=>$chat_id,
    'photo'=>$imgm,
    	'caption'=>"اقای $text \n اینم عکس همسر اینده شما👆 \n @tikapp"
  ]);
}
elseif($ali == "woman" ){
sendaction($chat_id,'typing');
    file_put_contents("ali.txt","no");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"در حال پردازش.....",
        	    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  	  [
	  ['text'=>"دوباره😂",'callback_data'=>"o"]
	  ]
		]
		])
  ]);
  sendaction($chat_id,'upload_photo');
  bot('sendphoto',[
    'chat_id'=>$chat_id,
    'photo'=>$imgw,
    	'caption'=>"اینم عکس همسر اینده شما \n @Tele_private",
  ]);
}
  								?>
