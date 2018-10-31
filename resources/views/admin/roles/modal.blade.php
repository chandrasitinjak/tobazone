<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="pull-left">
          <h3 class="box-title"> Add Roles </h3>
        </div>
      </div>
      <div class="modal-body">
        <label class="label"> Role Name </label>
        <input type="text" class="form-control" id="add-role-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="addRole()">Add</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="pull-left">
          <h3 class="box-title"> Edit Roles </h3>
        </div>
      </div>
      <div class="modal-body">
        <label class="label"> Role Name </label>
        <input type="hidden" class="form-control" id="edit-role-id">
        <input type="text" class="form-control" id="edit-role-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="updateRole()">Update</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
  function addRole() {
    let roleName = document.getElementById('add-role-name').value;
    jQuery.ajax({
      url: 'roles/store',
      type: 'POST',
      data: {
        name: roleName,
        _token: "{{ csrf_token() }}"
      },
      dataType: 'json',
      success: function( data ) {
        console.log(data);
      }       
    })
  }

  function editRole(role) {
    document.getElementById('edit-role-name').value = role.name
    document.getElementById('edit-role-id').value = role.id
  }

  function updateRole() {
    let roleName = document.getElementById('edit-role-name').value;
    let roleId = document.getElementById('edit-role-id').value;

    jQuery.ajax({
      url: 'roles/update/' + roleId,
      type: 'POST',
      data: {
        name: roleName,
        _token: "{{ csrf_token() }}"
      },
      dataType: 'json',
      success: function( data ) {
        console.log(data);
      }       
    })
  }

</script>