<?php


namespace Java\Collections;


use Error;

class Queue
{
    /**
     * @var int
     */
    private $limit;

    /**
     * @var InsertOrder
     */
    private $insertOrder;

    /**
     * @var array
     */
    private $elements;

    /**
     * Queue constructor.
     */
    public function __construct()
    {
        $this->elements = [];
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit) {
        $this->limit = $limit;
    }

    /**
     * @param int $insertOrder
     */
    public function setInsertOrder($insertOrder) {
        $this->insertOrder = $insertOrder;
    }

    /**
     * @param $element
     */
    public function addElement($element) {
        // TODO: implement limit
        if ($this->insertOrder == InsertOrder::Backwards) {
            array_push($this->elements, $element);
        } else if ($this->insertOrder == InsertOrder::Forwards) {
            array_unshift($this->elements, $element);
        } else {
            throw new Error("Invalid insertOrder: $this->insertOrder");
        }
    }

    /**
     * @return mixed
     */
    public function peek() {
        $element = end($this->elements);
        array_pop($this->elements);
        return $element;
    }

    /**
     * @return int
     */
    public function getSize() {
        return count($this->elements);
    }
}