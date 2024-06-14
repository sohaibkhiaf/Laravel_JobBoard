<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class MyJobOfferController extends Controller
{
    public function index()
    {
        // apply policies
        $this->authorize("viewAnyEmployer" , JobOffer::class);

        return view("my_job_offers.index" , [
            "jobOffers" => auth()->user()->employer->jobOffers()
                        ->with(["employer", "jobApplications", "jobApplications.user",] )
                        ->get()
        ]);
    }

    public function create()
    {
        // apply policies
        $this->authorize("create" , JobOffer::class);

        return view("my_job_offers.create");
    }

    public function store(JobRequest $request)
    {
        // apply policies
        $this->authorize("create" , JobOffer::class);

        auth()->user()->employer->jobOffers()->create( $request->validated() );

        return redirect()->route("jobOffers.index")
            ->with("success", "Job created successfully");
    }


    public function edit(JobOffer $myJobOffer)
    {
        $this->authorize("update" , $myJobOffer);

        return view("my_job_offers.edit" , ["myJobOffer" => $myJobOffer]);
    }


    public function update(JobRequest $request, JobOffer $myJobOffer)
    {
        // apply policies
        $this->authorize("update" , $myJobOffer);

        $myJobOffer->update( $request->validated() );

        return redirect()->route("jobOffers.index")
            ->with("success", "Job updated successfully");
    }

    public function destroy(JobOffer $myJobOffer)
    {
        //
    }
}
