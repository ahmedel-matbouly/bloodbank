<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Governorate;
use App\model\Post;
use App\model\City;
use App\model\Category;
use App\model\Blood;
use App\model\Client;
use App\model\setting;
use App\model\contact;
use App\model\order;
use App\model\Token;
use Illuminate\Support\Facades\Validator;



class Maincontroller extends Controller
{
     
 
    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson(1, 'success', $governorates);
    }
   public function cities(Request $request){   
        $city= City::where(function ($query) use($request){           
            if($request->has('governorate_id')){
              $query->where('governorate_id',$request->governorate_id) ; 
            }
        })->get();
        return responseJson(1,'success',$city);
    }
    public function posts(){       
      $posts= Post::with('category')->paginate(10);
      return responseJson(1,'success',$posts);
}

    public function categories()
    {
        $category = Category::all();
        return responseJson(1, 'success', $category);
    }

    public function bloods()
    {
        $bloods = Blood::all();
        return responseJson(1, 'success', $bloods);
    }
    public function favourites(Request $request){
      $validator=  validator()->make($request->all(),[
          'client_id'=> 'required|exists:clients,id',
          'post_id'  => 'required|exists:posts,id',                  
      ]);
      if($validator->fails()){
          return responseJson(0, $validator->errors()->first(), $validator->errors());
      }
      $id=$request->client_id;
      $postId=$request->post_id;
      $user= Client::find($id);
      $post=$user->posts()->toggle($postId);
      if($post['attached']){
          return responseJson(1, 'مفضل');
      }
      elseif($post['detached']){
          return responseJson(0, 'غير مفضل');
      }    
    }
  public function notifications(){
      $notifications= Notification::all();
      return responseJson(1, 'success', $notifications);
  }

  public function notificationsetting(Request $request){
    $validator=  validator()->make($request->all(),[
      'governorate_id'=> ['array','required'],
      'blood_id'  =>  ['array','required'],                  
  ]);
  if($validator->fails()){
      return responseJson(0, $validator->errors()->first(), $validator->errors());
  }
  $client=auth()->user();
  $client->bloodtypes()->sync($request->blood_id);
  $client->governorates()->sync($request->governorate_id);
  return responseJson(1, 'تم ضبط الاشعارات', [$client->bloodtypes()->get(), $client->governorates()->get()]);
}

public function getnotificationsetting(){
 
$client=auth()->user();
$bloods =$client->bloodtypes()->get();
$governorat=$client->governorates()->get();
return responseJson(1, 'اعدادات الاشعارات', [$bloods,$governorat]);
}


public function order(Request $request)
{
    $validation = Validator::make($request->all(),[


         'name'              => 'required',
         'age'               => 'required|integer',
         'blood_id'     => 'required',
         'number_bogs'       => 'required|integer',
         'hospital_address'     => 'required|string',
         'hospital_name'  => 'required|string',
         'phone_number'          => 'required',
         'citie_id'           => 'required',
         'notes'           => 'required',
         
         

    ]);

    if ($validation->fails()){
        return responseJson(0, 'Validation ERROR', $validation->messages());
    }


    $order = $request->user()->orders()->create($request->all());
    //return $order->city->governorate;
    $clientsIds = $order->city->governorate->clients()
    ->whereHas('bloodtypes', function ($q) use ($request,$order) {
        $q->where('bloods.id', $order->blood_id);
    })->pluck('clients.id')->toArray();
       //return $clientsIds;

    if(count($clientsIds) > 0){
        $id = $request->blood_id;
        $bloodType = Blood::find($id)->name;
        $notifications = $order->notifications()->create([
            'title' => 'حالة تحتاج للتبرع بالدم قريبة منك',
            'body' => ' يحتاج ' . $order->name . ' للتبرع بالدم لفصيلة ' . $bloodType,
            'order_id' => $order->id

        ]);

        $notifications->client()->attach($clientsIds);

        $tokens = Token::whereIn('client_id', $clientsIds)->where('token', '!=', '')->pluck('token')->toArray();

        if(count($tokens) > 0){
            $title = $notifications->title;
            $body = $notifications->body;
            $data =[

                'order_id' => $order->id
            ];

            $send = notifyByFireBase($title, $body, $tokens, $data);
            info("firebase result: " . $send);
            
        }
    }
    return responseJson(1, 'تم الإرسال بنجاح',$order);

}



    

    public function contacts(Request $request){
      $contacts=contact::create($request->all());
      return responseJson(1,'success',$contacts);
    }
   public function settings(){
     $seting=setting::all();
     return responseJson(1,'success',$seting);
   }
 
}



