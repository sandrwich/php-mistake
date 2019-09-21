<?php


namespace Php\Mistake\Worker;


class ScalableWorker extends Worker
{
    /**
     * @return bool
     */
    public function isScalable() {
        return true;
    }
}