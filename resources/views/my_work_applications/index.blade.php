<x-layout>
    <x-breadcrumbs :links="['My Job Applications' => '#']"/>

    @forelse ($applications as $application)
        <x-work-card :work="$application->work">
            <div>
                <div>
                    <div>
                        Applied {{$application->created_at->diffForHumans()}}
                    </div>

                    <div>
                        Other {{  Str::plural('applicant' , $application->work->work_applications_count -1)}}
                        {{$application->work->work_applications_count -1}}
                    </div>

                    <div>
                        Your asking salary {{number_format($application->expected_salary)}}
                    </div>

                    <div>
                        Average asking salary ${{number_format($application->work->work_applications_avg_expected_salary)}}
                    </div>
                </div>

                <div>
                    <form action="{{route('my-work-applications.destroy' ,$application)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-work-card>
    @empty

    <div>
        <div>
            No job application yet
        </div>

        <div>
            Go find some jobs <a href="{{route('works.index')}}">Here</a>
        </div>
    </div>
        
    @endforelse
</x-layout>