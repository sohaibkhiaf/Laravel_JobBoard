<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobOffers.index') , $jobOffer->title => '#']"/>
    <x-job-card class="job-offer-details" :$jobOffer>
        <p>
            {!! nl2br( e($jobOffer->description)) !!}
        </p>

        @can('apply', $jobOffer)
            <x-link-button class="apply-button" href="{{ route('jobOffer.jobApplication.create' , ['jobOffer' => $jobOffer]) }}">
                Apply
            </x-link-button>
        @else
            <div>You already applied to this job or you are not logged in yet</div>
        @endcan

    </x-job-card>


    <x-card class="more-jobs">
        <h2>More {{$jobOffer->employer->company_name }} Jobs</h2>

        <div>
            @foreach ($jobOffer->employer->jobOffers as $otherJobOffer)
                <div class="other-job-offer">
                    <div class="other-job-offer-top">
                        <div class="job-title">
                            <a href="{{route('jobOffers.show' , ['jobOffer' => $otherJobOffer])}}">
                                {{$otherJobOffer->title}}
                            </a>
                        </div>

                        <div class="job-created">
                            {{$otherJobOffer->created_at->diffForHumans()}}
                        </div>
                    </div>

                    <div class="other-job-offer-bottom">
                        ${{number_format($otherJobOffer->salary)}}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>

</x-layout>