<?php

namespace App\Console\Commands;

use App\Mail\Relatorio;
use App\MyScreenshot;
use Illuminate\Console\Command;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Dusk;
use Illuminate\Support\Facades\Mail;

class RelatorioSemanal extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'relatorio-semanal';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $count = 0;
    do {
      $this->info("Tentaiva $count");
      try {

        $starts = now()->subWeek(1)->startOfWeek()->format('d/m/Y');
        $ends = now()->subWeek(1)->endOfWeek()->subDay(1)->format('d/m/Y');

//        $starts = now()->startOfWeek()->format('d/m/Y');
//        $ends = now()->endOfWeek()->subDay(1)->format('d/m/Y');


        $snap = new MyScreenshot();
        $url = $snap->screenshot(sprintf("http://metatv.evolusom.com.br/evus?starts=%s&ends=%s", $starts, $ends));

        if ($url) {
          Mail::to(['ti6@evolusom.com.br'])->send(new Relatorio($url, $starts, $ends));
//          Mail::to(['ti6@evolusom.com.br', 'rodrigo@evolusom.com.br', 'vendedores@evolusom.com.br'])->send(new Relatorio($url, $starts, $ends));
        }

        break;
      } catch (\Exception $exception) {

        $count++;
      }
    } while ($count < 10);
  }
}
