<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatePriceRequest;
use App\Repositories\RatingRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CalculatePriceController extends Controller
{

    /**
     * @param CalculatePriceRequest $request
     * @return JsonResponse
     */
    public function calculate(CalculatePriceRequest $request):JsonResponse
    {
        $invoice = resolve(RatingRepository::class)->calculateCDR($request->rate,$request->cdr);
        return response()->json($invoice, Response::HTTP_OK);
    }
}
