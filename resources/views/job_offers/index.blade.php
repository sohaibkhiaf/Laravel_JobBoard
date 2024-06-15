<x-layout>

    <x-breadcrumbs :links="['Jobs' => route('jobOffers.index')]"/>

    <x-card class="filter-form-card">

        <form class="filter-form" action="{{route('jobOffers.index')}}" method="GET">
            
            <div class="filter-container">

                <div class="filter-top">
                    <div class="filter-top-search">
                        <div>Search</div>
                        <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" />
                    </div>
                    <div class="filter-top-salary">
                        <div>Salary</div>
                        <div class="salary-filter">
                            <x-text-input class="min-salary" name="min_salary" value="{{request('min_salary')}}" placeholder="From" />
                            <x-text-input class="max-salary" name="max_salary" value="{{request('max_salary')}}" placeholder="To" />
                        </div>
                    </div>
                </div>

                <div class="filter-bottom">
                    <div class="filter-bottom-experience">
                        <div>Experience</div>
                        <x-radio-group name="experience" :options="\App\Models\JobOffer::$experience"/>
                    </div>
                    <div class="filter-bottom-category">
                        <div>Category</div>
                        <x-radio-group name="category" :options="\App\Models\JobOffer::$category"/>
                    </div>
                </div>

            </div>

            <x-button class="filter-button">Filter</x-button>
        </form>

    </x-card>


    @foreach ($jobOffers as $jobOffer)

        <x-job-card class="home-job-offer" :$jobOffer>
            <x-link-button class="job-offer-show" :href="route('jobOffers.show' , ['jobOffer' => $jobOffer])">
                Show
            </x-link-button>
        </x-job-card>

    @endforeach

</x-layout>