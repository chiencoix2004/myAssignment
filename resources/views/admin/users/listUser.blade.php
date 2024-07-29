@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách tài khoản
@endsection


@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
<div class="alert alert-primary" role='alert'>
    {{session('message')}}
</div>
@endif
        <h4 class="text-primary mb-4">Danh sách tài khoản</h4>
        <a href="{{route('admin.users.addUsers')}}" class="btn btn-info">Thêm Mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $value)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>
                            
                            <a  class="btn btn-info" href="{{ route('admin.users.deleteUser', $value->id) }}">Xóa</a>
                            <a  class="btn btn-warning" href="{{ route('admin.users.updateUser', $value->id) }}">Sửa</a>
                            <a  class="btn btn-warning" href="{{ route('admin.users.detailUser', $value->id) }}">Chi tiết</a>
                            
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    {{-- <script>
        alert('ok')
    </script> --}}
@endpush
