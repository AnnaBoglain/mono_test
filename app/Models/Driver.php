<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';
    protected $guarded = false;

    public function cars()
    {
        return $this->belongsTo(Car::class, 'user_id', 'id');
    }

    public static function store_driver($data_user, $data_car){
        DB::insert('insert into drivers (full_name, gender, tel, address) values (?, ?, ?, ?)', [$data_user['full_name'], $data_user['gender'], $data_user['tel'], $data_user['address']]);
        DB::insert('insert into cars (stamp, model, body_color, state_number, status, user_id) values (?, ?, ?, ?, ?, (SELECT MAX(`id`) FROM drivers LIMIT 1))'
            , [$data_car['stamp'], $data_car['model'], $data_car['body_color'], $data_car['state_number'], $data_car['status']]);
    }

    public static function update_driver($data_user, $user){
        DB::update('update drivers
                set full_name = ?, gender = ?, tel = ?, address = ?
                where id = ?',
            [$data_user['full_name'], $data_user['gender'], $data_user['tel'], $data_user['address'], $user->id]);
    }

    public static function delete_driver($car){
        DB::delete('delete from cars where id = ?', [$car->id]);
        DB::delete('delete from drivers where id not in (select user_id from cars)');
    }
    public static function count_driver(){
        $count = DB::table('cars')->count();
        return $count;
    }
    public static function count_on_driver(){
        $count_on = DB::table('cars')->where('status', '=', 1)->count();
        return $count_on;
    }
}
