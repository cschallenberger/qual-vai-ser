<?php

use PHPUnit\Framework\TestCase as PHPUnit;

require_once './class/Avaliacao.class.php';

class AvaliacaoMethodsTest extends PHPUnit{
    public function testType() {
        $avaliacao = new Avaliacao(4, 3, "023.654.789-99");
        $this->assertInternalType('int', $avaliacao->getNota());
    }

    public function testNota() {
        $avaliacao = new Avaliacao(4, 3, "023.654.789-99");
        $this->assertEquals(4, $avaliacao->getNota());
    }

    public function testIdEstabelecimento() {
        $avaliacao = new Avaliacao(2, 1, "023.654.789-99");
        $this->assertEquals(1, $avaliacao->getEstabelecimento());
    }
}
?>
