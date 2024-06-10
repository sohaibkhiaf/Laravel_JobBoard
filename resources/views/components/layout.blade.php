<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Board</title>
</head>
<body>
    <nav>
        <ul style="list-style: none ;">
            <li>
                <a style="color: #000; text-decoration: none;" href="{{route('works.index')}}">Home</a>
            </li>
        </ul>

        <ul style="list-style: none ; display:flex; justify-content:space-between">
            @auth
                <li>
                    <a href="{{ route('my-work-applications.index') }}">
                        {{auth()->user()->name ?? "Anonymus"}} : Applications
                    </a>
                    
                </li>

                <li>
                    <form action="{{route('auth.destroy')}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button>Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a style="color: #000; text-decoration: none;" href="{{route('auth.create')}}">Sign in</a>
                </li>
            @endauth
            
        </ul>
    </nav>


    @if (session('success'))
        <div role="alert">
            <p style="color:green;">Success!</p>
            <p style="color:green;">{{ session('success') }}</p>
        </div>
    @endif


    @if (session('error'))
        <div role="alert">
            <p style="color:red;">Error!</p>
            <p style="color:red;">{{ session('error') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>
</html>