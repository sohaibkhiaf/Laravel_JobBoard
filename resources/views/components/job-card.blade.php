<x-card {{$attributes->merge(['class'] ) }}>

    <div class="x-job-card-job-top">
        <h2>{{ $jobOffer->title }}</h2>
        <div>${{number_format($jobOffer->salary)}}</div>
    </div>

    <div class="x-job-card-job-bottom">

        <div class="x-job-card-job-bottom-left">
            <div>{{ $jobOffer->employer->company_name }},</div>
            <div>{{ $jobOffer->location }}</div>
        </div>

        <div class="x-job-card-job-bottom-right">
            <x-tag>
                <a class="x-job-experience"
                    href="{{ route('jobOffers.index' , ['experience' => $jobOffer->experience]) }}">{{$jobOffer->experience }}</a>
            </x-tag>
            <x-tag>
                <a  class="x-job-category"
                    href="{{ route('jobOffers.index' , ['category' => $jobOffer->category]) }}">{{$jobOffer->category }}</a>
            </x-tag>
        </div>

    </div>

    {{ $slot }}

</x-card>