<?php
/**
 * Author: Jumaniyazov Mukhiddin ( mail: mnjumaniyazov@gmail.com tg: @mnjumaniyazov )
 * Date: 25/11/23 17:59
 */

namespace App\Repository;

use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Builder;

class MerchantRepository
{
    protected Builder $query;

    public function __construct()
    {
        $this->query = Merchant::query();
    }

    public function filterQuery(array $params)
    {
        if (!empty($params['name'])) {
            $this->query->where('name', 'ilike', '%' . $params['name'] . '%');
        }

        return $this->query;
    }

    public function create(StoreMerchantRequest $request)
    {
        return $this->query->create($request->validationData());
    }

    public function update(Merchant $merchant, UpdateMerchantRequest $request)
    {
        return $merchant->updateOrFail($request->validationData());
    }

    public function delete(Merchant $merchant)
    {
        $merchant->shops()->delete();

        $merchant->delete();
    }
}
