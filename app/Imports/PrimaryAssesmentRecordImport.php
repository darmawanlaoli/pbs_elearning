<?php

namespace App\Imports;

use App\Models\PrimaryAssesmentRecordDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class PrimaryAssesmentRecordImport implements ToModel, WithHeadingRow, WithStartRow, WithEvents
{
    protected $class;

    protected $id_assesment;

    public function __construct($id_assesment)
    {
        $this->class = null;
        $this->id_assesment = $id_assesment;
    }

    // Tentukan data mulai dari row ke-4
    public function startRow(): int
    {
        return 5;
    }

    // Tangkap class dari row ke-2
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event) {
                $worksheet = $event->getSheet()->getDelegate();
                $classRow = $worksheet->getCell('A2')->getValue();

                // Ambil hanya nama kelas (setelah "Class: ")
                $this->class = trim(str_replace('Class:', '', $classRow));
            },
        ];
    }

    // Simpan data siswa
    public function model(array $row)
    {
        $name = $row['name'];
        $concept = $row['understranding_concept'];
        $demonstrate = $row['demonstrate_knowledge'];
    
        // ❗ 1. Wajib diisi (tidak boleh kosong)
        if ($concept === null || $concept === '' || $demonstrate === null || $demonstrate === '') {
            session()->flash('error', "Gagal upload. Nilai tidak boleh kosong, mohon isi semua kolom.");
            return null;
        }
    
        // ❗ 2. Tolak jika mengandung koma atau titik (nilai desimal)
        if (preg_match('/[.,]/', $concept)) {
            session()->flash('error', "Gagal Upload. Mohon cek kembali dan pastikan semua nilai harus berupa bilangan bulat tanpa koma/titik.");
            return null;
        }
    
        if (preg_match('/[.,]/', $demonstrate)) {
            session()->flash('error', "Gagal Upload. Mohon cek kembali dan pastikan semua nilai harus berupa bilangan bulat tanpa koma/titik.");
            return null;
        }
    
        // ❗ 3. Pastikan integer murni
        if (!ctype_digit(strval($concept)) || !ctype_digit(strval($demonstrate))) {
            session()->flash('error', "Gagal Upload. Mohon cek kembali dan pastikan semua nilai harus berupa bilangan bulat tanpa koma/titik.");
            return null;
        }
    
        // Jika valid → simpan
        return new PrimaryAssesmentRecordDetails([
            'id_assesment' => $this->id_assesment,
            'name'         => $name,
            'concept'      => (int) $concept,
            'demonstrate'  => (int) $demonstrate,
        ]);
    }



    // Mapping heading row (row ke-3)
    public function headingRow(): int
    {
        return 4;
    }
}
