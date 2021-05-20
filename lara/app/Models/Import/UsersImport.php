<?php

namespace App\Models\Import;

use App\Models\Entities\UserEntity;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row): UserEntity
    {
        return new UserEntity([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }
}
