@extends('admin.admin_base')

@section('main_content')


    <div class="py-12">

        <div class="container">


            <div class="d-flex justify-between row">

               <div class="card createData col-md-8">
                <div class="card-header">Edit Brand</div>
                <div class="card-body">

                    <div class="form">
                        <form class="form" action="{{ url('brands/edit/' .$brand->id) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('put')

                            <input type="hidden" name="old_image" value="{{ $brand->image }}">

                            <div class="form-group">



                                <label>Name:</label>
                                <input type="text" placeholder="Tap here... "name="name" class="form-control" value="{{ $brand->name }}" old="{{ $brand->name }}">

                                @error('name')

                                <div class="mt-2 text-danger">{{ $message }} </div>

                                @endif
                                
                            </div>


                            <div class="form-group mt-2">

                                <label>Image:</label>
                                <input type="file" name="image" value="{{ $brand->image }}" class="form-control">

                                @error('image')

                                <div class="mt-2 text-danger">{{ $message }} </div>

                                @endif

                                <div class="img-fluid">
                                    <img src="{{ asset($brand->image) }}" style="width: 250px; height: 250px;">
                                </div>


                            </div>

                            <div class="mt-2"></div>

                            <button class="btn btn-primary" type="submit">Update</button>
                            
                        </form>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@stop