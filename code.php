<?php

ob_start();
define('API_KEY','5079830496:AAHIZN8NR1IX1DsiQTRkVJzcQWw9Z17z4Ug');

$admin = "1940513798";

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

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$tx = $message->text;
$cid = $message->chat->id;
$mid = $update->message->message_id;
$user = $message->from->username;
$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);
$joy = file_get_contents("$cid/$cid.joy");
$step = file_get_contents("$cid/$cid.step");
$soat = date('H:i', strtotime('4 hour'));
$sana = date('d-M Y',strtotime('+4 hour'));
$data = $update->callback_query->data;
$name = $message->from->first_name;
$uid= $message->from->id;
$nomer = $message->contact->phone_number;
$contact = $message->contact;
$qid = $update->callback_query->id;
$clid = $update->callback_query->user_id;
$name = $message->chat->first_name;
$mid1 = $update->callback_query->message->message_id;
$cid1 = $update->callback_query->message->chat->id;
$type = $update->message->chat->type;
$text= $message->text;
$odam = file_get_contents("azolar.dat");
$adminn = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"👤Userlarga xabar"],['text'=>"👤Userlarga forward"]],
[['text'=>"🔙Orqaga"]],
]
]);
$tarif = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📂File yuklash"],['text'=>"👤Kabinet"]],
[['text'=>"💳Tariflar"],['text'=>"🔙Orqaga"]],
]
]);
$bosh = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🚀Hosting"],['text'=>"🎁Qiziqarli"]],
[['text'=>"❗️Yordam"],['text'=>"♻️Yangilash"]],
[['text'=>"🔥Maker bo'lim"],['text'=>"🎇Photo bo'im"]],
]]);
$bosh1 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🚀Hosting"],['text'=>"🎁Qiziqarli"]],
[['text'=>"❗️Yordam"],['text'=>"♻️Yangilash"]],
[['text'=>"🔥Maker bo'lim"],['text'=>"🎇Photo bo'im"]],
[['text'=>"👮Admin panel"]],
]]);
$qiz = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[/*['text'=>"⛅️Ob-havo"],*/['text'=>"👨‍💻Dasturchi"],['text'=>"📆Sana-vaqt"]],
[['text'=>"🔰Ismlar manosi"],['text'=>"📊Statistika"]],
[['text'=>"🔎Rasm qidirish"],['text'=>"🔙Orqaga"]],
]
]);
$havo = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🌥️Toshkent"],['text'=>"🌥️Andijon"]],
[['text'=>"🌥️Buxoro"],['text'=>"🌥️Guliston"]],
[['text'=>"🌥️Jizzax"],['text'=>"🌥️Zarafshon"]],
[['text'=>"🌥️Qarshi"],['text'=>"🌥️Navoiy"]],
[['text'=>"🌥️Namangan"],['text'=>"🌥️Nukus"]],
[['text'=>"🌥️Samarqand"],['text'=>"🌥️Termiz"]],
[['text'=>"🌥️Urganch"],['text'=>"🌥️Farg'ona"]],
[['text'=>"🌥️Xiva"],['text'=>"🔙Orqaga"]],
]
]);
if ($tx == "/start") {
    Mkdir($cid);
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🤖Botdan foydalanish uchun ro'yhatdan o'tishingiz kerak!",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"📲Ro'yhatdan o'tish",'request_contact'=>true]],
    ]
    ])
    ]);
    file_put_contents("$cid/$cid.step", "royhat");
}
if ($contact and $step == "royhat") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"✅Ro'yhatdan omadli o'tdingiz!",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"📝Boshlash"]],
    ]
    ])
    ]);
    file_put_contents("$cid/$cid.step","boshla");
    bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"🔰Botimizda yangi a'zo \n\n🚀Ismi: $name \n🚀ID: $uid \n🚀User: $user \n🚀Nomer: $nomer",
    ]);
}

