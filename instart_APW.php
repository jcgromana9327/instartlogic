<?php

//require_once 'setUp.php';
//require_once 'testTemplate.php';

//class MyAPI extends PHPUnit_Framework_TestCase{
use PHPUnit\Framework\TestCase;

class MyApiTest extends TestCase {
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

        $urlMain = "https://origin-preprod-autopartswarehouse.usautoparts.com/";
        //&format=printr
        $urlArr = array(

/**********************************************No Store******************************************************/
            array(
                "url" => $urlMain . "managevehicle/index/?status=removevehicle&id=109-27-4478-1945-345",
                "pageType" => "/managevehicle/*",

            ),
            array(
                "url" => $urlMain . "ajax/get-cart-items/?",
                "pageType" => "/ajax/*"
            ),
            array(
                "url" => $urlMain . "request/get-multiprodinv",
                "pageType" => "/request/*"
            ),
            array(
                "url" => $urlMain . "myaccount/login",
                "pageType" => "/myaccount"
            ),
            array(
                "url" => $urlMain . "basket?ai=true",
                "pageType" => "/basket"
            ),
            array(
                "url" => $urlMain . "checkout/",
                "pageType" => "/checkout"
            ),
            array(
                "url" => $urlMain . "feedback/?w=1280&h=1024&u=aHR0cDovL3d3dy5hdXRvcGFydHN3YXJlaG91c2UuY29tLw==",
                "pageType" => "/feedback/*"
            ),
            array(
                "url" => $urlMain . "matchbeat.php",
                "pageType" => "/matchbeat.php"
            ),
            array(
                "url" => $urlMain . "contact_the_warehouse.html",
                "pageType" => "/contact_the_warehouse.html"
            ),
            array(
                "url" => $urlMain . "basket/?add_item_id=136801985",
                "pageType" => "/additemtirerack"
            ),
            array(
                "url" => $urlMain . "r/regf2",
                "pageType" => "/r/regf2"
            ),
            array(
                "url" => $urlMain . "requestb/?asdfasdf",
                "pageType" => "/requestb/*"
            ),
/******************************************************Cached**************************************************************/
            array(
                "url" => $urlMain . "compare/?R=k-and-nk33332129-+k-and-nk33332181-&B=TnR0PWFpciBmaWx0ZXImc2VhcmNoVHlwZT1nbG9iYWwmc2hvcElkPTEmTj0wJmFkZGZpdG1lbnQ9MQ%3D%3D&I=",
                "pageType" => "/compare"
            ),
            array(
                "url" => $urlMain . "search/?Ntt=air+filter&searchType=global&shopId=1&N=0&addfitment=1",
                "pageType" => "/search/*"
            ),
            array(
                "url" => $urlMain . "privatelabel/?brandedSku=2401993&privateLabelSku=3995846&event=41&show=true",
                "pageType" => "/privatelabel/*"
            ),
            array(
                "url" => $urlMain . "category/auto_body_parts_-and-_mirrors.html",
                "pageType" => "/category/*"
            ),
            array(
                "url" => $urlMain . "tires.html?_event=1&make=Acura",
                "pageType" => "/tires.html"
            ),
            array(
                "url" => $urlMain . "wheels.html?_event=1&make=Acura",
                "pageType" => "/wheels.html"
            ),
            array(
                "url" => $urlMain . "part/Replacement/Air_Spring/REPL288011",
                "pageType" => "/part"
            ),
            array(
                "url" => $urlMain . "part_types?part_type=Mirror&brand=Kool%20Vue",
                "pageType" => "/part_types"
            ),
            array(
                "url" => $urlMain . "partfinder/yr/0",
                "pageType" => "/partfinder/*"
            ),
            array(
                "url" => $urlMain . "ajaxc/get-kits-and-bundles?pageSection=search&part=Mirror&limit=4",
                "pageType" => "/ajaxc/*"
            ),
            array(
                "url" => $urlMain . "requestc/header-nav-sub-category/?tlc=Brakes%2C%20Suspension%20%26%20Steering",
                "pageType" => "/requestc/*"
            ),
            array(
                "url" => $urlMain . "ajaxc/get-bundle-products-lb?offset=0&link%5Blink%5D=N%3D0%26Nr%3DAND(part%3AMirror)%26Ntk%3DMain&link%5Byear%5D=2016&link%5Bmake%5D=Acura&link%5Bmodel%5D=ILX&link%5Bsubmodel%5D=Base&link%5Bengine%5D=4+Cyl+2.4L&link%5Bpartname%5D=Mirror&link%5BisNonWorldPac%5D=false&section=sku",
                "pageType" => "/ajaxc/get-bundle-products-lb"
            ),
            array(
                "url" => $urlMain . "ajaxc/get-bundle-recommended-products/?price=128.27&sku=SET-FD110ER&cache=2",
                "pageType" => "/ajaxc/get-bundle-recommended-products/"
            ),
            array(
                "url" => $urlMain . "ajaxc/get-private-label-widget/?&productId%5B%5D=3560407",
                "pageType" => "/ajaxc/get-private-label-widget/"
            ),
            array(
                "url" => $urlMain . "ajaxc/get-kits-and-bundles?pageSection=sku&part=Mirror&limit=4&productId%5B%5D=3560407&kitLimit=4",
                "pageType" => "/ajaxc/get-kits-and-bundles/"
            ),
            array(
                "url" => $urlMain . "popup/?type=more&image=aHR0cDovL2ltYWdlcy5hcHdjb250ZW50LmNvbS9pcy9pbWFnZS9BdXRvcy9mZDExMGVyX2lzPw==&title=S29vbCBWdWUgTWlycm9y&text=S09PTCBWVUUgUE9XRVJFRCBNSVJST1IsIEhFQVRFRCwgTk9OLUZPTERJTkdLb29sIFZ1ZSBQb3dlciBNaXJyb3JzIGFyZSBPRSByZXBsYWNlbWVudCBhbmQgbWFudWZhY3R1cmVkIGZyb20gdGhlIGhpZ2hlc3QgcXVhbGl0eSwgY29ycm9zaW9uLXJlc2lzdGFudCBtYXRlcmlhbHMgdG8gd2l0aHN0YW5kIGFsbCB0eXBlcyBvZiB3ZWF0aGVyLiBLb29sIFZ1ZSBzcGVjaWFsaXplcyBpbiBwcm9kdWNpbmcgbWlycm9ycyBmb3IgYWxsIHZlaGljbGUgbWFrZXMgYW5kIG1vZGVsczsgT3VyIG1pcnJvcnMgZ28gdGhyb3VnaCByaWdvcm91cyB3ZWF0aGVyLCBzd2luZywgYW5kIHZpYnJhdGlvbiB0ZXN0aW5nIHRvIG1ha2Ugc3VyZSB5b3UgcmVjZWl2ZSB0aGUgaGlnaGVzdCBxdWFsaXR5IG1pcnJvcnMuIE91ciBtaXJyb3JzIGFyZSBiYWNrZWQgYnkgYSAxLXllYXIgS29vbCBWdWUgbGltaXRlZCB3YXJyYW50eSAtIHlvdSBjYW4ndCBnbyB3cm9uZyB3aXRoIEtvb2wgVnVlIE1pcnJvcnMhV2F2ZSBsaW5lcyBvbiBNaXJyb3IgR2xhc3NlcyBzaG91bGQgbm90IGJlIHVzZWQgdG8gaWRlbnRpZnkgSGVhdGVkIE1pcnJvcnMgYXMgbW9yZSBhbmQgbW9yZSBuZXdlciBhcHBsaWNhdGlvbnMgbm8gbG9uZ2VyIHB1dCB3YXZlIGxpbmVzIG9uIGhlYXRlZCBtaXJyb3JzLg==&nareferer=http%3A//cart.autopartswarehouse.com/basket%3Fai%3Dtrue",
                "pageType" => "/popup"
            ),
/*****************************Excluded caching with string query param*************************************************************/
            array(
                "url" => $urlMain . "shop_years/cadillac-srx-a-c-compressor-2011.html",
                "pageType" => "/shop_years"
            ),
            array(
                "url" => $urlMain . "models/acura~integra~makemodel.html",
                "pageType" => "/models"
            ),
            array(
                "url" => $urlMain . "shop_brands/",
                "pageType" => "/shop_brands"
            ),
            array(
                "url" => $urlMain . "shop_parts/radiator/ford/aerostar.html",
                "pageType" => "/shop_parts"
            ),
            array(
                "url" => $urlMain . "sku/Replacement/Bumper_Cover/RBF010306PQ.html",
                "pageType" => "/sku"
            ),
            array(
                "url" => $urlMain . "prodmap/",
                "pageType" => "/prodmap"
            ),
            array(
                "url" => $urlMain . "vehicle/2007/honda/cr-v/lx/4_cyl_2-dot-4l.html",
                "pageType" => "/vehicle"
            ),
            array(
                "url" => $urlMain . "privacy/",
                "pageType" => "/privacy"
            ),
            array(
                "url" => $urlMain . "help.html",
                "pageType" => "/help.html"
            ),
            array(
                "url" => $urlMain,
                "pageType" => "/homepage"
            ),
            array(
                "url" => $urlMain. "basket/savequote/",
                "pageType" => "/saveqoute"
            ),
            array(
                "url" => $urlMain. "checkout/qas/",
                "pageType" => "/qas"
            )
            );

