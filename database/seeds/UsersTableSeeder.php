<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     use HasFactory;

    // モデルに関連付けるテーブル
    protected $table = 'users';

    // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    // 登録・更新可能なカラムの指定
    protected $fillable = ['password'];


    public function run()
    {
        //
                DB::table('users')->insert([
            ['name' => 'Atlas一郎',
             'address' => 'ichiro@gmail.com',
             'password' => 'ichiro'],
            ['name' => 'Atlas二郎',
             'address' => 'jiro@gmail.com',
             'password' => 'jiro'],
            ['name' => 'Atlas三郎',
            'address' => 'saburo@gmail.com',
            'password' => 'saburo']
        ]);
    }
}
