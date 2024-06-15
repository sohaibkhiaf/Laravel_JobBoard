<x-layout>
    <x-card class="become-employer">
        <form action="{{route('employer.store')}}" method="POST">
            @csrf

            <div class="become-employer-container">
                <x-label for="company_name" :required="true">Company Name</x-label>
                <x-text-input name="company_name"/>
            </div>

            <x-button class="create-employer-button">Create</x-button>
        </form>
    </x-card>
</x-layout>