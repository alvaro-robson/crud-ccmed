<?php

namespace tests;
use PHPUnit\Framework\TestCase;

class MaterialDaoTest extends TestCase{
	public function testarmazenar(){
		$materialDao = new \App\Model\MaterialDao();
		$this->assertTrue($materialDao->armazenar(150));
	}
}