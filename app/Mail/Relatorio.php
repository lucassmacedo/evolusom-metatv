<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Relatorio extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public $imageUrl;
  private $starts;
  private $ends;

  /**
   * Relatorio constructor.
   */
  public function __construct($imageUrl, $starts, $ends)
  {
    $this->imageUrl = $imageUrl;
    $this->starts = $starts;
    $this->ends = $ends;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {

    return $this
      ->from('metatv@evolusom.com.br', 'Meta TV')
      ->subject(sprintf('Ranking Evus - Resultado Semanal (%s - %s)', $this->starts, $this->ends))
      ->view('emails.relatorio')
      ->with(['imageUrl' => $this->imageUrl]);
  }
}
