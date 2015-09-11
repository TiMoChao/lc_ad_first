<?php
/**
 * Google sitemap 处理类
 *
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		google_sitemap
 */
class google_sitemap extends ArthurXF{
	public $db = null;
    public $header = "<\x3Fxml version=\"1.0\" encoding=\"UTF-8\"\x3F>\n\t<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.84\">";
    public $charset = "UTF-8";
    public $footer = "\t</urlset>\n";
    public $items = array();

	function db(){
		$this->db = $this->connectG();
	}
    /**
     * 增加一个新的子项
     * @access   public
     * @param    google_sitemap  item    $new_item
     */
    function add_item($new_item){
        $this->items[] = $new_item;
    }

    /**
     * 生成XML文档
     * @access    public
     * @param     string  $file_name  如果提供了文件名则生成文件，否则返回字符串.
     * @return [void|string]
     */
    function build( $file_name = null ){
        $map = $this->header . "\n";

        foreach($this->items as $item){
            $item->loc = htmlentities($item->loc, ENT_QUOTES);
            $map .= "\t\t<url>\n\t\t\t<loc>$item->loc</loc>\n";

            // lastmod
            if ( !empty( $item->lastmod ) )
                $map .= "\t\t\t<lastmod>$item->lastmod</lastmod>\n";

            // changefreq
            if ( !empty( $item->changefreq ) )
                $map .= "\t\t\t<changefreq>$item->changefreq</changefreq>\n";

            // priority
            if ( !empty( $item->priority ) )
                $map .= "\t\t\t<priority>$item->priority</priority>\n";

            $map .= "\t\t</url>\n\n";
        }

        $map .= $this->footer . "\n";

        if(!is_null($file_name)){
            $fh = fopen($file_name, 'wb');
            fwrite($fh, $map);
            fclose($fh);
        }else{
            return $map;
        }
    }

}

class google_sitemap_item{
    /** 
     *@access   public
     *@param    string  $loc        位置
     *@param    string  $lastmod    日期格式 YYYY-MM-DD 
     *@param    string  $changefreq 更新频率的单位( always,hourly,daily,weekly,monthly,yearly,never )
     *@param    string  $priority   更新频率 0-1
     */
    function google_sitemap_item( $loc, $lastmod = '', $changefreq = '', $priority = '' ){
        $this->loc = "http://".$loc;
        $this->lastmod = $lastmod;
        $this->changefreq = $changefreq;
        $this->priority = $priority;
    }
}
?>