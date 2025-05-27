<html lang="en">
<head>
    <title>{{ config('app.name') }} | @yield('title')</title>
    @include('layouts.front.includes.links')
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset(getImage('favicon'))}}">
	@include('layouts.front.template.header')
    
</head>
<body>
    @yield('content')
</body>
@include('layouts.front.includes.scripts')
</html>