<?php

//require_once 'setUp.php';
//require_once 'testTemplate.php';

class MyAPI extends PHPUnit_Framework_TestCase
{
    public $akamaiFailures = array();
    public $akamaiPass = array();
    public $instartLogicPass = array();
    public $instartLogicFailures = array();
    public function setUp()
    {
/*        $this->setBrowser('firefox');
        $this->setBrowserUrl("http://www.stylintrucks.com");
        $this->setSeleniumServerRequestsTimeout(30);

        $setUp = new ScriptSetUp($this);
        $setUp->setUp();

        $this->template = new Template();
        $projectName = 'testApiValidation';
        $projectTitle = 'API Validation exercise';
        $this->template->templateTesting($projectName, $projectTitle);
*/    }

    public function testHomeToCart()
    {
        //$this->browserOpen();
        $this->validateCatalogService();
        //$this->statusOverall();
        //$this->resultTemplate();

        //$data = "<br>Number of Passed scenarios: {$this->passValue}<br>Number of Failed scenarios: {$this->failValue}<br><br>";
        //$this->template->writeResult($data);
    }

    public function validateCatalogService()
    {

        $urlMain = "http://www.carparts.com/";
        //&format=printr
        $urlArr = array(

            array(
                "url" => $urlMain,
                "pageType" => "Home"
            ),
            array(
                "url" => $urlMain . "results/?Ntt=mirror&searchType=global&N=0&uts=true&shopId=1&searchType=global&N=0",
                "pageType" => "Search Engine Result Page"
            ),
            array(
                "url" => $urlMain . "vehicle/2016/Acura/ILX/Base/4_Cyl_2-dot-4L.html",
                "pageType" => "Vehicle Landing Page"
            ),
            array(
                "url" => $urlMain . "makes",
                "pageType" => "SEO - Makes"
            ),
            array(
                "url" => $urlMain . "parts",
                "pageType" => "SEO - Parts"
            ),
            array(
                "url" => $urlMain . "brands",
                "pageType" => "SEO - Brands"
            ),
            array(
                "url" => $urlMain . "?ref=partfinder",
                "pageType" => "Query String Parameter"
            )
            );

        foreach($urlArr as $url){
            //$content = $this->loadCurl($url);
            $content = $this->loadCurlHeader($url["url"], "instartlogic");
            //$content = json_decode($content, true);
            $content[0] = "http_status: " . $content[0];
            $temp = explode("\n", $content[0]);
            $tmpArr = array();

            foreach($temp as $value){
              //  echo "\n"; print_r($value); echo "\n";
                $valueArr = explode(": ", $value);
                $instartCompare = strpos(strtolower($valueArr[0]), "instart");
                if ($instartCompare == true) {
                    $tmpArr = $tmpArr + array($valueArr[0] => $valueArr[1]);
                }
            }
/*
            echo "\n";
            echo "Page/Component: " . $url["pageType"] . "\n";
            echo "URL: " . $url["url"] . " \n";
            echo "Array value: \n";
            print_r($tmpArr); echo "\n";
*/
            $this->validateInstartLogic($tmpArr, $url);
        }

        echo "\n\n";
        echo "Failed URLs:\n";

        print_r($this->instartLogicFailures);

        echo "\n\n";
        echo "Pass URLs:\n";

        print_r($this->instartLogicPass);

        /*echo "\n";

        $this->validateIsArray($content);

        $callstatusString = "\$content[\"_callstatus\"]";
        $payloadString = "\$content[\"_payload\"]";
        $statusArrString = "[\"status\"]";

        $callstatus = $content["_callstatus"];
        $payload = $content["_payload"];
        $statusArr = ["status"];

        $this->validateIsset($callstatusString, "\$content[\"_callstatus\"]");

        $this->validateIsset($payloadString, "\$content[\"_payload\"]");

        $this->validateIsset($callstatusString . $statusArrString, "\$content[\"_payload\"][\"status\"]");

        $statusValue = $content["_callstatus"]["status"];
        $statusLabel = "\$content[\"_callstatus\"][\"status\"]";
        //$this->compareExpectedVsActual($statusValue, "ok", $statusLabel);
        $this->validateIsset($statusValue, $statusLabel);
        $this->checkPresentValue($statusValue, $statusLabel);

        //total number of matching aggregate records
        $recordCountValue = $content["_payload"]["result"]["getProductFamilyDetails"]["value"]["Products"]["value"]["metainfo"]["Total Number of Matching Aggregate Records"];
        $recordCountLabel = "\$content[\"_payload\"] ... [\"Total Number of Matching Aggregate Records\"]";
        $this->validateIsset($recordCountValue, $recordCountLabel);
        $this->checkPresentValue($recordCountValue, $recordCountLabel);

        $arrayKey = array("brand", "name", "partName", "display_number");

        $key = "";
        foreach ($arrayKey as $key) {
            //total number of matching aggregate records
            $recordCountValue = $content["_payload"]["result"]["getProductFamilyDetails"]["value"]["$key"];
            $recordCountLabel = "\$content[\"_payload\"] ... [\"{$key}\"]";
            $this->validateIsset($recordCountValue, $recordCountLabel);
            $this->checkPresentValue($recordCountValue, $recordCountLabel);
        }*/

        echo "\n\n";
    }

