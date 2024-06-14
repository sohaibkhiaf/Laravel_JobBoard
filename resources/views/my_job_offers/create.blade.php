<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('myJobOffers.index') , 'Create' => '#']" />

    <x-card>
        <form action="{{route('myJobOffers.store')}}" method="POST">
            @csrf

            <div>
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" />
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" />
                </div>

                <div>
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" />
                </div>

                <div>
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :value="old('experience')" :options="\App\Models\JobOffer::$experience" />
                </div>
                
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" :value="old('category')" :options="\App\Models\JobOffer::$category" />
                </div>

            </div>

            <button>Create</button>

        </form>
    </x-card>
</x-layout>