<?php

/**
 *  Restobaza Class
 *
 * @author Ivan Korablev-Dyson
 * @link restobaza.ru 
 *
 *
  */

class Restobaza {


  // connection parameters
  public $api_address = 'http://api.restobaza.ru';
  public $app_id = 0;
  public $co_id = 0;
  public $app_secret = '';
  
  public $time_zone = 'Europe/Moscow';
  

  // these will be filled for debugging purposes 
  public $signature_params = array();
  public $signature = '';
  //public $version = '1.0'; // '1.0' is for old api compatibility, should change to 1 
  public $standard_params = array();
  public $unique_params = array();
  public $all_params = array();
  public $query_url = '';


  // if set to true, errors will be generated for each API call to RestoBaza. This if mainly used for testing error messages to the user.
  public $test_errors = false;
  // this will be set to true if there are errors with file_get_contents or at RestoBaza

  // if set to true, this will make data empty. This will not make an actual call to RestoBaza! This feature is helpful for testing messages for empty data. 
  public $test_empty_data = false;
  // if this is set to true, then there are no errors and the data is not empty

  public $data = array();
  
  

  
  
  
  
  function __construct($config)
  {
    
    // check needed variables
    $needed_params = array('app_id', 'co_id', 'app_secret');
    $this->checkNeededParams($needed_params, $config);
    

    $this->app_id = $config['app_id'];
    $this->co_id = $config['co_id'];
    $this->app_secret = $config['app_secret'];
    
    
    // following are optional debug options:
    
    // if true, the class will always throw a test error
    $this->test_errors = false;
    if(isset($config['test_errors']))
    {
      $this->test_errors = $config['test_errors'];
    }
    
    // if true, the class will always return an empty result
    $this->test_empty_data = false;
    if(isset($config['test_empty_data']))
    {
      $this->test_empty_data = $config['test_empty_data'];
    }
    
    // if true, the file_get_contents result will be echoed
    $this->print_result = false;
    if(isset($config['print_result']))
    {
      $this->print_result = $config['print_result'];
    }
    
    // if true, the decoded json will be printed
    $this->print_decoded = false;
    if(isset($config['print_decoded']))
    {
      $this->print_decoded = $config['print_decoded'];
    }
    
    // if true, the calls will be made to api.restobaza_local.ru, not api.restobaza.ru
    $this->call_local_rb = false;
    if(isset($config['call_local_rb']))
    {
      $this->call_local_rb = $config['call_local_rb'];
    }
    
  }
  
  

  
  /**
 * generateSignatureParams
 *
 * fill signature parameters array
 *
 * 
 * @return array
 */


  private function generateSignatureParams() {
    
    $signature_params = array();
    $signature_params['app_id'] = $this->app_id; 
    $signature_params['co_id'] = $this->co_id; 
    $signature_params['random'] = rand(0,10000);
    $signature_params['timestamp'] = time();
    
    // sort signature parameters array
    ksort($signature_params);
    
    $this->signature_params = $signature_params;
    return $signature_params;
    
  }
  



/**
 * generateSignature
 *
 * Returns the signature for the API call, which is generated from the parameters, that are passed in: app id, co id and so on
 *
 * @param array sign_params The array with needed parameters
 * 
 * @return str 1542e5c696889beab924f2202ae55cec
 */


  private function generateSignature($signature_params) {
    
    // generate signature from signature parameters
    $sig = '';
    foreach($signature_params as $k=>$v) {
        $sig .= $k.'='.$v;
    }
    $sig .= $this->app_secret; 
    $signature = md5($sig);
    
    $this->signature = $signature;
    return $signature;
    
  }
  
  
  /**
   * generateStandardParams
   *
   * @param str $signature The signature
   *
   * @return array The array with standard parameters
   */
  
