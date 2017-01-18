<?PHP
abstract Class House
{
	public function introduce()
	{
		print("House ".$this->getHouseName()." of ".$this->getHouseSeat()." : \"".$this->getHouseMotto()."\"".PHP_EOL);
	}

	abstract public function getHouseName();
	abstract public function getHouseSeat();
	abstract public function getHouseMotto();
}
?>
