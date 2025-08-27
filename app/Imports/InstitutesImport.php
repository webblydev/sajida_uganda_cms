<?php

namespace App\Imports;

use App\Models\Area;
use App\Models\Institute;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class InstitutesImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    protected $areaName;

    public function __construct($areaName="")
    {
        $this->areaName = $areaName;
    }

    public function model(array $row)
    {
        $area = Area::firstOrCreate(['name' => $this->areaName]);

        if($row[1] !== 'Name of School' && $row[1] !== null){
            $institute = Institute::firstOrCreate(
                ['name' => $row[1]],
                [
                    'address' => $row[2],
                    'url' => $row[3] !== 'Not Found' ? $row[3] : null,
                    'area_id' => $area->id
                ]
            );
        }

        return null;

    }

    public function batchSize(): int
    {
        return 10000; 
    }
}