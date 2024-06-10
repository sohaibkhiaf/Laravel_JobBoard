<x-card>

    <div>
        <h2>{{ $work->title }}</h2>
        <div>${{number_format($work->salary)}}</div>
    </div>

    <div>

        <div>
            <div>{{ $work->employer->company_name }}</div>
            <div>{{ $work->location }}</div>
        </div>

        <div>
            <x-tag>
                <a style="text-decoration: none; color: #000;"
                    href="{{ route('works.index' , ['experience' => $work->experience]) }}">{{$work->experience }}</a>
            </x-tag>
            <x-tag>
                <a style="text-decoration: none; color: #000;"
                    href="{{ route('works.index' , ['category' => $work->category]) }}">{{$work->category }}</a>
            </x-tag>
        </div>

    </div>

    {{ $slot }}

</x-card>