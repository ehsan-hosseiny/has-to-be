<?php

/**
 * @param float $value
 * @return float|int
 */
function kilowattToWatt(float $value):float|int
{
    return $value/1000;
}

/**
 * @param float $meterStart
 * @param float $meterStop
 * @return float
 */
function calculateConsumeEnergy(float $meterStart,float $meterStop):float
{
    return $meterStop - $meterStart;
}

/**
 * @param string $timeStart
 * @param string $timeStop
 * @return int
 */
function calculateConsumeTime(string $timeStart,string $timeStop):int
{
    $timeStart = \Carbon\Carbon::parse($timeStart);
    $timeStop = \Carbon\Carbon::parse($timeStop);
    return $timeStop->diffInMinutes($timeStart);

}

function hourlyRateCalculate($timespent, $costPerHour = 1)
{
    return round($costPerHour/60*$timespent,3);
}
