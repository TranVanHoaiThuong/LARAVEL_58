@include('includes.header')
<form class="p-5 w-50" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row justify-content-between">
        <label for="name">Họ và tên</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>
    <div class="row justify-content-between mt-1">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="row justify-content-between mt-1">
        <label for="password">Mật khẩu</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div class="row justify-content-between mt-1">
        <label for="password_confirmation">Xác nhận mật khẩu</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row justify-content-center mt-1">
        <button type="submit">Đăng ký</button>
    </div>
</form>
@include('includes.footer')