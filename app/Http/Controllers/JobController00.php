<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class JobController extends Controller
{
    protected $apiBase = 'http://localhost:8080';

    public function index()
    {
        $response = Http::acceptJson()->get("{$this->apiBase}/api/jobs");
        $jobs = is_array($response->json()) ? $response->json() : [];
        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $response = Http::acceptJson()->get("{$this->apiBase}/api/jobs");
        $jobs = is_array($response->json()) ? $response->json() : [];
        $job = collect($jobs)->firstWhere('id', $id);
        return view('jobs.show', compact('job'));
    }
}
