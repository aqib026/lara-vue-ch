<?php

namespace App\Http\Controllers;

use App\Car;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Return a list of all cars.
     *
     * @return array
     */
    public function index(): array
    {
        return Car::with('owner','address')->get()->toArray();

    }

    /**
     * Return a single car.
     *
     * @param Car $car
     * @return Car
     */
    public function show(Car $car): Car
    {
        return $car;
    }

    /**
     * Store an car.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $car = Car::create($request->all());

        return response()->json($car, 201);
    }

    /**
     * Update an car.
     *
     * @param Request $request
     * @param Car $car
     * @return JsonResponse
     */
    public function update(Request $request, Car $car): JsonResponse
    {
        $car->where('id',$car->id)->update($request->all());

        return response()->json($car, 200);
    }

    /**
     * Delete an car.
     *
     * @param Car $car
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Car $car): JsonResponse
    {
        $car->delete();

        return response()->json(null, 204);
    }
}
