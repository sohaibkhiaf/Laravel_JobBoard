<x-layout>
    <x-breadcrumbs :links="['My Job Applications' => '#']"/>

    @forelse ($jobApplications as $application)
        <x-job-card class="job-application" :jobOffer="$application->jobOffer">
            <div class="application-container">
                <div class="application-top">

                    <div class="application-top-applicants">
                        <div>
                            Applied {{$application->created_at->diffForHumans()}}
                        </div>
    
                        <div>
                            Other {{  Str::plural('applicant' , $application->jobOffer->job_applications_count -1)}}
                            {{$application->jobOffer->job_applications_count -1}}
                        </div>
                    </div>
                    
                    <div class="application-top-salaries">
                        <div>
                            Your asking salary {{number_format($application->expected_salary)}}
                        </div>
    
                        <div>
                            Average asking salary ${{number_format($application->jobOffer->job_applications_avg_expected_salary)}}
                        </div>
                    </div>

                </div>

                <div class="application-bottom">
                    <form action="{{route('myJobApplications.destroy' ,$application)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button class="cancel-application-button">Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty

    <div>
        <div>
            No job application yet
        </div>

        <div>
            Go find some jobs <a href="{{route('jobOffers.index')}}">Here</a>
        </div>
    </div>
        
    @endforelse
</x-layout>