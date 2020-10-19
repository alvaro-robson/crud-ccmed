<?php

namespace tests;
use PHPUnit\Framework\TestCase;

class MaterialDaoTest extends TestCase{
	public function testread(){
		$materialDao = new \App\Model\MaterialDao();
		$material = new \App\Model\Material();
		$this->assertTrue($materialDao->read());
	}
}