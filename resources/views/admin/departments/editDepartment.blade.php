<div class="modal fade" id="editDepartmentModal{{ $department->id }}" tabindex="-1" department="dialog" aria-labelledby="editDepartmentModal{{ $department->id }}" aria-hidden="true">
    <div class="modal-dialog" department="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDepartmentModal{{ $department->id }}">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('departments.update', $department->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" required>
                        </div>                              
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Department</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>