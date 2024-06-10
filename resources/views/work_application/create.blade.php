<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('works.index') , 
                            $work->title => route('works.show' , ['work' =>$work]) , 
                            'Apply' => '#']" />

    <x-work-card :$work />

    <x-card>
        <h2>
            Your Job Application
        </h2>

        <form action="{{route('work.application.store' , ['work' => $work])}}" method="POST" 
            enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for="expected_salary" :required="true">Expected Salary</x-label>
                <x-text-input type="number" name="expected_salary"/>
            </div>

            <div>
                <x-label for="cv" :required="true">Upload CV</x-label>
                <x-text-input type="file" name="cv"/>
            </div>

            <button>Apply</button>
        </form>

    </x-card>
</x-layout>