<label for="{{$for}}">
    {{$slot}}
    @if ($required)
        <span>*</span>
    @endif
</label>