<?php
/**
 * Author: Jumaniyazov Mukhiddin ( mail: mnjumaniyazov@gmail.com tg: @mnjumaniyazov )
 * Date: 25/11/23 17:59
 */

namespace App\Repository;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Builder;

class ShopRepository
{
    protected Builder $query;

    public function __construct()
    {
        $this->query = Shop::query();
    }

    public function filterQuery(array $params)
    {
        if (!empty($params['merchant'])) {
            $this->query->where('merchant_id', $params['merchant']);
        }

        if (!empty($params['longitude']) && !empty($params['latitude'])) {
            $this->query->orderByRaw('haversine(latitude, longitude, :lat, :log)', ['lat' => $params['latitude'], 'log' => $params['longitude']]);
        }

        return $this->query;
    }

    public function create(StoreShopRequest $request)
    {
        return $this->query->create($request->validationData());
    }

    public function update(Shop $shop, UpdateShopRequest $request)
    {
        return $shop->updateOrFail($request->validationData());
    }

    public function delete(Shop $shop)
    {
        $shop->delete();
    }
}
