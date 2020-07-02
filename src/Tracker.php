<?php

namespace Travis;

class Tracker
{
    /**
     * Make an API request.
     *
     * @param   string  $key
     * @param   string  $method
     * @param   array   $arguments
     * @param   int     $timeout
     * @return  array
     */
    public static function run($key, $method, $arguments = [], $timeout = 30)
    {
        // set endpoint
        $endpoint = 'https://evoapi.tracker-rms.com/api/widget/'.$method;

        // amend arguments
        $arguments = array_merge(['credentials' => ['apikey' => $key]], $arguments);

        // build payload
        $payload = [
            'trackerrms' => [
                $method => $arguments,
            ],
        ];

        // encode
        $payload = json_encode($payload);

        // build headers
        $headers = [
            'Content-Type: application/json',
            'Content-Length: '.strlen($payload),
            'Accept: application/json',
        ];

        // make curl request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // catch errors...
        if (curl_errno($ch))
        {
            #$errors = curl_error($ch);

            $result = false;
        }

        // else if NO errors...
        else
        {
            // decode
            $result = json_decode($response);
        }

        // close
        curl_close($ch);

        // return
        return $result;
    }
}