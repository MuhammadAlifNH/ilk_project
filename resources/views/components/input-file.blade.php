<input type="file" {{ $attributes->merge(['class' => 'mt-1 block w-full']) }}>
<img id="photo_preview" src="" alt="Preview Image">
<!-- Script JavaScript untuk preview gambar -->
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('photo_preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // tampilkan preview jika sebelumnya disembunyikan
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
