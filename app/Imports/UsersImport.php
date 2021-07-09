<?php

namespace App\Imports;

use App\Entities\User;
use App\Http\Controllers\HelperController as Helps;
use Carbon\Carbon;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        if (env('EXCEL_DEBUG')) {
            dd($rows);
        } 

        foreach ($rows as $row) {

            $description = serialize(json_encode([
                'typeId' => $row[9],
                'display_name' => $row[7] . ' ' . $row[8],
                'typecourse' =>  $row[0],
                'gender' =>  $row[1],
                'birth' =>  $row[2],
                'tocken' =>   bcrypt($row[16]),
                'rol' =>   'user',
                'permission' => Helps::permision('user'),
                'pay' =>  $row[3],
                'adultId' => $row[4],
                'adultName' => $row[5],
            ]));

            $final = [
                'email' => $row[6],
                'deleted' => 0,
                'suspended' => 0,
                'firstname' => $row[7],
                'lastname' => $row[8],
                'institution' => $row[10],
                'idnumber' => $row[11],
                'username' => $row[11],
                'confirmed' => 1,
                'mnethostid' => 1,
                'lang' => 'es_co',
                'timecreated' => Carbon::now(),
                'timemodified' => Carbon::now(),
                'phone1' => $row[12],
                'phone2' => $row[13],
                'city' => $row[14],
                'department' => $row[15],
                'password' => md5($row[16]),
                'description' => $description,
            ];
            User::create($final);
        }
    }
}
