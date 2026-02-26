<div id="logoutModal" class="modal-backdrop-custom-pu">
  <div class="modal-box-pu">
    <h5>Peringatan</h5>
    <p>Apakah anda yakin ingin keluar?</p>
    <div class="modal-actions-pu">
      <button class="btn-yes-pu" onclick="document.location='{{ route('logout') }}'">Ya</button>
      <button class="btn-no-pu" onclick="closeModal()">Tidak</button>
    </div>
  </div>
</div>
