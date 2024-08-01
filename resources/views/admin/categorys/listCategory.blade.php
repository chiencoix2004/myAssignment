@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách danh mục
@endsection


@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
            <div id="alert-message" class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <h4 class="text-primary mb-4">Danh sách danh mục</h4>
        <a href="{{ route('admin.categorys.addCategorys') }}" class="btn btn-info">Thêm Mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorys as $key => $value)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->nameCategory }}</td>
                        <td>
                            <a  class="btn btn-warning" href="{{ route('admin.categorys.updateCategorys', $value->id) }}">Sửa</a>
                            {{-- <a  class="btn btn-info" href="{{ route('admin.categorys.deleteCategorys', $value->id) }}">Xóa</a> --}}
                            <button class="btn btn-danger btn-delete" data-bs-id="{{ $value->id }}"
                                data-bs-toggle="modal" data-bs-target="#deleteModel">Xóa</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

{{-- @push('scripts')
<script>
    setTimeout(function() {
        var alertElement = document.getElementById('alert-message');
        if (alertElement) {
            alertElement.style.display = 'none';
        }
    }, 5000);
</script>
@endpush --}}
@push('scripts')
    <script>
        var deleteModel = document.getElementById('deleteModel')
        deleteModel.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-id')

            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action', '{{ route('admin.categorys.deleteCategorys') }}?categoryId=' + id)
        })

        setTimeout(function() {
        var alertElement = document.getElementById('alert-message');
        if (alertElement) {
            alertElement.style.display = 'none';
        }
    }, 5000);
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