<?php

namespace App\Imports;

use App\Models\KindergartenStudent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class KindergartenStudentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new KindergartenStudent([
            'name'                => $row['name'] ?? null,
            'grade'               => $row['grade'] ?? null,
            'class'               => $row['class'] ?? null,
            'registration_number' => $row['registration_number'] ?? null,
            'gender'              => $row['gender'] ?? null,
            'dob'                 => $this->transformDate($row['date_of_birth']),
            'address'             => $row['address'] ?? null,
            'name_of_parents'     => $row['name_of_parents'] ?? null,
            'first_day_of_school' => $this->transformDate($row['first_day_of_school']),
            'teachers'            => $row['teachers'] ?? null,
        ]);
    }

    private function transformDate($value)
    {
        if (empty($value)) {
            return null;
        }

        try {
            if (is_numeric($value)) {
                return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
            }
            return Carbon::parse($value);
        } catch (\Exception $e) {
            return null;
        }
    }
}
