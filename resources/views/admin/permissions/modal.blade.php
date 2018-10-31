<div class="modal fade" id="addPermissionModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="pull-left">
          <h3 class="box-title"> Add Permission </h3>
        </div>
      </div>
      <div class="modal-body">
        <label class="label"> Permission Name </label>
        <input type="text" class="form-control" id="add-permission-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="addPermission()">Add</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editPermissionModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="pull-left">
          <h3 class="box-title"> Edit Permission </h3>
        </div>
      </div>
      <div class="modal-body">
        <label class="label"> Permission Name </label>
        <input type="hidden" class="form-control" id="edit-permission-id">
        <input type="text" class="form-control" id="edit-permission-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="updatePermission()">Update</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deletePermissionModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="pull-left">
          <h3 class="box-title"> Add Roles </h3>
        </div>
      </div>
      <div class="modal-body">
        <label class="label"> Role Name </label>
        <input type="text" class="form-control" id="role-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="addRole()">Add</button>
      </div>
    </div>
  </div>
</div>

<script>
  function addPermission() {
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
  
    function editPermission(permission) {
      document.getElementById('edit-permission-name').value = permission.name
      document.getElementById('edit-permission-id').value = permission.id
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