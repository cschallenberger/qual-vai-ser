<?php

use PHPUnit\Framework\TestCase as PHPUnit;

require_once './class/Avaliacao.class.php';
require_once './class/Estabelecimento.class.php';
require_once './class/DonoEstabelecimento.class.php';

class EstabelecimentoGetTest extends PHPUnit{

    public function testGetRuaTest() {
        $estabelecimento = new Estabelecimento("Estabelecimento Teste", "Descricao do estabelecimento", "Rua X", "91450-140", '40.71727401', '-74.00898606', "99.999.999/9999-99", 1, "Aprovado");
        $this->assertEquals('Rua X', $estabelecimento->getRua());
    }

    public function testGetDescricao() {
        $estabelecimento = new Estabelecimento("Estabelecimento Teste", "Descricao do estabelecimento", "Rua X", "91450-140", '40.71727401', '-74.00898606', "99.999.999/9999-99", 1, "Aprovado");
        $this->assertEquals("Descricao do estabelecimento", $estabelecimento->getDescricao());
    }

    public function testGetCep() {
        $estabelecimento = new Estabelecimento("Estabelecimento Teste", "Descricao do estabelecimento", "Rua X", "91450-140", '40.71727401', '-74.00898606', "99.999.999/9999-99", 1, "Aprovado");
        $this->assertEquals("91450-140", $estabelecimento->getCep());
    }

    public function testGetCNPJ() {
        $estabelecimento = new Estabelecimento("Estabelecimento Teste", "Descricao do estabelecimento", "Rua X", "91450-140", '40.71727401', '-74.00898606', "99.999.999/9999-99", 1, "Aprovado");
        $this->assertEquals("99.999.999/9999-99", $estabelecimento->getCnpj());
    }

    public function testGetNome() {
        $estabelecimento = new Estabelecimento("Estabelecimento Teste", "Descricao do estabelecimento", "Rua X", "91450-140", '40.71727401', '-74.00898606', "99.999.999/9999-99", 1, "Aprovado");
        $this->assertEquals("Estabelecimento Teste", $estabelecimento->getNome());
    }
}
?>
