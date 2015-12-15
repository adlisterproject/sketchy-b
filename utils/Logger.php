<?php
class Log 
{
	private $filename = '';
	private $handle = '';

	public function __construct()
	{
		$this->setFilename();
		$this->setHandle();
	}

	protected function setFilename($prefix = 'log')
	{
		$this->filename = "../utils/data/". $prefix . date('Y-m-d') . ".log";
	}

	protected function setHandle()
	{
		$this->handle = fopen($this->filename, 'a');
	}

	public function logMessage($logLevel, $message)
	{
		$strToWrite = date('Y-m-d H:i:s') . "  [{$logLevel}]\t" . $message . PHP_EOL;
		fwrite($this->handle, $strToWrite);
	}

	public function info($message)
	{
		return $this->logMessage('INFO', $message);
	}

	public function error($message)
	{
		return $this->logMessage('ERROR', $message);
	}

	public function __destructor()
	{
		fclose($this->handle);
	}
}
?>