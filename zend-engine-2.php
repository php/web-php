<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'zend-engine-2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Changes in PHP 5/Zend Engine 2.0");
?>

<h1>Changes in PHP 5/Zend Engine 2.0</h1>

<p>
 [ <a href="http://www.nexen.net/interview/index.php?id=32">Disponible
 en fran&ccedil;ais</a> ]
</p>

<h2>New Object Model.</h2>
<p>
 PHP's handling of objects has been completely rewritten, allowing for better
 performance and more features. In previous versions of PHP, objects were
 handled like primitive types (for instance integers and strings). The drawback
 of this method was that semantically the whole object was copied when a
 variable was assigned, or pass as a parameter to a method. In the new approach, 
 objects are referenced by handle, and not by value (one can think of a handle
 as an object's identifier).
</p>
<p>
 Many PHP programmers aren't even aware of the copying quirks of the old object
 model and, therefore, the majority of PHP applications will work out of the box,
 or with very few modifications.
</p>

<h2>Private and Protected Members</h2>
<p>
 PHP 5 introduces private and protected member variables, they allow you to
 define the visibility of class properties.
</p>
<h3>Example</h3>
<p>
 Protected member variables can be accessed in classes extending the class 
 they are declared in, whereas private member variables can only be accessed 
 by the class they belong to.
</p>
<?php highlight_php('<?php
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

<h2>Private and protected methods</h2>
<p>
 With PHP 5, private and protected methods are also introduced.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
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
<p>
 Old code that has no user-defined classes or functions named "public",
 "protected" or "private" should run without modifications.
</p>

<h2>Abstract Classes and Methods</h2>
<p>
 PHP 5 also introduces abstract classes and methods. An abstract method
 only declares the method's signature and does not provide an implementation.
 A class that contains abstract methods needs to be declared abstract.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
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
<p>
 Abstract classes cannot be instantiated. Old code that has no user-defined
 classes or functions named 'abstract' should run without modifications.
</p>

<h2>Interfaces</h2>
<p>
 PHP 5 introduces interfaces. A class may implement an arbitrary
 list of interfaces.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
interface Throwable {
    public function getMessage();
}

class Exception implements Throwable {
    public function getMessage() {
        // ...
    }
}
?>'); ?>
<p>
 Old code that has no user-defined classes or functions named 'interface' or 
 'implements' should run without modifications.
</p>

<h2>Class Type Hints</h2>
<p>
 While remaining loosely typed PHP 5 introduces the ability to use class type
 hints to declare the expected class of objects that are passed as parameters
 to a method.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
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
<p>
 These class type hints are not checked upon compilation, as would be the case 
 in a typed language, but during runtime. This means that:
</p>
<?php
highlight_php('<?php
function foo(ClassName $object) {
    // ...
}
?>');
?>
<p>
 is equivalent to:
</p>
<?php 
highlight_php('<?php
function foo($object) {
    if (!($object instanceof ClassName)) {
        die("Argument 1 must be an instance of ClassName");
    }
}
?>'); ?>
<p>
 This syntax only applies to objects/classes, not built-in types.
</p>

<h2>final</h2>
<p>
 PHP 5 introduces the "final" keyword to declare final members and methods.
 Methods and members declared final cannot be overridden by sub-classes.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class Foo {
    final function bar() {
        // ...
    }
}
?>'); ?>
<p>
 It is furthermore possible to make a class final. Doing this 
 prevents a class from being specialized (it cannot be inherited 
 by another class). There's no need to declare the methods of
 a final class themselves as final.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
final class Foo {
    // class definition
}

// the next line is impossible
// class Bork extends Foo {}
?>'); ?>
<p>
 Properties cannot be final.
</p>
<p>
 Old code that has no user-defined classes or functions named 'final' should
 run without modifications.
</p>

<h2>Object Cloning</h2>
<p>
 PHP 4 offered no way a user could decide what copy constructor to run when an
 object is duplicated. During duplication, PHP 4 did a bit for bit copy making
 an identical replica of all the object's properties.
</p>
<p>
 Creating a copy of an object with fully replicated properties is not always the
 wanted behavior. A good example of the need for copy constructors, is if you have
 an object which represents a GTK window and the object holds the resource of this
 GTK window, when you create a duplicate you might want to create a new window with
 the same properties and have the new object hold the resource of the new window.
 Another example is if your object holds a reference to another object which it
 uses and when you replicate the parent object you want to create a new instance
 of this other object so that the replica has its own separate copy.
</p>
<p>
 An object copy is created by calling the object's <code>__clone()</code> method:
</p>
<?php highlight_php('<?php
$copy_of_object = $object->__clone();
?>'); ?>
<p>
 When the developer asks to create a new copy of an object, PHP 5 will
 check if a <code>__clone()</code> method has been defined or not. If not, it
 will call a default <code>__clone()</code> which will copy all of the object's
 properties. If a <code>__clone()</code> method is defined, then it will be
 responsible to set the necessary properties in the created object. For
 convenience, the engine will supply a function that imports all of the properties
 from the source object, so that they can start with a by-value replica of the
 source object, and only override properties that need to be changed. 
</p>
<h3>Example</h3>
<?php highlight_php('<?php
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

<h2>Unified Constructors</h2>
<p>
 PHP 5 allows developers to declare constructor methods for classes.
 Classes which have a constructor method call this method on each newly-created
 object, so it is suitable for any initialization that the object may need
 before it is used.
</p>
<p>
 With PHP 4, constructor methods were class methods that had the same name as
 the class itself. Since it is very common to call parent constructors from derived
 classes, the way PHP 4 worked made it a bit cumbersome to move classes around
 in a large class hierarchy. If a class is moved to reside under a different
 parent, the constructor name of that parent changes as well, and the code in
 the derived class that calls the parent constructor has to be modified.
</p>
<p>
 PHP 5 introduces a standard way of declaring constructor methods by calling
 them by the name <code>__construct()</code>.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
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
 For backwards compatibility, if PHP 5 cannot find a <code>__construct()</code>
 function for a given class, it will search for the old-style constructor function,
 by the name of the class. Effectively, it means that the only case that would
 have compatibility issues is if the class had a method named
 <code>__construct()</code> which was used for different semantics.
</p>

<h2>Destructors</h2>
<p>
 Having the ability to define destructors for objects can be very useful.
 Destructors can log messages for debugging, close database connections and do
 other clean-up work. No mechanism for object destructors existed in PHP 4,
 although PHP had already support for registering functions which should be 
 run on request shutdown.
</p>
<p>
 PHP 5 introduces a destructor concept similar to that of other object-oriented
 languages, such as Java: When the last reference to an object is destroyed the
 object's destructor, which is a class method named <code>__destruct()</code>
 that recieves no parameters, is called before the object is freed from memory.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
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
<p>
 Like constructors, parent destructors will not be called implicitly by the
 engine. In order to run a parent destructor, one would have to explicitly
 call <code>parent::__destruct()</code> in the destructor body.
</p>

<h2>Constants</h2>
<p>
 PHP 5 introduces per-class constants:
</p>
<?php highlight_php('<?php
class Foo {
    const constant = "constant";
}

echo "Foo::constant = " . Foo::constant . "\n";
?>'); ?>
<p>
 PHP 5 allows for expressions within constants, however, constants are
 evaluated at compile time, therefore no constants can be declared that
 rely on runtime information.
</p>
<?php highlight_php('<?php
class Bar {
    const a = 1<<0;
    const b = 1<<1;
    const c = a | b;
}
?>'); ?>
<p>
 Old code that has no user-defined classes or functions named 'const'
 will run without modifications.
</p>

<h2>Exceptions</h2>
<p>
 PHP 4 had no exception handling. PHP 5 introduces a exception model similar
 to that of other programming languages. Note that there is support for "catch
 all" and for the "finally" clause.
</p>
<p>
 Exceptions can be rethrown in catch blocks. Also it is possible to
 have multiple catch blocks. In that case the caught exception is 
 compared with the classtype of each catch block from top to bottom
 and the first block that has an 'instanceof' match gets executed.
 When the catch block finishes, execution continues at the end of 
 the last catch block. If no catch block has an 'instanceof' match
 then the next try/catch block is searched until no more try/catch 
 blocks are available. In that case the exception is an uncaught
 exception and the program terminates with showing the exception.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class MyException {
    function __construct($exception) {
        $this->exception = $exception;
    }

    function Display() {
        print "MyException: $this->exception\n";
    }
}

class MyExceptionFoo extends MyException {
    function __construct($exception) {
        $this->exception = $exception;
    }

    function Display() {
        print "MyException: $this->exception\n";
    }
}

try {
    throw new MyExceptionFoo(\'Hello\');
}
catch (MyException $exception) {
    $exception->Display();
}
catch (Exception $exception) {
    echo $exception;
}
?>'); ?>
<p>
 Even though the above example shows that it is possible to define
 exception classes that don't inherit from Exception it is best to
 do so. This is because the internal Exception class can gather a
 lot of information otherwise not available. The PHP code emulation
 code would look something like shown below. The comments show the
 meaning of each property and hence their getter methods. As the code
 shows it is possible to read any available information by using the
 getter methods. But since some of the methods are used internally
 they are marked final. All in all the class is very restrictive 
 because it must be ensured that anything used internally always
 works as expected.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class Exception {
    function __construct(string $message=NULL, int code=0) {
        if (func_num_args()) {
            $this->message = $message;
        }
        $this->code = $code;
        $this->file = __FILE__; // of throw clause
        $this->line = __LINE__; // of throw clause
        $this->trace = debug_backtrace();
        $this->string = StringFormat($this);
    }

    protected $message = \'Unknown exception\';  // exception message
    protected $code = 0; // user defined exception code
    protected $file;     // source filename of exception
    protected $line;     // source line of exception

    private $trace;      // backtrace of exception
    private $string;     // internal only!!

    final function getMessage() {
        return $this->message;
    }
    final function getCode() {
        return $this->code;
    }
    final function getFile() {
        return $this->file;
    }
    final function getTrace() {
        return $this->trace;
    }
    final function getTraceAsString() {
        return self::TraceFormat($this);
    }
    function _toString() {
        return $this->string;
    }
    static private function StringFormat(Exception $exception) {
        // ... a function not available in PHP scripts
        // that returns all relevant information as a string
    }
    static private function TraceFormat(Exception $exception) {
        // ... a function not available in PHP scripts
        // that returns the backtrace as a string
    }
}
?>'); ?>
<p>
 If you derive your exception classes from this Exception base class
 your exceptions will be nicely shown in the builtin handler for 
 uncaught exceptions.
</p>
<p>
 Old code that has no user-defined classes or functions 'catch', 'throw'
 and 'try' will run without modifications.
</p>

<h2>Dereferencing objects returned from functions</h2>
<p>
 In PHP 4 it wasn't possible to dereference objects returned by functions
 and make further method calls on those objects. With PHP 5, the following
 is now possible:
</p>
<?php highlight_php('<?php
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

<h2>Static member variables of static classes can now be initialized</h2>
<h3>Example</h3>
<?php highlight_php('<?php
class foo {
    static $my_static = 5;
    public $my_prop = \'bla\';
}

print foo::$my_static;
$obj = new foo;
print $obj->my_prop;
?>'); ?>

<h2>Static Methods</h2>
<p>
 PHP 5 introduces the 'static' keyword to declare a method static, thus 
 callable from outside the object context.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class Foo {
    public static function aStaticMethod() {
        // ...
    }
}

Foo::aStaticMethod();
?>'); ?>
<p>
 The pseudo variable <code>$this</code> is not available inside a method
 that has been declared static.
</p>

<h2>instanceof</h2>
<p>
 PHP 5 introduces the <code>instanceof</code> keyword, that allows you to
 ascertain whether or not an object is an instance of a class, or extends
 a class, or implements an interface.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class baseClass { }

$a = new baseClass;

if ($a instanceof basicClass) {
    echo "Hello World";
}
?>'); ?>

<h2>Static function variables</h2>
<p>
 Statics are now treated at compile-time which allows developers to assign
 variables to statics by reference. This change also greatly improves their
 performance but means that indirect references to statics will not work
 anymore.
</p>

<h2>Parameters that are passed by reference to a function may now have default values</h2>
<h3>Example</h3>
<?php highlight_php('<?php
function my_function(&$var = null) {
    if ($var === null) {
        die("$var needs to have a value");
    }
}
?>'); ?>

<h2>__autoload()</h2>
<p>
 The <code>__autoload()</code> interceptor function will be automatically called
 when an undeclared class is to be instantiated. The name of that class will be
 passed to the <code>__autoload()</code> interceptor function as its only argument.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
function __autoload($className) {
    include_once $className . ".php";
}

$object = new ClassName;
?>'); ?>

<h2>Overloadable Method calls and Property accesses</h2> 
<p>
 Both method calls and property accesses can be overloaded via the
 <code>__call()</code>, <code>__get()</code> and <code>__set()</code>
 methods.
</p>
<h3>Example: __get() and __set()</h3>
<?php highlight_php('<?php
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
<h3>Example: __call()</h3>
<?php highlight_php('<?php
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

<h2>Iteration</h2>
<p>
 Objects may be iterated in an overloaded way when used with
 foreach. The default behavior is to iterate over all properties.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class Foo {
    var $x = 1;
    var $y = 2;
}

$obj = new Foo;

foreach ($obj as $prp_name => $prop_value) {
    // using the property
}
?>'); ?>
<p>
 Each class whose instances can be iterated with foreach should 
 implement the empty interface <code>Traversable</code>. Hence any object
 that says it implements <code>Traversable</code> can be used with foreach.
</p>
<p>
 The interfaces <code>IteratorAggregate</code> and <code>Iterator</code>
 allows you to specify how class objects are iterated in PHP code. The first
 of them simply has a method <code>getIterator()</code> which must return
 an array or an object that either implements the interface <code>Iterator</code>
 or is instantiated from an internal class that can be iterated.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class ObjectIterator implements Iterator {

    private $obj;
    private $num;

    function __construct($obj) {
        $this->obj = $obj;
    }
    function rewind() {
        $this->num = 0;
    }
    function hasMore() {
        return $this->num < $this->obj->max;
    }
    function key() {
        return $this->num;
    }
    function current() {
        switch($this->num) {
            case 0: return "1st";
            case 1: return "2nd";
            case 2: return "3rd";
            default: return $this->num."th";
        }
    }
    function next() {
        $this->num++;
    }
}

class Object implements IteratorAggregate {

    public $max = 3;

    function getIterator() {
        return new ObjectIterator($this);
    }
} 

$obj = new Object;

// this foreach ...
foreach($obj as $key => $val) {
    echo "$key = $val\n";
}

// matches the following 7 lines with the for directive.
$it = $obj->getIterator();
for($it->rewind(); $it->hasMore(); $it->next) {
    $key = $it->current();
    $val = $it->key();
    echo "$key = $val\n";
}
unset($it);
?>'); ?>
<p>
 The matching for directive is very intersting here since it shows 
 the use of all abstract methods declared in the interfaces 
 <code>Iterator</code> and <code>IteratorAggregate</code> respectively.
</p>

<h2>New <code>__METHOD__</code> constant</h2>
<p>
 The new <code>__METHOD__</code> pseudo constant shows the current class
 and method when used inside a method and the function when used outside of a 
 class.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class Foo {
    function Show() {
        echo __FILE__ . \'(\' . __LINE__ . \')\' . __METHOD__;
    }
}
function Test() {
    echo __FILE__ . \'(\' . __LINE__ . \')\' . __METHOD__;
}
?>'); ?>

<h2>New <code>__toString()</code> method</h2>

<p>
 The new <code>__toString()</code> magic method allows you to overload the
 object to string conversion.
</p>
<h3>Example</h3>
<?php highlight_php('<?php
class Foo {
    function __toString() {
        return "What ever";
    }
}

$obj = Foo;

$str = (string) $obj; // call __toString()

echo $obj; // call __toString()
?>'); ?>

<h2>Reflection API</h2>

<p>
 PHP 5 comes with a complete reflection API that adds the ability to
 reverse-engineer classes, interfaces, functions and methods as well
 as extensions.
</p>

<p>
 The reflection API also offers ways of getting doc comments for
 functions, classes and methods.
</p>

<p>
 Nearly all aspects of object oriented code can be reflected by
 using the reflection API which is
 <a href="http://sitten-polizei.de/php/reflection_api/docs/language.reflection.html">documented
 separatley</a>.
</p>

<h3>Example</h3>
<?php highlight_php('<?php
class Foo {
    public $prop;
    function Func($name) {
        echo "Hello $name";
}

reflection_class::export(\'Foo\');
reflection_object::export(new Foo);
reflection_method::export(\'Foo\', \'func\');
reflection_property::export(\'Foo\', \'prop\');
reflection_extension::export(\'standard\');
?>'); ?>

<h2>New memory manager</h2>
<p>
 PHP 5 has a new memory manager which allows it to run efficiently in
 multi-threaded environments as it doesn't need to use mutexes to lock
 and unlock during allocation/deallocation.
</p>

<?php site_footer(); ?>
