<?php
//phpinfo();
//var_dump(1111);

//$a = 2 ;
//$b = -2 ;
//echo $a <=> $b;
//var_dump(0 == 'a');
//var_dump((int) 'abc');
//$b = 1;
//var_dump($a??$b??$c);

//$a_bool = TRUE;   // 布尔值 boolean
//$a_str  = "foo";  // 字符串 string
//$a_str2 = 'foo';  // 字符串 string
//$an_int = 12;     // 整型 integer
//
//echo gettype($a_bool); // 输出:  boolean
//echo gettype($a_str);  // 输出:  string
//echo gettype($a_str2);
//echo gettype($an_int);
//
//// 如果是整型，就加上 4
//if (is_int($an_int)) {
//    $an_int += 4;
//}
//
//// 如果 $bool 是字符串，就打印出来
//// (啥也没打印出来)
//if (is_string($a_bool)) {
//    echo "String: $a_bool";
//}
//
//if (is_bool($a_bool)){
//    echo "Boolean: $a_bool";
//}

//$action = "show_version";
//$show_separators = true;
//
//// == 是一个操作符，它检测两个变量是否相等，并返回一个布尔值
//if ($action == "show_version") {
//    echo "The version is 1.23";
//}
//
//// 这样做是不必要的...
//if ($show_separators == TRUE) {
//    echo "<hr>\n";
//}
//
//// ...因为可以使用下面这种简单的方式：
//if ($show_separators) {
//    echo "<hr>\n";
//}

//var_dump((bool) "");        // bool(false)
//var_dump((bool) 1);         // bool(true)
//var_dump((bool) -2);        // bool(true)
//var_dump((bool) "foo");     // bool(true)
//var_dump((bool) 2.3e5);     // bool(true)
//var_dump((bool) array(12)); // bool(true)
//var_dump((bool) array());   // bool(false)
//var_dump((bool) "false");   // bool(true)

//$a = 1234; // 十进制数
//$a = -123; // 负数
//$a = 0123; // 八进制数 (等于十进制 83)
//$a = 0x1A; // 十六进制数 (等于十进制 26)
//$a = 0b11111111; // 二进制数字 (等于十进制 255)

//$large_number = 9223372036854775807;
//var_dump($large_number);                     // int(9223372036854775807)
//
//$large_number = 9223372036854775808;
//var_dump($large_number);                     // float(9.2233720368548E+18)
//
//$million = 1000000;
//$large_number =  50000000000000 * $million;
//var_dump($large_number);                     // float(5.0E+19)


//var_dump(25/7);         // float(3.5714285714286)
//var_dump((int) (25/7)); // int(3)
//var_dump(round(25/7));  // float(4)

//echo (int) ( (0.1+0.7) * 10 );

//$a = 1.23456789;
//$b = 1.23456780;
//$epsilon = 0.00001;
//
//if(abs($a-$b) < $epsilon) {
//    echo "true";
//}

//echo 'this is a simple string';
//
//// 可以录入多行
//echo 'You can also have embedded newlines in
//strings this way as it is
//okay to do';
//
//// 输出： Arnold once said: "I'll be back"
//echo 'Arnold once said: "I\'ll be back"';
//
//// 输出： You deleted C:\*.*?
//echo 'You deleted C:\\*.*?';
//
//// 输出： You deleted C:\*.*?
//echo 'You deleted C:\*.*?';
//
//// 输出： This will not expand: \n a newline
//echo 'This will not expand: \n a newline';
//
//// 输出： Variables do not $expand $either
//echo 'Variables do not $expand $either';




//$str = <<<EOD
//Example of string
//spanning multiple lines
//using heredoc syntax.
//EOD;
//
///* 含有变量的更复杂示例 */
//class foo
//{
//    var $foo;
//    var $bar;
//
//    function foo()
//    {
//        $this->foo = 'Foo';
//        $this->bar = array('Bar1', 'Bar2', 'Bar3');
//    }
//}
//
//$foo = new foo();
//$name = 'MyName';
//
//echo <<<EOT
//My name is "$name". I am printing some $foo->foo.
//Now, I am printing some {$foo->bar[1]}.
//This should print a capital 'A': \x41
//EOT;


//$juices = array("apple", "orange", "koolaid1" => "purple");
//
//echo "He drank some $juices[0] juice.".PHP_EOL;
//echo "He drank some $juices[1] juice.".PHP_EOL;
//echo "He drank some juice made of $juices[0]s.".PHP_EOL; // Won't work
//echo "He drank some $juices[koolaid1] juice.".PHP_EOL;
//echo "He drank some {$juices['koolaid1']} juice".PHP_EOL;
//class people {
//    public $john = "John Smith";
//    public $jane = "Jane Smith";
//    public $robert = "Robert Paulsen";
//
//    public $smith = "Smith";
//}
//
//$people = new people();
//
//echo "$people->john drank some $juices[0] juice.".PHP_EOL;
//echo "$people->john then said hello to $people->jane.".PHP_EOL;
//echo "$people->john's wife greeted $people->robert.".PHP_EOL;
//echo "$people->robert greeted the two $people->smith."; // Won't work



//$great = 'fantastic';
//
//// 无效，输出: This is { fantastic}
//echo "This is { $great}";
//
//// 有效，输出： This is fantastic
//echo "This is {$great}";
//echo "This is ${great}";
//
//// 有效
//echo "This square is {$square->width}00 centimeters broad.";
//
//// 有效，只有通过花括号语法才能正确解析带引号的键名
//echo "This works: {$arr['key']}";
//
//// 有效
//echo "This works: {$arr[4][3]}";
//
//// 这是错误的表达式，因为就象 $foo[bar] 的格式在字符串以外也是错的一样。
//// 换句话说，只有在 PHP 能找到常量 foo 的前提下才会正常工作；这里会产生一个
//// E_NOTICE (undefined constant) 级别的错误。
//echo "This is wrong: {$arr[foo][3]}";
//
//// 有效，当在字符串中使用多重数组时，一定要用括号将它括起来
//echo "This works: {$arr['foo'][3]}";
//
//// 有效
//echo "This works: " . $arr['foo'][3];

//echo "This works too: {$obj->values[3]->name}";
//
//echo "This is the value of the var named $name: {${$name}}";
//
//echo "This is the value of the var named by the return value of getName(): {${getName()}}";
//
//echo "This is the value of the var named by the return value of \$object->getName(): {${$object->getName()}}";
//
//// 无效，输出： This is the return value of getName(): {getName()}
//echo "This is the return value of getName(): {getName()}";



//$str = 'abc';
//
//var_dump($str['1']);
//var_dump(isset($str['1']));
//
//var_dump($str['1.0']);
//var_dump(isset($str['1.0']));
//
//var_dump($str['x']);
//var_dump(isset($str['x']));
//
//var_dump($str['1x']);
//var_dump(isset($str['1x']));