  private function generateStandardParams($signature) {
    
    // fill standard parameters array 
    $params['sig'] = $signature;
    $params['format'] = 'json';
    //$params['v'] = $this->version;
    
    $this->standard_params = $params;
    return $params;
    
  }
  
  
  
  /**
   * combineAllParams
   *
   * Create final array from signature, standard, and unique parameters for creating the url string
   *
   * @param arr $unique_params
   * @param arr $unique_params
   * @param arr $unique_params 
   *
   * @return array The array with merged and sorted parameters
   */
  
  private function combineAllParams($unique_params, $standard_params, $signature_params) {
    
    $this->unique_params = $unique_params;
    
    $params = array_merge($standard_params, $signature_params, $unique_params);
    ksort($params);
    // var_dump($params);
    // var_dump($params['sig']);
    
    
    $this->all_params = $params;
    return $params;
    
  }
  
  
  
  /**
   * generateUrl
   *
   * Create the URL to call RestoBaza API
   *
   * 
   * @param str $method 'news/getmany'
   * @param arr $all_params
   *
   * @return str The query url with all parameters  
   */
  
  private function generateUrl($method, $all_params) {
    
    // generate parameters string for use in url
    $url_params_array = array();
    
    foreach($all_params as $k=>$v) {
        $url_params_array[] = $k.'='.urlencode($v);
    }
    
    $url_params_str = implode('&', $url_params_array);
    
    if($this->call_local_rb) {
      $url = 'http://api.restobaza_local.ru';
    } else {
      // this is for my local testing
      $url = $this->api_address;
      
    }
    
    //$url = 'http://api.restobaza.ru';
    $query_url = $url.'/'.$method . '?'.$url_params_str;

    //echo(htmlentities($query_url));
    //echo '<br/>';
    //echo '<br/>';
    
    $this->query_url = $query_url;
    return $query_url;
    
  }
  
  
  
  /**
   * callAPI
   *
   * perform the API query and return information from RestoBaza. This method also check for file_get_contents errors and native RestoBaza errors.
   *
   * @param str $query_url
   *
   * @return json 
   */
  
  private function callAPI($query_url) {
    

    // error testing feature
    if($this->test_errors) {
      $this->generateTestError();
      return;
    }
    
    // empty data testing feature
    if($this->test_empty_data) {
      //empty json
      $result = json_encode(array());
      //$result = '{}';
      return;
    }
    
    
    $result = @file_get_contents($query_url);
    //var_dump($query_url);
    //var_dump($result);
    if($this->print_result == true) {
      echo($result);
    }
    //exit;

    // if file_get_contents returned data
    if($result) {
      
        // decode JSON into PHP array
        $decoded = json_decode($result, true);
        //$decoded = json_decode($result, false);
        //var_dump($decoded);
        //print_r($decoded);
        //echo($decoded);
        //exit;
        
        // if json_decode function cannot decode response from RestoBaza
        //if($decoded === null) {
        //  $error_array['error_code'] = 22;
        //  $error_array['error_description'] = 'json_decode function cannot decode response from RestoBaza.';
        //  
        //  throw new RestobazaApiException($error_array);
        //  
        //}
        
        //try {
        //  // decode JSON into PHP array
        //  $decoded = json_decode($result, true);
        //  var_dump($decoded);
        //} catch (Exception $e) {
        //  
        //  $error_array['error_code'] = 22;
        //  $error_array['error_description'] = 'json_decode function cannot decode response from RestoBaza.';
        //  
        //  throw new RestobazaApiException($error_array);
        //
        //}
        
        if($this->print_decoded == true) {
          echo '<pre>';
          print_r($decoded);
          echo '</pre>';
        }


        //set data property
        //$this->data = $decoded;
        return $decoded;
        
    // if file_get_contents returned false
    } else {
      $this->fileGetContentsError();
    }
    
  }
  
