<div>
    @if ($allOptions)
        <label for="{{$name}}">
            <input type="radio" name="{{$name}}" value="" @checked(!request($name))/>
            <span>All</span>
        </label>
    @endif


    @foreach ($options as $option)
        <label for="{{$name}}">
            <input type="radio" name="{{$name}}" value="{{$option}}" @checked($option === ($value ?? request($name) ) )/>
            <span>{{$option}}</span>
        </label>
    @endforeach



</div>