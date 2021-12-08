<?php

namespace App\Http\Controllers;

use App\Exports\VolunteerExport;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function volunteerSheet(Request $request)
    {
        $data = Volunteer::with(['province', 'regency'])
            ->when($request->regency_id != 0, function($query) use ($request) {
               return $query->where('regency_id', $request->regency_id);
            })
            ->get();

        $volunter = $data->map(function($data) {
            switch ($data->status_of_marital) {
                case 'm':
                    $statusMarital = 'Menikah';
                    break;

                case 'd':
                    $statusMarital = 'Cerai';
                    break;

                case 'w':
                    $statusMarital = 'Cerai Mati';
                    break;

                default:
                    $statusMarital = 'Cerai Mati';
                    break;
            }
            switch ($data->status_of_job) {
                case 'w':
                    $statusJob = 'Bekerja';
                    break;

                case 'n':
                    $statusJob = 'Tidak Bekerja';
                    break;

                default:
                    $statusJob = 'Pelajar';
                    break;
            }
            return [
                'no_id' => $data->identity_number,
                'name' => $data->name,
                'date_of_birth' => $data->date_of_birth->format('d/m/Y'),
                'gender' => $data->gender == 'm' ? 'Laki-laki' : 'Perempuan',
                'province' => $data->province->name,
                'regency' => $data->regency->name,
                'address' => $data->address,
                'status_of_marital' => $statusMarital,
                'status_of_job' => $statusJob,
                'phone' => $data->phone,
                'email' => $data->email,
                'media_social' => $data->media_social,
                'active' => $data->active == 1 ? 'Aktif' : 'Non-Aktif',
            ];
        });

        $export = new VolunteerExport(json_decode($volunter));

        return Excel::download($export, 'volunteer-'.Str::slug(now()).'.xlsx');
    }
}