if($tx == "📝Boshlash" and $step == "boshla"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"👋Salom xush kelibsiz",
    'reply_markup'=>$bosh,
 ]);   
    file_put_contents("$cid/$cid.step", "start");
}
if($tx == "📝Boshlash" and $step == "boshla" and $cid == "$admin"){
    bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"👋Salom xush kelibsiz",
    'reply_markup'=>$bosh1,
 ]);   
    file_put_contents("$cid/$cid.step", "start");
}
if ($tx == "👮Admin panel" and $step == "start") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"👮Admin panelga xush kelibsiz!",
    'reply_markup'=>$adminn,
    ]);
    file_put_contents("$cid/$cid.step", "admin");
}
if ($tx == "🔙Orqaga" and $step == "admin") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🏡Bosh menu!",
    'reply_markup'=>$bosh1,
    ]);
    file_put_contents("$cid/$cid.step", "start");
}
if ($tx == "❗️Yordam" and $step == "start") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"♻️Yordam \n\n🤖Bu bot orqali siz .php kodlaringizni hosting qilishingiz mumkun! \n❗️Eslatma \nBotdan faqat 1 ta .php kod hosting qilishingiz mumkun agarda 2 ta .php hosting qilsangiz avvalgisi ishlamasligi mumkun!",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
]),
    ]);
    file_put_contents("$cid/$cid.step", "yordam");
}
if ($tx == "🔙Orqaga" and $step == "yordam") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🏡Bosh menu!",
    'reply_markup'=>$bosh,
    ]);
    file_put_contents("$cid/$cid.step", "start");
}
if ($tx == "👨‍💻Dasturchi" and $step == "qiziqarli") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"👨‍💻Dasturchi \n\n🚀@RamazanDeveloper \n🚀Kanal: @RamazanDev \n🎁Homiy: @Coder_2oo7",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
]),
    ]);
    file_put_contents("$cid/$cid.step", "dasturchi");
}
if ($tx == "🔙Orqaga" and $step == "dasturchi") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🎁Qiziqarli bo'lim...",
    'reply_markup'=>$qiz,
    ]);
    file_put_contents("$cid/$cid.step", "start");
}
if ($tx == "🎁Qiziqarli" and $step == "start") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🎁Qiziqarli bo'limga xush kelibsiz!",
    'reply_markup'=>$qiz,
    ]);
    file_put_contents("$cid/$cid.step", "qiziqarli");
}
if ($tx == "🔙Orqaga" and $step == "qiziqarli") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🏡Bosh menu!",
    'reply_markup'=>$bosh,
    ]);
    file_put_contents("$cid/$cid.step", "start");
}
/*if ($tx == "⛅️Ob-havo" and $step == "qiziqarli") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Viloyatni tanlang!",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Toshkent" and $step == "havo") {
    $uz = file_get_contents("http://obhavo.uz/tashkent", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "toshkent");
}
if ($tx == "🔙Orqaga" and $step == "toshkent") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Andijon" and $step == "havo") {
   $uz = file_get_contents("http://obhavo.uz/andijan", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "andijon");
}
if ($tx == "🔙Orqaga" and $step == "andijon") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Buxoro" and $step == "havo") {
    $uz = file_get_contents("http://obhavo.uz/bukhara", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "buxoro");
}
if ($tx == "🔙Orqaga" and $step == "buxoro") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Guliston" and $step == "havo") {
    $uz = file_get_contents("http://obhavo.uz/gulistan", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "guliston");
}    
if ($tx == "🔙Orqaga" and $step == "guliston") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Jizzax" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/jizzakh", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "jizzax");
}    
if ($tx == "🔙Orqaga" and $step == "jizzax") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Zarafshon" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/zarafshan", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "zarafshon");
}    
if ($tx == "🔙Orqaga" and $step == "zarafshon") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Qarshi" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/karshi", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "qarshi");
}    
if ($tx == "🔙Orqaga" and $step == "qarshi") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Navoiy" and $step == "havo"){
$uz = file_get_contents("http://obhavo.uz/navoi", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "navoi");
}    
if ($tx == "🔙Orqaga" and $step == "navoi") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Namangan" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/namangan", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "namangan");
}    
if ($tx == "🔙Orqaga" and $step == "namangan"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Nukus" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/nukus", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "nukus");
}    
if ($tx == "🔙Orqaga" and $step == "nukus"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Samarqand" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/samarkand", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "samar");
}    
if ($tx == "🔙Orqaga" and $step == "samar"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Termiz" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/termez", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "termiz");
}    
if ($tx == "🔙Orqaga" and $step == "termiz"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Urganch" and $step == "havo") {
    $uz = file_get_contents("http://obhavo.uz/urgench", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "urganch");
}    
if ($tx == "🔙Orqaga" and $step == "urganch"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Farg'ona" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/ferghana", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "fargona");
}    
if ($tx == "🔙Orqaga" and $step == "fargona"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🌥️Xiva" and $step == "havo") {
$uz = file_get_contents("http://obhavo.uz/khiva", false, stream_context_create($arrContextOptions));
$ex1=explode("\n",$uz);
$oqshom=str_replace('<p class="forecast">',' ',$ex1[108]);
$oqshom=str_replace('</p>',' ',$oqshom);
$oqshom= trim($oqshom);
$kuns=str_replace('<p class="forecast">',' ',$ex1[103]);
$kuns=str_replace('</p>',' ',$kuns);
$kuns= trim($kuns);
$tong=str_replace('<p class="forecast">',' ',$ex1[98]);
$tong=str_replace('</p>',' ',$tong);
$tong= trim($tong);
$quyosh2=str_replace('<p>',' ',$ex1[87]);
$quyosh2=str_replace('</p>',' ',$quyosh2);
$quyosh2= trim($quyosh2);
$quyosh1=str_replace('<p>',' ',$ex1[86]);
$quyosh1=str_replace('</p>',' ',$quyosh1);
$quyosh1= trim($quyosh1);
$bosim=str_replace('<p>',' ',$ex1[82]);
$bosim=str_replace('</p>',' ',$bosim);
$bosim= trim($bosim);
$shamol=str_replace('<p>',' ',$ex1[81]);
$shamol=str_replace('</p>',' ',$shamol);
$shamol= trim($shamol);
$harorat=str_replace('<div class="current-forecast-desc">',' ',$ex1[76]);
$harorat=str_replace('</div>',' ',$harorat);
$harorat= trim($harorat);
$tun=str_replace('<span>',' ',$ex1[73]);
$tun=str_replace('</span>',' ',$tun);
$tun= trim($tun);
$kun=str_replace('<span><strong>',' ',$ex1[72]);
$kun=str_replace('</strong></span>',' ',$kun);
$kun= trim($kun);
$bugun=str_replace('<div class="current-day">',' ',$ex1[66]);
$bugun=str_replace('</div>',' ',$bugun);
$bugun= trim($bugun);
$namlik=str_replace('<p>',' ',$ex1[80]);
$namlik=str_replace('</p>',' ',$namlik);
$namlik= trim($namlik);
bot('sendMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"<b>$bugun
⛅️ $kun...$tun, <b>$harorat</b>

🌆 Tong: $tong
🌇 Kun: $kuns 
🏙 Oqshom: $oqshom

$namlik
$shamol
$bosim

$quyosh1
$quyosh2

🔔 @codehostingbot</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Orqaga"]],
]]),
]);
file_put_contents("$cid/$cid.step", "xiva");
}    
if ($tx == "🔙Orqaga" and $step == "xiva"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⛅️Ob-havo bo'limi...",
    'reply_markup'=>$havo,
    ]);
    file_put_contents("$cid/$cid.step", "havo");
}
if ($tx == "🔙Orqaga" and $step == "havo") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🎁Qiziqarli bo'lim...",
    'reply_markup'=>$qiz,
    ]);
    file_put_contents("$cid/$cid.step", "qiziqarli");
}
*/
if($tx == "📆Sana-vaqt" and $step == "qiziqarli"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"📆 $sana $soat",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
]),
    ]);
    file_put_contents("$cid/$cid.step", "sana");
}
if ($tx == "🔙Orqaga" and $step == "sana") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🎁Qiziqarli bo'lim...",
    'reply_markup'=>$qiz,
    ]);
    file_put_contents("$cid/$cid.step", "qiziqarli");
}
if($tx=="♻️Yangilash" and $step == "start"){
bot('sendmessage',[
 'chat_id'=>$cid,
 'text'=>"☇Yangilanmoqda!⚡",
 'parse_mode'=>"markdown"
 ]);
 sleep(0.3);
bot('editMessageText',[
 'chat_id'=>$cid,
 'text'=>'🔆🔅🔅🔅🔅🔅🔅🔅🔅0%',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid +1,
 'text'=>'▪️',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅🔆🔅🔅🔅🔅🔅🔅🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅🔅🔆🔅🔅🔅🔅🔅🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅🔅🔅🔆🔅🔅🔅🔅🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅🔅🔅🔅🔆🔅🔅🔅🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅🔅🔅🔅🔅🔆🔅🔅🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅🔅🔅🔅🔅🔅🔆🔅🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅🔅🔅🔅🔅🔅🔅🔆🔅',
]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid +1,
 'text'=>'🔅🔅🔅🔅🔅🔅🔅🔅🔆',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Biroz kuting... ',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔆',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔆',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔅',
 ]);
 sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'🔆',
]);
sleep(0.5);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'💫',
]);
  bot('deletemessage',[
    'chat_id'=>$cid,
    'message_id'=>$mid + 1,
  ]);
 sleep(0.5);
    bot('sendmessage', [
      'chat_id' =>$cid,
       'text' => "*🌐 Sizning Barcha Ma'lumotlaringiz 🌝 Yangilandi!!!✅*",
       'parse_mode'=>'markdown',  
       'reply_markup'=>$bosh, 
]);
    file_put_contents("$cid/$cid.step", "start");
}
if ($tx == "🎇Photo bo'im" and $step == "start") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⚒Bu bo'lim hali qo'shilmagan bizdan uzoqlashmang!",
    'reply_markup'=>$bosh,
    ]);
    file_put_contents("$cid/$cid.step", "start");
}
if($tx == "🔰Ismlar manosi" and $step == "qiziqarli"){
  bot('sendMessage',[
  'chat_id'=>$cid,
  'message_id'=>$mid,
  'text'=>"Ism yuboring♻️!",
  'reply_markup'=>json_encode([
  'remove_keyboard'=>true,
  ]),
]);
  file_put_contents("$cid/$cid.step", "manosi");
    }
    if($tx and $step == "manosi"){
$ism = file_get_contents("https://ismlar.com/search/$tx");
  $exp = explode('<p class="text-size-5">',$ism);
  $expl = explode('<div class="col-12 col-md-4 text-md-right">',$exp[1]);
  $im = str_replace($expl[1],' ',$exp[1]);
  $ims = str_replace('</p>',' ',$im);
  $isms = str_replace('</div>',' ',$ims);
  $ismn = str_replace('<div class="col-12 col-md-4 text-md-right">',' ',$isms);
  $ismk = str_replace('&#039;','`',$ismn);
  $ismm = trim("$ismk");
  bot('sendmessage',[
    'chat_id'=>$cid,
    'reply_to_message_id'=>$mid,
    'text'=>"<b>📚 ISMLAR MA'NOSI 📚

🔍 $tx

📑 Manosi:</b> <i>$ismm</i>!
🤖 Botimiz @codehostingbot",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
]),
  ]);
  file_put_contents("$cid/$cid.step", "mano");
  }
