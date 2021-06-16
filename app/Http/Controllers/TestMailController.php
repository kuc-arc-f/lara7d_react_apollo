<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestSendMail;
use App\Mail\TestFileMail;
//
class TestMailController extends Controller
{
  /**************************************
   *
   **************************************/
  public function test(){
    if($this->auth_check('normal_user')== NULL){ return redirect('/login'); }
    return view('test_mail/test')->with('items', [] );
  }
  /**************************************
   *
   **************************************/
  public function send(Request $request){
    $ret = [];
    $title = request('title');
    $mail_to = request('mail_to');
    $params = [
      'title' => $title,
      'price' => 'price-111',
    ];
    Mail::to( $mail_to )->send(new TestSendMail($params));
    return response()->json([
      'title' => $title, 'mail_to' => $mail_to 
    ]);
  }

}
