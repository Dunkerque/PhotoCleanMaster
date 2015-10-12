
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Modification frais de port  </h4>
            </div>

            <div class="modal-body">

                <form id="form-edit-shipment">
                    <div class="form-group">
                        <?php ?>
                        <label for="recipient-name" class="control-label">Tarif:</label>
                        <input type="text" class="form-control" id="editTarifVal" value="">
                        <input type="hidden" id="editIdVal" value="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Transport:</label>
                        <textarea class="form-control" id="editTransportVal"></textarea>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="validForm">Valider</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>