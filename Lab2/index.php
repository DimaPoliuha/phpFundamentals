<html>
	<head>
		<title>OOP in php</title>
	</head>
	<body>
		<p>
			<?php
				interface ICreature{

					public function hobby();

					public function breathe();
				}

				trait Human {

					public static function greet(){
						echo "Hello, World!";
					}

					public static function sleep(){
						echo "Zzzz...";
					}
				 }

				class Person implements ICreature{
					use Human;

					protected $name;
					protected $age;
					public static $isAlive = true;
							
					function __construct($name, $age) {
						$this->name = $name;
						$this->age = $age;
					}

					public function __get($property){
						if (property_exists($this, $property)) {
							return $this->$property;
						}
					}

					public function __set($property, $value){
						if (property_exists($this, $property)) {
							$this->$property = $value;
						}
					}

					public function __toString()
					{
						return $this->name;
					}

					public function  __isset($property){
						return isset($this->$property);
					}

					public function __invoke($x) {//like func
						echo "Number/text countains of ".strlen($x)." symbols\n";
					}

					public function __call($name, $arguments) {
						echo "Call method '$name' with arguements (". implode(', ', $arguments). ")\n";
					}
							
					public function hobby() {
						return "I love ...";
					}

					public function breathe(){
						echo "Hhhh....";
					}
				}

				class Dancer extends Person{
					function __construct($name, $age){
						parent::__construct($name, $age);
					}
					public function hobby() {
						return "dance!";
					}
				}
				
				class Singer extends Person{
					private $salary;
				
					function __construct($name, $age, $salary){
						parent::__construct($name, $age);
						$this->salary = $salary;
					}

					public function hobby() {
						return "sing!";
					}

				}
				
						
				$me = new Singer("Shane", 12, 2000);
				
				if(Person::$isAlive){
					echo Person::greet();
				}

				//which we use to find out if a particular object is an instance of a given class
				if (is_a($me, "Person")) {
					echo "I'm a person, ";
				}
				//to see if an object has a given property
				if (property_exists($me, "name")) {
					//to see if an object has a given property (magic method)
					if( isset($me->name) ){
						echo "I have a name, ";
						//getter (magic method)
						echo $me->name;
					}
				}
				//to see if an object has a given method
				if (method_exists($me, "hobby")) {
					echo " and I know how to ";
					echo $me->hobby();
				}
				echo "<h1>$me</h1>";
				//setter (magic method)
				$me->age = 15;
				echo '<h3>______________________________</h3>';
				$me('fwefwe');
				echo '<h3>______________________________</h3>';
				$me->hoby(12,43);
			?>
			<h1>Singleton</h1>
			<?php
				class mySingleton{
					public $time;
					static private $instance;

					public static function getInstance() 
					{        
						if(empty(self::$instance))  
							self::$instance = new self;
						
						return self::$instance;
					}    
						
					private function __construct()
					{
						$this->time = date("l dS F Y H:i:s");
					}
					
					private function __clone(){}

					function __invoke(){}
				}

				$obj = mySingleton::getInstance();
				echo $obj->time;
				
				echo '<br>';
				sleep(1);
				
				$obj1 = mySingleton::getInstance();
				echo $obj1->time;	

				$Object2 = new mySingleton();
			?>
		</p>
	</body>
</html>