<x-layout>
    <x-card>
        <form action="{{route('employer.store')}}" method="POST">
            @csrf

            <div>
                <x-label for="company_name" :required="true">Company Name</x-label>
                <x-text-input name="company_name"/>
            </div>

            <x-button>Create</x-button>
        </form>
    </x-card>
</x-layout>