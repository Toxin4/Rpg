<?php
class Inventario {
    private int $capacidade;
    private $itens = [] ;

    public function __construct(int $capacidade) {
        $this->capacidade = $capacidade;
        $this->itens = [];
    }

    public function adicionar(Item $item): bool {
        $tamanhoAtual = 0;
        foreach ($this->itens as $i) {
            $tamanhoAtual += $i->getTamanho();
        }
        
        $tamanhoAtual += $item->getTamanho();
        if ($tamanhoAtual <= $this->capacidade) {
            $this->itens[] = $item;
            return true;
        }
        
        return false;
    }

    public function remover(Item $item): void {
        foreach ($this->itens as $key => $i) {
            if ($i === $item) {
                unset($this->itens[$key]);
                break;
            }
        }
    }

    public function aumentarCapacidade(int $quantidade): void {
        $this->capacidade += $quantidade;
    }

    public function getCapacidade(): int {
        return $this->capacidade;
    }

    // Método sem tipo de retorno
    public function getItens() {
        return $this->itens;
    }
}
?>