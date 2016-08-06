<?php
/**
 * @author         SagittariusX <unikado+sag@gmail.com>
 * @copyright  (c) 2016, SagittariusX
 * @package        Beluga
 * @since          2016-08-06
 * @subpackage     DynamicProperties/Tests
 * @version        0.1.0
 */


include __DIR__ . '/TestClass.php';


use Beluga\DynamicProperties\Test\TestClass1;
use Beluga\DynamicProperties\Test\TestClass2;
use Beluga\DynamicProperties\Test\TestClass3;


/**
 * The ExplicitGetterSetterTest class.
 *
 * @since v0.1.0
 */
class ExplicitGetterSetterTest extends PHPUnit_Framework_TestCase
{


   // <editor-fold desc="// = = = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * @type TestClass1
    */
   private $getter;

   /**
    * @type TestClass3
    */
   private $getterExtra;
   
   /**
    * @type TestClass2
    */
   private $getterSetter;

   // </editor-fold>


   /**
    * Sets up the fixture, for example, open a network connection.
    * This method is called before a test is executed.
    */
   protected function setUp()
   {
      parent::setUp();
      $this->getter       = new TestClass1();
      $this->getterExtra  = new TestClass3();
      $this->getterSetter = new TestClass2();

   }


   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_1a()
   {
      /** @noinspection PhpUndefinedFieldInspection */
      $this->assertSame( 'foo', $this->getter->foo, __METHOD__ . ' 1 fails' );
      $this->assertSame( 'foo', $this->getter->__get('foo'), __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_1b()
   {
      $this->assertSame( 'foo', $this->getterSetter->foo, __METHOD__ . ' 1 fails' );
      $this->assertSame( 'foo', $this->getterSetter->__get('foo'), __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_1c()
   {
      $this->assertSame( 'foo', $this->getterExtra->foo, __METHOD__ . ' 1 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_2a()
   {
      $this->assertTrue( $this->getter->bar, __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_2b()
   {
      $this->assertTrue( $this->getterSetter->bar, __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_2c()
   {
      $this->assertTrue( $this->getterExtra->bar, __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_3a()
   {
      $this->assertSame( 14, $this->getter->bazBlub, __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_3b()
   {
      $this->assertSame( 14, $this->getterSetter->bazBlub, __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_get_3c()
   {
      $this->assertSame( 14, $this->getterExtra->bazBlub, __METHOD__ . ' fails' );
   }

   public function test_get_4a()
   {
      try {
         /** @noinspection PhpUndefinedFieldInspection */
         $this->getter->baz; }
      catch ( Exception $ex )
      {
         $this->assertTrue( ( $ex instanceof LogicException ), __METHOD__ . ' fails' );
         return;
      }
      $this->fail( __METHOD__ . ' fails! Expected LogicException has not been raised.' );
   }

   public function test_get_4c()
   {
      try { $this->getterExtra->boing; }
      catch ( Exception $ex )
      {
         $this->assertTrue( ( $ex instanceof LogicException ), __METHOD__ . ' fails' );
         return;
      }
      $this->fail( __METHOD__ . ' fails! Expected LogicException has not been raised.' );
   }

   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_1a()
   {
      /** @noinspection PhpUndefinedFieldInspection */
      $this->assertTrue( isset( $this->getter->foo ), __METHOD__ . ' fails' );
      $this->assertTrue( $this->getter->__isset( 'foo' ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::__isset
    */
   public function test_isset_1b()
   {
      $this->assertTrue( isset( $this->getterSetter->foo ), __METHOD__ . ' fails' );
      $this->assertTrue( $this->getterSetter->__isset( 'foo' ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::__isset
    */
   public function test_isset_1c()
   {
      $this->assertTrue( isset( $this->getterExtra->foo ), __METHOD__ . ' fails' );
      $this->assertTrue( $this->getterExtra->__isset( 'foo' ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::__isset
    */
   public function test_isset_2a()
   {
      $this->assertTrue( isset( $this->getterSetter->bar ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_2b()
   {
      $this->assertTrue( isset( $this->getter->bar ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_3a()
   {
      $this->assertTrue( isset( $this->getterSetter->bazBlub ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_3b()
   {
      $this->assertTrue( isset( $this->getter->bazBlub ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_4a()
   {
      /** @noinspection PhpUndefinedFieldInspection */
      $this->assertFalse( isset( $this->getterSetter->baz ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_4b()
   {
      /** @noinspection PhpUndefinedFieldInspection */
      $this->assertFalse( isset( $this->getter->baz ), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::__isset
    * @covers Beluga\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_4c()
   {
      $this->assertTrue( isset( $this->getterSetter->boing ), __METHOD__ . ' fails' );
   }


   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_1a()
   {
      $this->assertTrue( $this->getterSetter->hasReadableProperty( 'foo', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getFoo', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_1b()
   {
      $this->assertTrue( $this->getter->hasReadableProperty( 'foo', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getFoo', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_2()
   {
      $this->assertTrue( $this->getterSetter->hasReadableProperty( 'bar', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getBar', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_3()
   {
      $this->assertTrue( $this->getterSetter->hasReadableProperty( 'bazBlub', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getBazBlub', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_4()
   {
      $this->assertFalse( $this->getterSetter->hasReadableProperty( 'baz', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getBaz', $gName, __METHOD__ . ' 2 fails' );
   }

   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::hasWritableProperty
    */
   public function test_hasWritableProperty_1()
   {
      $this->assertTrue( $this->getterSetter->hasWritableProperty( 'foo', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'setFoo', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::hasWritableProperty
    */
   public function test_hasWritableProperty_2()
   {
      $this->assertTrue( $this->getterSetter->hasWritableProperty( 'bar', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'setBar', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::hasWritableProperty
    */
   public function test_hasWritableProperty_3()
   {
      $this->assertTrue( $this->getterSetter->hasWritableProperty( 'bazBlub', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'setBazBlub', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::hasWritableProperty
    */
   public function test_hasWritableProperty_4()
   {
      $this->assertFalse( $this->getterSetter->hasWritableProperty( 'baz', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'setBaz', $gName, __METHOD__ . ' 2 fails' );
   }

   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::__set
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_read_write_1()
   {
      $this->getterSetter->foo = 'FOO';
      $this->assertSame( 'FOO', $this->getterSetter->getFoo(), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::__set
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_read_write_2()
   {
      $this->getterSetter->bar = false;
      $this->assertFalse( $this->getterSetter->getBar(), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::__set
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_read_write_3()
   {
      $this->getterSetter->bazBlub = 1999;
      $this->assertSame( 1999, $this->getterSetter->getBazBlub(), __METHOD__ . ' fails' );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetterSetter::__set
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_read_write_5()
   {
      try {
         /** @noinspection PhpUndefinedFieldInspection */
         $this->getterSetter->baz = false; }
      catch ( Exception $ex )
      {
         $this->assertTrue( ( $ex instanceof LogicException ), __METHOD__ . ' fails' );
         return;
      }
      $this->fail( __METHOD__ . ' fails! Expected LogicException has not been raised.' );
   }

   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_compare_prop_getter_1()
   {
      $this->assertSame( $this->getterSetter->foo, $this->getterSetter->getFoo() );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_compare_prop_getter_2()
   {
      $this->assertSame( $this->getterSetter->bar, $this->getterSetter->getBar() );
   }
   /**
    * @covers Beluga\DynamicProperties\ExplicitGetter::__get
    * @covers Beluga\DynamicProperties\ExplicitGetter::__internalGet
    */
   public function test_compare_prop_getter_3()
   {
      $this->assertSame( $this->getterSetter->bazBlub, $this->getterSetter->getBazBlub() );
   }


}