if ($tx == "🔙Orqaga" and $step == "mano") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🎁Qiziqarli bo'lim...",
    'reply_markup'=>$qiz,
    ]);
    file_put_contents("$cid/$cid.step", "qiziqarli");
}
if($tx == "📊Statistika"){
$baza = file_get_contents("azolar.dat");
$obsh = substr_count($baza,"\n");
$gruppa = substr_count($baza,"-");
$lichka = $obsh - $gruppa;

     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Bot foydalanuvchilari: $obsh ta*\n\n".date("Y-m-d H:i:s", strtotime('4 hour'))."",
     'parse_mode'=>'markdown',
     'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
]),
  ]);
  file_put_contents("$cid/$cid.step", "stat");
  }
if ($tx == "🔙Orqaga" and $step == "stat") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🎁Qiziqarli bo'lim...",
    'reply_markup'=>$qiz,
    ]);
    file_put_contents("$cid/$cid.step", "qiziqarli");
}
if($tx=="🔎Rasm qidirish"){
    bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"Qanday rasm izlayabsiz!",
    'reply_markup'=>json_encode([
    'remove_keyboard'=>true,
    ]),
    ]);
    file_put_contents("$cid/$cid.step", "rasmizla");
    }
if($tx and $step == "rasmizla"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"*🔍 Izlanmoqda...*",
    'parse_mode'=>'markdown',
]);
sleep(1);
bot('sendphoto',[
'chat_id'=>$cid,
'photo'=>"https://yandex.uz/images/touch/search/?text=$tx",
'caption'=>"✅Rasm topildi!
@codehostingbot",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
]),
  ]);
  file_put_contents("$cid/$cid.step", "rasmtop");
  }
