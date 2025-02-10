<div>
    
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <!-- Input Email -->
    <div class="mb-4">
      <label for="email" class="block text-gray-700">Email</label>
      <input type="email" id="email" name="email" required
             class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400" />
    </div>
    
    <!-- Input Password -->
    <div class="mb-6">
      <label for="password" class="block text-gray-700">Password</label>
      <input type="password" id="password" name="password" required
             class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400" />
    </div>
    
    <!-- Tombol Login -->
    <button type="submit" class="w-full py-3 bg-red-500 text-white rounded-full text-lg font-semibold hover:bg-red-600">
      Login
    </button>
  </form>
  
  <!-- Link ke halaman Welcome -->
  <p class="mt-4 text-center text-gray-600">
    Belum Punya Akun?  
    <a href="{{ route('register') }}" class="text-red-600 font-bold">Buat Akun</a>
  </p>

</div>