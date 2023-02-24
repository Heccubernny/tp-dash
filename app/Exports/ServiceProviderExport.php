<?php

namespace App\Exports;

use App\Models\ServiceProvider;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiceProviderExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ServiceProvider::all();
    }

    public function headings(): array
    {
        // Return the column headers as an array
        return [
            'ID',
            'Provider Name',
            'Email',
            'Email_Verify_At',
            'Status',
            'Mobile',
            // add more headings here as needed
        ];
    }
}
