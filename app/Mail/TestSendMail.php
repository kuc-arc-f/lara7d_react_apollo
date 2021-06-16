<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//
class TestSendMail extends Mailable
{
  use Queueable, SerializesModels;

  public $params = [];
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($params)
  {
    $this->params = $params;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
//    return $this->view('view.name');
// return $this->subject($this->params->title)
//    return $this->subject('Test Mail-2')->view('test_mail.send_text');
// $this->params->title $this->params['title'] 'Test Mail-4' price
    return $this->subject($this->params['title'])->view('test_mail.send_text')
    ->with([
      'title' => $this->params['title'],
      'price' => $this->params['price'],
    ]);    
  }

}
