<?php   

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\model\Client;
use App\Mail\ResetPassword;
use App\Mail\NewPassword;
use App\model\Token;

class authcontroller extends Controller
{
    public function register(Request $request){
        
     $validator= validator()->make($request->all(),
             
     [
          'name'=>'required',   
          'email'=>'required|email|unique:clients',   
          'password'=>'required|confirmed',   
          'birth_date'=>'required',   
          'blood_id'=>'required|exists:bloods,id',   
          'phone_number'=>'required',   
          'last_date'=>'required',   
          'citie_id'=>'required',   
         
     ]);   
     if($validator->fails())
     {
         
         return responseJson(0,$validator->errors()->first(),$validator->errors());
     }
     $request->merge(['password'=>  bcrypt($request->password)]);
     $client=Client::create($request->all());
     $client->api_token =str_random(60);
     $client->save();
     return responseJson(1,'تم العمليه بنجاح',[
         'api_token'=>$client->api_token,
         'client'=>$client  
         ]);
    }
    
    // public function notificationSetting(Request $request){
    //     $rules = [
    //         'governorates.*' => 'exists:governorates,id',
    //         'bloodtypes.*' => 'exists:bloodtypes,id',
    //     ];
    //     $validator = validator()->make($request->all(),$rules);
    //     if ($validator->fails())
    //     {
    //         return responseJson(0,$validator->errors()->first(),$validator->errors());
    //     }

    //     if ($request->has('governorates'))
    //     {
    //         $request->user()->governorates()->attach($request->governorates);
    //     }

    //     if ($request->has('bloodtypes'))
    //     {
    //         $request->user()->bloodtypes()->sync($request->bloodtypes);
    //     }

    //     $data = [
    //         'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray(),
    //         'bloods' => $request->user()->bloodtypes()->pluck('bloods.id')->toArray(),
    //     ];
    //     return responseJson(1,'تم  التحديث',$data);

    // }
    public function login(Request $Request){
        
     $validator= validator()->make($Request->all(),
             
     [
           
          'password'=>'required',     
          'phone_number'=>'required',   
             
         
     ]);   

     if($validator->fails()){
         
         return responseJson(0,$validator->errors()->first(),$validator->errors());
     }
  
      $client=Client::where('phone_number',$Request->phone_number)->first();
    //  dd($client);
      if($client){
          
          if(Hash::check($Request->password,$client->password)){
              
              return responseJson(1,'تم العمليه بنجاح',[
         'api_token'=>$client->api_token,
         'client'=>$client 
          ]);
          }
          else{
                  return responseJson(0,'انت غير مسجل');
          }
          
      }
      else{
           return responseJson(0,'error');
      }
     }

     public function profil(Request $request){
        
        $validator= validator()->make($request->all(),
                
        [
             'name'=>'required',   
             'email'=>'required|email|unique:clients',   
             'password'=>'required',   
             'birth_date'=>'required',   
             'blood_id'=>'required|exists:bloods,id',   
             'phone_number'=>'required',   
             'last_date'=>'required',   
             'citie_id'=>'required',   
            
        ]);   
        if($validator->fails())
        {
            
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }
        $client=$request->user();
       // dd($client);
        $request->merge(['password'=>  bcrypt($request->password)]);
        $client=Client::update($request->all());
        $client->save();
        return responseJson(1,'تم العمليه بنجاح',$client);
    }
        public function resetpassword(Request $request ){
            $validator=  validator()->make($request->all(),[
                'email' => 'required'
            ]);
            if($validator->fails()){
                return responseJson(0, $validator->errors()->first(), $validator->errors());
            }
             $user = Client::where('email',$request->email)->first();
            if($user){
                $code = rand(1111,9999);
                $update = $user->update(['code' => $code]);
                if($update)
                {            
                   //send sms
                    Mail::to($user->email)
                        ->bcc("Tests@test.com")
                        ->send(new ResetPassword($code));
                return responseJson(1,'برجاء فحص الايميل',['code_for_test' => $code]);
                }else{
                return responseJson(0,'حاول مره اخر , حدث خطاء');
                }
            }else{
                return responseJson(0,'لا يوجد اي حساب بهذا الاسم');
            }
        } 

    
        public function newpassword(Request $request){
            $validator=  validator()->make($request->all(),[
                'code' => 'required|min:4',
                'phone'    => 'required',
                'password' => 'required|confirmed',
            ]);
            if($validator->fails()){
                return responseJson(0, $validator->errors()->first(), $validator->errors());
            }
             $client = Client::where('code',$request->code)->where('phone',$request->phone)->first();
                if($client)
                {
                   $client->update(['code' => null, 'password' => bcrypt($request->password)]);
                    return responseJson(1,'تم تغير كلمه المرور');
                }
                else{
                    return responseJson(0,'هذا الكود غير صالح');
                }
        }
      public function registertoken(Request $request){
        
        $validator= validator()->make($request->all(),
        [
            'token'=>'required',
            'type'=>'required|in:ios,android'
        ]);
        if($validator->fails())
        {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }
       Token::where('token',$request->token)->delete();
       $request->user()->tokens()->create($request->all());
       return responseJson(1,'تم الاضافه بنجاح' );
       }

       public function removetoken(Request $request)
     {
        $validator= validator()->make($request->all(),
                    
       [
             'token'=>'required',   
          ]);   
        if($validator->fails())
        {
          return responseJson(0,$validator->errors()->first(),$validator->errors());
        }
         Token::where('token',$request->token)->delete();
        return responseJson(0,'تم الحذف بنجاح' );
       }
       

}
