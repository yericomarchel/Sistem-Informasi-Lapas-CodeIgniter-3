</div> </div> <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        // 1. Inisialisasi DataTables
        $('.data-table').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json' }
        });

        // 2. Inisialisasi SweetAlert untuk form hapus
        $('.delete-form').on('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Anda Yakin?', text: "Data yang akan dihapus tidak bisa dikembalikan!",
                icon: 'warning', showCancelButton: true,
                confirmButtonColor: '#d33', cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus Data!', cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            })
        });

        // 3. Inisialisasi Flatpickr
        flatpickr(".datepicker", {
            locale: "id", dateFormat: "Y-m-d",
        });

        // 4. Inisialisasi Select2
        $('.select2-searchable').select2({
            theme: 'bootstrap4',
        });

        // 5. Inisialisasi Loading State pada Form
        $('.form-loading').on('submit', function() {
            $(this).find('button[type="submit"]').prop('disabled', true)
                   .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
        });

        // 6. Script untuk toggle sidebar
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

</body>
</html>
