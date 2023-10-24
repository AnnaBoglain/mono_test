<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $cars = Car::paginate(3);
        $count = User::count_user();
        $count_on = User::count_on_user();
        return view('user.index', compact('users', 'cars', 'count_on', 'count'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data_user = request()->validate([
            'full_name' => 'required|string|min:3',
            'gender' => 'required|string',
            'tel' => 'required|string|unique:users|min:11|numeric|max:30',
            'address' => 'required|string',
        ]);

        $data_car = request()->validate([
            'stamp' => 'required|string',
            'model' => 'required|string',
            'body_color' => 'required|string',
            'state_number' => 'required|string|unique:cars',
        ]);

        if($request->has('status')){
            $data_car['status'] = true;
        }else{
            $data_car['status'] = false;
        }
        User::store_users($data_user, $data_car);
        return redirect()->route('user.index');
    }

    public function update_user(User $user, Car $cars, Request $request)
    {
        $data_user = request()->validate([
            'full_name' => 'required|string|min:3',
            'gender' => 'required|string',
            'tel' => ['required', 'string', 'min:11','numeric', 'max:30', Rule::unique('users', 'tel')->ignore($user->id)],
            'address' => 'required|string',
        ]);
        User::update_users($data_user, $user);
        return redirect()->route('user.index');
    }

    public function edit(User $user, Car $car)
    {
        $cars = Car::all();
        return view('user.edit', compact('user', 'cars'));
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function delete(Car $car)
    {
        User::delete_user($car);
        return redirect()->route('user.index');
    }

}
