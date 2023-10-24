<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public static function store($data_car, User $user){
        DB::insert('insert into cars (stamp, model, body_color, state_number, status, user_id) values (?, ?, ?, ?, ?, ?)',
            [$data_car['stamp'], $data_car['model'], $data_car['body_color'], $data_car['state_number'], $data_car['status'], $user->id]);
    }
    public static function update_car($data_car, $car){
        DB::update('update cars
                set stamp = ?, model = ?, body_color = ?, state_number = ?, status = ?
                where id = ?',
            [$data_car['stamp'], $data_car['model'], $data_car['body_color'], $data_car['state_number'], $data_car['status'], $car->id]);
    }


}
