

              
@extends('bankend.admin.main')

@section('content')
<div class="col-lg-40 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Toàn Bộ Quốc Gia</h4>
                    <div class="mb-3">
                <a href="{{ route('country.hideAll') }}" class="btn btn-danger"
                    onclick="return confirm('Bạn có chắc chắn muốn tắt tất cả quốc gia?');">Ẩn Tất Cả</a>
                <a href="{{ route('country.onAll') }}" class="btn btn-success"
                    onclick="return confirm('Bạn có chắc chắn muốn bật tất cả quốc gia?');">Bật Tất Cả</a>
            </div>
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                      
                            <th>ID</th>
                            <th>Tên Quốc Gia</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Ảnh</th>
                            <th>Thao Tác</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                        @foreach ($list as $key =>$list_contry)
                        <tr>
                       
                            <td>{{$key+1}}</td>
                            <td>{{$list_contry->name}}</td>
                            <td>{{$list_contry->slug}}</td>
                            <td>
                                @if ($list_contry->status == 1)
                                <label class="badge badge-success">Bật</label>
                                @else ($list_contry->status == 2)
                                <label class="badge badge-danger">Tắt</label>
                                @endif
                            </td>
                            <td>
                              <img src="{{asset($list_contry->image)}}" alt="" width="100px">
                            </td>
                            <td>
                                            <!-- Form Xóa -->
                                            <form action="{{route('country.destroy' ,$list_contry->id)}}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục: {{ $list_contry->name }}?');">
                                            @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa Danh Mục</button>
                                                <a href="{{route('country.edit' ,$list_contry->id)}}" class="btn btn-secondary">Sửa Danh Mục</a>
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

@endsection