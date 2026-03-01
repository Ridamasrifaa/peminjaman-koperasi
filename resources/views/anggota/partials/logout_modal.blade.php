<div id="logoutModal" class="modal-backdrop-custom-pu">
  <div class="modal-box-pu">
    <h5>Peringatan</h5>
    <p>Apakah anda yakin ingin keluar?</p>
    <div class="modal-actions-pu">

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-yes-pu">Ya</button>
      </form>

      <button type="button" class="btn-no-pu" onclick="closeModal()">Tidak</button>

    </div>
  </div>
</div>