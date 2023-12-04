<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    private static $feedback, $client_image ,$imageNewName,$directory,$imgUrl;

    public static function saveFeedback($request){
        self::$feedback =new Feedback();
        self::$feedback->client_name = $request->client_name;
        self::$feedback->client_designation = $request->client_designation;
        self::$feedback->client_description = $request->client_description;
        if ($request->file('client_image')){
            if (self::$feedback->client_image){
                if (file_exists(self::$feedback->client_image)){
                    unlink(self::$feedback->client_image);
                }
            }
            self::$feedback->client_image = self::getImageUrl($request);
        }
        self::$feedback->save();
    }
    public static function feedbackUpdate($request, $id)
    {
        self::$feedback = Feedback::find($id);
        self::$feedback->client_name = $request->client_name;
        self::$feedback->client_designation = $request->client_designation;
        self::$feedback->client_description = $request->client_description;
        if($request->file('client_image'))
        {
            if(file_exists(self::$feedback->client_image))
            {
                unlink(self::$feedback->client_image);
            }
            self::$imgUrl = self::getImageUrl($request);
        }
        else{
            self::$imgUrl = self::$feedback->client_image;
        }
        self::$feedback->save();
    }

    private static function getImageUrl($request){
        self::$client_image = $request->file('client_image');
        self::$imageNewName=rand().'.'.self::$client_image->getClientOriginalExtension();
        self::$directory='adminAsset/client-image/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$client_image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function statusFeedback($id){
        self::$feedback = Feedback::find($id);
        if (self::$feedback->status == 1){
            self::$feedback->status = 0;
        }else{
            self::$feedback->status = 1;
        }
        self::$feedback->save();
    }

    public static function feedbackDelete($request){
        self::$feedback = Feedback::find($request->id);
        if (self::$feedback->client_image){
            if (file_exists(self::$feedback->client_image)){
                unlink(self::$feedback->client_image);
            }
        }
        self::$feedback->delete();
    }

}
