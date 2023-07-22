<?php
/**
* This file is created by Really Simple SSL
*/

defined('ABSPATH') or die();

if ( isset($_GET["rsssl_header_test"]) && (int) $_GET["rsssl_header_test"] ===  753790525 ) return;

//RULES START

if ( !headers_sent() ) {
function rsssl_is_ssl() {
  if (  ( isset($_SERVER["HTTPS"]) && ("on" === $_SERVER["HTTPS"] || "1" === $_SERVER["HTTPS"]) )
  || (isset($_ENV["HTTPS"]) && ("on" === $_ENV["HTTPS"]))
  || (isset($_SERVER["SERVER_PORT"]) && ( "443" === $_SERVER["SERVER_PORT"] ) )
  || (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "1") !== false))
  || (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "on") !== false))
  || (isset($_SERVER["HTTP_CF_VISITOR"]) && (strpos($_SERVER["HTTP_CF_VISITOR"], "https") !== false))
  || (isset($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"], "https") !== false))
  || (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_X_FORWARDED_PROTO"], "https") !== false))
  || (isset($_SERVER["HTTP_X_PROTO"]) && (strpos($_SERVER["HTTP_X_PROTO"], "SSL") !== false))
  ) {
    return true;
  }
    return false;
}
if ( rsssl_is_ssl() ) header("Strict-Transport-Security: max-age=63072000; includeSubDomains;preload");
header("X-XSS-Protection: 0");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("X-Frame-Options: SAMEORIGIN");
header("Content-Security-Policy: upgrade-insecure-requests; ");
}
