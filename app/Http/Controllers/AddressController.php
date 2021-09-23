<?php

namespace App\Http\Controllers;

use App\Address;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Return a list of all addresses.
     *
     * @return array
     */
    public function index()
    {
        return Address::withCount('cars')
                        ->with('owner')->get()->toArray();
    }

    /**
     * Return a Avg of Cars per Address.
     *
     * @return array
     */

    public function avgInfo(): array
    {
        $avgCars = \DB::table('addresses')
                    ->select(\DB::raw('round(COUNT(DISTINCT cars.id)/COUNT(DISTINCT addresses.id)) as avg'))
                    ->leftjoin('cars', 'addresses.id', '=', 'cars.address_id')
                    ->first();

                    return (array)$avgCars;                
    }


    /**
     * Return a single address.
     *
     * @param Address $address
     * @return Address
     */
    public function show(Address $address): Address
    {
        return $address;
    }

    /**
     * Store an address.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $address = Address::create($request->all());

        return response()->json($address, 201);
    }

    /**
     * Update an address.
     *
     * @param Request $request
     * @param Address $address
     * @return JsonResponse
     */
    public function update(Request $request, Address $address): JsonResponse
    {
        $address->where('id',$address->id)->update($request->all());

        return response()->json($address, 200);
    }

    /**
     * Delete an address.
     *
     * @param Address $address
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Address $address): JsonResponse
    {
        $address->delete();

        return response()->json(null, 204);
    }
}
