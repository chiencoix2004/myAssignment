@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách tài khoản
@endsection


@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
            <div id="alert-message" class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <h4 class="text-primary mb-4">Danh sách tài khoản</h4>
        <a href="{{ route('admin.users.addUsers') }}" class="btn btn-info">Thêm Mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $value)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>
                            @if ($value->role == 1)
                                Admin
                            @elseif ($value->role == 2)
                                Client
                            @else
                                {{ $value->role }}
                            @endif
                        </td>
                        
                        <td>

                            {{-- <a class="btn btn-info" href="{{ route('admin.users.deleteUser', $value->id) }}">Xóa</a> --}}
                            <button class="btn btn-danger btn-delete" data-bs-id="{{ $value->id }}"
                                data-bs-toggle="modal" data-bs-target="#deleteModel">Xóa</button>
                            <a class="btn btn-warning" href="{{ route('admin.users.updateUser', $value->id) }}">Sửa</a>
                            <a class="btn btn-warning" href="{{ route('admin.users.detailUser', $value->id) }}">Chi tiết</a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        var deleteModel = document.getElementById('deleteModel')
        deleteModel.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-id')

            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action', '{{ route('admin.users.deleteUser') }}?userId=' + id)
        })

        setTimeout(function() {
        var alertElement = document.getElementById('alert-message');
        if (alertElement) {
            alertElement.style.display = 'none';
        }
    }, 3000);
    </script>
@endpush


<!-- Modal -->
<div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="formDelete">
                @method('delete')
                @csrf
                <div class="modal-body">
                    Bạn có muốn xóa không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-primary">Có</button>
                </div>
            </form>
        </div>
    </div>
</div>
