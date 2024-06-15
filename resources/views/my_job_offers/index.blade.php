<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']" />

    <div class="add-new-container">
        <x-link-button class="add-new-button" href="{{route('myJobOffers.create')}}">Add New</x-link-button>
    </div>

    @forelse ($jobOffers as $jobOffer)
        <x-job-card class="my-job-offers" :$jobOffer>
            
            <div>

                @forelse ($jobOffer->jobApplications as $application)
                    <div class="application-container">

                        <div class="application-top">
                            <div class="application-user-name">
                                {{$application->user->name}},
                            </div>

                            <div class="application-created-at">
                                Applied {{$application->created_at->diffForHumans()}}
                            </div>

                            <div class="application-download-cv">
                                Download CV
                            </div>
                        </div>

                        <div class="application-bottom">
                            ${{number_format($application->expected_salary)}}
                        </div>
                    </div>
                @empty
                    <div class="no-applications">No applications yet</div>
                @endforelse

                <div>
                    <x-link-button class="edit-job-offer-button" href="{{route('myJobOffers.edit', ['myJobOffer' => $jobOffer])}}">Edit</x-link-button>
                </div>


            </div>
        </x-job-card>
        
    @empty
        <div class="no-job-offers-container">
            <div class="no-job-offers">
                No Jobs yet
            </div>

            <div class="post-job-offer">
                Post your first Job <a href="{{route('myJobOffers.create')}}">here!</a>
            </div>
        </div>
    @endforelse


</x-layout>