//$foo = 1 + "10.5";                // $foo is float (11.5)
//var_dump($foo);
//$foo = 1 + "-1.3e3";              // $foo is float (-1299)
//var_dump($foo);
//$foo = 1 + "bob-1.3e3";           // $foo is integer (1)
//var_dump($foo);
//$foo = 1 + "bob3";                // $foo is integer (1)
//var_dump($foo);
//$foo = 1 + "10 Small Pigs";       // $foo is integer (11)
//var_dump($foo);
//$foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2)
//var_dump($foo);
//$foo = "10.0 pigs " + 1;          // $foo is float (11)
//var_dump($foo);
//$foo = "10.0 pigs " + 1.0;        // $foo is float (11)
//var_dump($foo);

//function getArray() {
//    return array(1, 2, 3);
//}
//
//// on PHP 5.4
//$secondElement = getArray()[1];
//var_dump($secondElement);
//
//// previously
//$tmp = getArray();
//$secondElement = $tmp[1];
//var_dump($secondElement);
//
//// or
//list(, $secondElement, $thirdElement) = getArray();
//var_dump($secondElement);
//var_dump($thirdElement);

//$arr = array(5 => 1, 12 => 2);
//
//$arr[] = 56;    // This is the same as $arr[13] = 56;
//// at this point of the script
//
//$arr["x"] = 42; // This adds a new element to
//// the array with key "x"
//
//var_dump($arr);
//unset($arr[5]); // This removes the element from the array
//var_dump($arr);
//unset($arr);    // This deletes the whole array
//var_dump($arr);

//// 创建一个简单的数组
//$array = array(1, 2, 3, 4, 5);
//print_r($array);
//
//// 现在删除其中的所有元素，但保持数组本身不变:
//foreach ($array as $i => $value) {
//    unset($array[$i]);
//}
//print_r($array);
//
//// 添加一个单元（注意新的键名是 5，而不是你可能以为的 0）
//$array[] = 6;
//print_r($array);
//
//// 重新索引：
//$array = array_values($array);
//$array[] = 7;
//print_r($array);



//// An example callback function
//function my_callback_function() {
//    echo 'hello world!';
//}
//
//// An example callback method
//class MyClass {
//    static function myCallbackMethod() {
//        echo 'Hello World!';
//    }
//}
//
//// Type 1: Simple callback
//call_user_func('my_callback_function');
//
//// Type 2: Static class method call
//call_user_func(array('MyClass', 'myCallbackMethod'));
//
//// Type 3: Object method call
//$obj = new MyClass();
//call_user_func(array($obj, 'myCallbackMethod'));
//
//// Type 4: Static class method call (As of PHP 5.2.3)
//call_user_func('MyClass::myCallbackMethod');
//
//// Type 5: Relative static class method call (As of PHP 5.3.0)
//class A {
//    public static function who() {
//        echo "A\n";
//    }
//}
//
//class B extends A {
//    public static function who() {
//        echo "B\n";
//    }
//}
//
//call_user_func(array('B', 'parent::who')); // A
//
//// Type 6: Objects implementing __invoke can be used as callables (since PHP 5.3)
//class C {
//    public function __invoke($name) {
//        echo 'Hello ', $name, "\n";
//    }
//}
//
//$c = new C();
//call_user_func($c, 'PHP!');


// Our closure

// This is our range of numbers
//$numbers = range(1, 5);
//
//// Use the closure as a callback here to
//// double the size of each element in our
//// range
//$new_numbers = array_map(function($a) {
//    return $a * 2;
//}, $numbers);
//
//print implode(' ', $new_numbers);

//var_dump(function ($num){return $num * 2;});

//function test()
//{
//    static $count = 0;
//
//    $count++;
//    echo $count;
//    if ($count < 10) {
//        test();
//    }
//    $count--;
//}
//
//test();

//$a = 2; $b = 2;
//echo $a ** $b;


//// Integers
//echo 1 <=> 1; // 0
//echo 1 <=> 2; // -1
//echo 2 <=> 1; // 1
//
//// Floats
//echo 1.5 <=> 1.5; // 0
//echo 1.5 <=> 2.5; // -1
//echo 2.5 <=> 1.5; // 1
//
//// Strings
//echo "a" <=> "a"; // 0
//echo "a" <=> "b"; // -1
//echo "b" <=> "a"; // 1
//
//echo "a" <=> "aa"; // -1
//echo "zz" <=> "aa"; // 1
//
//// Arrays
//echo [] <=> []; // 0
//echo [1, 2, 3] <=> [1, 2, 3]; // 0
//echo [1, 2, 3] <=> []; // 1
//echo [1, 2, 3] <=> [1, 2, 1]; // 1
//echo [1, 2, 3] <=> [1, 2, 4]; // -1
//
//// Objects
//$a = (object) ["a" => "b"];
//$b = (object) ["a" => "b"];
//echo $a <=> $b; // 0
//
//$a = (object) ["a" => "b"];
//$b = (object) ["a" => "c"];
//echo $a <=> $b; // -1
//
//$a = (object) ["a" => "c"];
//$b = (object) ["a" => "b"];
//echo $a <=> $b; // 1
//
//// only values are compared
//$a = (object) ["a" => "b"];
//$b = (object) ["b" => "b"];
//echo $a <=> $b; // 1


//$a = array("a" => "apple", "b" => "banana");
//$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");
//
//$c = $a + $b; // Union of $a and $b
//echo "Union of \$a and \$b: \n";
//var_dump($c);
//
//$c = $b + $a; // Union of $b and $a
//echo "Union of \$b and \$a: \n";
//var_dump($c);
//
//$a += $b; // Union of $a += $b is $a and $b
//echo "Union of \$a += \$b: \n";
//var_dump($a);


//$a = array("a" => array("apple","orange"), "b" =>array("banana"));
//
//foreach ($a as $key => list($val1,$val2)){
//    echo $key .' '.$val1.' '.$val2.PHP_EOL;
//}

//function makecoffee($type = "cappuccino")
//{
//    return "Making a cup of $type.\n";
//}
//echo makecoffee();
//echo makecoffee(null);
//echo makecoffee("espresso");

//function makecoffee($types = array("cappuccino"), $coffeeMaker = NULL)
//{
//    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
//    return "Making a cup of ".join(", ", $types)." with $device.\n";
//}
//echo makecoffee();
//echo makecoffee(array("cappuccino", "lavazza"), "teapot");


//class C {}
//class D extends C {}
//
//// This doesn't extend C.
//class E {}
//
//function f(C $c) {
//    echo get_class($c)."\n";
//}
//
//f(new C);
//f(new D);
//f(new E);


//declare(strict_types=1);
//
//function sum(int $a, int $b) {
//    return $a + $b;
//}
//
//try {
//    var_dump(sum(1, 2));
//    var_dump(sum(1.5, 2.5));
//} catch (TypeError $e) {
//    echo 'Error: '.$e->getMessage();
//}


