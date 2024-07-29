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
                            <a  class="btn btn-info" href="{{ route('admin.categorys.deleteCategorys', $value->id) }}">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    setTimeout(function() {
        var alertElement = document.getElementById('alert-message');
        if (alertElement) {
            alertElement.style.display = 'none';
        }
    }, 5000);
</script>
@endpush