    public function validateAkamaiHeader($tmpArr, $url){

      if(
        array_key_exists("X-Cache", $tmpArr) and
        array_key_exists("X-Cache-Key", $tmpArr) and
        array_key_exists("X-True-Cache-Key", $tmpArr) and
        array_key_exists("X-Akamai-Session-Info", $tmpArr) and
        array_key_exists("X-Serial", $tmpArr)
      ){

        array_push($this->akamaiPass, array($url , "header" => $tmpArr));
      }else{
        array_push($this->akamaiFailures, array($url , "header" => $tmpArr));
      }
    }

    public function validateInstartLogic($tmpArr, $url){
      if(
        array_key_exists("x-instart-cache-id", $tmpArr) or
        array_key_exists("X-Instart-Request-ID", $tmpArr) or
        array_key_exists("X-Instart-Streaming", $tmpArr)
      ){

        array_push($this->instartLogicPass, array($url , "header" => $tmpArr));
      }else{
        array_push($this->instartLogicFailures, array($url , "header" => $tmpArr));
      }
    }

    public function validateIsArray($content)
    {
        $contentArrayTest = is_array($content);
        if ($contentArrayTest == true) {
            $status = "PASSED";
            $addValue = "is an array";
            ++$this->passValue;
        } else {
            $status = "FAILED";
            $addValue = "not an array";
            ++$this->failValue;
        }
        echo "- Validate if value \$content is an array\n";
        echo "  \$content {$addValue}   Status: {$status}\n\n";

        $scenario = "Validate if value \$content is an array";
        $expected = "\$content should be an array";
        $actual = "\$content {$addValue}";

        $this->template->plotTemplate($scenario, $expected, $actual, $status);
    }

    public function validateIsset($arr, $scene)
    {
        $actual = isset($arr);
        if ($actual == true) {
            $status = "PASSED";
            $addValue = "present";
            ++$this->passValue;
        } else {
            $status = "FAILED";
            $addValue = "not present";
            ++$this->failValue;

            return;
        }

        echo "- Check if {$scene} is present\n";
        echo "  {$scene} {$addValue}   Status: {$status}\n\n";

        $scenario = "Check if {$scene} is present";
        $expected = "{$scene} should be present";
        $actual = "{$scene} is {$addValue}";

        $this->template->plotTemplate($scenario, $expected, $actual, $status);
    }

    public function compareExpectedVsActual($arr, $expected, $scene)
    {
        $actual = $arr;
        if ($actual == $expected) {
            $status = "PASSED";
            $addValue = "equal";
            ++$this->passValue;
        } else {
            $status = "FAILED";
            $addValue = "not equal";
            ++$this->failValue;

            return;
        }

        echo "- Check if expected value '{$expected}' from {$scene} is equal to actual value\n";
        echo "  Expected value is '{$addValue}' to actual value. Actual value is '{$actual}'   Status: {$status}\n\n";

        $scenario = "Check if expected value from {$scene} is equal to actual value";
        $expected = "Value should be {$expected}";
        $actual = "Value is {$actual}";

        $this->template->plotTemplate($scenario, $expected, $actual, $status);
    }

