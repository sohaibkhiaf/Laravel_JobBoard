<nav {{ $attributes }} >
    <ul class="x-breadcrumbs-ul">
        <li>
            <a class="x-breadcrumbs-a" href="{{route('jobOffers.index')}}">Home</a>
        </li>
        
        @foreach ($links as $label => $link)
            <li class="x-breadcrumbs-arrow">➝</li>
            <li>
                <a class="x-breadcrumbs-a" href="{{ $link }}">{{ $label }}</a>
            </li>
        @endforeach
    </ul>
</nav>