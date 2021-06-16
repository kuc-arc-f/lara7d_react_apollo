<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestFileMail extends Mailable
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
//    return $this->view('view.name'); /tmp/extra/file1.txt , send_file.blade
    return $this->subject($this->params['title'])->view('test_mail.send_file')
    ->attach('/tmp/extra/test525a.zip');      
  }

}
