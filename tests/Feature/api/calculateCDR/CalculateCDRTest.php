<?php

namespace Tests\Feature\api\calculateCDR;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CalculateCDRTest extends TestCase
{

    /** @test */
    public function calculate_should_be_validate()
    {

        $response = $this->postJson(route('calculate_price'), []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /** @test */
    public function calculate_cdr()
    {
        $response = $this->postJson(route('calculate_price'), []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /** @test */
    public function calculate_time_should_be_validate()
    {
        $response = $this->postJson(route('calculate_price'), [
            "rate" => [
                "energy" => 0.3,
                "time" => 2,
                "transaction" => 1
            ],
            "cdr" => [
                "meterStart" => 1204307,
                "timestampStart" => "2021-04-05T12:04:00Z",
                "meterStop" => 1215230,
                "timestampStop" => "2021-04-05T11:27:00Z"
            ]
        ]);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /** @test */
    public function calculate_time_with_zero_value()
    {
        $response = $this->postJson(route('calculate_price'), [
            "rate" => [
                "energy" => 0,
                "time" => 0,
                "transaction" => 0
            ],
            "cdr" => [
                "meterStart" => 1204307,
                "timestampStart" => "2021-04-05T10:04:00Z",
                "meterStop" => 1215230,
                "timestampStop" => "2021-04-05T11:27:00Z"
            ]
        ]);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals($response->baseResponse->original['overall'], 0 );
    }

}

