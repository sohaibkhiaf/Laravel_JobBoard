<div class="x-radio-group">
    @if ($allOptions)
        <label class="x-radio-group-label" for="{{$name}}">
            <input type="radio" name="{{$name}}" value="" @checked(!request($name))/>
            <span>All</span>
        </label>
    @endif


    @foreach ($options as $option)
        <label class="x-radio-group-label" for="{{$name}}">
            <input type="radio" name="{{$name}}" value="{{$option}}" @checked($option === ($value ?? request($name) ) )/>
            <span>{{$option}}</span>
        </label>
    @endforeach

    @error($name)
        <div class="x-radio-group-error" style="color: red;">
            {{$message}}
        </div>
    @enderror

</div>