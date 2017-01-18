<?PHP
Class UnholyFactory
{
	public $fighters = array();

	public function absorb($fighter)
	{
		if (get_parent_class($fighter) === 'Fighter')
		{
			$type = $fighter->fighterType;
			if (in_array($type, $this->fighters) === FALSE)
			{
				$this->fighters[] = $fighter;
				print("(Factory absorbed a fighter of type $type)".PHP_EOL);
			}
			else
				print("(Factory already absorbed a fighter of type $type)".PHP_EOL);
		}
		else
			print("(Factory can't absorb this, it's not a fighter".PHP_EOL);
	}

	public function fabricate($req)
	{
		foreach ($this->fighters as $f)
			if ($f->fighterType === $req)
			{
				print("(Factory fabricates a fighter of type $req)".PHP_EOL);
				$out = get_class($f);
				return (new $out);
			}
		print("(Factory hasn't absorbed any fighter of type $req)".PHP_EOL);
	}
}
?>
