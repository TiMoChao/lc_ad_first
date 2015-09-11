<?php
/**
 * ���ķִ����ļ�
 * @version		$Id$
 * @package		ArthurXF
 * ���ļ����뱣��ASCII����
 */
class SplitWord
{
	var $RankDic = Array();
	var $OneNameDic = Array();
	var $TwoNameDic = Array();
	var $NewWord = Array();
	var $SourceString = '';
	var $ResultString = '';
	var $SplitChar = ' '; //�ָ���
	var $SplitLen = 4; //�����ʳ���
	var $EspecialChar = "��|��|��";
	var $NewWordLimit = "��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��";

	//������԰���Ҫ���볣�õ����ʣ�
	//�����������һ�����Ƿ�Ϊ��Щ�ʺ���һ�����Ƿ�Ϊ���ʣ�Ȼ����Ϊ����
	var $CommonUnit = "��|��|��|��|��|յ|ƥ|ͷ|ֻ|̨|Ͱ|��|��|��|��|��|��|��|ʱ|��|��|��|Ԫ|��|ǧ|��|��|λ|��";

	var $CnNumber = "��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|�� |��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��";
	var $CnSgNum = "һ|��|��|��|��|��|��|��|��|ʮ|��|ǧ|��|��|��";
	var $MaxLen = 13; //�ʵ���� 7 �����֣��������ֵΪ�ֽ�������������
	var $MinLen = 3;  //��С 2 �����֣��������ֵΪ�ֽ�������������
	var $CnTwoName = "��ľ �Ϲ� ���� ��ԯ ��� ���� ���� ���� ���� ���� ˾ͽ ˾�� �Ϲ� ŷ�� ���� ���� ���� ���� ���� ���� Ľ�� ˾�� �ĺ� ��� ���� ���� �ʸ� ξ�� ����";
	var $CnOneName = "��Ǯ��������֣��������������������������ʩ�ſײ��ϻ���κ�ս���л������ˮ��������˸��ɷ�����³Τ������ﻨ������Ԭ��ۺ��ʷ�Ʒ����Ѧ�׺����������ޱϺ�����������ʱ��Ƥ���뿵����Ԫ������ƽ��������Ҧ�ۿ�����ë����ױ���갼Ʒ��ɴ�̸��é���ܼ�������ף������������ϯ����ǿ��·¦Σ��ͯ�չ�÷ʢ�ֵ�����������Ĳ��﷮���������֧�¾̹�¬Ī�������Ѹɽ�Ӧ�������ڵ��������������ʯ�޼�ť�������ϻ���½��������춻���κ�ӷ����ഢ���������ɾ��θ����ڽ��͹�����ȳ������ȫۭ�����������������ﱩ�����������������ղ����Ҷ��˾��۬�輻��ӡ�ް׻���̨�Ӷ����̼���׿�����ɳ����������ܲ�˫��ݷ����̷�����̼������Ƚ��۪Ӻ�S�ɣ���ţ��ͨ�����༽ۣ����ũ�±�ׯ�̲���ֳ�Ľ����ϰ�°���������������θ����߾Ӻⲽ�����������Ŀܹ�»�ڶ�Ź�����εԽ��¡ʦ�������˹��������������Ǽ��Ŀ���ɳ��ᳲ������������";

	/**
	 * php4���캯��
	 * @param	boolean	$loaddic	�Ƿ������ֵ��ļ�
	 * @return  void
	 */
	function SplitWord($loaddic=true){
		$this->__construct($loaddic);
	}

	/**
	 * php5���캯��
	 * @param	boolean	$loaddic	�Ƿ������ֵ��ļ�
	 * @return  void
	 */
	function __construct($loaddic=true){
		if($loaddic){
			//�������ϴʵ�
			for($i=0;$i<strlen($this->CnOneName);$i++){
				$this->OneNameDic[$this->CnOneName[$i].$this->CnOneName[$i+1]] = 1;
				$i++;
			}
			$twoname = explode(" ",$this->CnTwoName);
			foreach($twoname as $n){
				$this->TwoNameDic[$n] = 1;
			}
			unset($twoname);
			unset($this->CnTwoName);
			unset($this->CnOneName);
			//�߼��ִʣ�Ԥ������ʵ�����ִʸ��ٶ�
			$dicfile = dirname(__FILE__)."/userdic.dat";
			$fp = fopen($dicfile,'r');
			while($line = fgets($fp,64)){
				$ws = explode(' ',$line);
				$this->RankDic[strlen($ws[0])][$ws[0]] = $ws[1];
			}
			fclose($fp);
		}//�Ƿ�����ʵ䣬�������Ҫ�÷ִʹ��ܣ����Բ����롣
	}