        foreach($urlArr as $url){
            //$content = $this->loadCurl($url);
            $content = $this->loadCurlHeader($url["url"], "-");
            //$content = json_decode($content, true);
            $content[0] = "http_status: " . $content[0];
            // print_r($content[0]);
            $temp = explode("\n", $content[0]);
            $tmpArr = array();

            // echo "<pre>";
            // print_r($temp);
            // exit();

            foreach($temp as $value){
              //  echo "\n"; print_r($value); echo "\n";
                $valueArr = explode(": ", $value);
                $instartCompare = strpos(($valueArr[0]), "-");
               // var_dump($valueArr[0]);
                if ($instartCompare == true) {
                    $tmpArr = $tmpArr + array($valueArr[0] => $valueArr[1]);

                }
                // print_r($tmpArr);
            }
            // print_r($tmpArr);
/*

            echo "\n";
            echo "Page/Component: " . $url["pageType"] . "\n";
            echo "URL: " . $url["url"] . " \n";
            echo "Array value: \n";
            print_r($tmpArr); echo "\n";
*/
            $this->validateInstartLogic($tmpArr, $url);
        }

        // echo "\n\n";
        // echo "Not Cached URLs:\n";

        // print_r($this->instartLogicFailures);

        // echo "\n\n";
        // echo "Cached URLs:\n";

