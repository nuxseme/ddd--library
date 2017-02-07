<?php
/**
 *  Copyright (c) nuxse
 */
namespace domain\services;
use domain\models\BookEntity;
use domain\models\ReaderEntity;

class BorrowBookService
{
    public function borrow(ReaderEntity $reader, BookEntity $book)
    {
        //@todo 当前书籍标记为已借出
        //@todo 添加读者的借书记录
        //@todo 添加读者的借书历史
        //@todo 书籍本身的借阅历史
    }
}