<?php
/**
 * User: sasik
 * Date: 5/17/16
 * Time: 10:07 AM
 */

require __DIR__ . '/vendor/autoload.php';

$board = new \App\Board(8, 8);


/**
 * Добавьте возможность вызова пользовательского кода в момент,
 * когда на доску добавляется фигура определенного типа/фигура любого типа
 */
$board->addObserver(new \App\Observers\AnyObserver());
$board->addObserver(new \App\Observers\PawnObserver());

$board->addFigure(\App\Builder\FigureBuilder::buildPawn(), 0, 0);
$board->addFigure(\App\Builder\FigureBuilder::buildKing(), 1, 0);
$board->addFigure(\App\Builder\FigureBuilder::buildQueen(), 2, 0);
$board->addFigure(\App\Builder\FigureBuilder::buildPawn(), 0, 1);
$board->addFigure(\App\Builder\FigureBuilder::buildPawn(), 0, 2);


$board->isExistFigure(0, 0);

$board->move(0, 0, 2, 1);

$board->remove(2, 0);

$storage = \App\Builder\StorageBuilder::buildRedisStorage();
$storage->save($board);

$newBoard = $storage->load();
