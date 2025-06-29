<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <h2 class="text-3xl font-bold mb-8 text-gray-900">Login</h2>
    <div class="flex h-screen">
        <div class="w-1/2 flex items-center justify-center bg-white">
            <form action="{{ route('login') }}" method="POST" autocomplete="off" class="w-full max-w-[400px] px-20">
                @csrf
                
                <div class="mb-4">
                    <label for="email" class="block font-medium mb-1 text-gray-800">Email Address</label>
                    <input type="email" id="email" name="email" required="Masukkan Email"
                        class="w-full px-4 py-3 rounded-md border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200 text-gray-800 text-base" />
                </div>
                <div class="mb-2">
                    <label for="password" class="block font-medium mb-1 text-gray-800">Password</label>
                    <input type="password" id="password" name="password" required="Masukkan Password"
                        class="w-full px-4 py-3 rounded-md border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200 text-gray-800 text-base" />
                    <div class="text-xs text-gray-400 mt-1">Harus berupa kombinasi minimal 8 huruf, angka, dan simbol.
                    </div>
                </div>
                <div class="flex items-center justify-between mb-6 mt-2">
                </div>
                <button type="submit"
                    class="w-full py-3 rounded-md bg-blue-600 text-white font-semibold text-base hover:bg-blue-700 transition">Masuk</button>
            </form>
        </div>
        <div class="w-1/2 bg-cover bg-center" style="background-image: url('/images/library.jpg');"></div>
    </div>
</body>

</html>
