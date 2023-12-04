<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    private static $faq;

    public static function saveFaqs($request){
        self::$faq =new Faq();
        self::$faq->tour_id = $request->tour_id;
        self::$faq->question = $request->question;
        self::$faq->answer = $request->answer;
        self::$faq->save();
    }
    public static function faqsUpdate($request, $id)
    {
 
        self::$faq = Faq::find($id);
        self::$faq->tour_id = $request->tour_id;
        self::$faq->question = $request->question;
        self::$faq->answer = $request->answer;
        self::$faq->save();
    }

    public static function statusFaq($id){
        self::$faq = Faq::find($id);
        if (self::$faq->status == 1){
            self::$faq->status = 0;
        }else{
            self::$faq->status = 1;
        }
        self::$faq->save();
    }

    public static function faqsDelete($request){
        self::$faq = Faq::find($request->id);
        self::$faq->delete();
    }
}
