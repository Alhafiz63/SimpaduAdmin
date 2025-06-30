<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Font Awesome (untuk ikon show/hide password) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Form Login -->
        <div class="w-full md:w-1/2 flex items-center justify-center bg-white">
            <form action="{{ route('login') }}" method="POST" autocomplete="off" class="w-full max-w-[400px] px-8">
                @csrf

                <h2 class="text-3xl font-bold mb-8 text-gray-900">Login</h2>

                {{-- Flash Success --}}
                @if (session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded shadow">
                        <strong>Sukses!</strong> {{ session('success') }}
                    </div>
                @endif

                {{-- Error Login Umum --}}
                @if ($errors->has('error'))
                    <div class="mb-4 px-4 py-2 bg-red-100 text-red-800 rounded shadow">
                        <strong>Error!</strong> {{ $errors->first('error') }}
                    </div>
                @endif

                {{-- Email Field --}}
                <div class="mb-4">
                    <label for="email" class="block font-medium mb-1 text-gray-800">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-md border @error('email') border-red-500 @else border-gray-200 @enderror bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200 text-gray-800 text-base"
                        placeholder="Masukkan Email" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Field dengan Toggle --}}
                <div class="mb-6">
                    <label for="password" class="block font-medium mb-1 text-gray-800">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 pr-10 rounded-md border @error('password') border-red-500 @else border-gray-200 @enderror bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200 text-gray-800 text-base"
                            placeholder="Masukkan Password" />
                        <span id="togglePassword"
                            class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-400 hover:text-gray-600">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                    </div>
                    <div class="text-xs text-gray-400 mt-1">Harus berupa kombinasi minimal 8 huruf, angka, dan simbol.</div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Masuk --}}
                <button type="submit"
                    class="w-full py-3 rounded-md bg-blue-600 text-white font-semibold text-base hover:bg-blue-700 transition">
                    Masuk
                </button>
            </form>
        </div>

        <!-- Gambar (Hanya Desktop) -->
        <div class="hidden md:block md:w-1/2 bg-cover bg-center"
            style="background-image: url('/images/library.jpg');"></div>
    </div>

    <!-- Script Show/Hide Password -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggle = document.getElementById("togglePassword");
            const password = document.getElementById("password");
            const icon = toggle.querySelector("i");

            toggle.addEventListener("click", function () {
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // Ganti ikon
                icon.classList.toggle("fa-eye");
                icon.classList.toggle("fa-eye-slash");
            });
        });
    </script>
</body>

</html>
