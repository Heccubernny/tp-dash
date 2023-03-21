<?php

namespace App\Exports;

use App\Models\User;
use Kreait\Firebase\Contract\Database;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UserExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(Database $database){
        $this->database = $database;
        $this->userExport =  $this->database->getReference('users')
            ->orderByChild('isCustomer')
            ->equalTo(true)
            ->getSnapshot()
            ->getValue();
    }
    public function collection()
    {


        return  $this->userExport;
//            User::select('id', 'name', 'email', 'email_verified_at')->get();
    }

    public function headings(): array
    {
        $filteredUsers = [];

        foreach ($this->usersExport as $userId => $userData) {
            if (isset($userData['email']) && isset($userData['fullName']) && isset($userData['address']) && isset($userData['phone']) && isset($userData['gender']) && isset($userData['image'])) {
                $filteredUsers[$userId] = [
                    'email' => $userData['email'],
                    'fullName' => $userData['fullName'],
                    'address' => $userData['address'],
                    'phone' => $userData['phone'],
                    'gender' => $userData['gender'],
                    'image' => $userData['image'],

                ];
            }

            // Return the column headers as an array
//        return [
//            'ID',
//            'Name',
//            'Email',
//
//            // add more headings here as needed
//        ];
        }
        dd($filteredUsers);

        return $filteredUsers;
    }

        public function registerEvents(): array
    {
        return [
                AfterSheet::class => function(AfterSheet $event) {
                    $cellRange = 'A1:F1'; // All headers
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                },
            ];
    }
}
