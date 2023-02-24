<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id', 'name', 'email', 'email_verified_at')->get();
    }

    public function headings(): array
    {
        // Return the column headers as an array
        return [
            'ID',
            'Name',
            'Email',
            'Email_Verified_At',
            // add more headings here as needed
        ];
    }
}
