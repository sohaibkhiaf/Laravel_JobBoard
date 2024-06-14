<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('myJobOffers.index') , 'Edit' => '#']" />

    <x-card>
        <form action="{{route('myJobOffers.update' , ['myJobOffer' => $myJobOffer])}}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title"  value="{{$myJobOffer->title}}"/>
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" value="{{$myJobOffer->location}}" />
                </div>

                <div>
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number"  value="{{$myJobOffer->salary}}"/>
                </div>

                <div>
                    <x-label for="description" :required="true" >Description</x-label>
                    <x-text-input name="description" type="textarea" value="{{$myJobOffer->description}}"/>
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" value="{{$myJobOffer->experience}}" :options="\App\Models\JobOffer::$experience" />
                </div>
                
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" value="{{$myJobOffer->category}}" :options="\App\Models\JobOffer::$category" />
                </div>

            </div>

            <button>Edit</button>

        </form>
    </x-card>
</x-layout>