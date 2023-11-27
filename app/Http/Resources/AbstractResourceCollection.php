<?php
/**
 * Author: Jumaniyazov Mukhiddin ( mail: mnjumaniyazov@gmail.com tg: @mnjumaniyazov )
 * Date: 25/11/23 22:15
 */

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class AbstractResourceCollection extends ResourceCollection
{

    public static $wrap = 'items';

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    public function paginationInformation($request, $paginated, $default)
    {
        unset($default['links'], $default['meta']['links']);
        return $default;
    }
}
