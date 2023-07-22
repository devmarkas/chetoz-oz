<?php
/**
* This file is created by Really Simple SSL to test the CSP header length
* It will not load during regular wordpress execution
*/


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
  header("X-REALLY-SIMPLE-SSL-TEST: -%9A%28%D4P%A4%08n%84%98%C5%83%F6%29%D1%CF%9FE%99I%FE%1C%D6%0F%CC%C6%7Dd%F2o%FC%9C%08%CA%DE%DC%3F%07%EA%C6%F2%BE%99%B8%9B%FE%7F%5C%BB%D71k%29%AE%08%15c%84%E7%F7%C0%90%CE%D6%13%CEs%B7%8F%25%95%E7%16%A7%8C%9E%EA%5B%2A4%1C%8D%9D%87%A9%8C%A1%94%23%A3%C7%A3%BF%2C%A8%A7%2F%89%FB%EF%14%9C%E4rSA%E5%2Cu%83%A3%89%16G%5E%EA%BD%FF%BE0%23%8AL%24%BCmb%9A%CB%A7%B8%01%AE%1Ew%8E%09%9D%10%26%3DG%7EL%0C%29%5C%3E%BB%88%F0U%D2%FA%81%FE%D0C%9E%60%3A%E8%03%3D%D28s%AA%E0v%80H%80%D0HaNm%BFyL%1308e%93%9A7%90%DE%F6%8F%C3%");
}
    return false;
header("X-REALLY-SIMPLE-SSL-TEST: -%9A%28%D4P%A4%08n%84%98%C5%83%F6%29%D1%CF%9FE%99I%FE%1C%D6%0F%CC%C6%7Dd%F2o%FC%9C%08%CA%DE%DC%3F%07%EA%C6%F2%BE%99%B8%9B%FE%7F%5C%BB%D71k%29%AE%08%15c%84%E7%F7%C0%90%CE%D6%13%CEs%B7%8F%25%95%E7%16%A7%8C%9E%EA%5B%2A4%1C%8D%9D%87%A9%8C%A1%94%23%A3%C7%A3%BF%2C%A8%A7%2F%89%FB%EF%14%9C%E4rSA%E5%2Cu%83%A3%89%16G%5E%EA%BD%FF%BE0%23%8AL%24%BCmb%9A%CB%A7%B8%01%AE%1Ew%8E%09%9D%10%26%3DG%7EL%0C%29%5C%3E%BB%88%F0U%D2%FA%81%FE%D0C%9E%60%3A%E8%03%3D%D28s%AA%E0v%80H%80%D0HaNm%BFyL%1308e%93%9A7%90%DE%F6%8F%C3%");
}
if ( rsssl_is_ssl() ) header("Strict-Transport-Security: max-age=63072000; includeSubDomains;preload");
header("X-XSS-Protection: 0");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("X-Frame-Options: SAMEORIGIN");
header("Content-Security-Policy: upgrade-insecure-requests; ");
header("X-REALLY-SIMPLE-SSL-TEST: -%9A%28%D4P%A4%08n%84%98%C5%83%F6%29%D1%CF%9FE%99I%FE%1C%D6%0F%CC%C6%7Dd%F2o%FC%9C%08%CA%DE%DC%3F%07%EA%C6%F2%BE%99%B8%9B%FE%7F%5C%BB%D71k%29%AE%08%15c%84%E7%F7%C0%90%CE%D6%13%CEs%B7%8F%25%95%E7%16%A7%8C%9E%EA%5B%2A4%1C%8D%9D%87%A9%8C%A1%94%23%A3%C7%A3%BF%2C%A8%A7%2F%89%FB%EF%14%9C%E4rSA%E5%2Cu%83%A3%89%16G%5E%EA%BD%FF%BE0%23%8AL%24%BCmb%9A%CB%A7%B8%01%AE%1Ew%8E%09%9D%10%26%3DG%7EL%0C%29%5C%3E%BB%88%F0U%D2%FA%81%FE%D0C%9E%60%3A%E8%03%3D%D28s%AA%E0v%80H%80%D0HaNm%BFyL%1308e%93%9A7%90%DE%F6%8F%C3%");
}

 echo '<html><head><meta charset="UTF-8"><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"></head><body>Really Simple SSL headers test page</body></html>';