//function sum(... $numbers){
//    return array_sum($numbers);
//}
//
////function sum(...$numbers) {
////    $acc = 0;
////    foreach ($numbers as $n) {
////        $acc += $n;
////    }
////    return $acc;
////}
//
//echo sum(1, 2, 3, 4);



//function add($a, $b, $c) {
//    return $a + $b + $c;
//}
//
//echo add(...[1, 2, 3, 4, 5, 6])."\n";
//
//$a = range(1,3);
//echo add(...$a);


//function total_intervals($unit, DateInterval ...$intervals) {
//    $time = 0;
//    foreach ($intervals as $interval) {
//        $time += $interval->$unit;
//    }
//    return $time;
//}
//
//$a = new DateInterval('P1D');
//$b = new DateInterval('P2D');
//echo total_intervals('d', $a, $b).' days';
//
//// This will fail, since null isn't a DateInterval object.
//echo total_intervals('d', null);

//declare(strict_types=1);

//declare(strict_types=1);
//
//function sum($a, $b): int {
//    return $a + $b;
//}
//
//var_dump(sum(1, 2));
//var_dump(sum(1, 2.5));
//echo PHP_VERSION.PHP_EOL;
//class Foo
//{
//    static function bar()
//    {
//        echo "bar\n";
//    }
//    function baz()
//    {
//        echo "baz\n";
//    }
//}
//
//$func = array("Foo", "bar");
//$func(); // prints "bar"
//$func = array(new Foo, "baz");
//$func(); // prints "baz"
//$func = "Foo::bar";
//$func(); // prints "bar" as of PHP 7.0.0; prior, it raised a fatal error


//echo preg_replace_callback('~-([a-z])~', function ($match) {
//    var_dump($match);
//    return strtoupper($match[1]);
//}, 'hello-world');

//$greet = function($name)
//{
//    printf("Hello %s\r\n", $name);
//};
//
//$greet('World');
//$greet('PHP');



//$message = 'hello';
//
//// 继承 $message
//$example = function () use ($message) {
//    var_dump($message);
//};
//$example();
//
//// Inherited variable's value is from when the function
//// is defined, not when called
//$message = 'world';
//$example();
//
//// Reset message
//$message = 'hello';
//
//$example();
//
//// The changed value in the parent scope
//// is reflected inside the function call
//$message = 'world';
//$example();
//
//// Closures can also accept regular arguments
//$example = function ($arg) use ($message) {
//    var_dump($arg . ' ' . $message);
//};
//$example("hello");

// 一个基本的购物车，包括一些已经添加的商品和每种商品的数量。
// 其中有一个方法用来计算购物车中所有商品的总价格，该方法使
// 用了一个 closure 作为回调函数。
//class Cart
//{
//    const PRICE_BUTTER  = 1.00;
//    const PRICE_MILK    = 3.00;
//    const PRICE_EGGS    = 6.95;
//
//    protected   $products = array();
//
//    public function add($product, $quantity)
//    {
//        $this->products[$product] = $quantity;
//    }
//
//    public function getQuantity($product)
//    {
//        return isset($this->products[$product]) ? $this->products[$product] :
//            FALSE;
//    }
//
//    public function getTotal($tax)
//    {
//        $total = 0.00;
//
//        $callback =
//            function ($quantity, $product) use ($tax, &$total)
//            {
//                $pricePerItem = constant(__CLASS__ . "::PRICE_" .
//                    strtoupper($product));
//                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
//            };
//
//        array_walk($this->products, $callback);
//        return round($total, 2);
//    }
//}
//
//$my_cart = new Cart;
//
//// 往购物车里添加条目
//$my_cart->add('butter', 1);
//$my_cart->add('milk', 3);
//$my_cart->add('eggs', 6);
//
//// 打出出总价格，其中有 5% 的销售税.
//print $my_cart->getTotal(0.05) . "\n";
//// 最后结果是 54.29




//class Test
//{
//    public function testing()
//    {
//        return function() {
//            var_dump($this);
//        };
//    }
//}
//
//$object = new Test;
//$function = $object->testing();
//$function();



//class Foo
//{
//    function __construct()
//    {
//        $func = static function() {
//            var_dump($this);
//        };
//        $func();
//    }
//};
//new Foo();

//$func =  static function() {
//    // function body
//};
//$func = $func->bindTo(new StdClass);
//$func();


//class A
//{
//    function foo()
//    {
//        if (isset($this)) {
//            echo '$this is defined (';
//            echo get_class($this);
//            echo ")\n";
//        } else {
//            echo "\$this is not defined.\n";
//        }
//    }
//}
//
//class B extends A
//{
//    function bar()
//    {
//        // Note: the next line will issue a warning if E_STRICT is enabled.
//        parent::foo();
//    }
//}
//
//$a = new A();
//$a->foo();
//
//// Note: the next line will issue a warning if E_STRICT is enabled.
////A::foo();
//$b = new B();
//$b->bar();
//
//// Note: the next line will issue a warning if E_STRICT is enabled.
////B::bar();

//class SimpleClass{}
//
//$instance = new SimpleClass();
//
//$assigned   =  $instance;
//$reference  =& $instance;
//
//$instance->var = '$assigned will have this value';
//var_dump($instance,$assigned);
//$assigned->var = '$instance will have this value???';
//var_dump($instance,$assigned);
//
//$instance = null; // $instance and $reference become null
//
//var_dump($instance);
//var_dump($reference);
//var_dump($assigned);


//class Test
//{
//    static public function getNew()
//    {
//        return new static;
//    }
//}
//
//class Child extends Test
//{}
//
//$obj1 = new Test();
//$obj2 = new $obj1;
//var_dump($obj1,$obj2);
//var_dump($obj1 !== $obj2);
//
//$obj3 = Test::getNew();
//var_dump($obj3 instanceof Test);
//
//$obj4 = Child::getNew();
//var_dump($obj4 instanceof Child);

//class SimpleClass{
//    function displayVar(){
//        echo SimpleClass::class;
//    }
//
//};
//
//class ExtendClass extends SimpleClass
//{
//    // Redefine the parent method
//    function displayVar()
//    {
//        echo "Extending class\n";
//        parent::displayVar();
//    }
//}
//
//$extended = new ExtendClass();
//$extended->displayVar();


//namespace NS {
//    class ClassName {
//    }
//
//    echo ClassName::class;
//}

//class MyClass
//{
//    const constant = 'constant value';
//
//    function showConstant() {
//        echo  self::constant . "\n";
//    }
//}
//
//echo MyClass::constant . "\n";
//
//$classname = "MyClass";
//echo $classname::constant . "\n"; // 自 5.3.0 起
//
//$class = new MyClass();
//$class->showConstant();
//
//echo $class::constant."\n"; // 自 PHP 5.3.0 起
//
//class Foo{
//    const abc = 'abc';
//}
//
//$foo = new Foo();
//var_dump(Foo::abc);
//var_dump($foo::abc);
//$className = 'Foo';
//var_dump($className::abc);


