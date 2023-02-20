<?php


header('Content-Type: application/json; charset=utf-8');

/**
 * Busqueda
 */

$queryString = http_build_query([
    'api_key' => '37456FC33462426DACD89338488FEA11',
    'type' => 'search',
    'amazon_domain' => 'amazon.es',
    'search_term' => 'zapatos', //<-- $_GET['buscar']
    'max_page' => '1',
    'exclude_sponsored' => 'true',
    'currency' => 'eur',
    'page' => '1',
    'include_html' => 'false',
    'output' => 'json',
    'sort_by' => 'average_review'
]);

# make the http GET request to Rainforest API
$ch = curl_init(sprintf('%s?%s', 'https://api.rainforestapi.com/request', $queryString));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
# the following options are required if you're using an outdated OpenSSL version
# more details: https://www.openssl.org/blog/blog/2021/09/13/LetsEncryptRootCertExpire/
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_TIMEOUT, 180);

$api_result = curl_exec($ch);
curl_close($ch);

# print the JSON response from Rainforest API
echo $api_result;


/**
 * Detalles de producto especifico
 */

// # set up the request parameters
// $queryString = http_build_query([
//     'api_key' => '37456FC33462426DACD89338488FEA11',
//     'type' => 'product',
//     'amazon_domain' => 'amazon.es',
//     'asin' => 'B0B8HG8W8Y', // $_GET['?'] 
//     'include_summarization_attributes' => 'false',
//     'language' => 'es_ES',
//     'include_a_plus_body' => 'false',
//     'currency' => 'eur',
//     'include_html' => 'false',
//     'output' => 'json'
// ]);

// # make the http GET request to Rainforest API
// $ch = curl_init(sprintf('%s?%s', 'https://api.rainforestapi.com/request', $queryString));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// # the following options are required if you're using an outdated OpenSSL version
// # more details: https://www.openssl.org/blog/blog/2021/09/13/LetsEncryptRootCertExpire/
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// curl_setopt($ch, CURLOPT_TIMEOUT, 180);

// $api_result = curl_exec($ch);
// curl_close($ch);

// # print the JSON response from Rainforest API
// echo $api_result;