  /**
   * checkResponseForError
   *
   * Inspects data from RestoBaza, and throws an error if there is a RestoBaza error or there is a file_get_contents_error
   *
   * @throws RestobazaApiException 
   */
  
  
  private function checkResponseForError() {
    
    if(is_array($this->data) && isset($this->data['error_description'])) {
      throw new RestobazaApiException($this->data);
    }
    
  }


 

  
  
  
  /**
   * fileGetContentsError
   *
   * This error is generated when file_get_contents in the query method returns false.  The array has the same stracture as all restobaza errors. 
   *
   * @link http://www.php.net/manual/en/function.file-get-contents.php
   *
   * @throws RestobazaApiException 
   */
  
  private function fileGetContentsError() {
    
    $error_array['error_code'] = 21;
    $error_array['error_description'] = 'file_get_contents function returned false. Please see function\'s documentation for possible reasons. This in NOT a RestoBaza error.';
    
    throw new RestobazaApiException($error_array);

  }
  
  
  
  /**
   * checkNeededParams
   *
   * Throws an exception if any of the needed keys are not present in the haystack array 
   *
   * @param array $needed_params array('app_id', 'co_id', 'app_secret');
   * @param array $haystack 
   *
   * @throws RestobazaApiException 
   */
  
  private function checkNeededParams($needed_params, $haystack) {
    
    // check needed variables
    $needed_params = array('app_id', 'co_id', 'app_secret');
    foreach($needed_params as $k=>$v)
    {
      //if(!array_key_exists($v, $haystack))
      if(!isset($haystack[$v]))
      {
        $error_array['error_code'] = 23;
        $error_array['error_description'] = "The following parameter is missing: $v.";
        
        throw new RestobazaApiException($error_array);
      }
    }

  }
  
  
  
  
  
  
    
  /**
   * generateTestError
   *
   * When the test_errors flag is set to true, this will generate an error for testing purposes. 
   *
   * @throws RestobazaApiException 
   */
  
  private function generateTestError() {
    
    $error_array['error_code'] = 123456789;
    $error_array['error_description'] = 'This is a test error. Please set the test error flag in RestoBaza class to false to remove this error.';
    
    throw new RestobazaApiException($error_array);

  }




  
    /**
  * api
  *
  * This is the main API call method
  *
  * @param str $method 'news/getmany'
  * @param array $unique_params
  *
  * @return array Information from RestoBaza 
  */

  
  public function api($method, $unique_params = array()) {
  
  
    //$this->clearErrors();
  
    $signature_params = $this->generateSignatureParams();
    
    $signature = $this->generateSignature($signature_params);

    $standard_params = $this->generateStandardParams($signature);

    $all_params = $this->combineAllParams($unique_params, $standard_params, $signature_params);
   
    $query_url = $this->generateUrl($method, $all_params);

    $result = $this->callAPI($query_url);

    $this->data = $result;
    
    $this->checkResponseForError();
    
    return $this->data;

  }
  

}





/** RestobazaApiException
 *
 * Thrown when an API call returns an exception.
 *
 * @author Ivan Korablev-Dyson
 */
class RestobazaApiException extends Exception
{
  /**
   * The error info from the API server.
   */
  protected $error;

  /**
   * Make a new API Exception with the given result.
   *
   * @param array $error The result from the API server
   */
  public function __construct($error) {
    $this->error = $error;

    $code = isset($error['error_code']) ? $error['error_code'] : 0;

    if(isset($error['error_description'])) {
      // OAuth 2.0 Draft 10 style
      $msg = $error['error_description'];
    } else {
      $msg = 'Unknown Error. Check getResult()';
    }

    parent::__construct($msg, $code);
  }

  /**
   * Return the associated result object returned by the API server.
   *
   * @return array The result from the API server
   */
  public function getError() {
    return $this->error;
  }


  /**
   * To make debugging easier.
   *
   * @return string The string representation of the error
   */
  public function __toString() {
    return $this->message;
  }
}





 
  
  
  


  



  

  

  














