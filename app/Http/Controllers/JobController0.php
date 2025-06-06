<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobController extends Controller
{
    protected $apiBase = 'https://your-server.com'; // 🛠️ استبدله بالرابط الحقيقي

    public function index()
    {
        $response = Http::withOptions(['verify' => false])
            ->withToken('146|NmNVeKL3hmU9GJGrSf3rzFYDlUAGSM3FOIrJc3pr')
            ->acceptJson()
            ->get("{$this->apiBase}/ar/api/job-seeker/all-jobs");

        $jobs = is_array($response->json()) ? $response->json() : [];

        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $response = Http::withOptions(['verify' => false])
            ->withToken('146|NmNVeKL3hmU9GJGrSf3rzFYDlUAGSM3FOIrJc3pr')
            ->acceptJson()
            ->get("{$this->apiBase}/ar/api/job-seeker/job-details/{$id}");

        $job = $response->successful() ? $response->json() : null;

        return view('jobs.show', compact('job'));
    }

    public function favorite($id)
    {
        $response = Http::withOptions(['verify' => false])
            ->withToken('146|NmNVeKL3hmU9GJGrSf3rzFYDlUAGSM3FOIrJc3pr')
            ->acceptJson()
            ->post("{$this->apiBase}/ar/api/job-seeker/jobs/{$id}/mark-favorite");

        return back()->with($response->successful() ? 'success' : 'error',
            $response->successful() ? 'تمت إضافة الوظيفة إلى المفضلة ✅' : 'فشل في الإضافة إلى المفضلة ❌');
    }

    public function favorites()
    {
        $response = Http::withOptions(['verify' => false])
            ->withToken('146|NmNVeKL3hmU9GJGrSf3rzFYDlUAGSM3FOIrJc3pr')
            ->acceptJson()
            ->get("{$this->apiBase}/ar/api/job-seeker/favorite-jobs");

        $jobs = is_array($response->json()) ? $response->json() : [];

        return view('jobs.favorites', compact('jobs'));
    }

    public function faqs()
    {
        $response = Http::withOptions(['verify' => false])
            ->acceptJson()
            ->get("{$this->apiBase}/ar/api/faqs");

        $faqs = is_array($response->json()) ? $response->json() : [];

        return view('pages.faqs', compact('faqs'));
    }

    public function policies()
    {
        $response = Http::withOptions(['verify' => false])
            ->acceptJson()
            ->get("{$this->apiBase}/ar/api/policies");

        $policy = $response->successful() ? $response->json() : null;

        return view('pages.policies', compact('policy'));
    }
}
