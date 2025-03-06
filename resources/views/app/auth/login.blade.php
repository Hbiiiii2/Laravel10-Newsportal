<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lajur Info Login Form</title>
  <link rel="stylesheet" href="{{ asset('app/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="logo-container">
            <img src="{{ asset('home/img/logo/logo-header.svg') }}" alt="Lajur Info Logo">
        </div>
        <form action="{{ route('login.submit') }}" method="post">
            @csrf
            <h2>Selamat Datang Kembali</h2>
            
            <div class="input-field">
                <input type="email" name="email" required>
                <label>Email</label>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Password</label>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember_me">
                    <span>Ingat Saya</span>
                </label>
            </div>
            
            <button type="submit">Masuk ke Dashboard</button>
            
            <div class="divider">
                <span>atau</span>
            </div>
            
            <div class="google-login">
                <a href="{{ route('login.google')}}">
                    <span class="google-icon">
                        <i class="fab fa-google"></i>
                    </span>
                    <span class="google-text">Masuk dengan Google</span>
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('error') }}",
                confirmButtonColor: '#dc3545'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                confirmButtonColor: '#dc3545'
            });
        </script>
    @endif
</body>
</html>