//spl_autoload_register(function ($name) {
//    echo "Want to load $name.\n";
//    throw new Exception("Unable to load $name.");
//});
//
//try {
//    $obj = new NonLoadableClass();
//} catch (Exception $e) {
//    echo $e->getMessage(), "\n";
//}


//class BaseClass {
//    function __construct() {
//        print "In BaseClass constructor\n";
//    }
//}
//
//class SubClass extends BaseClass {
//    function __construct() {
//        parent::__construct();
//        print "In SubClass constructor\n";
//    }
//}
//
//class OtherSubClass extends BaseClass {
//    // inherits BaseClass's constructor
//}
//
//// In BaseClass constructor
//$obj = new BaseClass();
//
//// In BaseClass constructor
//// In SubClass constructor
//$obj = new SubClass();
//
//// In BaseClass constructor
//$obj = new OtherSubClass();



//Attribute
//class user{
//    private $name;        //$n
//    private $forename;    //$fn
//    private $birthday;    //$bd
//    private $username;
//
//    //constructor
//    public function __construct($n,$fn,$bd)
//    {
//        if(strlen($n)>=3 && strlen($fn)>=2)    //min 3 chars for name and 2 chars for the forename
//        {
//            $this->name=$n;
//            $this->forename=$fn;
//        }
//        $this->birthday=$bd;
//    }
//    //Getter-Methode
//    public function getName()
//    {
//        if($this->name!="")
//        {
//            return $this->name;
//        }
//        else
//        {
//            return "<strong style='color:red'> Name required.</strong>";
//        }
//    }
//    public function getForename()
//    {
//        if($this->forename!="")
//        {
//            return $this->forename;
//        }
//        else
//        {
//            return "<strong style='color:red'>Forename required.</strong>";
//        }
//    }
//
//    public function getBirthday()
//    {
//        if($this->birthday!="")
//        {
//            return $this->birthday;
//        }
//        else
//        {
//            return "<strong style='color:red'>Birthday required.</strong>";
//        }
//    }
//
//    public function getUsername()
//    {
//        if($this->username!="")
//        {
//            return $this->username;
//        }
//        elseif($this->name!=""&&$this->forename!="")
//        {
//            $this->createUN();
//            return $this->username;
//        }
//        else
//        {
//            return"<strong style='color:red'>Username can not created. </strong>";
//        }
//    }
//
//    //Creating the Username with name and forename.
//    public function createUN()
//    {
//        $username="";
//        for($i=0;$i<=3;$i++)
//        {
//            $username[$i]= $this->name[$i];
//        }
//        for($i=0;$i<=1;$i++)
//        {
//            $username[$i+2]= $this->forename[$i];
//        }
////        var_dump($username);exit;
////        $username=implode(" ",$username); //changes array to string
//        return $username;
//
//    }
//}
//
//$user1= new user("Musterman","Max","31.01.1998");  //Object with contructor
//echo $user1->getForename();
//echo $user1->getName();
//echo $user1->getBirthday();
//echo $user1->createUN();


//class MyClass {
//    const CONST_VALUE = 'A constant value';
//}
//
//
//
//class OtherClass extends MyClass
//{
//    public static $my_static = 'static var';
//
//    public static function doubleColon() {
//        echo parent::CONST_VALUE . "\n";
//        echo self::$my_static . "\n";
//    }
//}
//
//$classname = 'OtherClass';
//echo $classname::doubleColon(); // 自 PHP 5.3.0 起
//
//OtherClass::doubleColon();


//class MyClass
//{
//    protected function myFunc() {
//        echo "MyClass::myFunc()\n";
//    }
//}
//
//class OtherClass extends MyClass
//{
//    // 覆盖了父类的定义
//    public function myFunc()
//    {
//        // 但还是可以调用父类中被覆盖的方法
////        parent::myFunc();
//        echo "OtherClass::myFunc()\n";
//    }
//}
//
//$class = new OtherClass();
//$class->myFunc();

//class ParentClass {
//    function test() {
//        self::who();    // will output 'parent'
//        $this->who();    // will output 'child'
//    }
//
//    function who() {
//        echo 'parent';
//    }
//}
//
//class ChildClass extends ParentClass {
//    function who() {
//        echo 'child';
//    }
//}
//
//$obj = new ChildClass();
//$obj->test();


//class Anchestor {
//
//    public static $Prefix = '';
//
//    private $_string =  'Bar';
//    public function Foo() {
//        return self::$Prefix.$this->_string;
//    }
//}
//
//class MyParent extends Anchestor {
//    public function Foo() {
//        $this->Prefix = null;
//        return parent::Foo().'Baz';
//    }
//}
//
//class Child extends MyParent {
//    public function Foo() {
//        self::$Prefix = 'Foo';
//        return Anchestor::Foo();
//    }
//}
//
//$c = new Child();
//echo $c->Foo(); //return FooBar, because Prefix, as in Anchestor::Foo()



//class FooClass {
//    public function testSelf() {
//        return self::t();
//    }
//
//    public function testThis() {
//        return $this::t();
//    }
//
//    public static function t() {
//        return 'FooClass';
//    }
//
//    function __toString() {
//        return 'FooClass';
//    }
//}
//
//class BarClass extends FooClass {
//    public static function t() {
//        return 'BarClass';
//    }
//
//}
//
//$obj = new BarClass();
//print_r(Array(
//    $obj->testSelf(), $obj->testThis(),
//));


//class Foo
//{
//    public static $my_static = 'foo';
//
//    public function staticValue() {
//        return self::$my_static;
//    }
//}
//
//class Bar extends Foo
//{
//    public function fooStatic() {
//        return parent::$my_static;
//    }
//}
//
//
//print Foo::$my_static . "\n";
//
//$foo = new Foo();
//print $foo->staticValue() . "\n";
//print $foo::$my_static . "\n";      // Undefined "Property" my_static
//
//print $foo::$my_static . "\n";
//$classname = 'Foo';
//print $classname::$my_static . "\n"; // As of PHP 5.3.0
//
//print Bar::$my_static . "\n";
//$bar = new Bar();
//print $bar->fooStatic() . "\n";


//class Foo
//{
//    const BAR = 'const';
//
//    public static function bar()
//    {
//        return 'static';
//    }
//}
//
//echo Foo::BAR . PHP_EOL; // Prints "const"
//echo Foo::bar() . PHP_EOL; // Prints "static"
//
//$var = 'Foo';
//echo $var::BAR . PHP_EOL; // Prints "const" in PHP 5.3.0, "Syntax error" in older versions
//echo $var::bar() . PHP_EOL; // Prints "static" in PHP 5.3.0, "Syntax error" in older versions
//
//$object = new stdClass();
//$object->class = 'Foo';
//var_dump($object->class::BAR,$object->class::bar());

//trait t {
//    protected $p;
//    public function testMe() {echo 'static:'.static::class. ' // self:'.self::class ."\n";}
//}
//
//class a { use t; }
//class b extends a {}
//
//echo (new a)->testMe();
//echo (new b)->testMe();

