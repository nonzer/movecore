<?php
/**
 * Created by PhpStorm.
 * User: Simon.S
 * Date: 09/08/2020
 * Time: 00:40
 */

namespace App\service\stromae;


use App\Role;

class RoleService
{
    public static function list(){
        return Role::all();
    }

    public static function store(array $data)
    {
        $role = new Role();
        $role->name = ucfirst($data['name']);
        $role->description = $data['description'];
        $role->save();

        return true;
    }

    public static function update(int $id, array $data)
    {
        $role = Role::find($id);
        $role->name = ucfirst($data['name']);
        $role->description = $data['description'];
        $role->save();

        return true;
    }

    public static function destroy(int $id)
    {
        $role = Role::find($id);
        $role->delete();

        return true;
    }
}