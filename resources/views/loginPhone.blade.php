@extends('Layouts.layout')
@section('title')
    <title>
        ورود/ثبت نام
    </title>
@endsection
@section('body')
    <section>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                    <form method="POST" action="{{route('loginPhoneForm')}}">
                        @csrf
                        <div class="crs_log_wrap">
                            <div class="crs_log__thumb">
                                <img src="assets/img/banner-2.jpg" class="img-fluid" alt=""/>
                            </div>
                            <div class="crs_log__caption">
                                <div class="rcs_log_123">
                                    <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                                </div>

                                <div class="rcs_log_124">
                                    <div class="Lpo09"><h4> حساب کاربری</h4></div>
                                    @if($errors->any())
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li style="background-color: #c49aa3;color: #8d0122;padding: 5px;">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="form-group">
                                        <label>شماره موبایل خود را وارد کنید</label>
                                        <input type="text" name="phone" class="form-control" placeholder="...0912"/>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn full-width btn-md theme-bg text-white">ورود
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
