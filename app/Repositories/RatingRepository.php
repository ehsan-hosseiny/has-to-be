<?php

namespace App\Repositories;

use App\Services\CalculateService;

class RatingRepository
{
    /**
     * @param array $rate
     * @param array $cdr
     * @return array
     */
    public function calculateCDR(array $rate,array $cdr):array
    {
        $result['components'] = resolve(CalculateService::class)->rating($rate['energy'], $rate['time'], $rate['transaction'],
            $cdr['meterStart'], $cdr['timestampStart'], $cdr['meterStop'], $cdr['timestampStop']);
        $result['overall'] = round(array_sum($result['components']),2);
        return $result;
    }

}
