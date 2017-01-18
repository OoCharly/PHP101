<?PHP
Class Tyrion extends Lannister
{
	public function sleepWith($name)
	{
		parent::sleepWith($name);
		if (get_class($name) === 'Cersei')
			print("Not even if I'm drunk !".PHP_EOL);
	}
}
