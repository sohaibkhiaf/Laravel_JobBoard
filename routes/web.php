<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobOfferController;
use App\Http\Controllers\MyWorkApplicationController;
use App\Http\Controllers\MyWorkController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn() => to_route("jobOffers.index"));

Route::resource("jobOffers" , JobOfferController::class )->only(["index" , "show"]);

Route::resource("auth" , AuthController::class)->only(["create" , "store"]);
Route::get("login", fn() => to_route("auth.create"))->name("login");

Route::delete("logout" , fn() => to_route("auth.destroy"))->name("logout");
Route::delete("auth" , [AuthController::class , "destroy"])->name("auth.destroy");

Route::middleware("auth")->group(function() {

    Route::resource("jobOffer.jobApplication" , JobApplicationController::class)->only(["create" , "store"]);

    Route::resource("myJobApplications" , MyJobApplicationController::class)->only(["index" , "destroy"]);

    Route::resource("employer" , EmployerController::class)->only(["create", "store"]);

    Route::middleware("employer")->resource("myJobOffers" , MyJobOfferController::class);

});
