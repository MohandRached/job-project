<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;



class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')->latest()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }
    public function show($id)
    {
        $job = Job::with('company')->findOrFail($id);
        return view('jobs.show', compact('job'));
    }


    public function apply(Request $request, Job $job)
    {
        $request->validate([
            'video' => 'nullable|file|mimes:mp4,avi,mov|max:10240', // حد أقصى 10MB
        ]);

        // تحقق من التقديم السابق
        if (Application::where('user_id', auth()->id())->where('job_id', $job->id)->exists()) {
            return back()->with('error', 'لقد قمت بالتقديم مسبقاً على هذه الوظيفة.');
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'video_path' => $videoPath,
        ]);

        return back()->with('success', 'تم التقديم على الوظيفة بنجاح ✅');
    }

    public function toggleFavorite(Job $job)
    {
        $user = auth()->user();

        $alreadyFavored = $user->favoriteJobs()->where('job_id', $job->id)->exists();

        if ($alreadyFavored) {
            $user->favoriteJobs()->detach($job->id);
            return back()->with('success', 'تمت إزالة الوظيفة من المفضلة.');
        } else {
            $user->favoriteJobs()->attach($job->id);
            return back()->with('success', 'تمت إضافة الوظيفة إلى المفضلة.');
        }
    }


    public function favorites()
    {
        $jobs = auth()->user()->favoriteJobs()->with('company')->latest()->paginate(10);

        return view('jobs.favorites', compact('jobs'));
    }

    public function applications()
    {
        $applications = Application::with('job.company')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('jobs.applications', compact('applications'));
    }
}
