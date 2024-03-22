<?php

namespace App\Models;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM users ORDER BY create_at DESC');
        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (fullname, email, create_at) VALUES (?,?,?)', $data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        $data = array_merge($data, [$id]);
        return DB::update('UPDATE ' . $this->table . ' SET fullname = ?, email = ?, update_at = ? WHERE id = ?', $data);
    }

    public function deleteUser($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id =?", [$id]);
    }

    public function statementUser($sql)
    {
        return DB::statement($sql);
    }

    public function learnQueryBuilder()
    {
        DB::enableQueryLog();
        // $id = 2;
        // $list = DB::table($this->table)
        //     ->select('fullname as hoten', 'email', 'id', 'update_at','create_at')
        // ->where('id', 'like', '%1%')
        // ->whereNotIn('id', [1, 3])
        // ->whereIn('id', [1, 3])
        // ->whereNotBetween('id', [1, 3])
        // ->whereBetween('id', [1, 3])
        // ->whereNull('update_at')    
        // ->whereNotNull('update_at')    
        // ->whereYear('create_at', '2024')
        // ->whereColumn('create_at', 'update_at') 
        // ->get();
        // ->where('id', '>', 1)   
        // ->where('id', '<>', 8)
        // ->where('id', '>=', 8)
        // ->where('id', '<=', 9)
        // ->where([
        //     // ['id',  '>=', 8],
        //     // ['id',  '<=', 9],
        //     'id'=> '8',
        //     'fullname'=> 'Nguyễn Văn Tường Nu',
        // ])
        // ->where('id', 1)
        // ->orWhere('id', 2)
        // ->toSql();
        // ->where('id', 0)
        // // ->where('id','<',2)
        // ->where(function ($query) use ($id) {
        //     $query->where('id', '<', $id)->orWhere('id', '>', $id);
        // })

        //Join bang
        // $list = DB::table('users')
        // ->select('users.*', 'groups.name as group_name')
        // ->rightJoin('groups','users.group_id','=','groups.id')
        // ->orderBy('create_at', 'desc')
        // ->orderBy('id', 'desc')
        // ->inRandomOrder()
        // ->select(DB::raw('count(id) as email_count'), 'email', 'fullname')
        // ->groupBy('email')  
        // ->having('email_count', '>=', 1)
        // ->groupBy('fullname')
        // ->limit(1)
        // ->offset(1)
        // ->take(2)
        // ->skip(2)
        // ->get();

        // insert data
        // $status = DB::table('users')->insert([
        //     'fullname' => 'Nguyễn Văn Tường Ne',
        //     'email' => 'ne.nguyenvan25@student.passerellesnumeriques.org',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s'),
        // ]);

        // $lastId = DB::getPdo()->lastInsertId();
        // dd($lastId);

        // $lastId = DB::table('users')->insertGetId([
        //     'fullname' => 'Nguyễn Văn Tường Non',
        //     'email' => 'non.nguyenvan25@student.passerellesnumeriques.org',
        //     'group_id' => 1,
        //     'create_at' => date('Y-m-d H:i:s'),
        // ]);
        // dd($lastId);

        // sua bang ghi
        // $status = DB::table('users')
        // ->where('id', 6)
        // ->update([
        //     'fullname' => 'Nguyễn Văn Tường Nen',
        //     'email' => 'nen.nguyenvan25@student.passerellesnumeriques.org',
        //     'update_at' => date('Y-m-d H:i:s'),
        // ]);

        //xoa bang ghi
        // $status = DB::table('users')
        // ->where('id', 6)
        // ->delete();

        //dem bang ghi
        $count = DB::table('users')
        ->where('id','>',3)
        ->count();

        dd($count);

        $sql = DB::getQueryLog();
        // dd($sql);
        $detail = DB::table($this->table)->first();
    }
}
