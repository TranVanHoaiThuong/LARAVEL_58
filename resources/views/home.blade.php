@include('includes.header')

<h1>Welcome to My Website</h1>
@if(isset($success))
<p>{{$success}}</p>
@else
<p>{{$description}}</p>
@endif

@include('includes.footer')