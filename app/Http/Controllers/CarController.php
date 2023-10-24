<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class CarController extends Controller
{
    public function store(Request $request, User $user)
    {
        $data_car = request()->validate([
            'stamp' => 'required|string',
            'model' => 'required|string',
            'body_color' => 'required|string|max:50',
            'state_number' => 'required|string|unique:cars|max:30',
        ]);

        if($request->has('status')){
            $data_car['status'] = true;
        }else{
            $data_car['status'] = false;
        }

        Car::store($data_car, $user);
        return redirect()->route('user.index');
    }

    public function update(Car $car, Request $request)
    {
        $data_car = request()->validate([
            'stamp' => 'required|string',
            'model' => 'required|string',
            'body_color' => 'required|string|max:50',
            'state_number' => ['required', 'string', 'max:30',Rule::unique('cars', 'state_number')->ignore($car->id)],
        ]);

        if($request->has('status')){
            $data_car['status'] = true;
        }else{
            $data_car['status'] = false;
        }

        Car::update_car($data_car, $car);
        return redirect()->route('user.index');
    }
}
