<?php

namespace App\Models\Export;

use App\Models\Entities\UserEntity;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection(): Collection
    {
        return UserEntity::all();
    }
}
