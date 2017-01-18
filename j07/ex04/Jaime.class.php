<?PHP
Class Jaime extends Lannister
{
	public function sleepWith($name)
	{
		parent::sleepWith($name);
		if (get_class($name) === 'Cersei')
			print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
	}
}
