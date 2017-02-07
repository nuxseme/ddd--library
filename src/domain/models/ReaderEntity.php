<?php
/**
 *  Copyright (c) nuxse
 */

namespace domain\models;


class ReaderEntity
{
    private $serialNumber;
    private $name;
    private $tel = null;
    private $address = null;
    private $borrowRecord = null;
    private $access = [1];

    public function __construct($serialNumber, $name)
    {
        $this->setSerialNumber($serialNumber);
        $this->setName($name);
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param mixed $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $serialNumber = trim($serialNumber);
        if(empty($serialNumber)) {
            throw new \InvalidArgumentException('serialNumber is empty,the reader entity can not be instantiation');
        }
        $this->serialNumber = $serialNumber;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $name = trim($name);
        if(empty($name)) {
            throw new \InvalidArgumentException('name is empty,the reader entity can not be instantiation');
        }
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param null $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param null $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return null
     */
    public function getBorrowRecord()
    {
        return $this->borrowRecord;
    }

    /**
     * @param null $borrowRecord
     */
    public function setBorrowRecord($borrowRecord)
    {
        $this->borrowRecord = $borrowRecord;
    }

    /**
     * @return array
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param array $access
     */
    public function setAccess($access)
    {
        $this->access = $access;
    }

    public function changeName($name)
    {
        $this->setName($name);
    }
    public function changeTel($tel)
    {
        $this->setTel($tel);
    }

    public function changeAddress($address)
    {
        $this->setAddress($address);
    }
    public function changeAccess($access)
    {
        $this->setAccess($access);
    }


}