<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobOffers.index') , $jobOffer->title => '#']"/>
    <x-job-card :$jobOffer> 
        <p>
            {!! nl2br( e($jobOffer->description)) !!}
        </p>

        @can('apply', $jobOffer)
            <x-link-button href="{{ route('jobOffer.jobApplication.create' , ['jobOffer' => $jobOffer]) }}">
                Apply
            </x-link-button>
        @else
            <div>You already applied to this job</div>
        @endcan

    </x-job-card>


    <x-card>
        <h2>More {{$jobOffer->employer->company_name }} Jobs</h2>

        <div>
            @foreach ($jobOffer->employer->jobOffers as $otherjobOffer)
                <div style="margin-bottom: 1rem">
                    <div style="display: flex; justify-content:space-between">

                        <div>
                            <a href="{{route('jobOffers.show' , ['jobOffer' => $otherjobOffer])}}">
                                {{$otherjobOffer->title}}
                            </a>
                        </div>

                        <div>
                            {{$otherjobOffer->created_at->diffForHumans()}}
                        </div>

                    </div>

                    <div>
                        ${{number_format($otherjobOffer->salary)}}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>

</x-layout>