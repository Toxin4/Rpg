<?php
class Player {
    private string $nickname;
    private int $nivel;
    private Inventario $inventario;

    public function __construct(string $nickname) {
        $this->nickname = $nickname;
        $this->nivel = 1;
        $this->inventario = new Inventario(20); 
    }

    public function coletarItem(Item $item): bool {
        return $this->inventario->adicionar($item);
    }

    public function soltarItem(Item $item): void {
        $this->inventario->remover($item);
    }

    public function subirNivel(): void {
        $this->nivel++;
        $this->inventario->aumentarCapacidade($this->nivel * 3); 
    }

    public function getInventario(): Inventario {
        return $this->inventario;
    }

    public function getNickname(): string {
        return $this->nickname;
    }

    public function getNivel(): int {
        return $this->nivel;
    }
}

?>