<?php
require_once 'prepend.inc';

commonHeader("Changes in Zend Engine 2.0", 1);
?>
<h2>New Object Model.</h2>
<p>
The Zend Engine's handling of objects has been completely changed in 
order to allow for new features, but also to increase its performance.
Objects were handled in previous versions like primitive types (for 
instance integers and strings). The drawback of this method is, that 
semantically the whole object was copied when a variable was assigned 
or parameters were passed to a method. The new approach refers to 
objects by handle and not by value (one can think of a handle as an 
object's ID).
</p>
<p>
Many PHP programmers aren't even aware of the copying quirks of the old 
object model and, therefore, there is a relatively good chance that the 
amount of PHP applications that will work out of the box or after a very 
small amount of modifications would be high.
</p>
<h2>Private and Protected Members</h2>
<p>
The Zend Engine 2.0 introduces private and protected member variables. 
Note that for performance reasons no error message is emitted in case of an 
illegal access to a private or protectecd member variable.
</p>

<h3>Example</h3>
<p>
Protected member variables can be accessed in classes extending the class 
they are declared in, whereas private member variables can only be accessed 
by the class they belong to.
</p>
<p>
<?php highlight_string('<?php
class MyClass {
    private $Hello = "Hello, World!\n";
    protected $Bar = "Hello, Foo!\n";
    protected $Foo = "Hello, Bar!\n";

    function printHello() {
        print "MyClass::printHello() " . $this->Hello;
        print "MyClass::printHello() " . $this->Bar;
        print "MyClass::printHello() " . $this->Foo;
    }
}

class MyClass2 extends MyClass {
    protected $Foo;
            
    function printHello() {
        MyClass::printHello();                          /* Should print */
        print "MyClass2::printHello() " . $this->Hello; /* Shouldn\'t print out anything */
        print "MyClass2::printHello() " . $this->Bar;   /* Shouldn\'t print (not declared)*/
        print "MyClass2::printHello() " . $this->Foo;   /* Should print */
    }
}

$obj = new MyClass();
print $obj->Hello;  /* Shouldn\'t print out anything */
print $obj->Bar;    /* Shouldn\'t print out anything */
print $obj->Foo;    /* Shouldn\'t print out anything */
$obj->printHello(); /* Should print */

$obj = new MyClass2();
print $obj->Hello;  /* Shouldn\'t print out anything */
print $obj->Bar;    /* Shouldn\'t print out anything */
print $obj->Foo;    /* Shouldn\'t print out anything */
$obj->printHello();
?>'); ?>
</p>

<h2>Private and protected methods</h2>
<p>
The Zend Engine 2.0 introduces private and protected methods.
</p>

<h3>Example</h3>
<p>
<?php highlight_string('<?php
class Foo {
    private function aPrivateMethod() {
        echo "Foo::aPrivateMethod() called.\n";
    }

    protected function aProtectedMethod() {
        echo "Foo::aProtectedMethod() called.\n";
        $this->aPrivateMethod();
    }
}

class Bar extends Foo {
    public function aPublicMethod() {
        echo "Bar::aPublicMethod() called.\n";
        $this->aProtectedMethod();
    }
}

$o = new Bar;
$o->aPublicMethod();
?>'); ?>
</p>

<p>
Old code that has no user-defined classes or functions named "public," "protected"
or "private" should run without modifications.
</p>

<h2>Abstract Classes and Methods</h2>
<p>
The Zend Engine 2.0 introduces abstract classes and methods. An abstract 
method only declares the method's signature and does not provide an 
implementation. A class that contains abstract methods needs to be declared 
abstract.
</p>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
abstract class AbstractClass {
    abstract public function test();
}

class ImplementedClass extends AbstractClass {
    public function test() {
        echo "ImplementedClass::test() called.\n";
    }
}

$o = new ImplementedClass;
$o->test();
?>'); ?>
</p>

<p>
Abstract classes cannot be instantiated.  Old code that has no user-defined classes or 
functions named 'abstract' should run without modifications.
</p>

<h2>Interfaces</h2>

<p>
The Zend Engine 2.0 introduces interfaces. A class may implement an arbitrary list 
of interfaces.
</p>

<h3>Example</h3>
<p>
<?php highlight_string('<?php
interface Throwable {
    public function getMessage();
}

class Exception implements Throwable {
    public function getMessage() {
    // ...
}
?>'); ?>

<p>
Old code that has no user-defined classes or functions named 'interface' or 
'implements' should run without modifications.
</p>

<h2>Class Type Hints</h2>
<p>
While remaining loosely typed the Zend Engine 2.0 introduces the ability to use 
class type hints to declare the expected class of objects that are passed as 
parameters to a method.
</p>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
interface Foo {
    function a(Foo $foo);
}

interface Bar {
    function b(Bar $bar);
}

class FooBar implements Foo, Bar {
    function a(Foo $foo) {
        // ...
    }

    function b(Bar $bar) {
        // ...
    }
}

$a = new FooBar;
$b = new FooBar;

$a->a($b);
$a->b($b);
?>'); ?>
</p>
<p>
These class type hints are not checked upon compilation, as would be the case 
in a typed language, but during runtime.  This means that:
</p>
<p>
<?php
highlight_string('function foo(ClassName $object) {
    // ...
}');
?>
<p>
is equivalent to:
</p>
<p>
<?php 
highlight_string('function foo($object) {
    if (!($object instanceof ClassName)) {
        die("Argument 1 must be an instance of ClassName");
    }
}'); ?>
</p>
<p>
This syntax only applies to objects/classes, not built-in types.
</p>

<h2>final</h2>
<p>
The Zend Engine 2.0 introduces the "final" keyword to declare final members and 
methods.  Those cannot be overridden by sub-classes.
</p>
<h3>Example</h3>
<p>
<?php highlight_string('class Foo {
    final function bar() {
        // ...
    }
}'); ?>
<p>
Old code that has no user-defined classes or functions named 'final' should run 
without modifications.
</p>
<h2>Object Cloning</h2>
<p>
The Zend Engine 1.0 offered no way a user could decide what copy constructor to run 
when an object is duplicated. During duplication, the Zend Engine 1.0 did a bitwise 
copy making an identical replica of all the object's properties.
</p>
<p>
Creating a copy of an object with fully replicated properties is not always the wanted 
behavior. A good example of the need for copy constructors, is if you have an object which 
represents a GTK window and the object holds the resource of this GTK window, when you 
create a duplicate you might want to create a new window with the same properties and have
the new object hold the resource of the new window. Another example is if your object holds 
a reference to another object which it uses and when you replicate the parent object you want 
to create a new instance of this other object so that the replica has its own separate copy.
</p>
<p>
An object copy is created by calling the object's <code>__clone()</code> method:
</p>
<p>
<?php highlight_source('$copy_of_object = $object->__clone();'); ?>
</p>
<p>
When the developer asks to create a new copy of an object, the Zend Engine will check if a 
<code>__clone()</code> method has been defined or not. If not, it will call a default <code>__clone()</code>
which will copy all of the object's properties. If a <code>__clone()</code> method is defined, 
then it will be responsible to set the necessary properties in the created object. For convenience, 
the engine will supply a function that imports all of the properties from the source object, so 
that they can start with a by-value replica of the source object, and only override properties that
need to be changed. 
</p>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
class MyCloneable {
    static $id = 0;

    function MyCloneable() {
        $this->id = self::$id++;
    }

    function __clone() {
        $this->name = $that->name;
        $this->address = "New York";
        $this->id = self::$id++;
    }
}

$obj = new MyCloneable();

$obj->name = "Hello";
$obj->address = "Tel-Aviv";

print $obj->id . "\n";

$obj = $obj->__clone();

print $obj->id . "\n";
print $obj->name . "\n";
print $obj->address . "\n";
?>');
?>
</p>
<h2>Unified Constructors</h2>
<p>
The Zend Engine allows developers to declare constructor methods for classes. Classes 
which have a constructor method call this method on each newly-created object, so it is 
suitable for any initialization that the object may need before it can be used.
</p>
<p>
With the Zend Engine 1.0, constructor methods were class methods that had the same name as 
the class itself. Since it is very common to call parent constructors from derived classes, 
the way the Zend Engine 1.0 worked made it a bit cumbersome to move classes around in a large 
class hierarchy. If a class is moved to reside under a different parent, the constructor name 
of that parent changes as well, and the code in the derived class that calls the parent 
constructor has to be modified.
</p>
<p>
The Zend Engine 2.0 introduces a standard way of declaring constructor methods by calling them 
by the name __construct().
</p>
<h3>Example</h3>
<?php highlight_source('<?php
class BaseClass {
	function __construct() {
		print "In BaseClass constructor\n";
	}
}

class SubClass extends BaseClass {
	function __construct() {
		parent::__construct();
		print "In SubClass constructor\n";
    }
}

$obj = new BaseClass();
$obj = new SubClass();
?>'); ?>
<p>
For backwards compatibility, if the Zend Engine 2.0 cannot find a <code>__construct()</code> function 
for a given class, it will search for the old-style constructor function, by the name of the 
class. Effectively, it means that the only case that would have compatibility issues is if the 
class had a method named <code>__construct()</code> which was used for different semantics.
</p>
<h2>Destructors</h2>
<p>
Having the ability to define destructors for objects can be very useful. Destructors can log messages 
for debugging, close database connections and do other clean-up work. No mechanism for object destructors 
existed in Zend Engine 1.0, although PHP had already support for registering functions which should be 
run on request shutdown.
</p>
<p>
Zend Engine 2.0 introduces a destructor concept similar to that of other object-oriented languages, such 
as Java: When the last reference to an object is destroyed the object's destructor, which is a class method 
name %__destruct()% that recieves no parameters, is called before the object is freed from memory.
</p>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
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
?>'); ?>
</p>
<p>
Like constructors, parent destructors will not be called implicitly by the engine. In 
order to run a parent destructor, one would have to explicitly call <code>parent::__destruct()</code> 
in the destructor body.
</p>
<h2>Constants</h2>
<p>
Zend Engine 2.0 introduces per-class constants:
</p>
<p>
<?php highlight_string('<?php
class Foo {
	const constant = "constant";
}

echo "Foo::constant = " . Foo::constant . "\n";
?>'); ?>
</p>
<p>
Zend Engine 2.0 allows for expressions within constants, however, constants are evaluated at compile time, therefore
no constants can be declared that rely on runtime information.
</p>
<?php highlight_string('<?php
class Bar {
	const a = 1<<0;
	const b = 1<<1;
    const c = a | b;
}
?>'); ?>
</p>
<p>
Old code that has no user-defined classes or functions named 'const' will run without modifications.
</p>
<h2>Exceptions</h2>
<p>
Zend Engine 1.0 had no exception handling. Zend Engine 2.0 introduces a exception model similar to 
that of other programming languages.
</p>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
class MyExceptionFoo extends Exception {
    function __construct($exception) {
        parent::__construct($exception);
    }
}

try {
    throw new MyExceptionFoo("Hello");
} catch (MyException $exception) {
    print $exception->getMessage();
}
?>'); ?>
</p>
<p>
Old code that has no user-defined classes or functions 'catch', 'throw' and 'try' will run 
without modifications.
</p>
<h2>Dereferencing objects returned from functions</h2>
<p>
In Zend Engine 1.0 it wasn't possible to dereference objects returned by functions and make further
method calls on those objects.  With the advent of Zend Engine 2, the following is now possible:
</p>
<p>
<?php highlight_string('<?php
class Circle {
    function draw() {
        print "Circle\n";
    }
}
        
class Square {
    function draw() {
        print "Square\n";
    }
}

function ShapeFactoryMethod($shape) {
    switch ($shape) {
        case "Circle": 
            return new Circle();
        case "Square": 
            return new Square();
    }
}

ShapeFactoryMethod("Circle")->draw();
ShapeFactoryMethod("Square")->draw();
?>'); ?>
</p>
<h2>Static member variables of static classes can now be initialized</h2>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
class foo {
    static $my_static = 5;
}

print foo::$my_static;
?>'); ?>
</p>
<h2>Static Methods</h2>
<p>
The Zend Engine 2.0 introduces the 'static' keyword to declare a method static, thus 
callable from outside the object context.
</p>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
class Foo {
    public static function aStaticMethod() {
        // ...
    }
}

Foo::aStaticMethod();
?>'); ?>
</p>
<p>
The pseudo variable $this is not available inside a method that has been declared static.
</p>
<h2>instanceof</h2>
<p>
Zend Engine 2 introduces the <code>instanceof</code> keyword, that allows you to ascertain whether
or not an object is an instance of a class, or extends a class, or implements an interface.
</p>
<h3>Example</h3>
<?php highlight_string('<?php
class baseClass { }

$a = new baseClass;

if ($a instanceof basicClass) {
    echo "Hello World";
}
?>'); ?>
</p>
<h2>Static function variables</h2>
<p>
Statics are now treated at compile-time which allows developers to assign variables to statics by 
reference. This change also greatly improves their performance but means that indirect references to 
statics will not work anymore.
</p>
<h2>Parameters that are passed by reference to a function may now have default values</h2>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
function my_function(&$var = null) {
    if ($var === null) {
        die("$var needs to have a value");
    }
}
?>'); ?>
</p>
<h2>__autoload()</h2>
<p>
The __autoload() interceptor function will be automatically called when an undeclared class 
is to be instantiated. The name of that class will be passed to the __autoload() interceptor function 
as its only argument.
</p>
<h3>Example</h3>
<p>
<?php highlight_string('<?php
function __autoload($className) {
    include_once $className . ".php";
}

$object = new ClassName;
?>'); ?>
</p>
<h2>Overloadable Method calls and Property accesses</h2> 
<p>
Both method calls and property accesses can be overloaded via the <code>__call()</code>, 
<code>__get()</code> and <code>__set()</code> methods.
</p>
<h3>Example: __get() and __set()</h3>
<p>
<?php highlight_string('<?php
class Setter {
    public $n;
    public $x = array("a" => 1, "b" => 2, "c" => 3);

    function __get($nm) {
        print "Getting [$nm]\n";

        if (isset($this->x[$nm])) {
            $r = $this->x[$nm];
            print "Returning: $r\n";
            return $r;
        } else {
            print "Nothing!\n";
        }
    }

    function __set($nm, $val) {
        print "Setting [$nm] to $val\n";

        if (isset($this->x[$nm])) {
            $this->x[$nm] = $val;
            print "OK!\n";
        } else {
            print "Not OK!\n";
        }
    }
}

$foo = new Setter();
$foo->n = 1;
$foo->a = 100;
$foo->a++;
$foo->z++;
var_dump($foo);
?>'); ?>
</p>
<h3>Example: __call()</h3>
<p>
<?php highlight_string('<?php
class Caller {
    var $x = array(1, 2, 3);

    function __call($m, $a) {
        print "Method $m called:\n";
        var_dump($a);
        return $this->x;
    }
}

$foo = new Caller();
$a = $foo->test(1, "2", 3.4, true);
var_dump($a);
?>'); ?>
</p>

<?php
commonFooter(); 
?>
