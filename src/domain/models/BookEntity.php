<?php
/**
 *  Copyright (c) nuxse
 */
namespace domain\models;

/**
 * Class BookEntity
 * @package domain\models
 */
class BookEntity
{
    /**
     * 书籍唯一标示
     * @var string
     */
    private $uniqueId;
    /**
     * 书名
     * @var string
     */
    private $bookName;
    /**
     * 作者
     * @var string
     */
    private $author;
    /**
     * ISBN 号
     * @var string
     */
    private $ISBN;
    /**
     * 简介 默认 null
     * @var string
     */
    private $presentation = null;
    /**
     * 出版社
     * @var string
     */
    private $publish;
    /**
     * 分类 默认 null
     * @var string
     */
    private $category = null;
    /**
     * 书架对应位置
     * @var string
     */
    private $location = null;
    /**
     * 书籍权限等级
     * @var int
     */
    private $level = 1;

    /**
     * 图书状态 0 已上架 1已借出 2已归还待上架
     * @var int
     */
    private $status = 0;

    /**
     * 持有者 默认 null 表示图书系统持有
     * @var null
     */
    private $owner = null;

    /**
     * BookEntity constructor.
     * @param $uniqueId
     * @param $bookName
     * @param $author
     * @param $ISBN
     * @param $presentation
     * @param $publish
     */
    public function __construct($uniqueId, $bookName, $author, $ISBN,$presentation, $publish)
    {
        $this->setUniqueId($uniqueId);
        $this->setAuthor($author);
        $this->setBookName($bookName);
        $this->setISBN($ISBN);
        $this->setPresentation($presentation);
        $this->setPublish($publish);
    }

    /**
     * @return string
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * @param string $uniqueId
     */
    public function setUniqueId($uniqueId)
    {
        $uniqueId = trim($uniqueId);
        if(empty($uniqueId)) {
            throw new \InvalidArgumentException('uniqueId is empty,the book entity can not be instantiation');
        }
        $this->uniqueId = $uniqueId;
    }
    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->bookName;
    }

    /**
     * @param mixed $bookName
     */
    public function setBookName($bookName)
    {
        $bookName = trim($bookName);
        if(empty($bookName)) {
            throw new \InvalidArgumentException('bookName is empty,the book entity can not be instantiation');
        }
        $this->bookName = $bookName;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $author = trim($author);
        if(empty($author)) {
            throw new \InvalidArgumentException('author is empty,the book entity can not be instantiation');
        }
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @param mixed $ISBN
     */
    public function setISBN($ISBN)
    {
        $ISBN = trim($ISBN);
        if(empty($ISBN)) {
            throw new \InvalidArgumentException('ISBN is empty,the book entity can not be instantiation');
        }
        $this->ISBN = $ISBN;
    }

    /**
     * @return mixed
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * @param mixed $presentation
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    }

    /**
     * @return mixed
     */
    public function getPublish()
    {
        return $this->publish;
    }

    /**
     * @param mixed $publish
     */
    public function setPublish($publish)
    {
        $publish = trim($publish);
        if(empty($publish)) {
            throw new \InvalidArgumentException('publish is empty,the book entity can not be instantiation');
        }
        $this->publish = $publish;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return null
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param null $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @param ReaderEntity $reader
     */
    public function beBorrow(ReaderEntity $reader)
    {
        $this->setOwner($reader->getName());
        $this->setStatus(1);//已借出
    }

    /**
     *上架
     */
    public function beShelf()
    {
        $this->setStatus(0);//已上架
    }

    /**
     *归还
     */
    public function beReturn()
    {
        $this->setOwner(null);
        $this->setStatus(2);//已归还待上架
    }

    public function info()
    {
        if($this->getStatus() == 1) {
            echo $this->getBookName().':已经被借阅'.PHP_EOL;
        }
        if($this->getStatus() == 0) {
            echo $this->getBookName().':上架状态'.PHP_EOL;
        }
        if($this->getStatus() == 2) {
            echo $this->getBookName().':已归还 未上架'.PHP_EOL;
        }
    }

}