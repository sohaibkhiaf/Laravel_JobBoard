<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']" />

    <div>
        <x-link-button href="{{route('myJobOffers.create')}}">Add New</x-link-button>
    </div>

    @forelse ($jobOffers as $jobOffer)
        <x-job-card :$jobOffer>
            
            <div>

                @forelse ($jobOffer->jobApplications as $application)
                    <div>
                        <div>
                            
                            <div>
                                {{$application->user->name}}
                            </div>

                            <div>
                                Applied {{$application->created_at->diffForHumans()}}
                            </div>

                            <div>
                                Download CV
                            </div>
                        </div>

                        <div>
                            ${{number_format($application->expected_salary)}}
                        </div>
                    </div>
                @empty
                    <div>No applications yet</div>
                @endforelse

                <div>
                    <x-link-button href="{{route('myJobOffers.edit', ['myJobOffer' => $jobOffer])}}">Edit</x-link-button>
                </div>
            </div>
        </x-job-card>
        
    @empty
        <div>
            <div>
                No Jobs yet
            </div>

            <div>
                Post your first Job <a href="{{route('myJobOffers.create')}}">here!</a>
            </div>
        </div>
    @endforelse


</x-layout>