@extends('admin.admin_base')

@section('main_content')


    <div class="py-12">

        <div class="container">

            <div class="create">

                <a class="btn btn-primary" href="{{ route('slider.create') }}">Add Slider</a>
                
            </div>

            @if(session('success'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>
            </div>

            @endif

            <div class="d-flex justify-between row">

               <div class="card getDatas col-md-12">
                   <div class="card-header d-flex justify-between">
                       <h5>All Sliders</h5>
                       <h5>Number Sliders: <span class="text-danger"></span></h5>
                   </div>
                   <div class="card-body">
                     <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="scope" width="5%">#</th>
                          <th class="scope" width="10%">Title</th>
                          <th class="scope" width="10%">Created At</th>
                          <th class="scope" width="10%">Image</th>
                          <th class="scope" width="20%">Description</th>
                          <th class="scope" width="10%">Save Order ID</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                      <!--  @php($var = 1)  !-->

                      @foreach($sliders as $slider)


                  </tr>
                  <tr>
                      <td>{{ $slider->id }}</td>
                      <td>{{ $slider->title }}</td>
                      <td>

                        {{ $slider->created_at }}
                      </td> 

                      <td><img src="{{ asset($slider->image) }}" height="70px" width="70px"></td>
                      <td>{{ Str::substr($slider->description, 0, 18) }} ...</td>
                      <td>{{ $sliders->firstItem() + $loop->index }}</td>
                      <td class="d-flex justify-between">

                        <a class="btn btn-primary" href="{{ url('slider-edit/' .$slider->id) }}">Edit</a>

                        <a href="{{ url('slider/SoftDelete/' .$slider->id) }}" class="btn btn-warning" onclick="return confirm('Do you want to send this to trash ?')">Send To Trash</a>

                    </td>
                </tr>

                @endforeach 
            </tbody>
        </table>

        {{ $sliders->links() }}
    </div>
</div>



</div>


           <div class="d-flex justify-between row">

               <div class="card getDatas col-md-12">
                   <div class="card-header d-flex justify-between">
                       <h5>Trash Content</h5>
                       <h5>Number Sliders: <span class="text-danger"></span></h5>
                   </div>
                   <div class="card-body">
                     <table class="table table-striped">
                      <thead>
                        <tr>
                           <th class="scope" width="5%">#</th>
                          <th class="scope" width="10%">Title</th>
                          <th class="scope" width="10%">Description</th>
                          <th class="scope" width="10%">Created At</th>
                          <th class="scope" width="20%">Image</th>
                          <th class="scope" width="10%">Save Order ID</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($trashSliders as $trash)
                  <tr>
                       <td>{{ $trash->id }}</td>
                      <td>{{ $trash->title }}</td>
                      <td>
                        {{ Str::substr($trash->description, 0, 15) }}
                        
                      </td> 

                      <td>{{ $trash->created_at }}</td>

                      <td>
                          <img src="{{ asset($trash->image) }} " height="70px" width="70px">
                      </td>

                      <td>{{ $trashSliders->firstItem() + $loop->index }}</td>
                      <td class="d-flex justify-between">

                        <a class="btn btn-success" href="{{ url('/slider/restore/' .$trash->id) }}">Restore</a>

                        <a href="{{ url('/slider/deleteP/' .$trash->id) }}" class="btn btn-danger">Delete Permanentaly</a>
                        
                    </td>
                </tr>

                @endforeach 
                 
            </tbody>
        </table>

       
    </div>
</div>


</div>
</div>

@stop

