<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <!-- Background Blur untuk Modal -->
    <div id="profileModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg w-2/5 p-6 relative">
            <!-- Tombol Close -->
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
                ✕
            </button>

            <!-- Form untuk Update Profile (termasuk foto) -->
            <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Foto Profil -->
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <img id="foto_preview" class="w-24 h-24 rounded-full border-2 border-gray-300 shadow-md" 
                             src="{{ isset($user) && $user->foto ? asset('storage/' . $user->foto) : asset('default-avatar.png') }}" 
                             alt="Profile Picture">
                        <!-- Label yang berfungsi sebagai tombol untuk memilih file -->
                        <label for="foto" class="absolute bottom-0 right-0 bg-white p-1 rounded-full shadow cursor-pointer">
                            ✎
                        </label>
                    </div>
                    <!-- Input file tersembunyi -->
                    <input type="file" id="foto" name="foto" class="hidden" accept="image/*" onchange="previewImage()">
                </div>

                <!-- Data Profil -->
                <div class="mt-6">
                    <table class="w-full text-left text-gray-700 dark:text-gray-200">
                        <tr>
                            <td class="py-2 font-semibold">Nama</td>
                            <td>
                                <input type="text" name="name" value="{{ $user->name }}" 
                                       class="border rounded px-2 py-1 w-full">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 font-semibold">Alamat Email</td>
                            <td>
                                <input type="email" name="email" value="{{ $user->email }}" 
                                       class="border rounded px-2 py-1 w-full">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 font-semibold">No. Handphone</td>
                            <td>
                                <input type="text" name="phone" value="081393116456" 
                                       class="border rounded px-2 py-1 w-full">
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-6 flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Simpan Perubahan
                    </button>
                    <button type="button" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="confirmDelete()">
                        DELETE
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tombol untuk Membuka Modal -->
    <div class="py-12 flex justify-center">
        <button onclick="openModal()" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Edit Profile
        </button>
    </div>

    <!-- JavaScript untuk mengontrol modal dan preview gambar -->
    <script>
        function openModal() {
            document.getElementById("profileModal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("profileModal").classList.add("hidden");
        }

        function confirmDelete() {
            if (confirm("Apakah Anda yakin ingin menghapus akun ini?")) {
                window.location.href = "{{ route('profile.delete') }}";
            }
        }

        function previewImage() {
            const file = document.getElementById("foto").files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("foto_preview").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
