@extends("layout")

@section('title')
    Quản lý user
@endsection

@section('contents')

<div class="row">
    <div class="col-6">
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">Create</a>
    </div>
    <div class="col-6"></div>
</div>
    @if (!empty($data));
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Gender</td>
                    <td>Role</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', ['id' => $item->id]) }}" 
                            class="btn btn-primary">
                            Update</a>
                        </td>
                        <td>
                            <a href="" data-toggle="model" data-target="#confirm_delete_{{$item->id}}" class="btn btn-danger">Delete</a>
                            <div class="modal fade" id="confirm_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      ...
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Không có dữ liệu</h2>
    @endif
    

@endsection