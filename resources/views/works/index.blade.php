<x-layout>

    <x-breadcrumbs :links="['Jobs' => route('works.index')]"/>

    <x-card>

        <form action="{{route('works.index')}}" method="GET">
            
            <div>
                <div>
                    <div>Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" />
                </div>
                <div>
                    <div>Salary</div>
                    <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From" />
                    <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To" />
                </div>
                <div>
                    <div>Experience</div>

                    <x-radio-group name="experience" :options="\App\Models\Work::$experience"/>

                </div>
                <div>
                    <div>Category</div>

                    <x-radio-group name="category" :options="\App\Models\Work::$category"/>
                </div>
            </div>

            <x-button>Filter</x-button>
        </form>

    </x-card>


    @foreach ($works as $work)

        <x-work-card :$work>
            <x-link-button :href="route('works.show' , ['work' => $work])">
                Show
            </x-link-button>
        </x-work-card>

    @endforeach

</x-layout>