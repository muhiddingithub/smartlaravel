<?php
/**
 * Author: Jumaniyazov Mukhiddin ( mail: mnjumaniyazov@gmail.com tg: @mnjumaniyazov )
 * Date: 25/11/23 23:27
 */

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

trait FormRequestMethods
{

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
