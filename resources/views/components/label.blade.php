<label for="{{$for}}" class="x-label">
    {{$slot}}
    @if ($required)
        <span class="x-label">*</span>
    @endif
</label>