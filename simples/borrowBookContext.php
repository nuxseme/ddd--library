<?php
/**
 *  Copyright (c) nuxse
 */
//借书场景

include 'autoload.php';
use domain\models\ReaderEntity;
use domain\models\BookEntity;

$reader = new ReaderEntity('10389391','小明');
$book = new BookEntity('10001', 'ddd', 'ddd', '3R-400r-f','ddd', 'ddd');
$book->beBorrow($reader);
$book->info();
$bookRecord = new \domain\models\BorrowRecord($book, $reader);
$bookRecord->record();

