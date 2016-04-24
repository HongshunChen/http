<?php
/*
GET /http/ HTTP/1.1   
Host: localhost
Connection: keep-alive
Cache-Control: max-age=0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*\/*;q=0.8
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.108 Safari/537.36
Accept-Encoding: gzip, deflate, sdch
Accept-Language: zh-CN,zh;q=0.8
Cookie: Cxut_2132_saltkey=scAC9O1s; Cxut_2132_lastvisit=1458562108; hRyb_2132_saltkey=tJp8B08w; hRyb_2132_lastvisit=1458563831; hRyb_2132_ulastactivity=664eaB%2BUl90H38j4f7b6BceorpW8EjdeGb5OKeA7unIn5DK%2B9G8y; hRyb_2132_lastcheckfeed=1%7C1458567447; hRyb_2132_nofavfid=1




HTTP/1.1 200 OK
Date: Sun, 17 Apr 2016 03:16:11 GMT
Server: Apache/2.4.10 (Win64) OpenSSL/1.0.1i mod_fcgid/2.3.9
Last-Modified: Sun, 17 Apr 2016 03:10:25 GMT
ETag: "ce-530a595d6c683"
Accept-Ranges: bytes
Content-Length: 206
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: text/html

GET /http/post.html HTTP/1.1
Host: localhost
Connection: keep-alive
Cache-Control: max-age=0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*\/*;q=0.8
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.108 Safari/537.36
Accept-Encoding: gzip, deflate, sdch
Accept-Language: zh-CN,zh;q=0.8
Cookie: Cxut_2132_saltkey=scAC9O1s; Cxut_2132_lastvisit=1458562108; hRyb_2132_saltkey=tJp8B08w; hRyb_2132_lastvisit=1458563831; hRyb_2132_ulastactivity=664eaB%2BUl90H38j4f7b6BceorpW8EjdeGb5OKeA7unIn5DK%2B9G8y; hRyb_2132_lastcheckfeed=1%7C1458567447; hRyb_2132_nofavfid=1
If-None-Match: "ce-530a595d6c683"
If-Modified-Since: Sun, 17 Apr 2016 03:10:25 GMT

HTTP/1.1 304 Not Modified
Date: Sun, 17 Apr 2016 06:36:43 GMT
Server: Apache/2.4.10 (Win64) OpenSSL/1.0.1i mod_fcgid/2.3.9
Connection: Keep-Alive
Keep-Alive: timeout=5, max=98
ETag: "ce-530a595d6c683"






POST /http/index.php HTTP/1.1
Host: localhost
Connection: keep-alive
Content-Length: 27
Cache-Control: max-age=0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*\/*;q=0.8
Origin: http://localhost
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.108 Safari/537.36
Content-Type: application/x-www-form-urlencoded
Referer: http://localhost/http/post.html
Accept-Encoding: gzip, deflate
Accept-Language: zh-CN,zh;q=0.8
Cookie: Cxut_2132_saltkey=scAC9O1s; Cxut_2132_lastvisit=1458562108; hRyb_2132_saltkey=tJp8B08w; hRyb_2132_lastvisit=1458563831; hRyb_2132_ulastactivity=664eaB%2BUl90H38j4f7b6BceorpW8EjdeGb5OKeA7unIn5DK%2B9G8y; hRyb_2132_lastcheckfeed=1%7C1458567447; hRyb_2132_nofavfid=1

HTTP/1.1 200 OK
Date: Sun, 17 Apr 2016 03:12:34 GMT
Server: Apache/2.4.10 (Win64) OpenSSL/1.0.1i mod_fcgid/2.3.9
X-Powered-By: PHP/5.6.1
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8



POST /http/index.php HTTP/1.1
Host: localhost
Content-type: application/x-www-form-urlencoded
Content-Length: 27

 name=chs&email=12345@ff.com
 */
$content =implode($_POST, '\r\n');
file_put_contents('.\post.txt', $content);
echo 'ok';