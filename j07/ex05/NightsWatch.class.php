<?PHP
Class NightsWatch
{
	public $f = array();

	public function recruit($name)
	{
		$this->f[] = $name;
	}

	public function fight()
	{
		foreach ($this->f as $fighter)
		{
			if ($fighter Instanceof IFighter)
				$fighter->fight();
		}
	}
}
?>
