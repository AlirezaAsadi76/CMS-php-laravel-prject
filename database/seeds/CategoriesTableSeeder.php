<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            ['user_id'=>'1',
            'name'=>'laravel',
            'slug'=>'laravel',
            'is_published'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()],
            ['user_id'=>'1',
            'name'=>'c++',
            'slug'=>'c++',
            'is_published'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()],
            ['user_id'=>'1',
            'name'=>'python',
            'slug'=>'python',
            'is_published'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()],
            ['user_id'=>'1',
            'name'=>'django',
            'slug'=>'django',
            'is_published'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()],
            ['user_id'=>'1',
            'name'=>'javascript',
            'slug'=>'javascript',
            'is_published'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()]
        ]);
    }
}
