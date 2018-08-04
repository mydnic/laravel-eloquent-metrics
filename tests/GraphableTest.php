<?php

namespace Mydnic\Metrics\Test;

use Mydnic\Metrics\Test\TestCase;

class GraphableTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->makeModels(500);
    }

    /** @test */
    public function it_returns_an_array_of_12_months_when_using_count_by_month()
    {
        $this->assertCount(12, TestModel::countByMonth());
    }

    /** @test */
    public function it_returns_an_array_of_6_months_when_using_count_by_month_with_parameters()
    {
        $this->assertCount(6, TestModel::countByMonth(now()->subMonth(5), now()));
    }

    /** @test */
    public function it_returns_an_array_of_30_days_when_using_count_by_day()
    {
        dd(TestModel::countByDay());
        $this->assertCount(30, TestModel::countByDay());
    }

    private function makeModels($amount = 100)
    {
        foreach (range(1, $amount) as $i) {
            TestModel::create(['created_at' => now()->subDays(random_int(1, 500))]);
        }
    }
}
