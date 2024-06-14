<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{

    public function index()
    {
        // apply policies
        $this->authorize("viewAny" , JobOffer::class);

        $filters = request()->only( ["search" , "min_salary" , "max_salary" , "experience" , "category"]);
        return view("job_offers.index" , ["jobOffers" => JobOffer::with("employer")->filter($filters)->latest()->get()]);
    }


    public function show(JobOffer $jobOffer)
    {
        // apply policies
        $this->authorize("view" , $jobOffer);

        return view("job_offers.show", ["jobOffer"=> $jobOffer->load("employer.jobOffers")]);
    }

}