        // print_r($this->instartLogicPass);

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
      // array_key_exists("X-Instart-Request-ID", $tmpArr) or
      // array_key_exists("X-Instart-Streaming", $tmpArr) and
      $urlValue = $url["url"];
      $pagetypeValue = $url["pageType"];



      if(array_key_exists("Content-Encoding", $tmpArr) or
         array_key_exists("Content-Type", $tmpArr)){
        $contentEncoding = $tmpArr["Content-Encoding"];
        $contentType = $tmpArr["Content-Type"];

        //array_push($this->instartLogicPass, array($url , "header" => $tmpArr));
      }
      else{
        $contentEncoding = "none";
        $contentType = "none";
        //array_push($this->instartLogicFailures, array($url , "header" => $tmpArr));
      }
      //array_push($this->checkinstartLogicFailures, array($url , "header" => $tmpArr));

      echo "URL: "; print_r($urlValue); echo "\n";
      echo "Page Type: "; print_r($pagetypeValue); echo "\n";
      echo "Content-Encoding: "; print_r($contentEncoding); echo "\n";
      echo "Content-Type: "; print_r($contentType); echo "\n";
      echo "\n"; echo "\n";
    }

    public function checkInstartValue($arr, $scene)
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
        curl_setopt($ch, CURLOPT_ENCODING, "");
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
