<?php

namespace MathisBurger\PhpUnitStopwatch;

use PHPUnit\Framework\TestCase;

/**
 * Testcase that can be used for stopwatch testing
 */
abstract class StopwatchTestCase extends TestCase
{
    // Implements functionality
    use StopwatchTrait;
}
