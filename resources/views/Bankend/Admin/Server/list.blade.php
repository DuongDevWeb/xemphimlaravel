

              
@extends('bankend.admin.main')

@section('content')
<div class="col-lg-40 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Toàn Bộ Danh Mục</h4>      
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên Danh Mục.</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Thao Tác</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                        @foreach ($list as $key =>$list_server)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$list_server->name}}</td>
                            <td>{{$list_server->slug}}</td>
                            <td>
                                @if ($list_server->status == 1)
                                <label class="badge badge-success">Bật</label>
                                @else ($list_server->status == 2)
                                <label class="badge badge-danger">Tắt</label>
                                @endif
                            </td>
                            <td>
                                            <!-- Form Xóa -->
                                            <form action="{{route('server.destroy' ,$list_server->id)}}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục: {{ $list_server->name }}?');">
                                            @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa Danh Mục</button>
                                                <a href="{{route('server.edit' ,$list_server->id)}}" class="btn btn-secondary">Sửa Danh Mục</a>
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