    public function checkPresentValue($arr, $scene)
    {
        $actual = $arr;
        if ($actual != "") {
            $status = "PASSED";
            $addValue = "present";
            ++$this->passValue;
        } else {
            $status = "FAILED";
            $addValue = "not present";
            ++$this->failValue;

            return;
        }

        echo "- Check if value from {$scene} is not blank or null\n";
        echo "  Expected value is '{$addValue}' to actual value. Actual value is '{$actual}'   Status: {$status}\n\n";

        $scenario = "Check if value from {$scene} is not blank or null";
        $expected = "Value should be present and not blank or null";
        $actual = "Value is {$actual}";

        $this->template->plotTemplate($scenario, $expected, $actual, $status);
    }

    public function loadCurl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PROXY, "10.10.70.150:8080");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1 usap_selenium');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLVERSION, 6);

        $content = curl_exec($ch);

        curl_close($ch);

        return $content;
    }

    public function browserOpen()
    {
        $this->passValue = 0;
        $this->failValue = 0;

        //open browser as set on setBrowserUrl
        try {
            $url = "";
            $this->url($url);
        } catch (Exception $e) {
            echo "- URL load failure!\n";
            $date = date('m-d-Y_hia');
            $screenshotDir = __DIR__ . "/screenshots/url_{$date}.png";
            $this->getScreenShot($screenshotDir);
        }

        $currentUrl = $this->url();
        /*echo "\n";
        echo "Automated test exercise 9\n\n";
        echo "Coverage:\n";
        echo "- API validation\n";
        echo "  - Hydra service domain\n";
        echo "  - Service(s)\n";
        echo "  - Method(s)\n\n";
        echo "Steps:\n";
        echo "- open '{$currentUrl}'\n";*/
        //$this->timeouts()->implicitWait(25000);
    }

    public function browserOpenNew()
    {
        $this->passValue = 0;
        $this->failValue = 0;

        //open browser as set on setBrowserUrl
        try {
            $url = "";
            $this->url($url);
        } catch (Exception $e) {
            echo "- URL load failure!\n";
            $date = date('m-d-Y_hia');
            $screenshotDir = __DIR__ . "/screenshots/url_{$date}.png";
            $this->getScreenShot($screenshotDir);
        }

        $currentUrl = $this->url();
        /*echo "\n";
        echo "Automated test exercise 9\n\n";
        echo "Coverage:\n";
        echo "- API validation\n";
        echo "  - Hydra service domain\n";
        echo "  - Service(s)\n";
        echo "  - Method(s)\n\n";
        echo "Steps:\n";
        echo "- open '{$currentUrl}'\n";
        $this->timeouts()->implicitWait(25000);*/
    }

    public function loadCurlHeader($url, $cdn = "akamai") {
        $ch = curl_init();

        $header = array(
          "Pragma: akamai-x-cache-on, akamai-x-cache-remote-on, akamai-x-check-cacheable, akamai-x-get-cache-key, akamai-x-get-extracted-values, akamai-x-get-nonces, akamai-x-get-ssl-client-session-id, akamai-x-get-true-cache-key, akamai-x-serial-no",
        );

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if($cdn == "akamai"){
          curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        //curl_setopt($ch, CURLOPT_PROXY, "10.10.70.150:8080");

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1 usap_selenium');
        curl_setopt($ch, CURLOPT_HEADER, true);
        //curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLVERSION, 6);

        $content = curl_exec($ch);
        curl_close($ch);

        //echo "raw: \n"; print_r($content); echo "\n";
        $arrRequests = explode("\r\n\r\n", $content);

        $headers = array();
        $headers = $arrRequests;

        //unset($content);
        //$headers = array();

        /*for ($index = 0; $index < count($arrRequests) - 1; $index++) {
            foreach (explode("\r\n", $arrRequests[$index]) as $i => $line) {
                if ($i === 0)
                    $headers[$index]['http_code'] = $line;
                else {
                    $TempArr = explode(': ', $line);
                    if (isset($TempArr[1])) {
                        list ($key, $value) = $TempArr;
                        $headers[$index][$key] = $value;
                    }
                }
            }
        }*/
        return $headers;
    }

    public function statusOverall()
    {
        echo "\n\n";
        echo "Status Count:\n";
        echo "Passed: {$this->passValue}\n";
        echo "Failed: {$this->failValue}\n\n";

        if ($this->failValue > 0) {
            echo "Overall Status: F A I L E D";
        } else {
            echo "Overall Status: P A S S E D";
        }
    }


}
