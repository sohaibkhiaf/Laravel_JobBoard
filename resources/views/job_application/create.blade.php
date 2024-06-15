<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobOffers.index') , 
                            $jobOffer->title => route('jobOffers.show' , ['jobOffer' =>$jobOffer]) , 
                            'Apply' => '#']" />

    <x-job-card class="offer-to-apply" :$jobOffer />

    <x-card class="apply-to-job">
        <h2>
            Your Job Application
        </h2>

        <form action="{{route('jobOffer.jobApplication.store' , ['jobOffer' => $jobOffer])}}" 
            class="apply-to-job-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for="expected_salary" :required="true">Expected Salary</x-label>
                <x-text-input type="number" name="expected_salary"/>
            </div>

            <div>
                <x-label for="cv" :required="true">Upload CV</x-label>
                <x-text-input type="file" name="cv"/>
            </div>

            <x-button class="apply-to-job-button">Apply</x-button>
        </form>

    </x-card>
</x-layout>