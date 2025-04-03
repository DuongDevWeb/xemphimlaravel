
@extends('bankend.admin.main')

@section('head')

<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.0.1/ckeditor.js"></script>

@endsection
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm Phim</h4>
            <form class="form-sample" method="post" action="{{route('movie.store')}}" enctype="multipart/form-data">
                @csrf
                <p class="card-description">Thông Tin Cơ Bản</p>
                <div class="row g-3"> <!-- Sử dụng g-3 để tạo khoảng cách giữa các hàng -->
                    <div class="col-md-6">
                        <div class="form-group row mb-3"> <!-- Thêm mb-3 -->
                            <label class="col-sm-3 col-form-label">Tên Phim </label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" onkeyup="ChangeToSlug()" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-3"> <!-- Thêm mb-3 -->
                            <label class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text"  name="slug" class="form-control" id="convert_slug" readonly class="form-control" />
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
                                 
                                   <option value="{{$cate->id}}">{{$cate->name}}</option>
                                 
                                   @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Từ Khóa </label>
                            <div class="col-sm-9">
                                <input class="form-control" name="tags" placeholder="Từ Khóa" />
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
                                    <option value="{{$count->id}}">{{$count->name}}</option>
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
                                            id="" value="1" checked> Bật </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"
                                            id="" value="2"> Tắt </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Thể Loại</label>
                            <div class="col-sm-9">
                               @if ($genres && $genres->isNotEmpty())
                               @foreach ($genres as $gen )
                               <input type="checkbox" name="genre[]" value="{{ $gen->id }}"> {{ $gen->name }}

                               @endforeach
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
                                  <option value="1">VietSub</option>
                                  <option value="2">Không Che</option>
                                  <option value="3">Khác</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Ảnh Đại Diện</label>
                            <div class="col-sm-9">
                              <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Thời Lượng</label>
                            <div class="col-sm-9">
                              <input type="text" name="thoiluong" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Video</label>
                            <div class="col-sm-9">
                              <input type="text" name="video" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Server Phim</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="server_id" id="server_id">
                                   @foreach ($server as $ser )
                                   <option value="{{$ser->id}}">{{$ser->name}}</option>
                                 
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
                <textarea name="description" id="description" rows="5" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>

                   
                </div>
               
                <button type="submit" class="btn btn-danger">Thêm Phim Mới</button>
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