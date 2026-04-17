<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Lupa Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <script src="https://unpkg.com/feather-icons"></script>

  <style>
    body {
      background-color: #e2d7d7;
    }

    .mobile-wrapper {
      max-width: 450px;
      min-height: 100vh;
      margin: auto;
      background-color: #fff;
      padding-bottom: 70px;
      display: flex;
      flex-direction: column;
      position: relative; 
    }

    .header {
      background: white;
      color: black;
      padding: 12px 15px;
      display: flex;
      align-items: center;
      gap: 15px;
      border: 2px solid #0A9A25;
    }

    .header h6 {
      margin: 0;
      font-weight: 600;
    }

    .container-message {
      margin: 80px auto 10px auto;
      padding: 30px 20px;
      width: 340px;
      height: 155px;
      border: 2px solid #0A9A25;
      border-radius: 15px;
      text-align: center;
      font-weight: 520;
      font-size: 20px;
      font-family: poppins, sans-serif;
      line-height: 1.5;
      color: #333;
      box-sizing: border-box;
    }

    .container-form {
      margin: 40px 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .form-control {
      border-radius: 15px;
      border: 3px solid #0A9A25;
      padding: 13px;
      margin-bottom: 0; 
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #0B6E1E;
    }

    .btn-kirim {
        position: absolute;
        bottom: 60px;  
        left: 20px;
        right: 20px;
        width: auto; 
        margin: 0; 
        padding: 15px;
        font-weight: 600;
        background-color: #0B6E1E;
        color: white;
        border-radius: 15px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-kirim:hover {
        background-color: #096527;
    }

    /* Modal yang lebih kecil & compact */
    .modal-success .modal-dialog {
      max-width: 320px;
    }

    .modal-success .modal-content {
      border-radius: 18px;
      border: 3px solid #0A9A25;
    }

    .modal-success .modal-body {
      padding: 25px 20px;
      text-align: center;
    }

    .modal-success .modal-title {
      font-size: 1.3rem;
    }
  </style>
</head>

<body>
  <div class="mobile-wrapper">
    <div class="header">
      <div class="icon-btn" style="cursor:pointer;" onclick="history.back()">
        <i data-feather="arrow-left"></i>
      </div>
      <h6>Lupa Password</h6>
    </div>

    <div class="container-message">
      <p>Masukkan email anda <br>untuk mendapatkan <br>link reset password.</p>
    </div>

    <div class="container-form">
      <form id="forgotForm" method="POST" action="/forgot-password">
        @csrf

        <input
          type="email"
          id="email"
          name="email"
          class="form-control"
          placeholder="Masukkan Email"
          required
          autocomplete="email"
        />

        <button type="submit" class="btn btn-kirim">Kirim</button>
      </form>
    </div>
  </div>

  <!-- Success Modal - Versi Kecil & Ringkas -->
  <div class="modal fade modal-success" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header justify-content-center border-0">
          <h5 class="modal-title text-success fw-bold">✓ Berhasil</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1 fs-5">Link reset password telah terkirim ke email anda.</p>
          <p class="text-muted small">Cek juga folder spam jika tidak ada di inbox.</p>
        </div>
        <div class="modal-footer border-0 justify-content-center pb-4">
          <button type="button" class="btn btn-success px-5 py-2" data-bs-dismiss="modal" onclick="window.location.href='/'">
            OK
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    feather.replace();

    document.getElementById('forgotForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const form = this;
      const formData = new FormData(form);

      fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(response => {
        if (response.ok) {
          const successModal = new bootstrap.Modal(document.getElementById('successModal'));
          successModal.show();
          form.reset();
        } else {
          alert('Terjadi kesalahan. Silakan coba lagi.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Gagal mengirim permintaan. Periksa koneksi anda.');
      });
    });
  </script>
</body>
</html>