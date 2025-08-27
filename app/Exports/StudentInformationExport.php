<?php

namespace App\Exports;

use stdClass;
use App\Models\Admission;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentInformationExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id)
    {
        $this->admission_id = $id;
    }

    public function view(): View
    {
        $admission = Admission::with('qualifications', 'qualifications.degree', 'qualifications.institute', 'studentInformations')->findOrFail($this->admission_id);
        $studentInfo = $admission->studentInformations;

        $primary = null;
        $ssc = null;
        $college = null;
        $university = null;
        foreach ($admission->qualifications as $key => $qualification) {
            if($qualification->degree_id == 1)
            {
                $primary = $qualification;
            }
            if($qualification->degree_id == 2)
            {
                $ssc = $qualification;
            }
            if($qualification->degree_id == 3)
            {
                $college = $qualification;
            }
            if($qualification->degree_id == 4)
            {
                $honors = $qualification;
            }
            if($qualification->degree_id == 5)
            {
                $masters = $qualification;
            }
        }
        return view('admission.information-excel', compact('admission', 'primary', 'ssc', 'college', 'honors', 'masters','studentInfo'));
    }
}
