@extends('bankend.admin.main')

@section('content')
<div class="col-lg-40 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Toàn Bộ Phim</h4>
         <div class="table-responsive">
            <table class="table" id="movietap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Tên</th>
                     <th>Slug</th>
                     <th>Mô Tả</th>
                     <th>VSKC</th>
                     <th>Từ Khóa</th>
                     <th>Trạng Thái</th>
                     <th>Ảnh</th>
                     <th>Thời Lượng</th>
                     <th>Danh Mục</th>
                     <th>Quốc Gia</th>
                     <th>Thể Loại</th>
                     <th>Server Phim</th>
                     <th>Thao Tác</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($movies as $movie)
                 <tr>
                   <td>{{$movie->id}}</td>
                   <td>{{$movie->name}}</td>
                   <td>{{$movie->slug}}</td>
                   <td>{!!Str::limit($movie->description, '3')!!}</td>
                   <td>
                     @if ($movie->vskc == 1)
                   <span class="btn btn-success">VietSub</span>
                @elseif($movie->vskc == 2)
                <span class="btn btn-danger">Không</span>
             @else
             <span class="btn btn-info"></span>
          @endif
                   </td>
                   <td>
                     {{$movie->tags}}
                   </td>
                   <td>
                     @if ($movie->status == 1)
                   <span class="btn btn-success">Bật</span>
                @else
                <span class="btn btn-danger">Tắt</span>
             @endif
                   </td>
                   <td>
                     @if ($movie->image && file_exists(public_path($movie->image)))
                   <img src="{{ asset($movie->image) }}" alt="Ảnh của {{ $movie->name }}"
                     style="width: 150px; height: auto; object-fit: cover;">
                @else
                <p>Không có ảnh hiện tại.</p>
             @endif
                   </td>
                   <td>{{$movie->thoiluong}}</td>
                   <td>
                     {{$movie->category ? $movie->category->name : 'Không Có'}}
                   </td>

                   <td>{{ optional($movie->country)->name ?? 'Không có quốc gia' }}</td>
                   <td>
                     @foreach ($movie->genres as $gen)
                   <span class="btn btn-primary mt-2">{{$gen->name}}</span>
                @endforeach
                   </td>
                   <td>
                     @if ($movie->server)
                   <span class="btn btn-warning mt-2">{{ $movie->server->name }}</span>
                @else
                Không có server
             @endif
                   </td>
                   <td>
                     <!-- Form Xóa -->
                     <form action="{{route('movie.destroy', $movie->id)}}" method="post"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục: {{ $movie->name }}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Xóa</button>


                        <a href="{{route('movie.edit', $movie->id)}}" class="btn btn-secondary mt-2">Sửa</a>
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
   {{ $movies->links('pagination::bootstrap-4') }}
</div>
@endsection