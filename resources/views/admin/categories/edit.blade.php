@extends('admin.layout')
@section('content')

    <div class="container">
        <form class="form form-horizontal" method="post" action="{{url('/admin/categories/'.$category->id)}}">
            <fieldset>
                <legend>
                    <h3>
                        ویرایش دسته :
                        {{old('title', $category->name)}}
                    </h3>
                </legend>

                {{-- error message --}}
                @if ( $errors->count() > 0 )
                    <div class="alert alert-danger " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>خطاهای زیر رخ داده است:</p>
                        <ul>
                            @foreach( $errors->all() as $message )
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" value="put" name="_method">
                <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-4 required-input">نام</label>

                            <div class="col-lg-8">
                                <input type="text" value="{{old('name', $category->name)}}" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alias" class="control-label col-lg-4 required-input">نام مستعار</label>

                            <div class="col-lg-8">
                                <input type="text" value="{{old('alias', $category->alias)}}" class="form-control" id="alias" name="alias">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="published" class="control-label col-lg-4 required-input">منتشر شده</label>

                            <div class="col-lg-8">
                                @if($category->published)
                                    <input checked type="checkbox" class="form-control" id="published">
                                @else
                                    <input type="checkbox" class="form-control" id="published" name="published">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="control-label col-lg-4 required-input">ترتیب</label>

                            <div class="col-lg-8">
                                <input type="number" value="{{old('order',$category->order)}}" class="form-control" id="order" name="order">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i>
                            ذخیره
                        </button>
                        <a href="/admin/categories" class="btn btn-danger">
                            <i class="fa fa-times-circle-o"></i>
                            انصراف
                        </a>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
@endsection
