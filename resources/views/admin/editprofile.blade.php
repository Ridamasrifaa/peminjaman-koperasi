<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="body-edit">

<div class="app-edit">
  <div class="header-edit">
    <!-- Back arrow pakai route Laravel -->
    <a href="{{ url('/admin/profile') }}" class="panah-edit"><i data-feather="arrow-left"></i></a>
    <div>Edit Profil</div>
  </div>

  <!-- Form upload gambar -->
  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="upload-box">
          <input type="file" id="imageInput" name="avatar" accept="image/*">

          <label for="imageInput" class="upload-label">
              <!-- Preview gambar -->
              <img id="preview" hidden>

              <div class="placeholder">
                  <i data-feather="upload"></i>
                  <p>Masukan Gambar</p>
              </div>
          </label>
      </div>

      <div class="submit-edit">
          <button type="submit">Simpan</button>
      </div>
  </form>

  <!-- Bottom nav pakai route Laravel -->
  <div class="bottom-nav-edit">
    <a href="{{ url('/admin/tambah-anggota') }}" class="menu-edit"><i data-feather="plus"></i></a>
    <a href="{{ url('/admin/pencarian') }}" class="menu-edit"><i data-feather="search"></i></a>
    <a href="{{ url('/admin/profile') }}" class="menu-edit"><i data-feather="user"></i></a>
  </div>

</div>

<script>
    // Preview gambar
    const imageInput = document.getElementById('imageInput');
    const preview = document.getElementById('preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.hidden = false;
        }
    });

    feather.replace();
</script>

</body>
</html>