//class className
//{
//    public static function methodName()
//    {
//        echo 'this is static function';
//    }
//
//}
//
//
//try {
//    $method = new ReflectionMethod( 'className::methodName' );
//    if ( $method->isStatic() )
//    {
//        // Method is static.
//        echo "Method is static";
//    }
//}
//catch ( ReflectionException $e )
//{
//    //    method does not exist
//    echo $e->getMessage();
//}



//class aclass {
//    public static $d = 12; // Set to 12 on first function call only
//
//    public static function b(){
//        self::$d += 12;
//        return self::$d."\n";
//    }
//}
//
//echo aclass::b(); //24
//echo aclass::b(); //36
//echo aclass::b(); //48
//echo aclass::$d; //fatal error


//class A {
//    public static function getName(){
//        echo "My Name";
//    }
//    public static function getAge(){
//        return "22";
//    }
//}
//A::getName();
//echo A::getAge();

//class Foo {
//    static $property;
//    public static function aStaticMethod() {
//        echo "Accessing the property: ".self::$property; //Fatal error:Using $this
//    }
//}
//
//Foo::aStaticMethod();
//$classname = 'Foo';
//$classname::aStaticMethod(); // As of PHP 5.3.0
//
////Note that property $property is static and then can be using the word self instead of pseudo variable $this
//class Foo2 {
//    static $property = 'test';
//    public static function aStaticMethod() {
//        echo "Accessing the property: ". self::$property; //Accessing the property: test
//    }
//}
//
//Foo2::aStaticMethod();



//class A {
//    public static function who() {
//        echo __CLASS__;
//    }
//    public static function test() {
//        static::who();
//    }
//}
//
//class B extends A {
//    public static function who() {
//        echo __CLASS__;
//    }
//}
//B::test();

//class A {
//    private function foo() {
//        echo __CLASS__.PHP_EOL;
//        echo "success!\n";
//    }
//    public function test() {
//        $this->foo();
//        static::foo();
//    }
//}
//
//class B extends A {
//    /* foo() will be copied to B, hence its scope will still be A and
//     * the call be successful */
//}
//
//class C extends A {
////    private function foo() {
////        /* original method is replaced; the scope of the new one is C */
////    }
//}
//
//$b = new B();
//$b->test();
//$c = new C();
//$c->test();   //fails

//后期静态绑定的解析会一直到取得一个完全解析了的静态调用为止。另一方面，如果静态调用使用 parent:: 或者 self:: 将转发调用信息。
//class A {
//    public static function foo() {
//        static::who();
//    }
//
//    public static function who() {
//        echo __CLASS__."\n";
//    }
//}
//
//class B extends A {
//    public static function test() {
//        A::foo();
//        parent::foo();
//        self::foo();
//        static::foo();
//    }
//
//    public static function who() {
//        echo __CLASS__."\n";
//    }
//}
//class C extends B {
//    public static function who() {
//        echo __CLASS__."\n";
//    }
//}
//
//C::test();



//class a{
//    static function d() {
//        echo "=== self::class ===\n";
//        var_dump(self::class);
//        echo "=== static::class ===\n";
//        var_dump(static::class);
//    }
//}
//class b extends a{}
//class c extends b{}
//
//a::d();
//b::d();
//c::d();


//interface IEnum {
//    /**
//     * Only concrete class should implement this function that should behave as
//     * an enum.
//     *
//     * This method should return the __CLASS__ constant property of that class
//     *
//     * @return string __CLASS__
//     */
//    public static function who();
//}
//
//abstract class Enum {
//
//    /**
//     * The selected value for the enum implementation
//     *
//     * @var mixed
//     */
//    public $value;
//
//    public function __construct($value) {
//        $this->value = $value;
//    }
//
//    /**
//     * The factory method that creates the corresponding enum class.
//     *
//     * @param integer $type
//     * @return false|\class
//     */
//    public static function Factory($type) {
//        if (empty($type)) {
//            return false;
//        }
//
//        // use of late static binding to get the class.
//        $class = static::who();
//
//        if (array_key_exists($type, static::$_enums)) {
//            return new $class($type);
//        }
//
//        return false;
//    }
//
//    public function getValue() {
//        return $this->value;
//    }
//
//    public static function getValues() {
//        return array_keys(static::$_enums);
//    }
//
//    public function getString() {
//        return static::$_enums[$this->value];
//    }
//
//    public function __toString() {
//        return static::$_enums[$this->value];
//    }
//
//}
//
//class Fruits extends Enum implements IEnum {
//
//    public static $_enums = array(
//            1 => 'Apple',
//            2 => 'Orange',
//            3 => 'Banana',
//      );
//
//      public static function who() {
//          echo __CLASS__;
//          return __CLASS__;
//      }
//}
//
//// Usage
//
//// user input from dropdown menu of fruits list
//$input = 3;
//
//$fruit = Fruits::Factory($input);
//
//echo $fruit->getValue().PHP_EOL; // 3
//echo $fruit->getString().PHP_EOL; // Banana
//echo $fruit;



//abstract class A{
//
//    static function create(){
//
//        //return new self();  //Fatal error: Cannot instantiate abstract class A
//
//        return new static(); //this is the correct way
//
//    }
//
//}
//
//class B extends A{
//}
//
//$obj=B::create();
//var_dump($obj);


//class A {
//
//    public $metadata = array('class' => 'A');
//
//    public static function numbers()
//    {
//        return 123;
//    }
//
//}
//
//$instance = new A();
//
//// This throws an error
//// Parse error: syntax error, unexpected '::' (T_PAAMAYIM_NEKUDOTAYIM)
//var_dump( $instance->metadata['class']::numbers() );
//
//// Get the class name and store it in "flat" variable and now it's ok
//$class_name = $instance->metadata['class'];
//var_dump( $class_name::numbers() );
//
//// Other tests -------------------------------------------
//
//$arr =  array('class' => 'A');
//
//// This works too.
//var_dump( $arr['class']::numbers() );


//class A
//{
//    // some stuff....
//
//    public static function getInstance()
//    {
//        return new self();
//    }
//
//}
//
//class B extends A
//{
//    //stuff...
//}
//
//$obj = B::getInstance();
//var_dump($obj);
//
////versus
//
//class A1
//{
//
//    // some stuff....
//
//    public static function getInstance()
//    {
//        return new static();
//    }
//
//}
//
//class B1 extends A
//{
//    //stuff...
//}
//
//$obj = B1::getInstance();
//var_dump($obj);




