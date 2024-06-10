<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('works.index') , $work->title => '#']"/>
    <x-work-card :$work> 
        <p>
            {!! nl2br( e($work->description)) !!}
        </p>

        @can('apply', $work)
            <x-link-button href="{{ route('work.application.create' , ['work' => $work]) }}">
                Apply
            </x-link-button>

        @else
            <div>You already applied to this job</div>
        @endcan

    </x-work-card>


    <x-card>
        <h2>More {{$work->employer->company_name }} Jobs</h2>

        <div>
            @foreach ($work->employer->works as $otherWork)
                <div style="margin-bottom: 1rem">
                    <div style="display: flex; justify-content:space-between">

                        <div>
                            <a href="{{route('works.show' , ['work' => $otherWork])}}">
                                {{$otherWork->title}}
                            </a>
                        </div>

                        <div>
                            {{$otherWork->created_at->diffForHumans()}}
                        </div>

                    </div>

                    <div>
                        ${{number_format($otherWork->salary)}}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>

</x-layout>