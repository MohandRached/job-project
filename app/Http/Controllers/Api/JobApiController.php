<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobApiController extends Controller
{
    public function index()
    {
        return response()->json([
            [
                'id' => 1,
                'title' => 'مبرمج Laravel',
                'work_place' => 'غزة',
                'work_field' => ['name' => 'برمجة'],
                'description' => 'نبحث عن مطور Laravel بخبرة جيدة.',
                'work_experience' => 2,
                'education_level' => 'بكالوريوس'
            ],
            [
                'id' => 2,
                'title' => 'مصمم UI/UX',
                'work_place' => 'خانيونس',
                'work_field' => ['name' => 'تصميم'],
                'description' => 'مصمم محترف لتطبيقات الهاتف.',
                'work_experience' => 1,
                'education_level' => 'دبلوم'
            ]
        ]);
    }
}
