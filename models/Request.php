<?php

/**
 * Class to handle all HTTP Requests. e.g. GET, POST, etc.
 */

 class Request {

    /**
     * Static function to make an HTTP(S) request to a certain URL.
     * 
     * @ $url: URL to send an HTTP GET request to.
     * @ returnData: boolean value (1 = true or 0 = false), to indicate results are shown on the page or return to a variable to be processed.
     * @ setHeaders: boolean value (1 = true or 0 = false), GET HTTP GET Request headers
     */

    public static function get($url, $returnData, $setHeaders) {

        $returnDataInt = 0; // Show or return raw data  (1 = true or 0 = false)
        $setHeadersInt = 0; // return headers or not  (1 = true or 0 = false)

        // Validate URL as String
        if (!is_string($url)) {
            return 'URL must be a String';
        }

        // Validate ReturnData as Boolean
        if (!is_bool($returnData)) {
            return 'returnData must be a Boolean';
        }

        // Validate setHeaders as Boolean
        if (!is_bool($setHeaders)) {
            return 'setHeaders must be a Boolean';
        }

        // Convert returnData from bool to int option
        if($returnData === true) {
            $returnDataInt = 1;
        }

        // Convert setHeaders from bool to int option
        if($setHeaders === true) {
            $returnDataInt = 1;
        }

        $curlHandler = curl_init();

        curl_setopt($curlHandler, CURLOPT_URL, $url); // SET URL on Curl handler

        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, $returnDataInt); // set Return Data option

        curl_setopt($curlHandler, CURLOPT_HEADER, $setHeadersInt); // set set Headers option

        $results_json = curl_exec($curlHandler); // Send the HTTP SET Request

        curl_close($curlHandler); // Close Curl Handler to free some memory.

        // Validate the results returned from the HTTP Get Request
        if ($results_json === false) {

            $curl_response_error =  "ERROR: " . curl_error($curlHandler);
        }

        return $results_json; // Return the data returned

    }
 };

 ?>