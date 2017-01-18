<?PHP
Class Vector
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	static $verbose = FALSE;

	function getX()	{return ($this->_x);}
	function getY() {return ($this->_y);}
	function getZ() {return ($this->_z);}
	function getW()	{return ($this->_w);}

	function __toString()
	{
		sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	function __destruct()
	{
		if (self::$verbose === TRUE)
			print("$this destructed".PHP_EOL);
	}

	function __construct(array $coor)
	{
		if (array_key_exists('orig', $coor))
			$coor['orig'] = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$this->_x = $coor['dest']->getX/$coor['dest']->getW) - $coor['orig']->getX()/$coor['orig']->getW());
		$this->_y = $coor['dest']->getY/$coor['dest']->getW) - $coor['orig']->getY()/$coor['orig']->getW());
		$this->_z = $coor['dest']->getZ/$coor['dest']->getW) - $coor['orig']->getZ()/$coor['orig']->getW());
		if (self::$verbose === TRUE)
			print("$this constructed".PHP_EOL);
	}

	public function magnitude()
	{
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
	}

}
?>
