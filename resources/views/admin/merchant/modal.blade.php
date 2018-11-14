
<div class="modal fade" id="detailMerchantModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="pull-left">
          <h3 class="box-title"> Detail Merchant </h3>
        </div>
      </div>
      <div class="modal-body">
        <label class="label"> Permission Name </label>
        <input type="text" class="form-control" id="edit-permission-name">
        <input type="text" class="form-control" id="edit-permission-address">
        <input type="text" class="form-control" id="edit-permission-phone">
        <input type="text" class="form-control" id="edit-permission-photo">
        <input type="text" class="form-control" id="edit-permission-gender">
        <input type="text" class="form-control" id="edit-permission-birthday">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="">Update</button>
      </div>
    </div>
  </div>
</div>


<script>
  function addConfirm() {
      let permissionName = document.getElementById('add-permission-name').value;

      jQuery.ajax({
        url: 'permissions/store',
        type: 'POST',
        data: {
          name: permissionName,
          _token: "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function( data ) {
          console.log(data);
        }       
      })
    }
  
    function detailMerchant(merchant) {
      document.getElementById('detail-merchant-name').value = merchant.name
      document.getElementById('detail-merchant-address').value = merchant.address
      document.getElementById('detail-merchant-phone').value = merchant.phone
      document.getElementById('detail-merchant-photo').value = merchant.photo
      document.getElementById('detail-merchant-gender').value = merchant.gender
      document.getElementById('detail-merchant-birthday').value = merchant.birthday
    }
  
    function updatePermission() {
      let permissionName = document.getElementById('edit-permission-name').value;
      let permissionId = document.getElementById('edit-permission-id').value;
  
      jQuery.ajax({
        url: 'permissions/update/' + permissionId,
        type: 'POST',
        data: {
          name: permissionName,
          _token: "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function( data ) {
          console.log(data);
        }       
      })
    }
</script>