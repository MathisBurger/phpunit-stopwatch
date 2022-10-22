<?php
/**
 * This file is part of the nwsnet/core package
 *
 * © 2022 Die NetzWerkstatt GmbH & Co. KG <info@die-netzwerkstatt.de>
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

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
