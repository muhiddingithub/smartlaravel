<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;
use App\Http\Resources\MerchantCollectionResource;
use App\Http\Resources\MerchantRecourse;
use App\Models\Merchant;
use App\Repository\MerchantRepository;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function __construct(
        private readonly MerchantRepository $merchantRepository
    )
    {
    }

    public function index(Request $request)
    {
        return MerchantCollectionResource::make(
            $this->merchantRepository->filterQuery($request->all())
                ->paginate(perPage: $request->query->getInt('size', 10),
                    page: $request->query->getInt('page', 1)
                )
        );
    }

    public function store(StoreMerchantRequest $request)
    {
        return MerchantRecourse::make($this->merchantRepository->create($request));
    }

    public function show(Merchant $merchant)
    {
        return MerchantRecourse::make($merchant);
    }

    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        $this->merchantRepository->update($merchant, $request);

        return MerchantRecourse::make($merchant);
    }

    public function destroy(Merchant $merchant)
    {
        $this->merchantRepository->delete($merchant);
    }
}
