<?php

namespace Tests\Unit;

use App\Repositories\RatingRepository;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function check_rating_repository()
    {
        $rate = ["energy" => 0.3,
            "time" => 2,
            "transaction" => 1
        ];
        $cdr = ["meterStart" => 1204307,
            "timestampStart" => "2021-04-05T10:04:00Z",
            "meterStop" => 1215230,
            "timestampStop" => "2021-04-05T11:27:00Z"
        ];
        $ratingRepository = new RatingRepository();
        $data = $ratingRepository->calculateCDR($rate, $cdr);
        $this->assertTrue(!empty($data['components']));
    }

    /** @test */
    public function calculate_consume_energy_helper()
    {
        $calculated = calculateConsumeEnergy(1000, 1100);
        $this->assertEquals(1100 - 1000, $calculated);
    }

    /** @test */
    public function kilowatt_to_watt()
    {
        $converted = kilowattToWatt(1);
        $this->assertEquals(1 / 1000, $converted);
    }

    /** @test */
    public function hourly_rate_calculate()
    {
        $hourlyRate = hourlyRateCalculate(120, 2);
        $this->assertEquals(round(2 / 60 * 120, 3), $hourlyRate);
    }
}
