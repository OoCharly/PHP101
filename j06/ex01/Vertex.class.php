<?PHP
Class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	public static $verbose = FALSE;

	function getX()	{return ($this->_x);}
	function getY() {return ($this->_y);}
	function getZ() {return ($this->_z);}
	function getW()	{return ($this->_w);}
	function getColor()	{return ($this->_color);}
	function setX($value) {$this->_x = $floatval($value);}
	function setY($value) {$this->_y = $floatval($value);}
	function setZ($value) {$this->_z = $floatval($value);}
	function setW($value) {$this->_w = $floatval($value);}
	function setColor(Color $color)	{$this->_color = $color;}

	function __construct(array $ar)
	{
		$this->_x = $ar['x'];
		$this->_y = $ar['y'];
		$this->_z = $ar['z'];
		if (array_key_exists('w', $ar) === TRUE)
			$this->_w = $ar['w'];
		if (array_key_exists('color', $ar) === TRUE)
			$this->_color = $ar['color'];
		else
			$this->_color = new Color(array('rgb' => 0xffffff));
		if (self::$verbose === TRUE)
			print("$this constructed".PHP_EOL);
	}

	function __destruct()
	{
		if (self::$verbose)
			print("$this destructed".PHP_EOL);
	}

	function __toString()
	{
		if (self::$verbose)
			return ('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', '.$this->_color.' )');	
		else
			return ('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).' )');
	}

	static function doc()
	{
		print(file_get_contents('Vertex.doc.txt').PHP_EOL);
	}
}
