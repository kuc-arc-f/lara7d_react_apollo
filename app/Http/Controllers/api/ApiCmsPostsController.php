<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CmsPost;
//
class ApiCmsPostsController extends Controller
{
  /**************************************
   *
   **************************************/
  public function __construct(){
  }
  /**************************************
   *
   **************************************/
  public function index(Request $request)
  {   
var_dump("#index");
exit();
/*
    $page = 1;
    $pageNo = $request->input("page"); 
    if(isset($pageNo)){
      $page = $pageNo;
    }    
*/
//var_dump($pageInfo);
    $items = CmsPost::orderBy('id', 'desc')
    ->get();
    return response()->json($items);
  } 
  /**************************************
   *
   **************************************/
  public function list(Request $request)
  {   
//var_dump("#list");
//exit();
//var_dump($pageInfo);
    $items = CmsPost::orderBy('id', 'desc')
    ->get();
    return response()->json($items);
  } 
  /**************************************
   *
   **************************************/  
  public function create(Request $request){
    $task = new CmsPost();
    $task->title   = request('title');
    $task->content = request('content');
    $task->save();
    $ret = ['title' => request('title'),'content' => request('content')];
    $request->session()->flash('flash_message_success', 'Sucsess, save item');
    return response()->json($ret);
  }  
  /**************************************
   *
   **************************************/
  public function show($id)
  {
    $ret = array();
//    $id = $request->input("id"); 
    if(isset($id)){
      $item = CmsPost::find($id);
//var_dump($task);
      $ret = $item;
    }
    return response()->json($ret);
  }  

}