if ($tx == "🔙Orqaga" and $step == "rasmtop") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🎁Qiziqarli bo'lim...",
    'reply_markup'=>$qiz,
    ]);
    file_put_contents("$cid/$cid.step", "qiziqarli");
}
if ($tx == "🔥Maker bo'lim" and $step == "start") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🔥Tez kunda!",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
]),
  ]);
  file_put_contents("$cid/$cid.step", "maker");
  }
if ($tx == "🔙Orqaga" and $step == "maker") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🏡Bosh menu!",
    'reply_markup'=>$bosh,
    ]);
    file_put_contents("$cid/$cid.step", "start");
}
if ($tx == "👤Userlarga xabar" and $step == "admin") {
    bot('sendMessage',[ 
    'chat_id'=>$admin,
    'text'=>"👤Menga xabar yuboring",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
    ]),
    ]);
    file_put_contents("$cid/$cid.step", "usergaxabar");
}
if ($tx and $step == "usergaxabar") {
$lich = file_get_contents("azolar.dat");
  $lichka = explode("\n",$lich);
  foreach($lichka as $users){}
  bot('sendMessage', [
'chat_id'=>$users,
'text'=>$tx,
]);
file_put_contents("$cid/$cid.step", "xabarr");
}
if ($okuser and $step == "xabarr") {
    bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"✅Xabaringiz barchaga yetkazildi!",
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
    ]),
    ]);
    file_put_contents("$cid/$cid.step", "usergaxabar");
}
if ($tx == "🔙Orqaga" and  $step == "usergaxabar") {
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🔙Orqaga qayttingiz!",
    'reply_markup'=>$adminn,
    ]);
    file_put_contents("$cid/$cid.step", "admin");
}
if($tx == "🚀Hosting"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"*📲Bot faylini jonating misol Fayl nomi.php bolsin*!!!",
'parse_mode'=>'markdown',
'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🔙Orqaga"]],
    ]
]),
]);

