<?php
// Crear una Clase

class miClase
{
	//propiedades
	public $miPropiedad='esto variable';
	
	
	//metodos
	public function miMetodo()
	{
		echo 'Hola Mundo';
		return NULL;
	}
	
}
$miObjeto =new miClase();
$miObjeto->miMetodo();
echo '</br>';
echo $miObjeto->miPropiedad;
$miObjeto->miPropiedad ='otra cosa';
echo '</br>';
echo $miObjeto->miPropiedad;
echo '</br>';
$miObjeto2=new miClase();
echo $miObjeto2->miPropiedad;
echo '</br>';
class A
{
	function foo()
	{
		if (isset($this)) {
			echo '$this is defined (';
			echo get_class($this);
			echo ")\n";
		} 
		else 
		{
			echo "\$this is not defined.\n";
		}
	}
}
$objeto1=new A;
$objeto1->foo();
echo '</br>';

class SimpleClass
{
	// invalid member declarations:
// 	public $var1 = 'hello '.'world';
// 	public $var2 = <<<EOD
// hello world
// EOD;
// 	public $var3 = 1+2;
// 	public $var4 = self::myStaticMethod();
// 	public $var5 = $myVar;
	
	// valid member declarations:
	//define('myConstant','mivalor'); // esto no se puede hacer
	public $pi = 3.141856;
	public $var6 = myConstant;
	//public $var7 = self::pi;
	public $var8 = array(true, false);
	function displayVar2()
	{
		echo "Simple class\n";
		return;
	}
}
$objeto2=new SimpleClass;
echo $objeto2 ->pi;
echo '</br>';
//echo $objeto2 ->var7;

class ExtendClass extends SimpleClass
{
	// Redefine the parent method
	function displayVar()
	{
		echo "Extending class\n";
		parent::displayVar2();
	}
}
$extended = new ExtendClass();
$extended->displayVar();
$extended->displayVar2();

echo "<hr/>";
echo "<hr/>";
echo "<hr/>";

class MyDestructableClass {
	function __construct() {
		print "In constructor\n";
		$this->name = "MyDestructableClass";
	}

	function __destruct() {
		print "Destroying " . $this->name . "\n";
	}
}
	$obj = new MyDestructableClass();	
	echo "<hr/>";
	echo "<hr/>";
	echo "<hr/>";
	
	class MyClass
	{
		public $public = 'Public';
		protected $protected = 'Protected';
		private $private = 'Private';
		function printHello()
		{
			echo $this->public;
			echo $this->protected;
			echo $this->private;
		}
	}
	$obje=new MyClass();
	//echo $obje->private;
	$obje->printHello();
	echo "<hr/>";
	echo "<hr/>";
	echo "<hr/>";

?>


