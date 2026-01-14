<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crudSlider;
use App\Models\crudDownload;
use App\Models\team;
use App\Models\crudTeam;
use App\Models\copetence;
use App\Models\CrudKopetensi;
use App\Models\crudFasilitas;
use App\Models\crudPicture;      // Tambahkan ini
use App\Models\crudAlumni;    // Tambahkan ini
use App\Models\crudPartner;
use App\Models\crudNews;   // Tambahkan ini

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'slideCount' => crudSlider::count(),
            'teamCount' => team::count(),
            'kompetensiCount' => CrudKopetensi::count(),
            'facilitiesCount' => crudFasilitas::count(),
            'pictureCount' => crudPicture::count(),
            'alumniCount' => crudAlumni::count(),
            'partnerCount' => crudPartner::count(),
            'newsCount' => crudNews::count(),
            'downloadCount' => CrudDownload::count(),
        ]);
    }

    public function slider(){
        return view('slider');
    }
}
