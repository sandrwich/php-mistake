<?php

namespace Php\Mistake;

use Java\Collections\InsertOrder;
use Java\Collections\Queue;
use Java\Runnable;
use Php\Mistake\Framework\SuperFrameworkApplication;

class QueueRunnerApplication extends SuperFrameworkApplication {

    /**
     * @var Queue
     */
    private $queue;
    
    /**
     * @Override
     */
    public function prepareWork()
    {
        // PREPARE QUEUE
        $this->queue = new Queue();
        $this->queue->setInsertOrder(InsertOrder::Forwards);
        $this->queue->setLimit(10);

        // ADD START JOBS
        $this->queue->addElement(new class extends Runnable {
            /**
             * @Override
             */
            public function run()
            {
                echo "Siema!\n";
            }
        });
        $this->queue->addElement(new class extends Runnable {
            /**
             * @Override
             */
            public function run()
            {
                echo "Czy to nie jest piekne?\n";
            }
        });
    }

    /**
     * @Override
     */
    function main() {
        $this->prepareWork();
        while ($this->queue->getSize() != 0) {
            $this->doWork();
            sleep(1);
        }
    }
    
    /**
     * @Override
     */
    public function doWork()
    {
        $work = $this->queue->peek();
        $work->run();
    }
}