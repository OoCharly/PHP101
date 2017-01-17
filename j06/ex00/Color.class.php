<?PHP
Class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	function __construct(array $colargs)
	{
		if (array_key_exists('rgb', $colargs))
		{
			$this->red = intval(($colargs['rgb'] >> 16) & 0xFF);
			$this->green = intval(($colargs['rgb'] >> 8) & 0xFF);
			$this->blue = intval(($colargs['rgb']) & 0xFF);
		}
		else
		{
			if (array_key_exists('red', $colargs))
				$this->red = intval($colargs['red']);
			if (array_key_exists('green', $colargs))
				$this->green = intval($colargs['green']);
			if (array_key_exists('blue', $colargs))
				$this->blue = intval($colargs['blue']);
		}
		if (self::$verbose === TRUE)
			echo "$this constructed.\n";
	}
	static function doc()
	{
		print(file_get_contents('Color.doc.txt').PHP_EOL);
	}
	function __destruct()
	{
		if (self::$verbose === TRUE)
			echo "$this destructed.\n";
	}

	function __toString() 
	{
		return sprintf("Color( red: %3.3s, green: %3.3s, blue: %3.3s )", $this->red, $this->green, $this->blue);
	}

	function add(Color $color)
	{
		$out = new Color(array(
			'red' => $this->red + $color->red,
			'green' => $this->green + $color->green,
			'blue' => $this->blue + $color->blue));
		return $out;
	}

	function sub(Color $color)
	{
		$out = new Color(array(
			'red' => $this->red - $color->red,
			'green' => $this->green - $color->green,
			'blue' => $this->blue - $color->blue));
		return $out;
	}

	function mult($factor)
	{
		$out = new Color(array(
			'red' => $this->red * $factor,
			'green' => $this->green * $factor,
			'blue' => $this->blue * $factor));
		return $out;
	}

}
