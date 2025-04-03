
@extends('bankend.admin.main')

@section('head')

<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.0.1/ckeditor.js"></script>

@endsection
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm Phim</h4>
            <form class="form-sample" method="post" action="{{route('movie.update',$movie->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="card-description">Thông Tin Cơ Bản</p>
                <div class="row g-3"> <!-- Sử dụng g-3 để tạo khoảng cách giữa các hàng -->
                    <div class="col-md-6">
                        <div class="form-group row mb-3"> <!-- Thêm mb-3 -->
                            <label class="col-sm-3 col-form-label">Tên Phim </label>
                            <div class="col-sm-9">
                                <input type="text" value="{{old('name',$movie->name)}}" id="name" name="name" onkeyup="ChangeToSlug()" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-3"> <!-- Thêm mb-3 -->
                            <label class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{old('slug',$movie->slug)}}" name="slug" class="form-control" id="convert_slug" readonly class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3"> <!-- Gắn thêm g-3 vào các nhóm row -->
                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Danh Mục</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="category_id">
                                   @foreach ($categorys as $cate )
                                 
                                   <option value="{{ $cate->id }}"  {{ $movie->category_id == $cate->id ? 'selected' : '' }}>
                                            {{ $cate->name }}
                                 
                                   @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Từ Khóa </label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{old('tags',$movie->tags)}}" name="tags" placeholder="Từ Khóa" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Quốc Gia</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="country_id" id="country_id">
                                   @foreach ($countrys as $count )
                                    <option value="{{$count->id}}" {{$movie->country_id == $count->id ? 'selected' : ''}}>{{$count->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Bật & Tắt</label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="" value="1"{{old('stauts' , $movie->status == 1 ? 'checked' : '')}} checked> Bật </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="" value="2"{{old('stauts' , $movie->status == 2 ? 'checked' : '')}} > Tắt </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-md-6">
    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label">Thể Loại</label>
        <div class="col-sm-9">
            @if ($genres && $genres->isNotEmpty())
                <div class="d-flex flex-wrap">
                    @foreach ($genres as $gen)
                        <div class="form-check mr-3">
                            <input 
                                type="checkbox" 
                                name="genre[]" 
                                value="{{ $gen->id }}" 
                                class="form-check-input" 
                                id="genre-{{ $gen->id }}" 
                                {{ $movie->genres->pluck('id')->contains($gen->id) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="genre-{{ $gen->id }}">
                                {{ $gen->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Không có thể loại nào.</p>
            @endif
        </div>
    </div>
</div>



                   <!-- mô tả -->
                   <div class="col-md-6">
    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label">Vsub & Không Che</label>
        <div class="col-sm-9">
            <select class="form-control" name="vskc" id="vskc">
                <option value="1" {{ old('vskc', $movie->vskc) == 1 ? 'selected' : '' }}>VietSub</option>
                <option value="2" {{ old('vskc', $movie->vskc) == 2 ? 'selected' : '' }}>Không Che</option>
                <option value="3" {{ old('vskc', $movie->vskc) == 3 ? 'selected' : '' }}>Khác</option>
            </select>
        </div>
    </div>
</div>

                  
                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Ảnh Đại Diện</label>
                            <div class="col-sm-9">
                            @if($movie->image && file_exists(public_path($movie->image)))
                                                                            <img src="{{ asset($movie->image) }}" alt="" width="10%">
                                                                        @else
                                                                            <p>Không có ảnh hiện tại.</p>
                                                                        @endif
                                <!-- Input để chọn ảnh mới -->
                                <input type="file" name="image" class="form-control">

                                <small class="form-text text-muted">Chọn ảnh mới nếu bạn muốn thay đổi</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Thời Lượng</label>
                            <div class="col-sm-9">
                              <input type="text"  value="{{old('thoiluong',$movie->thoiluong)}}" name="thoiluong" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label">Video</label>
        <div class="col-sm-9">
            <input type="text" name="video" class="form-control" value="{{ old('video', $movie->video) }}">

            @if ($movie->video)
                <!-- Hiển thị video nếu có -->
                {!! str_replace('<iframe', '<iframe width="440" height="225"', $movie->video) !!}
            @else
                <p>Không có video.</p>
            @endif
        </div>
    </div>
</div>

                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Server Phim</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="server_id" id="server_id">
    @foreach ($server as $ser)
        <option value="{{ $ser->id }}" 
            {{ $ser->id == old('server_id', $movie->server_id) ? 'selected' : '' }}>
            {{ $ser->name }}
        </option>
    @endforeach
</select>

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
    <div class="col-12">
        <div class="form-group row mb-3">
            <label class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" rows="5" class="form-control">{{old('description',$movie->description)}}</textarea>
            </div>
        </div>
    </div>
</div>

                   
                </div>
               
                <button type="submit" class="btn btn-danger">Sửa Phim Mới</button>
               <a href="" class="btn btn-primary">Không Lưu & Xóa Bỏ</a>
               <a href="" class="btn btn-success">Danh Sách Phim</a> 
            </form>
        </div>
    </div>
</div>


@endsection

@section('footer')
<script>

    CKEDITOR.replace('description', {
        entities: false
    });

</script>
@endsection