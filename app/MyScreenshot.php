<?php


namespace App;
/**
 * This script is using Laravel Dusk to take screenshots of a URL, but not in the context of a regular Dusk test.
 * My Laravel application is taking screenshots of *other* sites, but you could adapt this to a Dusk test taking screenshots of your Laravel site.
 * 1. Install Dusk https://laravel.com/docs/5.8/dusk#installation
 * 2. Make sure it works with regular Dusk tests first.
 * 3. Use the code below for a stand-alone Chrome webdriver instance to do automation things.
 */


use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverDimension;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome\ChromeProcess;

class MyScreenshot
{

  /**
   * Screenshot a URL
   * @param string $url The URL to screenshot
   * @return string|boolean Screenshot path or false
   */
  public function screenshot($url)
  {

    //Make a chrome browser
    $process = (new ChromeProcess)->toProcess();
    $process->start();

    $options = (new ChromeOptions)->addArguments([
      '--disable-gpu',
      '--headless',
      '--disable-dev-shm-usage',
      '--no-sandbox',
      '--window-size=1920,1080',
    ]);

    $capabilities = DesiredCapabilities::chrome()->setCapability(ChromeOptions::CAPABILITY, $options);
    $driver = retry(5, function () use ($capabilities) {
      return RemoteWebDriver::create('http://selenium:4444', $capabilities);
    }, 50);
    $browser = new Browser($driver);

    //Start by setting your full desired width and an arbitrary height
    $size = new WebDriverDimension(1920, 1080);
    $browser->driver->manage()->window()->setSize($size);

    try {
      $browser->visit($url);

      //Resize to full height for a complete screenshot
      $body = $browser->driver->findElement(WebDriverBy::tagName('body'));
      if (!empty($body)) {
        $currentSize = $body->getSize();

        //optional: scroll to bottom and back up, to trigger image lazy loading
        $browser->driver->executeScript('window.scrollTo(0, ' . $currentSize->getHeight() . ');');
        $browser->pause(1000); //wait a sec
        $browser->driver->executeScript('window.scrollTo(0, 0);'); //scroll back to top of the page

        //set window to full height
        $size = new WebDriverDimension(1920, $currentSize->getHeight()); //make browser full height for complete screenshot
        $browser->driver->manage()->window()->setSize($size);
      }

      $browser->pause(3000); //wait for 3s to give everything time to finish loading - probably better to actually check
      $image = $browser->driver->TakeScreenshot(); //$image is now the image data in PNG format
      $browser->driver->quit();

      //save the image somewhere useful
      $filename = date('Y-m-d-H-i-s') . '.png';
      file_put_contents(storage_path('app/public/evus_relatorio/') . $filename, $image);

      return file_exists(storage_path('app/public/evus_relatorio/') . $filename) ? storage_path('app/public/evus_relatorio/') . $filename : false;

    } catch (\Exception $e) {
      $browser->driver->quit();
    }
  }
}
