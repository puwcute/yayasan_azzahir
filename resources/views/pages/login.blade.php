<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - {{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir Mojosari') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="text-center">
                <img src="{{ asset('storage/image/' . App\Models\Setting::getValue('site_logo', 'logo.png')) }}" 
                     alt="Logo" 
                     onerror="this.style.display='none'"
                     style="height: 64px; margin: 0 auto 16px; border-radius: 50%; box-shadow: 0 4px 16px rgba(200,155,60,0.3);">
                <h2>Admin Panel</h2>
                <p>{{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }}</p>
            </div>

            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fa-solid fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required placeholder="Masukkan username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required placeholder="Masukkan password">
                </div>
                <button type="submit" class="btn btn-dark btn-lg">
                    <i class="fa-solid fa-sign-in-alt"></i> Masuk
                </button>
            </form>

            <div class="login-footer">
                <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</html>
