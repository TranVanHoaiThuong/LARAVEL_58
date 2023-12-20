@include('includes.header')
<form class="p-5 w-50" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row justify-content-between mt-1">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="row justify-content-between mt-1">
        <label for="password">Mật khẩu</label>
        <input id="password" type="password" name="password" required>
    </div>
    @error('loginfail')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <div class="row justify-content-center mt-1">
        <button class="btn btn-primary" type="submit">Đăng nhập</button>
        <a class="btn btn-secondary ml-1" href="/">Hủy</a>
    </div>
    <div class="row">
        <a href="/register">Bạn chưa có tài khoản? Đăng ký ngay!</a>
    </div>
</form>
@include('includes.footer')