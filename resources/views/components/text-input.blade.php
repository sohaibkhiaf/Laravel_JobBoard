<div {{$attributes->merge(['class'] ) }}>
    @if ($type != 'textarea')
        <input class="x-text-input" type="{{$type}}" placeholder="{{$placeholder}}" name="{{$name}}" 
            value="{{ old($name , $value)}}" id="{{$name}}"/>
    @else
        <textarea class="x-text-input" name="{{$name}}" id="{{$name}}">{{ old($name , $value)}}</textarea>
    @endif

    @error($name)
        <div class="x-text-input-error" >
            {{$message}}
        </div>
    @enderror
</div>

