<?php
class Avaliacao {
    private $idAvaliacao;
    private $nota;
    private $estabelecimento;

    public function __construct($nota, $estabelecimento) {
        $this->idAvaliacao = NULL;
        $this->nota = $nota;
        $this->estabelecimento = $estabelecimento;
    }
    function getIdAvaliacao() {
        return $this->idAvaliacao;
    }

    function getNota() {
        return $this->nota;
    }

    function getEstabelecimento() {
        return $this->estabelecimento;
    }

    function setIdAvaliacao($idAvaliacao) {
        $this->idAvaliacao = $idAvaliacao;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

    function setEstabelecimento($estabelecimento) {
        $this->estabelecimento = $estabelecimento;
    }
}
