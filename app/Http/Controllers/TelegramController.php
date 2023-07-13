<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Str;

class TelegramController extends Controller
{
    public function updatedActivity(){
        $activity = Telegram::getUpdates();

        dd($activity);
    }

    public function sendMessage(){
        return view('telegramView');
    }

    public function storeMessage(Request $request){
        $request->validate([
            'name' => 'required',
            'message' => 'required'
        ]);

        $text = "<b>Name: </b>\n"."$request->name\n"."<b>Message: </b>\n".$request->message;

        Telegram::sendMessage([
            'chat_id' => '-1001866965718',
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        return redirect()->back();

    }

    public function storePhoto(Request $request){

        $request->validate([
            'file' => 'file|mimes: jpeg,jpg,png,gif'
        ]);

        $photo = $request->file('file');

        Telegram::sendPhoto([
            'chat_id' => '-1001866965718',
            'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), Str::random(10).'.'.$photo->getClientOriginalExtension()),
            'caption' => 'Photo Image'
        ]);

        return redirect()->back();
       
    }
}
