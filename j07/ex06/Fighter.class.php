<?PHP
abstract Class Fighter
{
	public	$fighterType;

	public function __construct($type)
	{
		$this->fighterType = $type;
	}

	abstract public function fight($target);
}
?>
