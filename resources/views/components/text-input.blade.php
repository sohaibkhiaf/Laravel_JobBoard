<div>
    @if ($type != 'textarea')
        <input type="{{$type}}" placeholder="{{$placeholder}}" name="{{$name}}" value="{{ old($name , $value)}}" id="{{$name}}"/> 
    @else
        <textarea name="{{$name}}" id="{{$name}}">{{ old($name , $value)}}</textarea>
    @endif

    @error($name)
        <div style="color: red;">
            {{$message}}
        </div>
    @enderror
</div>

