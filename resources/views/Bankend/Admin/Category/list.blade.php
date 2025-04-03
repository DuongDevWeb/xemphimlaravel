@extends('bankend.admin.main')

@section('content')
<div class="col-lg-40 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Toàn Bộ Danh Mục</h4>
            <div class="mb-3">
                <a href="{{ route('category.hideAll') }}" class="btn btn-danger"
                    onclick="return confirm('Bạn có chắc chắn muốn tắt tất cả danh mục?');">Ẩn Tất Cả</a>
                <a href="{{ route('category.onAll') }}" class="btn btn-success"
                    onclick="return confirm('Bạn có chắc chắn muốn bật tất cả danh mục?');">Bật Tất Cả</a>
            </div>

            <div class="table-responsive">
                <table class="table" id="" >
                    <thead>
                        <tr>
                         
                            <th>ID</th>
                            <th>Tên Danh Mục</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($list as $key => $list_cate)
                            <tr>
                              
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $list_cate->name }}</td>
                                <td>{{ $list_cate->slug }}</td>
                                <td>
                                    @if ($list_cate->status == 1)
                                        <label class="badge badge-success">Bật</label>
                                    @else
                                        <label class="badge badge-danger">Tắt</label>
                                    @endif
                                </td>
                                <td>
                                    <img src="{{asset($list_cate->image)}}" alt="">
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy', $list_cate->id) }}" method="post"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục: {{ $list_cate->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa Danh Mục</button>
                                        <a href="{{ route('category.edit', $list_cate->id) }}" class="btn btn-secondary">Sửa
                                            Danh Mục</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
    {{ $list->links('pagination::bootstrap-4') }}
</div>

          

        </div>
    </div>
</div>


@endsection