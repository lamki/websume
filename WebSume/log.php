<?php

$from = $_GET["fr"];
class log {
    public $filename;
    public $timestamp;
    public $ip;
    public $u_agent;
    public $u_refer;
    public $ub;
    public $uos;
    public $log;
    public $stream;
    public function logger($filename) {
        $this->filename = $filename;
        $this->timestamp = date('l  d  F  Y   H:i:s');
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->u_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->req_uri = $_SERVER['REQUEST_URI'];
        $this->ub = '';
        $this->uos = '';
        if(!isset($_SERVER['HTTP_REFERER'])){
          $this->u_refer = 'No referrer';
        } 
        if (preg_match('/MSIE/i', $this->u_agent)): 
            $this->ub = "Internet Explorer";
         elseif (preg_match('/Firefox/i', $this->u_agent)) :
            $this->ub = "Mozilla Firefox";
         elseif (preg_match('/Safari/i', $this->u_agent)) :
            $this->ub = "Apple Safari";
         elseif (preg_match('/Chrome/i', $this->u_agent)) :
            $this->ub = "Google Chrome";
         elseif (preg_match('/Flock/i', $this->u_agent)) :
            $this->ub = "Flock";
         elseif (preg_match('/Opera/i', $this->u_agent)) :
            $this->ub = "Opera";
         elseif (preg_match('/Netscape/i', $this->u_agent)) :
            $this->ub = "Netscape";
         endif;
        if (preg_match('/iphone/i', $this->u_agent)):
            $this->uos = "iphone";
        elseif (preg_match('/Android/i', $this->u_agent)) :
            $this->uos = "Android";
        elseif (preg_match('/Linux/i', $this->u_agent)) :
            $this->uos = "Linux";
        elseif (preg_match('/Mac OS x/i', $this->u_agent)) :
            $this->uos = "Mac OS x";
        elseif (preg_match('/Mac OS x 10.4/i', $this->u_agent)) :
            $this->uos = "Mac OS x 10.4 - Tiger";
        elseif (preg_match('/Mac OS x 10_5_5/i', $this->u_agent)) :
            $this->uos = "Mac OS x 10.5 - Leopard";
        elseif (preg_match('/Mac OS x 10.5/i', $this->u_agent)) :
            $this->uos = "Mac OS x 10.5 - Leopard";
        elseif (preg_match('/Mac OS x 10_6_2/i', $this->u_agent)) :
            $this->uos = "Mac OS x 10.6 - Snow Leopard";
        elseif (preg_match('/Mac OS x 10.6/i', $this->u_agent)) :
            $this->uos = "Mac OS x 10.6 - Snow Leopard";
        elseif (preg_match('/Mac OS x 10_7_2/i', $this->u_agent)) :
            $this->uos = "Mac OS x 10.7 - Lion";
        elseif (preg_match('/Mac OS x 10.7/i', $this->u_agent)) :
            $this->uos = "Mac OS x 10.7 - Lion";
        elseif (preg_match('/Windows 3.1/i', $this->u_agent)) :
            $this->uos = "Windows 3.1";
        elseif (preg_match('/Windows 95/i', $this->u_agent)) :
            $this->uos = "Windows 95";
        elseif (preg_match('/Win95/i', $this->u_agent)) :
            $this->uos = "Windows 95";
        elseif (preg_match('/Windows 98/i', $this->u_agent)) :
            $this->uos = "Windows 98";
        elseif (preg_match('/Windows NT 5.0/i', $this->u_agent)) :
            $this->uos = "Windows 2000";
        elseif (preg_match('/Windows 2000/i', $this->u_agent)) :
            $this->uos = "Windows 2000";
        elseif (preg_match('/Windows NT 5.1/i', $this->u_agent)) :
            $this->uos = "Windows XP";
        elseif (preg_match('/Windows NT 5.2/i', $this->u_agent)) :
            $this->uos = "Windows Server 2003";
        elseif (preg_match('/Windows NT 6.0/i', $this->u_agent)) :
            $this->uos = "Windows Vista";
        elseif (preg_match('/Windows NT 6.1/i', $this->u_agent)) :
            $this->uos = "Windows 7";
        elseif (preg_match('/Windows NT 6.2/i', $this->u_agent)) :
            $this->uos = "Windows 8";
        elseif (preg_match('/Windows Phone OS 7/i', $this->u_agent)) :
            $this->uos = "Windows Phone 7";
        elseif (preg_match('/Windows Mobile/i', $this->u_agent)) :
            $this->uos = "Windows Mobile";
        elseif (preg_match('/Windows CE/i', $this->u_agent)) :
            $this->uos = "Windows CE";
        endif;
               
        $this->log = $this->timestamp ."\n" . '  IPAddress:' . '  ' . $this->ip."\n" . '  Referer:' . '  ' . $this->u_refer."\n" . '  Browser:' . '  ' . $this->ub."\n" . '  Operating System:' . '  ' . $this->uos."\n" . '  RequestURI:' . '  ' . $this->req_uri."\n";
        $this->stream = fopen($filename, "a+");
        fwrite($this->stream, $this->log . "\n");
        fclose($this->stream);
    }
}
$logged = new log();
$logger = $logged->logger("log.txt");

?>