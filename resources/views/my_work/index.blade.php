<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']" />

    <div>
        <x-link-button href="{{route('my-works.create')}}">Add New</x-link-button>
    </div>

    @forelse ($works as $work)
        <x-work-card :$work>
            
            <div>

                @forelse ($work->workApplications as $application)
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
                    <x-link-button href="{{route('my-works.edit', ['my_work' => $work])}}">Edit</x-link-button>
                </div>
            </div>
        </x-work-card>
    @empty
        <div>
            <div>
                No Jobs yet
            </div>

            <div>
                Post your first Job <a href="{{route('my_works.create')}}">here!</a>
            </div>
        </div>
    @endforelse


</x-layout>