<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Inventaris Lab Komputer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: url('/images/background.jpg') no-repeat center center fixed;
      background-size: cover;
      background-position: center top;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
</head>
<body>
  <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-96 text-center">
    <h2 class="text-2xl font-bold text-red-600 mb-4">Register</h2>
    <form id="registerForm">
      @csrf
      <div class="mb-3">
        <input type="text" name="name" placeholder="👤 Nama Pengguna" class="w-full p-3 bg-red-200 rounded-lg text-gray-700" required />
      </div>
      <div class="mb-3">
        <input type="email" name="email" placeholder="📧 Email" class="w-full p-3 bg-red-200 rounded-lg text-gray-700" required />
      </div>
      <div class="mb-3">
        <input type="password" name="password" placeholder="🔒 Password" class="w-full p-3 bg-red-300 rounded-lg text-gray-700" required />
      </div>
      <div class="mb-3">
        <input type="password" name="password_confirmation" placeholder="🔒 Konfirmasi Password" class="w-full p-3 bg-red-400 rounded-lg text-gray-700" required />
      </div>
      <button type="submit" class="w-full py-3 bg-red-500 text-white rounded-lg text-lg font-semibold hover:bg-red-600">
        Register
      </button>
      <p class="mt-4 text-gray-600">
        Sudah punya akun? <a href="{{ route('welcome') }}" class="text-red-600 font-bold">Login</a>
      </p>
    </form>

    <!-- Notifikasi -->
    <div id="registerMessage" class="mt-4 text-center font-bold"></div>
  </div>

  <!-- Script AJAX untuk Register -->
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registerForm").addEventListener("submit", function (event) {
      event.preventDefault();

      fetch("{{ route('register') }}", {
        method: "POST",
        body: new FormData(this),
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          document.getElementById("registerMessage").innerHTML = '<p class="text-green-600">Registrasi Berhasil! Mengalihkan ke login...</p>';
          setTimeout(() => {
            window.location.href = "{{ route('welcome') }}";
          }, 2000);
        } else {
          let errors = Object.values(data.errors).map(err => `<p class="text-red-600">${err}</p>`).join('');
          document.getElementById("registerMessage").innerHTML = errors;
        }
      })
      .catch(error => console.error("Error:", error));
    });
  });
  </script>

</body>
</html>
