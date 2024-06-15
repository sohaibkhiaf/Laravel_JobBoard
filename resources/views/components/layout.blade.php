<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <title>Job Board</title>
</head>
<body>

    <div class="container">

        <nav class="navbar">
            <ul class="home-list">
                <li class="home-list-item">
                    <a class="home-button" href="{{route('jobOffers.index')}}">Home</a>
                </li>

                <li class="user-name-item">
                    <a class="user-name-button" href="#">{{auth()->user()->name ?? "Anonymus"}}</a>
                </li>
            </ul>
    
            <ul class="actions-list">
                @auth
                    <li class="left-items">
                        <a class="applications-button" href="{{ route('myJobApplications.index') }}">
                            Job Applications
                        </a>
                    </li>
    
                    <li class="left-items">
                        <a href="{{route('myJobOffers.index')}}">
                            My Jobs
                        </a>
                    </li>
    
                    <li class="right-items">
                        <form action="{{route('auth.destroy')}}" method="POST">
                            @csrf
                            @method('DELETE')
    
                            <button>Logout</button>
                        </form>
                    </li>
                @else
                    <li class="left-items">
                        <a href="{{route('auth.create')}}">Sign in</a>
                    </li>
                @endauth
                
            </ul>
        </nav>
    
        @if (session('success'))
            <div class="green-alert-container" role="alert">
                <p class="green-alert-title">Success!</p>
                <p class="green-alert-message">{{ session('success') }}</p>
            </div>
        @endif
    
        @if (session('error'))
            <div class="red-alert-container" role="alert">
                <p class="red-alert-title">Error!</p>
                <p class="red-alert-message">{{ session('error') }}</p>
            </div>
        @endif
    
        {{ $slot }}

    </div>
    
</body>
</html>