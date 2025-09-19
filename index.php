<?php
  // سورس سخنگو رایگان برای شما قرار دادیم استفاده کنید بقیه محصولات در صفحه فروشگاه ما
/*
سوالی بود تیکت بزنید*/
define('API_KEY','');//توکن ربات
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

/*

*/
function sendmessage($chat_id, $text, $pars_mde){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>$pars_mde
 ]);
 }
function senddocument($chat_id, $document, $caption){
 bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>$document,
 'caption'=>$caption
 ]);
 }
function sendphoto($chat_id, $photo, $captionl){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
function sendvideo($chat_id, $video, $caption){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'video'=>$video,
 'caption'=>$caption
 ]);
 }
function sendvoice($chat_id, $voice, $caption){
 bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>$voice,
 'caption'=>$caption
 ]);
 }
function sendaudio($chat_id, $audio, $caption, $title ,$performer){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 'title'=>$title,
 'performer'=>$performer
 ]);
 }
function Forward($KojaShe,$AzKoja,$KodomMSG){
 bot('ForwardMessage',[
 'chat_id'=>$KojaShe,
 'from_chat_id'=>$AzKoja,
 'message_id'=>$KodomMSG
 ]);
 }
$step= file_get_contents("data/$from_id/file.txt");
$update = json_decode(file_get_contents('php://input'));
$text = $update->message->text;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$message = $update->message;
$from_id = $message->from->id;
$name = $message->from->frst_name;
$username = $message->from->username;
$lastname = $message->from->last_name;
$first_name = $message->from->first_name;
$botsorce = $update->message->reply_to_message->forward_from->id;
$type = $update->message->chat->type;
$suchi = file_get_contents("data/$chat_id/setnt.txt");
mkdir("data/$chat_id");
mkdir("text/$suchi");
@$suchi_bot = file_get_contents("data/$chat_id/bot.suchi.ir.txt");
$step = file_get_contents("data/$chat_id/step.txt","sup");
$bot = "@Tina_robot";  //ایدی ربات
$sos = "@t000c"; //ایدی پشتیبان
$admin = "876004011"; //ایدی عددی ادمین
//کد استارت بات
$amirurmia18 = json_encode([
'keyboard' => [
[['text' => 'یاد دادن کلمه 😍'],['text' => 'بردن به گروه 🔥']],
[['text' => 'ارتباط با پشتیبانی 🎪']],

], 
'resize_keyboard' => true
]);
if(strpos($text,"/start") !== false && $type = "supergroup"){
$user = file_get_contents('users.txt');
$members = explode("\n",$user);
if (!in_array($chat_id,$members)){
$add_user = file_get_contents('users.txt');
$add_user .= $chat_id."\n";
file_put_contents('users.txt',$add_user);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام $first_name 
به ربات سخنگو خوش آمدید❤️
برای استفاده از من از دکمه های زیر استفاده کنید.
شما میتونید به من حرف یاد بدید و من رو به گروه ها ببری و من چت کنم تازه توی پی ویت هم چت میکنم❕",
'reply_markup'=>$amirurmia18,
]);
}else{
$o = file_get_contents("text/$text/text.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$o",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"html"
]);
}
//یاد دادن

if($text == "یاد دادن کلمه 😍"){
file_put_contents("data/$from_id/bot.suchi.ir.txt","setname");

if(strpos($off_on,"false") !== false && $from_id != $Dev){
 return false;
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قصد یاد دادن چه کلمه ای  به من را داری🎈",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
]);
}
elseif($suchi_bot == "setname"){
file_put_contents("text/$text");
file_put_contents("data/$chat_id/setnt.txt","$text");
file_put_contents("data/$chat_id/bot.suchi.ir.txt","settext");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🎗در جواب حرفتا چه بگویم؟",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
]);
}
elseif($suchi_bot == "settext"){
file_put_contents("text/$suchi/text.txt","$text");
file_put_contents("data/$chat_id/bot.suchi.ir.txt","none");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"دمت گرم یاد گرفتم بریم بعدی🎄🎯",
'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
]);
}
//sos
elseif($text == "ارتباط با پشتیبانی 🎪"){
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"☎️ جهت ارتباط با بخش پشتیبانی پیام خود را با رعایت موارد زیر به نشانی $sos ارسال نمایید.
@t000c
• لطفا پیام، سوال، پیشنهاد و یا انتقاد خود را در قالب یک پیام واحد به طور کامل ارسال کنید (از پاسخگویی به پیامهای جداگانه، ناقص و احوالپرسی معذوریم)
• اگر پیامتان در رابطه با سفارش خاصی است حتما پیام 'ثبت سفارش' و پست موردنظر را نیز ارسال کنید.
• درصورتی که میخواهید گزارش تخلفی را بدهید، مدارک مربوطه و شناسه های کاربری مرتبط را حتما ارسال کنید.

👈 سعی بخش پشتیبانی بر این است که تمامی پیام های دریافتی در کمتر از ۱۲ ساعت پاسخ داده شوند، بنابراین تا زمان دریافت پاسخ صبور باشید.",
 'parse_mode'=>'html',
    'reply_markup'=>$amirurmia18_office
 ]);
 }

elseif($text == "بردن به گروه 🔥"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"‌👮🏻‍♀دوست عزیز برای اضافه کردن ربات سخنگو به گروه روی کیبرد زیر‌ بزنید ! ",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[['text'=>"➕افزودن به گروه",'url'=>"https://telegram.me/Tina_robot?startgroup=addfree"]],  
]])]);}
//panel
if($text == "پنل مدیریت" && $from_id == $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🎗پنل مدیریت.",
 'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"آمار🌷 "],['text'=>"📧پیام به همه"]],
[['text'=>"📬فرواد به همه"]],
],
"resize_keyboard"=>true,
])
]);
}

if($text ==   'آمار🌷' && $from_id == $admin){
$users = file_get_contents("http://r2f.ir/bot/sokh/users.txt");
$member_id = explode("\n",$users);
$member_count = count($member_id) -1;
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🎗تعداد اعضا ربات سخنگو : $member_count",
 'parse_mode'=>"markdown",
 ]);
}

if($text == '📧پیام به همه' && $from_id == $admin){
file_put_contents("data/$from_id/bot.suchi.ir.txt","Send");
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "پیامتون رو بفرستید تا به همه گروه ها و کاربرانی که ربات مورد استفاده انهاست بفرستم",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"پنل مدیریت"]
],
]
])
]);
}
elseif($suchi_bot == "Send" && $from_id == $admin){
file_put_contents("data/$chat_id/bot.suchi.ir.txt","none");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" پیام همگانی فرستاده شد.",
'parse_mode' => 'html'
]);
$all_member = fopen( "users.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
SendMessage($user,$text,'html');
}
}

if($text == '📬فرواد به همه' && $from_id == $admin){
file_put_contents("data/$from_id/bot.suchi.ir.txt","forvar");
bot('sendMessage',[
'chat_id' => $chat_id,
'text' => "پیامتونو رو فروارد کنید تا به تمامی کاربران و گروه ها ارسال شود",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"پنل مدیریت"]
],
]
])
]);
}

elseif($suchi_bot == "forvar" && $from_id == $admin){
file_put_contents("data/$chat_id/bot.suchi.ir.txt","none");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📬فرواد به همه ارسال شد به تمامی کاربران و گروه ها",
'parse_mode' => 'html'
]);
$forp = fopen( "users.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar, $chat_id,$message_id); 
  } 
   bot('sendMessage',[ 
   'chat_id'=>$chat_id, 
   'text'=>"با موفقیت فروارد شد.", 
   ]);
}

