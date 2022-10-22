<?php

class GeneralTest extends \MathisBurger\PhpUnitStopwatch\StopwatchTestCase
{
    public function testRunExecutionTestWithError(): void
    {
        $this->runPerformanceTest(function () {
            sleep(2);
        });
        try {
            $this->assertExecutionTimeBelow(2000);
        } catch (\PHPUnit\Exception $ex) {
            $this->assertTrue(true);
            return;
        }
        $this->fail();
    }

    public function testRunExecutionTestSuccessfully(): void
    {
        $this->runPerformanceTest(function () {
            sleep(2);
        });
        $this->assertExecutionTimeBelow(3000);
    }
}
