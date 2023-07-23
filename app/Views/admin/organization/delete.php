<!-- Modal Hapus Artikel -->
<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapusLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('/admin/OrganizationController/hard_delete') ?>" method="post" id="formHapusArtikel">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-hapusLabel">Yakin ingin menghapus Struktur ini?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span class="text-gray-900">Klik "Yakin" untuk konfirmasi menghapus artikel ini.</span>
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" id="artikel_id">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-yakin">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>