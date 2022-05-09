<?php


namespace App\Interfaces;

/**
 * Interface AgentRepositoryInterface
 * @package App\Interfaces
 */
interface CalculateInterface
{

    /**
     * @param string $startTime
     * @param string $stopTime
     * @param float $timePrice
     * @return mixed
     */
    public function calculateEnergyHour(string $startTime, string $stopTime, float $timePrice);

    /**
     * @param float $meterStart
     * @param float $meterStop
     * @param float $energy
     * @return mixed
     */
    public function calculateEnergyPrice(float $meterStart, float $meterStop, float $energy);

}
