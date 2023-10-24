<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $guarded = [];

    public function cars()
    {
        return $this->belongsTo(Car::class, 'user_id', 'id');
    }

    public static function store_users($data_user, $data_car){
        DB::insert('insert into users (full_name, gender, tel, address) values (?, ?, ?, ?)', [$data_user['full_name'], $data_user['gender'], $data_user['tel'], $data_user['address']]);
        DB::insert('insert into cars (stamp, model, body_color, state_number, status, user_id) values (?, ?, ?, ?, ?, (SELECT id FROM users ORDER BY id DESC LIMIT 1))'
            , [$data_car['stamp'], $data_car['model'], $data_car['body_color'], $data_car['state_number'], $data_car['status']]);
    }

    public static function update_users($data_user, $user){
        DB::update('update users
                set full_name = ?, gender = ?, tel = ?, address = ?
                where id = ?',
            [$data_user['full_name'], $data_user['gender'], $data_user['tel'], $data_user['address'], $user->id]);
    }

    public static function delete_user($car){
        DB::delete('delete from cars where id = ?', [$car->id]);
        DB::delete('delete from users where id not in (select user_id from cars)');
    }
    public static function count_user(){
        $count = DB::table('cars')->count();
        return $count;
    }
    public static function count_on_user(){
        $count_on = DB::table('cars')->where('status', '=', 1)->count();
        return $count_on;
    }
}
