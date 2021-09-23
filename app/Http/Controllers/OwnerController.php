<?php

namespace App\Http\Controllers;

use App\Owner;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Return a list of all owners.
     *
     * @return array
     */
    public function index(): array
    {
        return Owner::withCount('addresses','cars')->get()->toArray();
    }

    public function avgInfo(): array
    {
        $avgCars = \DB::table('owners')
                    ->select(\DB::raw('round(COUNT(DISTINCT cars.id)/COUNT(DISTINCT owners.id)) as avg,round(COUNT(DISTINCT addresses.id)/COUNT(DISTINCT owners.id)) as aDavg'))
                    ->leftjoin('cars', 'owners.id', '=', 'cars.owner_id')
                    ->leftjoin('addresses', 'owners.id', '=', 'addresses.owner_id')
                    ->first();

                    return (array)$avgCars;                
    }

    /**
     * Return a single owner.
     *
     * @param Owner $owner
     * @return Owner
     */
    public function show(Owner $owner): Owner
    {
        return $owner;
    }

    /**
     * Store an owner.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $owner = Owner::create($request->all());

        return response()->json($owner, 201);
    }

    /**
     * Update an owner.
     *
     * @param Request $request
     * @param Owner $owner
     * @return JsonResponse
     */
    public function update(Request $request, Owner $owner): JsonResponse
    {
        $owner->where('id',$owner->id)->update($request->all());

        return response()->json($owner, 200);
    }

    /**
     * Delete an owner.
     *
     * @param Owner $owner
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Owner $owner): JsonResponse
    {
        $owner->delete();

        return response()->json(null, 204);
    }
}
