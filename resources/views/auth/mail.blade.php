<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="card">
    <div class="card-header">
        <h3>Đường dẫn khôi phục tài khoản</h3>
    </div>
    <div class="card-body">
        <p>Bạn vừa yêu cầu khôi phục tài khoản bằng email click vào link để đặt lại mật khẩu</p>
        <p><a href="{{ route('password.reset.getInfo',$token) }}" target="_blank">{{ route('password.reset.getInfo',$token) }}</a></p>
        <p><b>Lưu ý:</b> nếu bạn không thực hiện yêu cầu này xin bỏ qua email này.</p>
    </div>
</div>