//abstract class AbstractClass
//{
//    // 强制要求子类定义这些方法
//    abstract protected function getValue();
//    abstract protected function prefixValue($prefix);
//
//    // 普通方法（非抽象方法）
//    public function printOut() {
//        print $this->getValue() . "\n";
//    }
//}
//
//class ConcreteClass1 extends AbstractClass
//{
//    protected function getValue() {
//        return "ConcreteClass1";
//    }
//
//    public function prefixValue($prefix) {
//        return "{$prefix}ConcreteClass1";
//    }
//}
//
//class ConcreteClass2 extends AbstractClass
//{
//    public function getValue() {
//        return "ConcreteClass2";
//    }
//
//    public function prefixValue($prefix) {
//        return "{$prefix}ConcreteClass2";
//    }
//}
//
//$class1 = new ConcreteClass1;
//$class1->printOut();
//echo $class1->prefixValue('FOO_') ."\n";
//
//$class2 = new ConcreteClass2;
//$class2->printOut();
//echo $class2->prefixValue('FOO_') ."\n";


//interface  iTemplate
//{
//    public function setVariable($name,$var);
//
//    public function getHtml($template);
//}
//
//class Template implements iTemplate
//{
//    private $vars = [];
//    public function setVariable($name, $var)
//    {
//        // TODO: Implement setVariable() method.
//        $this->vars[$name] = $var;
//    }
//
//    public function getHtml($template)
//    {
//        // TODO: Implement getHtml() method.
//        foreach ($this->vars as $name => $value){
//            $template = str_replace('{'.$name.'}',$value,$template);
//        }
//
//        return $template;
//    }
//}


//interface a
//{
//    public function foo();
//}
//
//interface b
//{
//    public function bar();
//}
//
//interface c extends a, b
//{
//    public function baz();
//}
//
//class d implements c
//{
//    public function foo()
//    {
//    }
//
//    public function bar()
//    {
//    }
//
//    public function baz()
//    {
//    }
//}


//interface a11
//{
//    const b = 'Interface constant';
//}
//
//// 输出接口常量
//echo a11::b;
//
//// 错误写法，因为常量不能被覆盖。接口常量的概念和类常量是一样的。
//class b implements a11
//{
//    const c = 'Class constant';
//}

//trait abc
//{
//    function cd(){
//        echo 'cd'.PHP_EOL;
//    }
//}
//
//
//class a
//{
//    function who(){
//        echo __CLASS__.__METHOD__.PHP_EOL;
//    }
//}
//
//class b extends a{
//    use abc;
//}
//
//(new b())->who();
//(new b())->cd();

//从基类继承的成员会被 trait 插入的成员所覆盖。优先顺序是来自当前类的成员覆盖了 trait 的方法，而 trait 则覆盖了被继承的方法。
//class Base {
//    public function sayHello() {
//        echo 'Hello '.PHP_EOL;
//    }
//}
//
//trait SayWorld {
//    public function sayHello() {
//        parent::sayHello();
//        echo 'World!'.PHP_EOL;
//    }
//}
//
//class MyHelloWorld extends Base {
//    use SayWorld;
//
////    public function sayHello()
////    {
////        var_dump("aa") ;
////    }
//
//
//}
//
//$o = new MyHelloWorld();
//$o->sayHello();


//trait HelloWorld {
//    public function sayHello() {
//        echo 'Hello World!';
//    }
//}
//
//class TheWorldIsNotEnough {
//    use HelloWorld;
//    public function sayHello() {
//        echo 'Hello Universe!';
//    }
//}
//
//$o = new TheWorldIsNotEnough();
//$o->sayHello();

//trait Hello {
//    public function sayHello() {
//        echo 'Hello ';
//    }
//}
//
//trait World {
//    public function sayWorld() {
//        echo 'World';
//    }
//}
//
//class MyHelloWorld {
//    use Hello, World;
//    public function sayExclamationMark() {
//        echo '!';
//    }
//}
//
//$o = new MyHelloWorld();
//$o->sayHello();
//$o->sayWorld();
//$o->sayExclamationMark();

//匿名类被嵌套进普通 Class 后，不能访问这个外部类（Outer class）的 private（私有）、protected（受保护）方法或者属性。 为了访问外部类（Outer class）protected 属性或方法，匿名类可以 extend（扩展）此外部类。 为了使用外部类（Outer class）的 private 属性，必须通过构造器传进来：
//class Outer
//{
//    private $prop = 1;
//    protected $prop2 = 2;
//
//    protected function func1()
//    {
//        return 3;
//    }
//
//    public function func2()
//    {
//        return new class($this->prop) extends Outer{
//           private $prop3;
//
//            public function __construct($pop)
//            {
//                $this->prop3 = $pop;
//            }
//
//            public function func3(){
//                return $this->prop2 + $this->prop3 + $this->func1();
//            }
//        };
//    }
//}
//
//echo (new Outer)->func2()->func3();

//function abc($a){
//    $b =3;
//    return function ($c) use($a,$b){
//        $z = $a + $b + $c;
//      return $z;
//    };
//}
//
//var_dump(abc(1)(12));


//function abc($a){
//    return new class($a){
//      public $bc = 'a';
//      private $aa;
//
//      public function __construct($a)
//      {
//          $this->aa = $a;
//      }
//
//      public function cde(){
//          var_dump($this->bc.$this->aa);
//      }
//    };
//}
//
//
//abc(12)->cde();


//function return_anon(){
//    return new class{
//        public static $str="foo";
//    };
//}
//$test=return_anon();
//echo $test::$str; //ouputs foo
//
////we can still access the 'anon' class directly in the global scope!
////$another=get_class($test); //get the auto assigned name
//$another=$test;
//echo $another::$str;    //outputs foo



//class PropertyTest {
//    /**  被重载的数据保存在此  */
//    private $data = array();
//
//
//    /**  重载不能被用在已经定义的属性  */
//    public $declared = 1;
//
//    /**  只有从类外部访问这个属性时，重载才会发生 */
//    private $hidden = 2;
//
//    public function __set($name, $value)
//    {
//        echo "Setting '$name' to '$value'\n";
//        $this->data[$name] = $value;
//    }
//
//    public function __get($name)
//    {
//        echo "Getting '$name'\n";
//        if (array_key_exists($name, $this->data)) {
//            return $this->data[$name];
//        }
//
//        $trace = debug_backtrace();
//        trigger_error(
//            'Undefined property via __get(): ' . $name .
//            ' in ' . $trace[0]['file'] .
//            ' on line ' . $trace[0]['line'],
//            E_USER_NOTICE);
//        return null;
//    }
//
//    /**  PHP 5.1.0之后版本 */
//    public function __isset($name)
//    {
//        echo "Is '$name' set?\n";
//        return isset($this->data[$name]);
//    }
//
//    /**  PHP 5.1.0之后版本 */
//    public function __unset($name)
//    {
//        echo "Unsetting '$name'\n";
//        unset($this->data[$name]);
//    }
//
//    /**  非魔术方法  */
//    public function getHidden()
//    {
//        return $this->hidden;
//    }
//}
//
//
//echo "<pre>\n";
//
//$obj = new PropertyTest;
//
//$obj->a = 1;
//echo $obj->a . "\n\n";
//
//var_dump(isset($obj->a));
//unset($obj->a);
//var_dump(isset($obj->a));
//echo "\n";
//
//echo $obj->declared . "\n\n";
//
//echo "Let's experiment with the private property named 'hidden':\n";
//echo "Privates are visible inside the class, so __get() not used...\n";
//echo $obj->getHidden() . "\n";
//echo "Privates not visible outside of class, so __get() is used...\n";
//echo $obj->hidden . "\n";


