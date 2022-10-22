<?php
/*
 *
 * This file is part of the Contractportal system
 * © 2022 die NetzWerkstatt GmbH & Co. KG <info@die-netzwerkstatt.de>
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 */

namespace MathisBurger\PhpUnitStopwatch;

use Closure;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * This trait can be implemented in other test cases to provide the functionality of
 * performing stopwatch integration tests.
 */
trait StopwatchTrait
{

    /** @var Stopwatch|null Test case specific stopwatch instance */
    private ?Stopwatch $stopwatch = null;

    /**
     * Performs the performance tests
     *
     * @param Closure $callback The callback that the performance tests should be performed on
     * @return void
     */
    protected function runPerformanceTest(Closure $callback): void
    {
        $this->stopwatch = new Stopwatch();
        $this->stopwatch->start('test');
        $callback();
        $this->stopwatch->stop('test');
    }

    /**
     * Asserts if the used memory is below the provided amount in megabytes
     *
     * @param float $mb The max memory usage in megabytes
     * @return void
     */
    protected function assertMemoryUsageBelow(float $mb): void
    {
        $usageInBytes = $this->stopwatch->getEvent('test')->getMemory();
        $memoryInMb = $usageInBytes / pow(10, 6);
        $this->assertTrue($memoryInMb < $mb, 'Failed asserting that memory usage is below '.$mb.'MB');
    }

    /**
     * Asserts that the execution time of the callback is below the given amount
     *
     * @param float $ms The expected execution time in milliseconds
     * @return void
     */
    protected function executionTimeBelow(float $ms): void
    {
        $executionTime = $this->stopwatch->getEvent('test')->getDuration();
        $this->assertTrue($executionTime < $ms, 'Failed asserting that execution time is below ' . $ms . 'ms');
    }

}