	/**
	 * �ͷ���Դ
	 * @return  void
	 */
	function Clear(){
		unset($this->RankDic);
	}

	/**
	 * ����Դ�ַ����������utf-8����ת��ΪGBK
	 * @param	string	$str	��Ҫת�����ַ���
	 * @return  void
	 */
	 function SetSource($str){
		global $arrGWeb;
		if($arrGWeb['charset']=='utf-8') $str = check::utf82gb($str);
		$this->SourceString = $str;
		$this->ResultString = '';
	}

	/**
	 * �򵥷ִʽ����ʵ�ƥ��
	 * @param	string	$str	��Ҫת�����ַ���
	 * @return  void
	 */
	function SimpleSplit($str){
		$this->SourceString = $this->ReviseString($str);
		return $this->SourceString;
	}

	/**
	 * RMM�ִ��㷨
	 * @param	string	$str		��Ҫ�ִʵ��ַ���
	 * @param	boolean	$tryFilter	���˷��š����ֿ���
	 * @param	boolean	$tryNumName	���ֺ�������ʶ�𿪹�
	 * @param	boolean	$tryDiff	��᪴�����
	 * @return  void
	 */
	function SplitRMM($str='',$tryFilter=true,$tryNumName=true,$tryDiff=true){
		global $arrGWeb;

		$str = check::stripSymbol(trim(stripslashes(htmlspecialchars_decode($str,ENT_QUOTES))));
		//���б����жϺ�ת�봦��
		if($str!='') $this->SetSource($str);
		else return '';

		//���ı����дַ�
		$this->SourceString = preg_replace('/ {1,}/',' ',$this->ReviseString($this->SourceString));

		//���ض��ı����з���
		$arrSpwords = explode(' ',$this->SourceString);
		$intSpLen = count($arrSpwords) - 1;
		$strSpc = $this->SplitChar;

		for($i=$intSpLen;$i>=0;$i--){
			//�հ׷���
			if(ord($arrSpwords[$i][0])<33) continue;
			//С����С�ʲ�����
			else if(!isset($arrSpwords[$i][$this->MinLen])){
				if($tryFilter){
					continue;
				}
				$this->ResultString = $arrSpwords[$i].$strSpc.$this->ResultString;
			}
			//�жϿ�ͷ����0x80��Ϊ��gbk��������ΪӢ�Ĵ�(�ַ�����������)
			else if(ord($arrSpwords[$i][0])<0x81){
				$this->ResultString = $arrSpwords[$i].$strSpc.$this->ResultString;
			}
			//�����̾���зִʴ���
			else{
				$this->ResultString = $this->RunRMM($arrSpwords[$i],$tryFilter,$tryNumName,$tryDiff).$strSpc.$this->ResultString;
			}
		}

		if($arrGWeb['charset']=='utf-8') $okstr = trim(check::gb2utf8($this->ResultString));
		else $okstr = trim($this->ResultString);

		return $okstr;
	}

	/**
	 * �Գ��������ʽ���ʶ��
	 * @param	string	$str		��Ҫ�ִʵ��ַ���
	 * @return  string
	 */
	function ParNumber($str){
		if($str == '') return '';
		$ws = explode(' ',$str);
		$wlen = count($ws);
		$spc = $this->SplitChar;
		$reStr = '';
		for($i=0;$i<$wlen;$i++){
			if($ws[$i]=='') continue;
			if($i>=$wlen-1) $reStr .= $spc.$ws[$i];
			else{ $reStr .= $spc.$ws[$i]; }
		}
		return $reStr;
	}