//class MethodTest
//{
//    public function __call($name, $arguments)
//    {
////        var_dump($arguments);exit;
//        // 注意: $name 的值区分大小写
//        echo "Calling object method '$name' "
//            . implode(', ', $arguments). "\n";
//    }
//
//    /**  PHP 5.3.0之后版本  */
//    public static function __callStatic($name, $arguments)
//    {
//        // 注意: $name 的值区分大小写
//        echo "Calling static method '$name' "
//            . implode(', ', $arguments). "\n";
//    }
//}
//
//$obj = new MethodTest;
//$obj->runTest('abcde','acde','bbbb','ccccc');
//
//MethodTest::runTest('cdefg','eeee','bbee','fdfd');  // PHP 5.3.0之后版本





//Class Test
//{
//    function __set($name, $value) {}
//}
//
//$obj = new test();
//$obj->prop1 = 'foobar';
//
//print_r($obj); // Prints Test Object ( )
//echo $obj->prop1; //Give NOTICE Undefined property: Test::$prop1



//class Overload
//{
//    function __call($function, $params)
//    {
//        $function = '_' . $function;
//        $this->$function($params);
//    }
//
//    public function _show($params )
//    {
//        $res = '';
//        switch (count($params)) {
//            case 0:
//                $res = sprintf("method show with %d arg", 0);
//                break;
//            case 1:
//                $res = sprintf("method show with %d arg: %s", 1, $params[0]);
//                $res .= $this->getType($params[0]);
//                break;
//            case 2:
//                $res = sprintf("method show with %d arg: %s, %s", 2, $params[0], $params[1]);
//                $res .= $this->getType($params[0]);
//                $res .= $this->getType($params[1]);
//                break;
//            default:
//                # code...
//                break;
//        }
//
//        print $res . "\n";
//    }
//
//    private function getType($arg)
//    {
//        $res = '';
//        switch (gettype($arg)) {
//            case 'double':
//                $res .= ' - double';
//                break;
//            case 'string':
//                $res .= ' - string';
//                break;
//            case 'integer':
//                $res .= ' - integer';
//                break;
//            default:
//                $res .= ' - ';
//                break;
//        }
//
//        return $res;
//    }
//
//}
//
//$class = new Overload;
//
//$class->show();
//$class->show(12);
//$class->show(12.5);
//$class->show('test');
//$class->show('test', 1.5);


//class CallableClass
//{
//    function __invoke($x) {
//        var_dump($x);
//    }
//}
//$obj = new CallableClass;
//$obj(5);
//var_dump(is_callable($obj));

//class a {
//    function __construct() { }
//    function __invoke() { echo("Invoked\n"); }
//}
//
//$a = new a();
//$a();
//// Output: Invoked
//
//class b {
//    private $x;
//
//    function __construct() {
//        $this->x = new a();
//        ($this->x)();  // Works in PHP 7+
//        // $this->x(); // Will blow up in your face: undefined method b::x
//    }
//}
//
//$b = new b();


//class SubObject
//{
//    static $instances = 0;
//    public $instance;
//
//    public function __construct() {
//        $this->instance = ++self::$instances;
//    }
//
//    public function __clone() {
//        $this->instance = ++self::$instances;
//    }
//}
//
//class MyCloneable
//{
//    public $object1;
//    public $object2;
//
//    function __clone()
//    {
//
//        // 强制复制一份this->object， 否则仍然指向同一个对象
//        $this->object1 = clone $this->object1;
//    }
//}
//
//$obj = new MyCloneable();
//
//$obj->object1 = new SubObject();
//$obj->object2 = new SubObject();
//
//$obj2 = clone $obj;
//
//
//print("Original Object:\n");
//print_r($obj);
//
//print("Cloned Object:\n");
//print_r($obj2);



//class SubObject
//{
//    static $num_cons = 0;
//    static $num_clone = 0;
//
//    public $construct_value;
//    public $clone_value;
//
//    public function __construct() {
//        $this->construct_value = ++self::$num_cons;
//    }
//
//    public function __clone() {
//        $this->clone_value = ++self::$num_clone;
//    }
//}
//
//class MyCloneable
//{
//    public $object1;
//    public $object2;
//
//    function __clone()
//    {
//        // 强制复制一份this->object， 否则仍然指向同一个对象
//        $this->object1 = clone $this->object1;
//    }
//}
//
//$obj = new MyCloneable();
//
//$obj->object1 = new SubObject();
//$obj->object2 = new SubObject();
//
//$obj2 = clone $obj;
//
//print("Original Object:\n");
//print_r($obj);
//echo '<br>';
//print("Cloned Object:\n");
//print_r($obj2);



//class Classe {
//
//    public static $howManyClones = 0;
//
//    public function __clone() {
//        ++static::$howManyClones;
//    }
//
//    public static function howManyClones() {
//        return static::$howManyClones;
//    }
//
//    public function __destruct() {
//        --static::$howManyClones;
//    }
//}
//
//$a = new Classe;
//
//$b = clone $a;
//$c = clone $b;
//$d = clone $c;
//
//echo 'Clones:' . Classe::howManyClones() . PHP_EOL;
//
//unset($d);
//
//echo 'Clones:' . Classe::howManyClones() . PHP_EOL;



//class A {
//    public $foo = 1;
//}
//
//$a = new A;
//$b = $a;     // $a ,$b都是同一个标识符的拷贝
//// ($a) = ($b) = <id>
//$b->foo = 2;
//echo $a->foo."\n";
//
//
//$c = new A;
//$d = &$c;    // $c ,$d是引用
//// ($c,$d) = <id>
//
//$d->foo = 2;
//echo $c->foo."\n";
//
//
//$e = new A;
//
//function foo($obj) {
//    // ($obj) = ($e) = <id>
//    $obj->foo = 2;
//}
//
//foo($e);


//class A {
//    public $foo = 1;
//}
//
//$a = new A;
//$b = $a;
//$a->foo = 2;
//$a = NULL;
//echo $b->foo."\n"; // 2
//
//$c = new A;
//$d = &$c;
//$c->foo = 2;
//$c = NULL;
//echo $d->foo."\n"; // Notice:  Trying to get property of non-object...


//class A {
//    public $testA = 1;
//}
//
//class B {
//    public $testB = "class B";
//}
//
//$a = new A;
//$b = $a;
//$b->testA = 2;
//
//$c = new B;
//$a = $c;
//
//$a->testB = "Changed Class B";
//
//echo "<br/> object a: "; var_dump($a);
//echo "<br/> object b: "; var_dump($b);
//echo "<br/> object c: "; var_dump($c);
//
//// by reference
//
//$aa = new A;
//$bb = &$aa;
//$bb->testA = 2;
//
//$cc = new B;
//$aa = $cc;
//
//$aa->testB = "Changed Class B";
//
//echo "<br/> object aa: "; var_dump($aa);
//echo "<br/> object bb: "; var_dump($bb);
//echo "<br/> object cc: "; var_dump($cc);


