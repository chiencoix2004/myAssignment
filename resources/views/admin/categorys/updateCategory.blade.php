@extends('admin.layouts.default')

@section('content')
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Sửa danh mục</h4>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form action="{{route('admin.categorys.updatePostCategorys')}}" method="POST" >
    @csrf
    <input type="hidden" name="categoryId" value="{{$categorys->id}}">
   <div class="mb-3">
    <label for="name">Tên Danh Mục</label>
    <input type="text" class="form-control" value="{{$categorys['nameCategory']}}"id="name" name="name">
   </div>

   <button type="submit" class="btn btn-success">Sửa danh mục</button>
</div>
</form>
@endsection



