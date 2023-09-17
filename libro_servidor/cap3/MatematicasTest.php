<?php
	require "vendor/autoload.php";
	require "Matematicas.php";
	use PHPUnit\Framework\TestCase;
	class MatematicasTest extends TestCase{    		
		public  function testCero(){
			$this->assertEquals(1, Matematicas::factorialEx(0));						
		}		
		/**
		* @test
		* @expectedException InvalidArgumentException
		*/
		public static function Excepcion(){
			//equivalente a la anotación  @expectedException
			//$this->expectException(InvalidArgumentException::class);
			return Matematicas::factorialEx(-1);			
			
		}
	}
	