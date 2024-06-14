<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

    public function create(JobOffer $jobOffer)
    {
        // apply policies
        $this->authorize("apply" , $jobOffer);
        
        return view("job_application.create" , ["jobOffer" => $jobOffer]);
    }

    public function store(JobOffer $jobOffer, Request $request)
    {
        // apply policies
        $this->authorize("apply" , $jobOffer);

        $validatedData = $request->validate([
            "expected_salary"=> "required|min:1|max:1000000",
            "cv" => "required|file|mimes:pdf",
        ]);

        $file = $request->file("cv");
        $path = $file->store("cvs" , "private");

        $jobOffer->jobApplications()->create([
            "user_id" => $request->user()->id,
            "expected_salary" => $validatedData["expected_salary"],
            "cv_path" => $path,
        ]);

        return redirect()->route("jobOffers.show" , ["jobOffer" => $jobOffer])->with("success","Job application submitted.");
    }

}
