#!/usr/bin/php
<?php
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use PHPUnit\Framework\TestCase;
set_include_path('/home/opendatalabs');
require_once('vendor/autoload.php');

class GitHubTest extends TestCase {

    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

	  public function setUp()
    {

      $capabilities = DesiredCapabilities::firefox();
      #$driver = RemoteWebDriver::create($host, $capabilities, 5000);
      #$capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
      $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

	  public function tearDown()
    {
        $this->webDriver->quit();
    }

    protected $url = 'https://github.com';

    public function testGitHubHome()
    {
        $this->webDriver->get($this->url);
        // checking that page title contains word 'GitHub'
        $this->assertContains('GitHub', $this->webDriver->getTitle());
    }

}
?>
