<?php


namespace App\Services;

use App\Interfaces\CalculateInterface;

/**
 * Class AuthService
 * @package App\Services
 */
class CalculateService implements CalculateInterface
{
    /**
     * @param float $energy
     * @param int $timePrice
     * @param int $transaction
     * @param int $meterStart
     * @param string $timestampStart
     * @param int $meterStop
     * @param string $timestampStop
     * @return array
     */
    public function rating(float $energy, int $timePrice, int $transaction,
                           int $meterStart, string $timestampStart, int $meterStop, string $timestampStop)
    {

        $energyPrice = $this->calculateEnergyPrice($meterStart, $meterStop, $energy);
        $energyHour = $this->calculateEnergyHour($timestampStart, $timestampStop, $timePrice);
        return [
            'energy' => $energyPrice,
            'time' => $energyHour,
            'transaction' => $transaction
        ];
    }


    /**
     * @inheritDoc
     */
    public function calculateEnergyPrice(float $meterStart, float $meterStop, float $energy): float
    {
        $energy = kilowattToWatt($energy);
        $energyConsume = calculateConsumeEnergy($meterStart, $meterStop);
        return round($energyConsume * $energy, 3, PHP_ROUND_HALF_UP);
    }


    /**
     * @inheritDoc
     */
    public function calculateEnergyHour(string $startTime, string $stopTime, float $timePrice)
    {
        $consumedTime = calculateConsumeTime($startTime, $stopTime);
        return hourlyRateCalculate($consumedTime, $timePrice);
    }

}
