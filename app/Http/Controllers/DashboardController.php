<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crudSlider;
use App\Models\crudDownload;
use App\Models\Team;
use App\Models\Competence;
use App\Models\crudFasilitas;
use App\Models\crudPicture;      // Tambahkan ini
use App\Models\crudAlumni;    // Tambahkan ini
use App\Models\crudPartner;
use App\Models\CrudNews;   // Tambahkan ini

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'slideCount' => crudSlider::count(),
            'teamCount' => Team::count(),
            'kompetensiCount' => Competence::count(),
            'facilitiesCount' => crudFasilitas::count(),
            'pictureCount' => crudPicture::count(),
            'alumniCount' => crudAlumni::count(),
            'partnerCount' => crudPartner::count(),
            'newsCount' => CrudNews::count(),
            'downloadCount' => CrudDownload::count(),
        ]);
    }

    public function slider(){
        return view('slider');
    }
}
