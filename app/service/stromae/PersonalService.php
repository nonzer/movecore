<?php
/**
 * Created by PhpStorm.
 * User: Simon.S
 * Date: 09/08/2020
 * Time: 15:49
 */

namespace App\service\stromae;


use App\User;
use Illuminate\Support\Facades\Hash;

class PersonalService
{
    public static function list(){
        return User::all();
    }

    public static function store(array $data)
    {
        $personal = new User();

        $personal->name = ucfirst($data['name']);
        $personal->tel = $data['tel'];
        $personal->birth_date = $data['birth_date'];
        $personal->roles_id = $data['role_id'];
        $personal->login = $data['login'];
        $personal->password = Hash::make($data['password']);

        $personal->save();

        return true;
    }

    public static function update(int $id, array $data)
    {
        $personal = User::findOrFail($id);

        $personal->name = ucfirst($data['name']);
        $personal->tel = $data['tel'];
        $personal->birth_date = $data['birth_date'];
        $personal->roles_id = $data['role_id'];

        $personal->save();

        return true;
    }

    public static function destroy(int $id)
    {
        $personal = User::find($id);
        $personal->delete();

        return true;
    }
}