@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        User List
                        <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#modal-add">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add User
                        </button>
                    </h3> 
                </div> <!-- /.card-body -->
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-info text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ ($item->role) }}</td> 
                            
                            <td>
                                @if ($item->status == '1')
                                    <a href="{{ route('change-user-status',['0',$item->id]) }}" class="text-success text-bold">Active</a>
                                @else
                                    <a href="{{ route('change-user-status',['1',$item->id]) }}" class="text-danger text-bold">Inactive</a>
                                @endif
                            </td>
                            <td>
                                <button data-toggle="modal" onclick="load_edit_body('{{$item->id}}','{{$item->name}}','{{$item->email}}','{{$item->role}}')" data-target="#modal-edit" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div><!-- /.card-body -->
              </div>
        </div>
    </div>
</div>





<!-- Add Modal -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('save-user') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name"
                            placeholder="Your name">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email"
                            placeholder="Your name">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password"
                            placeholder="Your password">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="SuperAdmin">Super Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->


  
<!-- Edit Modal -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Update User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('update-user') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id"  id="user_id">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" name="name"
                            placeholder="Your name">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"  id="email" class="form-control" name="email"
                            placeholder="Your email">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password"
                            placeholder="Your password">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-control"  id="role">
                            <option value="Admin">Admin</option>
                            <option value="SuperAdmin">Super Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
  
<script>
    function load_edit_body(user_id,name,email,role){
        $('#user_id').val(user_id);
        $('#name').val(name);
        $('#email').val(email);
        $('#role').val(role);
    }
</script>
@endsection

