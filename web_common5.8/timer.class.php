<?php
class timer {
	var $StartTime = 0;
	var $StopTime = 0;
	var $StepStartTime = 0;
	var $StepStopTime = 0;

	function get_microtime(){
		list($usec, $sec) = explode(' ', microtime());
		return ((float)$usec + (float)$sec);
	}

	function start(){
		$this->StartTime = $this->get_microtime();
		$this->StepStartTime = $this->StartTime;
	}

	function stop(){
		$this->StopTime = $this->get_microtime();
		$this->StepStopTime = $this->StopTime;
	}

	function stepSpend(){
		$this->StepStopTime = $this->get_microtime();
		$intTemp = round(($this->StepStopTime - $this->StepStartTime) , 6);
		$this->StepStartTime = $this->StepStopTime;
		return $intTemp;
	}

	function spend(){
		return round(($this->StopTime - $this->StartTime) , 6);
	}

	function show(){
		echo "页面执行时间: ".$this->spent()." 秒<br>";
	}

	function stepShow(){
		echo "步骤执行时间: ".$this->stepSpend()." 秒<br>";
	}
}
/*
   $timer = new timer;
   $timer->start();

   $a = 0;
   for($i=0; $i<1000000; $i++)
   {
   $a += $i;
    }

   $timer->stop();
   echo "页面执行时间: ".$timer->spend()." 毫秒";
*/
?>