@extends('bankend.admin.main')

@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tạo Mới Server</h4>
            <form class="form-sample" enctype="multipart/form-data" method="post" action="{{route('server.store')}}">
                @csrf
                @include('bankend.admin.alter')
                <p class="card-description"> Thông Tin Cơ Bản </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tên Server</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" onkeyup="ChangeToSlug()"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>

                </div>
<br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Slug Theo Tên</label>
                            <div class="col-sm-9">
                                <input type="text" name="slug" class="form-control" id="convert_slug" readonly
                                    class="form-control" />
                            </div>
                        </div>
                    </div>

                </div>

                <br>
                <div class="row">

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
                </div>
                <button class="btn btn-danger">Thêm Server</button>
                <a href="" class="btn btn-success">Không Lưu Xóa Bỏ</a>
                <a href="" class="btn btn-info">Đến Đến Trang Danh Sách</a>
            </form>
        </div>
    </div>
</div>
@endsection