<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $drivers = Driver::all();
        $cars = Car::paginate(3);
        $count = Driver::count_driver();
        $count_on = Driver::count_on_driver();
        return view('user.index', compact('drivers', 'cars', 'count_on', 'count'));
    }

    public function __invoke(Request $request)
    {
        $drivers = Driver::all();
        return $drivers;
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
            'tel' => 'required|string|unique:drivers',
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
        Driver::store_driver($data_user, $data_car);
        return redirect()->route('user.index');
    }

    public function update_driver(Driver $driver)
    {
        $data_driver = request()->validate([
            'full_name' => 'required|string|min:3',
            'gender' => 'required|string',
            'tel' => ['required', 'string', 'min:11', Rule::unique('drivers', 'tel')->ignore($driver->id)],
            'address' => 'required|string',
        ]);
        Driver::update_driver($data_driver, $driver);
        return redirect()->route('user.index');
    }

    public function edit(Driver $user, Car $car)
    {
        if (!Gate::allows('edit', $car)) {
            Session::flash('flash_message', 'Для изменения нужно авторизоваться kak admin@test.test!');
            return redirect()->route('user.index');
        }else{
        $cars = Car::all();
        return view('user.edit', compact('user', 'cars'));
        }
    }

    public function show(Driver $user)
    {
        return view('user.show', compact('user'));
    }

    public function delete(Car $car)
    {
        if (! Gate::allows('delete', $car)) {
            Session::flash('flash_message', 'Для удаления нужно авторизоваться kak admin@test.test!');
        }else {
            Driver::delete_driver($car);
        }
        return redirect()->route('user.index');
    }
}
