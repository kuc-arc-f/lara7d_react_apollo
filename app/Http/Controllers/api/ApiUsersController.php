<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\LibPagenate;
use Illuminate\Support\Facades\Hash;
use App\User;
//
class ApiUsersController extends Controller
{
  /**************************************
   *
   **************************************/
  public function __construct(){
      $this->TBL_LIMIT = 500;
  }
  /**************************************
   *
   **************************************/  
  public function valid_login( $email, $password ,$request){
    $ret = false;
    $hashedPassword = '';
    $user = User::orderBy('id', 'desc')
    ->where('email', $email)->get()->toArray();
//var_dump(count($user));
    if(count($user) > 0){
      $userOne = $user[0];
      $hashedPassword = $userOne["password"];
      if (Hash::check($password , $hashedPassword)) {
        $userOne["password"] = "";
        $sessionKeyUser = env('SESSION_KEY_USER', '' );
        $request->session()->put($sessionKeyUser, $userOne);
        $ret = true;
      }        
    }
    return $ret;
  }
  /**************************************
   *
   **************************************/  
  public function login(Request $request){
    $retArr = array('ret' => 0, 'message'=>"" );

    $valid = $this->valid_login(
      request('email'), request('password') , $request
    );
    if($valid){
      $request->session()->flash('flash_message_success', 'Sucsess, Login OK');
      $retArr = array('ret' => 1, 'message'=>"" );
    }
    return response()->json($retArr);
  }  
  /**************************************
   *
   **************************************/  
  public function valid_add( $email ){
    $ret = true;
    $user = User::orderBy('id', 'desc')
    ->where('email', $email)->get()->toArray();
//var_dump(count($user));
    if(count($user) > 0){
      $ret = false;
    }
    return $ret;
  }
  /**************************************
   *
   **************************************/  
  public function add(Request $request){
    $retArr = array('ret' => 1, 'message'=>"" );
    $valid = $this->valid_add( request('email') );
    if($valid == false){
      $retArr = array('ret' => 0, 'message'=>"Error, validate", 'user'=>[] );
    }else{
      $password = request('password');
      $hashedPassword = Hash::make($password);
      $user = new User();
      $user->name   = request('name');
      $user->password   = $hashedPassword;
      $user->email   = request('email');    
      $user->save();
      $request->session()->flash('flash_message_success', 'Sucsess, save item');
    }
    return response()->json($retArr);
  }
  /**************************************
   *
   **************************************/  
  public function valid_reset( $email ){
    $ret = true;
    $user = User::orderBy('id', 'desc')
    ->where('email', $email)->get()->toArray();
    if(count($user) < 1){
      $ret = false;
    }
    return $ret;
  }
  /**************************************
   *
   **************************************/ 
  public function get_user_id( $email ){
    $ret = [];
    $user = User::orderBy('id', 'desc')
    ->where('email', $email)->get()->toArray();
    $user = $user[0]; 
    $ret = $user["id"];   
    return $ret;
  }    
  /**************************************
   *
   **************************************/  
  public function reset_pass(Request $request){
    $retArr = array('ret' => 1, 'message'=>"" );
    $valid = $this->valid_reset( request('email') );
    if($valid == false){
      $retArr = array('ret' => 0, 'message'=>"Error, mail nothing", 'user'=>[] );
    }else{
      $uid = $this->get_user_id( request('email') );
      $user = User::find($uid);
      $password = request('password');
      $hashedPassword = Hash::make($password);
      $user->password   = $hashedPassword;
      $user->save();
      $retArr = array('ret' => 1, 'message'=>"" , 'user'=>$user );
      $request->session()->flash('flash_message_success', 'Sucsess, save item');
    }    
    return response()->json($retArr);
  }  
  /**************************************
   *
   **************************************/
  public function delete(Request $request){
  }
  /**************************************
   *
   **************************************/
  public function test()
  {   
    $user = User::orderBy('id', 'desc')
    ->where('email', 'a4@example.com')->get()->toArray();
    if(count($user) > 0){
      $userOne = $user[0];
      $hashedPassword = $userOne["password"];
var_dump($userOne["id"]);
    }
//var_dump($hashedPassword);
    if (Hash::check('password', $hashedPassword)) {
      var_dump("パスワード一致");
    }else{
      var_dump("NG-パスワード");
    }    
exit();
  }
}
