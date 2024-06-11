<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-works.index') , 'Edit' => '#']" />

    <x-card>
        <form action="{{route('my-works.update' , ['my_work' => $work])}}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title"  value="{{$work->title}}"/>
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" value="{{$work->location}}" />
                </div>

                <div>
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number"  value="{{$work->salary}}"/>
                </div>

                <div>
                    <x-label for="description" :required="true" >Description</x-label>
                    <x-text-input name="description" type="textarea" value="{{$work->description}}"/>
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" value="{{$work->experience}}" :options="\App\Models\Work::$experience" />
                </div>
                
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" value="{{$work->category}}" :options="\App\Models\Work::$category" />
                </div>

            </div>

            <button>Edit</button>

        </form>
    </x-card>
</x-layout>