<x-card>

    <div>
        <h2>{{ $jobOffer->title }}</h2>
        <div>${{number_format($jobOffer->salary)}}</div>
    </div>

    <div>

        <div>
            <div>{{ $jobOffer->employer->company_name }}</div>
            <div>{{ $jobOffer->location }}</div>
        </div>

        <div>
            <x-tag>
                <a style="text-decoration: none; color: #000;"
                    href="{{ route('jobOffers.index' , ['experience' => $jobOffer->experience]) }}">{{$jobOffer->experience }}</a>
            </x-tag>
            <x-tag>
                <a style="text-decoration: none; color: #000;"
                    href="{{ route('jobOffers.index' , ['category' => $jobOffer->category]) }}">{{$jobOffer->category }}</a>
            </x-tag>
        </div>

    </div>

    {{ $slot }}

</x-card>