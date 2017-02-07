<?php
/**
 *  Copyright (c) nuxse
 */

namespace domain\models;


/**
 * Class BorrowRecord
 * @package domain\models
 */
class BorrowRecord
{
    /**
     * 图书对象
     * @var BookEntity
     */
    private $book;
    /**
     * 读者对象
     * @var ReaderEntity
     */
    private $reader;
    /**
     * 借阅时间
     * @var \DateTime
     */
    private $borrowTime;
    /**
     * 归还时间
     * @var \DateTime
     */
    private $returnTime;

    /**
     * BorrowRecord constructor.
     * @param BookEntity $book
     * @param ReaderEntity $reader
     */
    public function __construct(BookEntity $book, ReaderEntity $reader)
    {
        $this->setBook($book);
        $this->setReader($reader);
    }

    /**
     * @return mixed
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param mixed $book
     */
    public function setBook(BookEntity $book)
    {
        $this->book = $book;
    }

    /**
     * @return mixed
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * @param mixed $reader
     */
    public function setReader(ReaderEntity $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return mixed
     */
    public function getBorrowTime()
    {
        return $this->borrowTime;
    }

    /**
     * @param mixed $borrowTime
     */
    public function setBorrowTime(\DateTime $borrowTime)
    {
        $this->borrowTime = $borrowTime;
    }

    /**
     * @return mixed
     */
    public function getReturnTime()
    {
        return $this->returnTime;
    }

    /**
     * @param mixed $returnTime
     */
    public function setReturnTime(\DateTime $returnTime)
    {
        $this->returnTime = $returnTime;
    }

    public function record()
    {
        echo $this->reader->getName().'=>'.$this->book->getBookName().' 借书时间:'.date('Y-m-d H:i:s',time());
    }
}