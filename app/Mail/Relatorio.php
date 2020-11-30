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

  /**
   * Relatorio constructor.
   */
  public function __construct($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {

    $dates = [
      'starts' => now()->startOfWeek()->format('d/m/Y'),
      'ends'   => now()->endOfWeek()->subDay(1)->format('d/m/Y')
    ];


    return $this
      ->from('metatv@evolusom.com.br', 'Meta TV')
      ->subject(sprintf('Ranking Evus - Resultado Semanal (%s - %s)- Errata', $dates['starts'], $dates['ends']))
      ->view('emails.relatorio')
      ->with(['imageUrl' => $this->imageUrl]);
  }
}
