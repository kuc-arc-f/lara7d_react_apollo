<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CmsPostsController extends Controller
{
  /**************************************
   *
   **************************************/
  public function index()
  {
    if($this->auth_check('normal_user')== NULL){ return redirect('/login'); }
//exit();
/*
    $page = 1;
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }
    $tasks = Task::orderBy('id', 'desc')->paginate(10 );
*/
    $items = [];
    return view('cms_posts/index')->with([
      'items', $items , 'page' => 1,
    ]);
  }    
  /**************************************
   *
   **************************************/
  public function create()
  {
    if($this->auth_check('normal_user')== NULL){ return redirect('/login'); }
    return view('cms_posts/create')->with('task',  null);
  }
  /**************************************
   *
   **************************************/
	public function store(Request $request)
	{
		$data = $request->all();
    $ret = $this->upload_file($request, 22);
//var_dump($data );
    //return redirect()->route('/cms_posts');
    $arr = array( "title"=> $data["title"] );
    return response()->json($arr);
    exit();
  }
	/**************************************
	 *
  **************************************/
  public function upload_file(Request $request){
    $ret = true;
    $img_url = env('IMAGE_URL', '' );
    $datetime = (String)strtotime("now");
    $temporary_file = $request->file('attach_file')->store('cms_files_tmp');
    $origiinal_name = $request->file('attach_file')->getClientOriginalName();
//var_dump( "temporary_file=". $temporary_file );
    $filename = $datetime . "_" . $origiinal_name;
    $storage_path = storage_path('app/') . $temporary_file;
    Storage::copy($temporary_file , 'cms_files/' . $filename );
    Storage::delete($temporary_file );
    $arr = [
      'ret' => 1,
      'filename' => $filename,
      'file_path' => $img_url . "/" .$filename,
    ];
    return response()->json($arr);
  }
  /**************************************
   *
   **************************************/
  public function show($id)
  {
    return view('cms_posts/show')->with('task_id', $id );
  }      
  /**************************************
   *
   **************************************/
  public function test()
  {
    $url = env('BASE_URL', '' );
    $img_url = env('IMAGE_URL', '' );
    $d = strtotime("now");
//var_dump( $url . $img_url );
    return view('cms_posts/test')->with('task',  null);
  }
}
