<div align="center">
    <h1>phpunit-stopwatch</h1>
<hr>
<strong>A php library that provides some traits and testcases for phpunit for performance and memory tests</strong>
    <br>
<img src="https://img.shields.io/github/license/mathisburger/phpunit-stopwatch?style=for-the-badge" />
<img src="https://img.shields.io/github/checks-status/mathisburger/mathis-burger.de/main?style=for-the-badge" />
<img src="https://img.shields.io/github/v/release/mathisburger/phpunit-stopwatch?style=for-the-badge">
</div>
<hr>

# Project information

Phpunit stopwatch is a simple php library that uses phpunit and stopwatch to perform tests
on the memory usage and execution time of some php functions. It provides a simple test case
as well as a trait that can be implemented in custom test cases.

# Installation

Just install it via composer:
```shell
composer require mathisburger/phpunit-stopwatch
```

# Usage

```php
class SomeTest extends \MathisBurger\PhpUnitStopwatch\StopwatchTestCase
{
    public function testSomething(): void
    {
        $this->runPerformanceTest(function () {
            sleep(2);
        });
        // Is successful
        $this->assertExecutionTimeBelow(3000);
    }
}
```

# License

This project is MIT licensed