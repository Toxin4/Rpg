<?php

require_once ('class/Player.php');
require_once ('class/Inventario.php');
require_once ('class/Item.php');
require_once ('class/Ataque.php');
require_once ('class/Defesa.php');
require_once ('class/Magia.php');

$player1 = new Player("Jogador1");

$itemAtaque1 = new Ataque("Espada de Fogo");
$itemAtaque2 = new Ataque("Machado de Gelo");

$itemDefesa1 = new Defesa("Escudo de Ferro");
$itemDefesa2 = new Defesa("Armadura de Ouro");

$itemMagia1 = new Magia("Poção de Cura");
$itemMagia2 = new Magia("Bola de Fogo");

echo "Capacidade inicial de Inventário de {$player1->getNickname()}  {$player1->getInventario()->getCapacidade()}<br>";

echo "Coletando Itens";
$player1->coletarItem($itemAtaque1);
$player1->coletarItem($itemDefesa1);
$player1->coletarItem($itemMagia1);

echo "Inventário de {$player1->getNickname()} após coleta:<br>";
foreach ($player1->getInventario()->getItens() as $item) {
    echo "Item: {$item->getNome()}  {(Classe: {$item->getClasse()} , Tamanho: {$item->getTamanho()} <br>";
}

echo "Capacidade de Inventário após coleta:";
echo "Capacidade de {$player1->getNickname()} {$player1->getInventario()->getCapacidade()}<br>";

echo "Simulando inventário cheio:<br>";
$itemExtraAtaque = new Ataque("Espada Lendária");
$itemExtraDefesa = new Defesa("Escudo de Platina");

$player1->coletarItem($itemExtraAtaque);
$player1->coletarItem($itemExtraDefesa);

echo "Subindo o nível de {$player1->getNickname()} <br>";
$player1->subirNivel();

echo "Capacidade de {$player1->getNickname()} após subir para o nível {$player1->getNivel()} {$player1->getInventario()->getCapacidade()} <br>";

echo "Tentando adicionar itens após subir de nível: <br>";
$player1->coletarItem($itemExtraAtaque);
$player1->coletarItem($itemExtraDefesa);

echo "Inventário de {$player1->getNickname()} após subir de nível: <br>";
foreach ($player1->getInventario()->getItens() as $item) {
    echo "Item: {$item->getNome()} Classe: {$item->getClasse()} , Tamanho: {$item->getTamanho()} <br>";
}
?>