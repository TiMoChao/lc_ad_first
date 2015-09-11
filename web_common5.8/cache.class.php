<?php
/*
*    FileName                :    cache.inc.php
*    Link                    :   [url]http://blog.csdn.net/dxflingxing/[/url]
*    Author                  :   dxflingxing
*    Date                    :    2006-5-9
*    Last Modified           :    2010-1-13 BY ArthurXF
*    Version                 :    1.0.1
*    Description             :    Cache a page in file formart
*    Notice                  :    Make sure you cache file dir can be readed and wrote
*
*    Thanks to               :    小邪,barryonline(寒)
************************************************************
*
*    Usage                    :
*        # Cache active time half an hour
*        # This Can Auotmatic make some none exist dirs
*        # Or you can use an cache file in curent dir
*        # The Usage Such as
*        # $cache    = new cache(string cache_name,int seconds);
*
*        require ('cache.inc.php');
*        $cache    = new cache('dir1/dir2/cache_name.htm',60*30);
*
*        $cache->cache_start();
*
*        # Your Page Contents With print
*        phpinfo();
*
*        $cache->cache_end();
*
*/

class cache {
    var $cache_file;
    var $cache_time;

	function __construct($cache_file,$cache_time=3600) {
       $this->cache($cache_file,$cache_time);
   }

	function cache($cache_file,$cache_time=3600) {
        $this->cache_file = $cache_file;
        $this->cache_time = $cache_time;
    }
    /*
    * Start cache method without Return
    */
    function cache_start($update=false){
		if(!$update){
			if($this->cache_is_active()){
				include($this->cache_file);
				exit;
			}
		}
		ob_start();
    }

    /*
    * End of cache method without Return
    */
    function cache_end($output=true) {
        $this->make_cache();
		if($output) ob_end_flush();
		else ob_end_clean();
    }

    /*
    * Check if cache file is actived
    * Return true/false
    */
    function cache_is_active() {
        if ($this->cache_is_exist()) {
            if (time() - $this->lastModified() < $this->cache_time)
                Return true;
            else {
                Return false;
            }
        }
        else {
            Return false;
        }
    }

    /*
    * Create cache file
    * Return true/false
    */
    function make_cache() {
        $content = $this->get_cache_content();
		if(empty($content)) return false;
        if($this->write_file($content)) {
            return true;
        }
        else {
            return false;
        }
    }

    /*
    * Check if cache file is exists
    * Return true/false
    */
    function cache_is_exist() {
        if(file_exists($this->cache_file)) {
            Return true;
        }
        else {
            Return false;
        }
    }

    /*
    * Return last Modified time in bollin formart
    * Usage: $lastmodified = $this->lastModified();
    */
    function lastModified() {
        Return @filemtime($this->cache_file);
    }

    /*
    * Return Content of Page
    * Usage: $content = $this->get_cache_content();
    */
    function get_cache_content() {
        $contents = ob_get_contents();
//        Return '<!--'.date('Y-m-d H:i:s').'-->'.$contents;
        Return $contents;
    }

    /*Write content to $this->cache_file
    * Return true/false
    * Usage: $this->write_file($content);
    **/
    function write_file($content,$mode='w') {
        $this->mk_dir($this->cache_file);
        if ($fp = @fopen($this->cache_file,$mode)) {
            @fwrite($fp,$content);
            @fclose($fp);
            @umask($oldmask);
            return true;
        } else{
			$this->report_Error($this->cache_file." 目录或者文件属性无法写入.");
            return false;
        }
    }

    /*
    * Make given dir included in $this->cache_file
    * Without Return
    * Usage: $this->mk_dir();
    */
    function mk_dir()
    {    //$this->cache_file    = str_replace('','/');
        $dir    = @explode("/", $this->cache_file);
        $num    = @count($dir)-1;
        $tmp    = '';
        for($i=0; $i<$num; $i++){
            $tmp    .= $dir[$i];
            if(!file_exists($tmp)){
                @mkdir($tmp);
                @chmod($tmp, 0777);
            }
            $tmp    .= '/';
        }
    }

    /*
    * Unlink an exists cache
    * Return true/false
    * Usage: $this->clear_cache();
    */
    function clear_cache() {
        if (!@unlink($this->cache_file)) {
            $this->report_Error('Unable to remove cache');
            Return false;
        }
        else {
            Return true;
        }
    }

    /*
    * Report Error Messages
    * Usage: $this->report_Error($message);
    */
    function report_Error($message=NULL) {
		if($message!=NULL) {
			trigger_error($message);
		}
	}
}
?>