//class A {
//    public $foo = 'empty';
//}
//class B {
//    public $foo = 'empty';
//    public $bar = 'hello';
//}
//
//function normalAssignment($obj) {
//    $obj->foo = 'changed';
//    $obj = new B;
//}
//
//function referenceAssignment(&$obj) {
//    $obj->foo = 'changed';
//    $obj = new B;
//}
//
//$a = new A;
//normalAssignment($a);
//echo get_class($a), "\n";
//echo "foo = {$a->foo}\n";
//
//referenceAssignment($a);
//echo get_class($a), "\n";
//echo "foo = {$a->foo}\n";
//echo "bar = {$a->bar}\n";



//自定义的错误处理方法
//function _error_handler($errno, $errstr ,$errfile, $errline)
//{
//    echo "错误编号errno: $errno<br>";
//    echo "错误信息errstr: $errstr<br>";
//    echo "出错文件errfile: $errfile<br>";
//    echo "出错行号errline: $errline<br>";
//}
//
//set_error_handler('_error_handler', E_ALL | E_STRICT);  // 注册错误处理方法来处理所有错误
////
////
//////echo $foo['bar'];  // 由于数组未定义，会产生一个notice级别的错误
////
////echo $foo['bar'];  // 由于数组未定义，会产生一个notice级别的错误
////
////trigger_error('人为触发一个错误', E_USER_ERROR); //人为触发错误
////
////foobar(3, 5);   //调用未定义的方法将会产生一个Error级别的错误
//
//
//try
//{
//    echo $foo['bar'];  // 由于数组未定义，会产生一个notice级别的错误
//
//    trigger_error('人为产生触发一个错误', E_USER_ERROR); //人为触发错误
//
//    foobar(3, 5);   //调用未定义的方法将会产生一个Error级别的错误
//}
//catch (Error $e)
//{
//    echo "Error code: " . $e->getCode() . '<br>';
//    echo "Error message: " . $e->getMessage() . '<br>';
//    echo "Error file: " . $e->getFile() . '<br>';
//    echo "Error fileline: " . $e->getLine() . '<br>';
//}


//自定义的错误处理方法
//function _error_handler($errno, $errstr ,$errfile, $errline)
//{
//    echo "错误编号errno: $errno<br>";
//    echo "错误信息errstr: $errstr<br>";
//    echo "出错文件errfile: $errfile<br>";
//    echo "出错行号errline: $errline<br>";
//}
//
//set_error_handler('_error_handler', E_ALL | E_STRICT);  // 注册错误处理方法来处理所有错误
//
//
//try
//{
//    echo $foo['bar'];  // 由于数组未定义，会产生一个notice级别的错误
//
//    trigger_error('人为触发一个错误', E_USER_ERROR); //人为触发错误
//
//    if (mt_rand(1, 10) > 5)
//    {
//        throw new Exception('This is a exception', 400);  //抛出一个Exception,看是否可以被catch
//    }
//    else
//    {
//        foobar(3, 5);   //调用未定义的方法将会产生一个Error级别的错误
//    }
//}
//catch (Throwable $e)
//{
//    echo "Error code: " . $e->getCode() . '<br>';
//    echo "Error message: " . $e->getMessage() . '<br>';
//    echo "Error file: " . $e->getFile() . '<br>';
//    echo "Error fileline: " . $e->getLine() . '<br>';
//}

//function add(int $left, int $right)
//{
//    return $left + $right;
//}
//
//try {
//    $value = add('left', 'right');
//} catch (TypeError $e) {
//    echo $e->getMessage(), "\n";
//}

//$str = number_format(123456789123456789123456, 0, '', '');
//print_r($str);

//function gen() {
//    $ret = (yield 'yield1');
//    var_dump($ret);
//    $ret = (yield 'yield2');
//    var_dump($ret);
//}
//
//$gen = gen();
//var_dump($gen->current());     // string(6) "yield1"
//var_dump($gen->send('ret1'));  // string(4) "ret1"   (the first var_dump in gen)
//// string(6) "yield2" (the var_dump of the ->send() return value)
//var_dump($gen->send('ret2'));  // string(4) "ret2"   (again from within gen)
//// NULL (the return value of ->send())

//function gen()
//{
//    yield 'y1';
//    yield 'y2';
//}
//
//$gen = gen();
//var_dump($gen->current());
//var_dump($gen->send('something'));
//var_dump($gen->send('something'));


/*
class Task {
    protected $taskId;
    protected $coroutine;
    protected $sendValue = null;
    protected $beforeFirstYield = true;

    public function __construct($taskId, Generator $coroutine) {
        $this->taskId = $taskId;
        $this->coroutine = $coroutine;
    }

    public function getTaskId() {
        return $this->taskId;
    }

    public function setSendValue($sendValue) {
        $this->sendValue = $sendValue;
    }

    public function run() {
        if ($this->beforeFirstYield) {
            $this->beforeFirstYield = false;
            return $this->coroutine->current();
        } else {
            $retval = $this->coroutine->send($this->sendValue);
            $this->sendValue = null;
            return $retval;
        }
    }

    public function isFinished() {
        return !$this->coroutine->valid();
    }
}

class Scheduler {
    protected $maxTaskId = 0;
    protected $taskMap = []; // taskId => task
    protected $taskQueue;

    public function __construct() {
        $this->taskQueue = new SplQueue();
    }

    public function newTask(Generator $coroutine) {
        $tid = ++$this->maxTaskId;
        $task = new Task($tid, $coroutine);
        $this->taskMap[$tid] = $task;
        $this->schedule($task);
        return $tid;
    }

    public function schedule(Task $task) {
        $this->taskQueue->enqueue($task);
    }

    public function run() {
        while (!$this->taskQueue->isEmpty()) {
            $task = $this->taskQueue->dequeue();
            $task->run();

            if ($task->isFinished()) {
                unset($this->taskMap[$task->getTaskId()]);
            } else {
                $this->schedule($task);
            }
        }
    }
}

function task1() {
    for ($i = 1; $i <= 10; ++$i) {
        echo "This is task 1 iteration $i.\n";
        yield;
    }
}

function task2() {
    for ($i = 1; $i <= 5; ++$i) {
        echo "This is task 2 iteration $i.\n";
        yield;
    }
}

$scheduler = new Scheduler;

$scheduler->newTask(task1());
$scheduler->newTask(task2());

$scheduler->run();
*/

$param = ['data'=>[['itemId'=>1111,'itemTitle'=>'2222'],['itemId'=>22233,'itemTitle'=>'3333']],'opt'=>'abc'];

echo json_encode($param);














