file_put_contents("$cid/$cid.step", "hosting");
$baza = file_get_contents("azolar.dat");
if(mb_stripos($baza, $cid) !== false){
}}
$doc=$message->document;
$doc_id=$doc->file_id;
if(isset($message->document)){
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$type = strtolower(strrchr($file,'.')); 
$type=str_replace('.','',$type);
$okey = file_put_contents("$cid/$cid.code.$type",file_get_contents($file));
if($okey){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>" *Fayl yuklab olindi endi botni tokenini kiriting namuna\n /token\nbotni_tokeni*  ",
'parse_mode'=>markdown,
]);
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Xatolik #1. Iltimos shu xabarni @RamazanDeveloper ga yuboring!",
'parse_mode'=>markdown,
]);
}
}

if(isset($message->photo) and $joy){
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$photo_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$okey = file_put_contents("$cid/$cid.pic.png",file_get_contents($file));
$type = strtolower(strrchr($file,'.')); 
$type=str_replace('.','',$type);
}

if((mb_stripos($tx,"/token")!==false)){
    $pieces = explode("\n",$tx);
    $s=$pieces[1];
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Botingiz ulandi Tekshiring!!!Agarda ishlamasa kodingizda hato bor yaxshilab tekshirib qaytadan yuboring→★*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
     file_get_contents("https://api.telegram.org/bot$s/setwebhook?url=https://u4428.xvest2.ru/codehostingbot/$cid/$cid.code.php");
}
