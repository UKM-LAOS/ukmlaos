<?php

namespace App\Http\Controllers\Course\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $title = 'Edit Profil';

    public function index()
    {
        return view('pages.course.back.setting.index', [
            'title' => $this->title
        ]);
    }
}
