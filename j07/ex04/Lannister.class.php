<?PHP
Class Lannister
{
	public function sleepWith($name)
	{
		if (get_class($name) === 'Tyrion' || get_class($name) === 'Jaime')
			print("Not even if I'm drunk !".PHP_EOL);
		else if (get_class($name) === 'Sansa')
			print("Let's do this.".PHP_EOL);
	}
}