	/**
	 * ��������ʶ�����������ʶ��
	 * @param	array	$WordArray		��������
	 * @return  string
	 */
	function ParOther($WordArray){
		$wlen = count($WordArray)-1;
		$rsStr = '';
		$spc = $this->SplitChar;
		for($i=$wlen;$i>=0;$i--){
			//������
			if(preg_match('/'.$this->CnSgNum.'/',$WordArray[$i])){
				$rsStr .= $spc.$WordArray[$i];
				if($i>0 && preg_match('/^'.$this->CommonUnit.'/',$WordArray[$i-1]) ){
					$rsStr .= $WordArray[$i-1];
					$i--;
				}else{
					while($i>0 && preg_match("/".$this->CnSgNum."/",$WordArray[$i-1]) ){
						$rsStr .= $WordArray[$i-1];
						$i--;
					}
				}
				continue;
			}
			//˫����
			if(strlen($WordArray[$i])==4 && isset($this->TwoNameDic[$WordArray[$i]])){
				$rsStr .= $spc.$WordArray[$i];
				if($i>0&&strlen($WordArray[$i-1])==2){
					$rsStr .= $WordArray[$i-1];$i--;
					if($i>0&&strlen($WordArray[$i-1])==2){
						$rsStr .= $WordArray[$i-1];
						$i--;
					}
				}
			}else if(strlen($WordArray[$i])==2 && isset($this->OneNameDic[$WordArray[$i]])){
				//������
				$rsStr .= $spc.$WordArray[$i];
				if($i>0&&strlen($WordArray[$i-1])==2){
					 if(preg_match("/".$this->EspecialChar."/",$WordArray[$i-1])) continue;
					 $rsStr .= $WordArray[$i-1];$i--;
					 if($i>0 && strlen($WordArray[$i-1])==2 && !preg_match("/".$this->EspecialChar."/",$WordArray[$i-1])){
						 $rsStr .= $WordArray[$i-1];
						 $i--;
					}
				}
			}else{
				//��ͨ�ʻ�
				$rsStr .= $spc.$WordArray[$i];
			}
		}
		//���ر��ηִʽ��
		$rsStr = preg_replace("/^".$spc."/","",$rsStr);
		return $rsStr;
	}

	/**
	 * ��ȫ�����ַ�����������ƥ�䷽ʽ�ֽ�
	 * @param	string	$str		��Ҫ�ִʵ��ַ���
	 * @param	boolean	$tryFilter	���˷��š����ֿ���
	 * @param	boolean	$tryNumName	���ֺ�������ʶ�𿪹�
	 * @param	boolean	$tryDiff	��᪴�����
	 * @return  void
	 */
	function RunRMM($str,$tryFilter=true,$tryNumName=true,$tryDiff=true){
		$strSpc = $this->SplitChar;
		$str = trim($str);
		$intSpLen = strlen($str);
		$rsStr = $okWord = $tmpWord = '';
		$WordArray = Array();
		//�����ֵ�ƥ��
		for($i=($intSpLen-1);$i>=0;){
			//��i�ﵽ��С���ܴʵ�ʱ��
			if($i<=$this->MinLen){
				if($i==1){
					$WordArray[] = substr($str,0,2);
				}else{
					$w = substr($str,0,$this->MinLen+1);
					if($this->IsWord($w)){
						$WordArray[] = $w;
					}else{
						$WordArray[] = substr($str,2,2);
						$WordArray[] = substr($str,0,2);
					}
				}
				$i = -1; break;
			}
			//��������С������ʱ�����
			if($i>=$this->MaxLen) $maxPos = $this->MaxLen;
			else $maxPos = $i;
			$isMatch = false;
			for($j=$maxPos;$j>=0;$j=$j-2){
				 $w = substr($str,$i-$j,$j+1);
				 if($this->IsWord($w)){
					$WordArray[] = $w;
					$i = $i-$j-1;
					$isMatch = true;
					break;
				 }
			}
			if(!$isMatch){
				if($i>1) {
					$WordArray[] = $str[$i-1].$str[$i];
					$i = $i-2;
				}
			}
		}//End For

		//���ֺ�������ʶ��
		if($tryNumName){
			$rsStr = $this->ParOther($WordArray);
		}else{
			$wlen = count($WordArray)-1;
			for($i=$wlen;$i>=0;$i--){
				$rsStr .= $strSpc.$WordArray[$i];
			}
		}

		//��᪴���
		if($tryDiff) $rsStr = $this->TestDiff(trim($rsStr),$tryFilter);

		//���ֻ���Ź���
		if($tryFilter) $rsStr = $this->TestFilter(trim($rsStr));

		return $rsStr;
	}

	/**
	 * �Էִʽ�����й��˵��ֺͷ��Ŵ���
	 * @param	string	$str		��Ҫ�ִʵ��ַ���
	 * @param	boolean	$tryFilter	���˷��š����ֿ���
	 * @return  string
	 */
	function TestFilter($str,$tryAll=true){
		$str = preg_replace("/ {1,}/"," ",$str);
		if($str == ""||$str == " ") return "";
		$ws = explode(' ',$str);
		$wlen = count($ws);
		$strSpc = $this->SplitChar;
		$reStr = "";
		for($i=0;$i<$wlen;$i++){
			//echo check::gb2utf8($ws[$i]).strlen(trim($ws[$i])).'<br>';
			if(strlen(trim($ws[$i]))==2){
				check::gb2utf8($ws[$i]);
				continue;
			}
			$reStr .= $strSpc.$ws[$i];
		}
		return $reStr;
	}

