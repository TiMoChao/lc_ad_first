<?php
class emailverify{
	var  $timeout=10;
	var  $localhost="";
	var  $localuser="";

	function GetLine($connection){
		for($line="";;){
			if(feof($connection)) return(0);
			$line.=fgets($connection,100);
			$length=strlen($line);
			if($length>=2  &&  substr($line,$length-2,2)=="\r\n") return(substr($line,0,$length-2));
		}
	}

	function  PutLine($connection,$line){
		return(fputs($connection,"$line\r\n"));
	}

	function  VerifyResultLines($connection,$code){
		while(($line=$this->GetLine($connection))){
			if(!strcmp(strtok($line,"  "),$code)) return(1);
			if(strcmp(strtok($line,"-"),$code)) return(0);
		}
		return(-1);
	}

	function ValidateEmailAddress($email){
		return(preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*$/",$email)!=0);
	}

	function ValidateEmailHost($email,$hosts=0){
		if(!$this->ValidateEmailAddress($email)) return(0);
		//if(strpos(PHP_OS,'WIN') !== false) return(-1);
		$user=strtok($email,"@");
		$domain=strtok("");
		if(getmxrr($domain,&$hosts,&$weights)){
			$mxhosts=array();
			for($host=0;$host<count($hosts);$host++){
				$mxhosts[$weights[$host]]=$hosts[$host];
			}
			ksort($mxhosts);
			for(reset($mxhosts),$host=0;$host<count($mxhosts);Next($mxhosts),$host++){
				$hosts[$host]=$mxhosts[Key($mxhosts)];
			}
		}else{
			$hosts=array();
			if(strcmp(@gethostbyname($domain),$domain)!=0) $hosts[]=$domain;
		}
		return(count($hosts)!=0);
	}

	function  ValidateEmailBox($email){
		if(!$this->ValidateEmailHost($email,&$hosts)) return(0);
		if(!strcmp($localhost=$this->localhost,"") && !strcmp($localhost=getenv("SERVER_NAME"),"") && !strcmp($localhost=getenv("HOST"),"")){
			$localhost="localhost";
		}
		if(!strcmp($localuser=$this->localuser,"") && !strcmp($localuser=getenv("USERNAME"),"")  && !strcmp($localuser=getenv("USER"),"")){
			$localuser="root";
		}
		for($host=0;$host<count($hosts);$host++){
			if(($connection=($this->timeout  ?  @fsockopen($hosts[$host],25,&$errno,&$error,$this->timeout)  :  @fsockopen($hosts[$host],25)))){
				if($this->VerifyResultLines($connection,"220")>0 && $this->PutLine($connection,"HELO  $localhost") &&  $this->VerifyResultLines($connection,"250")>0 && $this->PutLine($connection,"MAIL  FROM:  <$localuser@$localhost>") &&  $this->VerifyResultLines($connection,"250")>0 && $this->PutLine($connection,"RCPT  TO:  <$email>") &&  ($result=$this->VerifyResultLines($connection,"250"))>=0){
					fclose($connection);
					return($result);
				}
				fclose($connection);
			}
		}
		return(-1);
	}
};
?>