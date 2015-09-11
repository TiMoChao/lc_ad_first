<?php
define('__QQWRY__' , dirname(__FILE__)."/QQWry.Dat");
//echo __QQWRY__;
class QQWry{
    var $StartIP=0;
    var $EndIP=0;
    var $Country='';
    var $Local='';

    var $CountryFlag=0; // ��ʶ Countryλ��
             // 0x01,���3�ֽ�ΪCountryƫ��,û��Local
             // 0x02,���3�ֽ�ΪCountryƫ�ƣ�������Local
             // ����,Country,Local,Local�����Ƶ�ѹ�������ܶ������á�
    var $fp;

    var $FirstStartIp=0;
    var $LastStartIp=0;
    var $EndIpOff=0 ;

    function getStartIp($RecNo){
     $offset=$this->FirstStartIp+$RecNo * 7 ;
     @fseek($this->fp,$offset,SEEK_SET) ;
     $buf=fread($this->fp ,7) ;
     $this->EndIpOff=ord($buf[4]) + (ord($buf[5])*256) + (ord($buf[6])* 256*256);
     $this->StartIp=ord($buf[0]) + (ord($buf[1])*256) + (ord($buf[2])*256*256) + (ord($buf[3])*256*256*256);
     return $this->StartIp;
    }

    function getEndIp(){
     @fseek ( $this->fp , $this->EndIpOff , SEEK_SET ) ;
     $buf=fread ( $this->fp , 5 ) ;
     $this->EndIp=ord($buf[0]) + (ord($buf[1])*256) + (ord($buf[2])*256*256) + (ord($buf[3])*256*256*256);
     $this->CountryFlag=ord ( $buf[4] ) ;
     return $this->EndIp ;
    }

    function getCountry(){
     switch ( $this->CountryFlag ) {
        case 1:
        case 2:
         $this->Country=$this->getFlagStr ( $this->EndIpOff+4) ;
         //echo sprintf('EndIpOffset=(%x)',$this->EndIpOff );
         $this->Local=( 1 == $this->CountryFlag )? '' : $this->getFlagStr ( $this->EndIpOff+8);
         break ;
        default :
         $this->Country=$this->getFlagStr ($this->EndIpOff+4) ;
         $this->Local=$this->getFlagStr ( ftell ( $this->fp )) ;
     }
    }


    function getFlagStr ($offset){
     $flag=0 ;
     while(1){
        @fseek($this->fp ,$offset,SEEK_SET) ;
        $flag=ord(fgetc($this->fp ) ) ;
        if ( $flag == 1 || $flag == 2 ) {
         $buf=fread ($this->fp , 3 ) ;
         if ($flag==2){
            $this->CountryFlag=2;
            $this->EndIpOff=$offset - 4 ;
         }
         $offset=ord($buf[0]) + (ord($buf[1])*256) + (ord($buf[2])* 256*256);
        }
        else{
         break ;
        }

     }
     if($offset<12)
        return '';
     @fseek($this->fp , $offset , SEEK_SET ) ;

     return $this->getStr();
    }

    function getStr ( )
    {
     $str='' ;
     while ( 1 ) {
        $c=fgetc ( $this->fp ) ;
        //echo "$cn" ;

        if(ord($c[0])== 0 )
         break ;
        $str.= $c ;
     }
     //echo "$str n";
     return $str ;
    }


    function qqwry ($dotip='') {
        if(!$dotip)return;
            if(preg_match("/^(127)/",$dotip)){$this->Country='��������';return;}
            elseif(preg_match("/^(192)/",$dotip)) {$this->Country='������';return;}

     $nRet;
     $ip=$this->IpToInt( $dotip );
     $this->fp= fopen(__QQWRY__, "rb");
     if ($this->fp == NULL) {
         $szLocal= "OpenFileError";
        return 1;

     }
     @fseek ( $this->fp , 0 , SEEK_SET ) ;
     $buf=fread ( $this->fp , 8 ) ;
     $this->FirstStartIp=ord($buf[0]) + (ord($buf[1])*256) + (ord($buf[2])*256*256) + (ord($buf[3])*256*256*256);
     $this->LastStartIp=ord($buf[4]) + (ord($buf[5])*256) + (ord($buf[6])*256*256) + (ord($buf[7])*256*256*256);

     $RecordCount= floor( ( $this->LastStartIp - $this->FirstStartIp ) / 7);
     if ($RecordCount <= 1){
        $this->Country="FileDataError";
        fclose($this->fp) ;
        return 2 ;
     }

     $RangB= 0;
     $RangE= $RecordCount;
     // Match ...
     while ($RangB < $RangE-1)
     {
     $RecNo= floor(($RangB + $RangE) / 2);
     $this->getStartIp ( $RecNo ) ;

        if ( $ip == $this->StartIp )
        {
         $RangB=$RecNo ;
         break ;
        }
     if ($ip>$this->StartIp)
        $RangB= $RecNo;
     else
        $RangE= $RecNo;
     }
     $this->getStartIp ( $RangB ) ;
     $this->getEndIp ( ) ;

     if ( ( $this->StartIp <= $ip ) && ( $this->EndIp >= $ip ) ){
        $nRet=0 ;
        $this->getCountry ( ) ;
        //������̫��..............����..........
        $this->Local=str_replace("������һ��Ҫ���̨�壡������", "", $this->Local);
     }
     else{
        $nRet=3 ;
        $this->Country='δ֪' ;
        $this->Local='' ;
     }
     fclose ( $this->fp );
$this->Country=preg_replace("/(CZ88.NET)|(��������)/","",$this->Country);
$this->Local=preg_replace("/(CZ88.NET)|(��������)/","",$this->Local);
//////////////���� $nRet�������ֵ��ʲô0��3�����ǽ��������ע�͵�
        return $nRet ;

     //return "$this->Country $this->Local";#���ֱ�ӷ���λ�ú͹��ұ������
    }

    function IpToInt($Ip) {
     $array=explode('.',$Ip);
     $Int=($array[0] * 256*256*256) + ($array[1]*256*256) + ($array[2]*256) + $array[3];
     return $Int;
    }
}
function GetIP(){//��ȡIP
    return $_SERVER[REMOTE_ADDR]?$_SERVER[REMOTE_ADDR]:$GLOBALS[HTTP_SERVER_VARS][REMOTE_ADDR];
}
?>