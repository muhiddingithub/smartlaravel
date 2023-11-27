<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Http\Resources\ShopCollectionResource;
use App\Http\Resources\ShopResource;
use App\Models\Shop;
use App\Repository\ShopRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct(
        private readonly ShopRepository $shopRepository
    )
    {
    }

    public function index(Request $request)
    {
        return ShopCollectionResource::make(
            $this->shopRepository->filterQuery($request->all())
                ->with(['merchant'])
                ->paginate(page: $request->query->getInt('page', 1), perPage: $request->query->getInt('size', 10))
        );
    }

    public function store(StoreShopRequest $request)
    {
        return ShopResource::make($this->shopRepository->create($request));
    }

    public function show(Shop $shop)
    {
        //
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
