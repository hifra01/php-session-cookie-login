function initErrorModal(errorMessage) {
    const modal_container = document.getElementById('modal');
    modal_container.innerHTML = `
    <div class="modal-content">
        <h4>Error</h4>
        <p>${errorMessage}</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    </div>
`;
    const instances = M.Modal.init(modal_container);
    const instance = M.Modal.getInstance(modal_container);
    instance.open();

}

function initSuccessModal(successMessage) {
    const modal_container = document.getElementById('modal');
    modal_container.innerHTML = `
    <div class="modal-content">
        <h4>Sukses</h4>
        <p>${successMessage}</p>
    </div>
    <div class="modal-footer">
        <a href="./" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    </div>
`;
    const instances = M.Modal.init(modal_container);
    const instance = M.Modal.getInstance(modal_container);
    instance.open();

}

function initLogoutModal() {
    const modal_container = document.getElementById('modal');
    modal_container.innerHTML = `
    <div class="modal-content">
        <h4>Logout</h4>
        <p>Anda yakin ingin keluar?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
        <a href="./logout.php" class="modal-close waves-effect waves-green btn-flat">Keluar</a>
    </div>
`;
    const instances = M.Modal.init(modal_container);
    const instance = M.Modal.getInstance(modal_container);
    instance.open();
}

function initChangePasswordModal(successMessage) {
    const modal_container = document.getElementById('modal');
    modal_container.innerHTML = `
    <div class="modal-content">
        <h4>Sukses</h4>
        <p>${successMessage}</p>
    </div>
    <div class="modal-footer">
        <a href="./logout.php" class="modal-close waves-effect waves-green btn-flat">Keluar</a>
    </div>
`;
    const instances = M.Modal.init(modal_container);
    const instance = M.Modal.getInstance(modal_container);
    instance.open();

}

document.addEventListener('DOMContentLoaded', function () {
    const elems = document.querySelectorAll('.sidenav');
    const instances = M.Sidenav.init(elems);
    const drop_menu = document.querySelectorAll('.dropdown-trigger');
    const drop_instances = M.Dropdown.init(drop_menu);
});