	/**
	 * �Էִʽ�������������崦��
	 * @param	string	$str		��Ҫ�ִʵ��ַ���
	 * @param	boolean	$tryFilter	���˷��š����ֿ���
	 * @return  string
	 */
	function TestDiff($str,$tryFilter){
		$str = preg_replace("/ {1,}/"," ",$str);
		if($str == ""||$str == " ") return "";
		$ws = explode(' ',$str);
		$wlen = count($ws);
		$strSpc = $this->SplitChar;
		$reStr = "";
		for($i=0;$i<$wlen;$i++){
			//ѭ�������һ���ʲ�����
			if($i>=($wlen-1)) {
				$reStr .= $strSpc.$ws[$i];
			}else{
				//�����ʵĴ���
				//���ʹ���
				if($ws[$i]==$ws[$i+1]){
					$reStr .= $strSpc.$ws[$i].$ws[$i+1];
					$i++;
					continue;
				}
				if(strpos(" ~!@#$%^&*()_+{}|\":<>?`-=[]\;',./ �������������������������������������������������������������ܣ�������������������������", $ws[$i])) continue;
				//���ִʺͶ����ִ�֮�����崦��
				if(strlen($ws[$i])==2 && strlen($ws[$i+1])<8 && strlen($ws[$i+1])>2){
					$addw = $ws[$i].$ws[$i+1];
					$t = 6;
					$testok = false;
					while($t>=4){
						$w = substr($addw,0,$t);
						if($this->IsWord($w) && ($this->GetRank($w) > $this->GetRank($ws[$i+1])*2) ){
						   $limitW = substr($ws[$i+1],strlen($ws[$i+1])-$t-2,strlen($ws[$i+1])-strlen($w)+2);
						   if($limitW!="") $reStr .= $strSpc.$w.$strSpc.$limitW;
						   else $reStr .= $strSpc.$w;
						   $testok = true;
						   break;
						}
						$t = $t-2;
					}
					if(!$testok) $reStr .= $strSpc.$ws[$i];
					else $i++;
				}else if(strlen($ws[$i])>2 && strlen($ws[$i])<8 && strlen($ws[$i+1])>2 && strlen($ws[$i+1])<8){
					//ǰ���Ϊ���ֵ����ֵĴʽ��н�����崦��
					$t21 = substr($ws[$i+1],0,2);
					$t22 = substr($ws[$i+1],0,4);
					//�����һ���ʽ���һ���ʵ�����Ϊ��
					if($this->IsWord($ws[$i].$t21)){
						if(strlen($ws[$i])==6||strlen($ws[$i+1])==6){
							$reStr .= $strSpc.$ws[$i].$t21.$strSpc.substr($ws[$i+1],2,strlen($ws[$i+1])-2);
							$i++;
						}else{
							$reStr .= $strSpc.$ws[$i];
						}
					}else if(strlen($ws[$i+1])==6){
						//������һ����Ϊ3�ִʻ�2�ִʽ��в�ͬ�Ĵ���
						if($this->IsWord($ws[$i].$t22)){
							$reStr .= $strSpc.$ws[$i].$t22.$strSpc.$ws[$i+1][4].$ws[$i+1][5];
							$i++;
						}else{
							$reStr .= $strSpc.$ws[$i];
						}
					}else if(strlen($ws[$i+1])==4){
						//���ִʽ���ʶ�������ѡ��
						$addw = $ws[$i].$ws[$i+1];
						$t = strlen($ws[$i+1])-2;
						$testok = false;
						while($t>0){
							$w = substr($addw,0,strlen($ws[$i])+$t);
							if($this->IsWord($w) && ($this->GetRank($w) > $this->GetRank($ws[$i+1])*2) ){
								$limitW = substr($ws[$i+1],$t,strlen($ws[$i+1])-$t);
								if($limitW!="") $reStr .= $strSpc.$w.$strSpc.$limitW;
								else $reStr .= $strSpc.$w;
								$testok = true;
								break;
							}
							$t = $t-2;
						}
						if(!$testok) $reStr .= $strSpc.$ws[$i];
						else $i++;
					}else {
						$reStr .= $strSpc.$ws[$i];
					}
				}else{
					//�������ִʻ�С�ڶ��ֵĴʲ�������
					$reStr .= $strSpc.$ws[$i];
				}
			}
		}//End For
		return $reStr;
	}

