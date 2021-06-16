<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use setasign\Fpdi\Tfpdf\Fpdi;
use setasign\Fpdi;
//
class TestPdfController extends Controller
{
  /**************************************
   *
   **************************************/
  public function test(){
    if($this->auth_check('normal_user')== NULL){ return redirect('/login'); }
// var_dump("#test");
    $pdf = new Fpdi\TcpdfFpdi();
    $pdf->SetMargins(0, 0, 0);
    // ヘッダー・フッターの出力を無効化
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // ページを追加
    $pdf->AddPage(); 
    $pdf->setSourceFile(public_path() . '/data/temp.pdf');
    // 読み込んだPDFの1ページ目のインデックスを取得
    $tplIdx = $pdf->importPage(1);
    // 読み込んだPDFの1ページ目をテンプレートとして使用
    $pdf->useTemplate($tplIdx, null, null, null, null, true);
    // 書き込む文字列のフォントを指定
    $pdf->SetFont('', '', 20);
    // 書き込む位置
//    $pdf->SetXY(13, 30);
    $pdf->SetXY(13, 60);
    // 文字列を書き込む
    $pdf->Write(0, 'add string test!! - 524a3');
    // PDFを出力
    $pdf->Output('sample.pdf', 'I');
    exit();
//    return view('test_pdf/test')->with('items', [] );
  }

}
