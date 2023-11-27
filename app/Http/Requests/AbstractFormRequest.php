<?php
/**
 * Author: Jumaniyazov Mukhiddin ( mail: mnjumaniyazov@gmail.com tg: @mnjumaniyazov )
 * Date: 25/11/23 23:29
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractFormRequest extends FormRequest
{
    use FormRequestMethods;
}
