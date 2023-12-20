@include('includes.header')

@if($data['hasuserlogin'])
    <h1>Chào mừng {{$data['userlogin']}}</h1>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
@else
    <a href="/login">Đăng nhập</a>
    <br>
    <a href="/register">Đăng ký</a>
@endif
<h1>Welcome to My Website</h1>
@if(isset($success))
    <p>{{$success}}</p>
@endif
<p>{{$data['description']}}</p>

@include('includes.footer')