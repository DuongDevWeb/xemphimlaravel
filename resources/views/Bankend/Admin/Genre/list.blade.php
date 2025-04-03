

              
@extends('bankend.admin.main')

@section('content')
<div class="col-lg-40 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Toàn Bộ Thể Loại</h4>
                   
                    </p>
                    <div class="table-responsive">
                      <table class="table" id="genrelist">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên Thể Loại</th>
                            <th>Slug</th>
                            <th>Ản</th>
                            <th>Status</th>
                            <th>Thao Tác</th>
                          </tr>
                        </thead>.
                        <tbody>
                         
                        @foreach ($list as $list_genre)
                        <tr>
                            <td>{{$list_genre->id}}</td>
                            <td>{{$list_genre->name}}</td>
                            <td>{{$list_genre->slug}}</td>
                            <td>
                              <img src="{{asset($list_genre->image)}}" alt="" width="100px">
                            </td>
                            <td>
    @if ($list_genre->status == 1)
        <label class="badge badge-success">Bật</label>
    @else
        <label class="badge badge-danger">Tắt</label>
    @endif
</td>
                            <td>
                                            <!-- Form Xóa -->
                                            <form action="{{route('genre.destroy' ,$list_genre->id)}}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa thể loại: {{ $list_genre->name }}?');">
                                            @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa Thể Loại</button>
                                                <a href="{{route('genre.edit' ,$list_genre->id)}}" class="btn btn-secondary">Sửa Thể Loại</a>
                                            </form>
                                        </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pagination">
    {{ $list->links('pagination::bootstrap-4') }}
</div>
@endsection