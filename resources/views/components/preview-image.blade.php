<script>
    function displayImage() {
        const input = document.getElementById('photoInput');
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('photoInput').addEventListener('change', displayImage);
</script>