	/**
	 * �жϴʵ����Ƿ����ĳ����
	 * @param	string	$okWord		��Ҫ�жϵĵ���
	 * @return  string
	 */
	function IsWord($okWord){
		$slen = strlen($okWord);
		if($slen > $this->MaxLen) return false;
		else return isset($this->RankDic[$slen][$okWord]);
	}

	/**
	 * �Ա����ţ���Ӣ�Ļ��ŵȳ�������
	 * @param	string	$str		��Ҫ�ִʵ��ַ���
	 * @return  string
	 */
	function ReviseString($str){
		$strSpc = $this->SplitChar;
		$slen = strlen($str);
		if($slen==0) return '';
		$okstr = '';
		$prechar = 0; // 0-�հ� 1-Ӣ�� 2-���� 3-����
		for($i=0;$i<$slen;$i++){
			if(ord($str[$i]) < 0x81){
				//Ӣ�ĵĿհ׷���
				if(ord($str[$i]) < 33){
					//$str[$i]!="\r"&&$str[$i]!="\n"
					if($prechar!=0) $okstr .= $strSpc;
					$prechar=0;
					continue;
				}else if(preg_match("/[^0-9a-zA-Z@\.%#:\\/\\&_-]/",$str[$i])){
					if($prechar==0){
						$okstr .= $str[$i];
						$prechar=3;
					}else{
						$okstr .= $strSpc.$str[$i];
						$prechar=3;
					}
				}else{
					if($prechar==2||$prechar==3){
						$okstr .= $strSpc.$str[$i];
						$prechar=1;
					}else{
						if(preg_match("/@#%:/",$str[$i])){
							$okstr .= $str[$i];
							$prechar=3;
						}else{
							$okstr .= $str[$i];
							$prechar=1;
						}
					}
				}
			}else{
				//�����һ���ַ�Ϊ�����ĺͷǿո����һ���ո�
				if($prechar!=0 && $prechar!=2) $okstr .= $strSpc;
				//��������ַ�
				if(isset($str[$i+1])){
					$c = $str[$i].$str[$i+1];

					if(preg_match("/".$this->CnNumber."/",$c)){
					  $okstr .= check::SBC2DBC($c);
					  $prechar = 2;
					  $i++;
					  continue;
					}

					$n = hexdec(bin2hex($c));
					if($n>0xA13F && $n < 0xAA40){
						if($c=="��"){
							if($prechar!=0) $okstr .= $strSpc." ��";
							else $okstr .= " ��";
							$prechar = 2;
						}else if($c=="��"){
							$okstr .= "�� ";
							$prechar = 3;
						}else{
							if($prechar!=0) $okstr .= $strSpc.$c;
							else $okstr .= $c;
							$prechar = 3;
						}
					}else{
						$okstr .= $c;
						$prechar = 2;
					}
					$i++;
				}
			}//�����ַ�
		}//����ѭ��
		return $okstr;
	}

	/**
	 * ��ȥ�ִ��е��ظ��ʣ����������ַ������ַ�������Ϊ�Ѿ��ִʴ���Ĵ�
	 * @param	string	$str		��Ҫ�ִʵ��ַ���
	 * @return  string
	 */
	function GetIndexText($str,$ilen=-1){
		global $arrGWeb;
		if($str=='') return '';
		else $this->SplitRMM($str,true,true);
		$okstr = $this->ResultString;
		$ws = explode(' ',$okstr);
		$okstr = $wks = '';
		foreach($ws as $w){
			$w = trim($w);
			//�ų�С��2���ַ�
			if(strlen($w)<2) continue;
			//�ų����ֻ�����
			if(!preg_match("/[^0-9:-]/",$w)) continue;
			if(strlen($w)==2&&ord($w[0])>0x80) continue;
			if(isset($wks[$w])) $wks[$w]++;
			else $wks[$w] = 1;
		}
		if(is_array($wks)){
			arsort($wks);
			if($ilen==-1){
				foreach($wks as $w=>$v){
					if($this->GetRank($w)>500) $okstr .= $w." ";
				}
			}else{
				foreach($wks as $w=>$v){
					if((strlen($okstr)+strlen($w)+1)<$ilen) $okstr .= $w." ";
					else break;
				}
			}
		}
		if($arrGWeb['charset']=='utf-8') $okstr = check::gb2utf8($okstr);
		return trim($okstr);
	}

	/**
	 * ��ôʵĴ�Ƶ
	 * @param	string	$word		����
	 * @return  int
	 */
	function GetRank($word){
		if(isset($this->RankDic[strlen($word)][$word])) return $this->RankDic[strlen($word)][$word];
		else return 0;
	}

}
?>