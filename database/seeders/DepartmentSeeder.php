<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $json_file = File::get('database/data/department-data.json');
        DB::table('departments')->delete();
        $data = json_decode($json_file);
        foreach ($data as $obj) {
            Department::create(array(
                'name' => $obj->name,
                'institution_id' => $obj->institution_id
            ));
        } 
    }
}
