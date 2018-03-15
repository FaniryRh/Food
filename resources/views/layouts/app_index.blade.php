<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials_index._head')
</head>

<body>
    <div id="wrapper">
        @include('partials_index._navbar')
        <div class="col-md-12" style="margin-top: 70px;">
            @yield('content')

        </div>
        
    </div>
        @include('partials_index._footer')

        {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
		<button type="submit">Logout</button>
		{!! Form::close() !!}
        @include('partials_index._javascripts')
</body>
</html>

