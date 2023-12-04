<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientReview extends Model
{
    use HasFactory;

    use HasFactory;
    private static $client, $client_image ,$imageNewName,$directory,$imgUrl;

    public static function saveClients($request){

        self::$client =new ClientReview();
        self::$client->client_name = $request->client_name;
        self::$client->client_description = $request->client_description;
        self::$client->client_rating = $request->client_rating;
        if ($request->file('client_image')){
            if (self::$client->client_image){
                if (file_exists(self::$client->client_image)){
                    unlink(self::$client->client_image);
                }
            }
            self::$client->client_image = self::getImageUrl($request);
        }
        self::$client->save();
    }
    public static function clientsUpdate($request, $id)
    {
       
        self::$client = ClientReview::find($id);
        self::$client->client_name = $request->client_name;
        self::$client->client_description = $request->client_description;
        self::$client->client_rating = $request->client_rating;
        if($request->file('client_image'))
        {
            if(file_exists(asset(self::$client->client_image)))
            {
                dd("hello");
                unlink(self::$client->client_image);
            }
         
            self::$imgUrl = self::getImageUrl($request);
            self::$client->client_image = self::$imgUrl;
        }
        else{
            self::$imgUrl = self::$client->client_image;
        }
       
        self::$client->save();
    }
    private static function getImageUrl($request){
        self::$client_image = $request->file('client_image');
        self::$imageNewName=rand().'.'.self::$client_image->getClientOriginalExtension();
        self::$directory='adminAsset/client-image/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$client_image->move(self::$directory,self::$imageNewName);
     
        return self::$imgUrl;
    }

    public static function status($id){
        self::$client = ClientReview::find($id);
        if (self::$client->status == 1){
            self::$client->status = 0;
        }else{
            self::$client->status = 1;
        }
        self::$client->save();
    }

    public static function clientsDelete($request){
        self::$client = ClientReview::find($request->id);
        if (self::$client->client_image){
            if (file_exists(self::$client->client_image)){
                unlink(self::$client->client_image);
            }
        }
        self::$client->delete();
    }
}
