<?php

namespace App\Imports;

use App\Models\Kid;
use App\Models\User;
use Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class KidsImport implements ToModel ,WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (substr($row['user_phone'], 0, 3) == '966') {
            $row['user_phone'] = str_replace('966','',$row['user_phone']);
        }
        if (substr($row['phone'], 0, 3) == '966') {
            $row['phone'] = str_replace('966','',$row['phone']);
        }
        $user = User::updateOrCreate([
            'name' => $row['user_name'],
            'phone' => $row['user_phone'],
            'email' => $row['user_email'],
            'password' => Hash::make('123456789'),
        ]);
        return new Kid([
            'name' => $row['name'],
            'user_id' => $user->id,
            'stage_id' => $row['stage_id'],
            'phone' => $row['phone'],
            'sex' => $row['sex'],
            "blood_type_id" => $row['blood_type_id'],
            'class_room_id' => $row['class_room_id'],
            'id_number' => $row['id_number'],
            'birth_date' => $row['birth_date'],
            'height' => $row['height'],
            'weight' => $row['weight'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name'   => ['required','string','max:55'],
            'stage_id' => ['required','exists:stages,id'],
            'phone'  => ['required' , 'digits:9' ,'unique:kids'],
            'sex'      => ['required','in:1,2'],
            'class_room_id' => ['required' , 'exists:class_rooms,id'],
            'id_number' => ['required','digits:14','unique:kids'],
            'birth_date' => ['required','date_format:Y-m-d'],
            'height' => ['required','numeric'],
            'weight' => ['required','numeric'],
            'blood_type_id' => ['required','exists:blood_types,id'],
            'user_name' => ["required"],
            "user_phone" => ["required","unique:users,phone"],
            "user_email" => ["required" , "unique:users,email"],
        ];
    }
}
