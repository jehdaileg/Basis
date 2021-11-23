<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hey... {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">

            @if(session('success'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>
            </div>

            @endif

            <div class="d-flex justify-between row">

               <div class="card getDatas col-md-6">
                   <div class="card-header d-flex justify-between">
                       <h5>All Brands</h5>
                       <h5>Number Brands: <span class="text-danger">{{ count($brands) }}</span></h5>
                   </div>
                   <div class="card-body">
                     <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Created At</th>
                          <th>Image</th>
                          <th>Save Order ID</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                      <!--  @php($var = 1)  !-->

                      @foreach($brands as $brand)


                  </tr>
                  <tr>
                      <td>{{ $brand->id }}</td>
                      <td>{{ $brand->name }}</td>
                      <td>

                        {{ $brand->created_at }}
                      </td> 

                      <td><img src="{{ asset($brand->image) }}" height="70px" width="70px"></td>
                      <td>{{ $brands->firstItem() + $loop->index }}</td>
                      <td class="d-flex justify-between">

                        <a class="btn btn-primary" href="{{ url('brands/edit/'.$brand->id) }}">Edit</a>

                        <a href="{{ url('brands/SoftDelete/' .$brand->id) }}" class="btn btn-warning" onclick="return confirm('Do you want to send this to trash ?')">Send To Trash</a>

                    </td>
                </tr>

                @endforeach 
            </tbody>
        </table>

        {{$brands->links()}}
    </div>
</div>

<div class="card createData col-md-4">
    <div class="card-header">New Brand</div>
    <div class="card-body">

        <div class="form">
            <form class="form" method="post" action="{{ url('brands/create')}}" enctype="multipart/form-data">

                @csrf
                @method('post')

                <div class="form-group">

                    <label>Name:</label>
                    <input type="text" placeholder="Tap here... "name="name" class="form-control">

                    @error('name')

                    <div class="mt-2 text-danger">{{ $message }} </div>

                    @endif

                </div>

                 <div class="form-group mt-2">

                    <label>Image:</label>
                    <input type="file" name="image" class="form-control">

                    @error('image')

                    <div class="mt-2 text-danger">{{ $message }} </div>

                    @endif

                </div>


                <div class="mt-2"></div>

                <button class="btn btn-success" type="submit">Add</button>

            </form>

        </div>
    </div>

</div>

</div>


           <div class="d-flex justify-between row">

               <div class="card getDatas col-md-6">
                   <div class="card-header d-flex justify-between">
                       <h5>Trash Content</h5>
                       <h5>Number Brands: <span class="text-danger"></span></h5>
                   </div>
                   <div class="card-body">
                     <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Created At</th>
                          <th>Image</th>
                          <th>Save Order ID</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($trashBrand as $brand)
                  <tr>
                       <td>{{ $brand->id }}</td>
                      <td>{{ $brand->name }}</td>
                      <td>

                        {{ $brand->created_at }}
                      </td> 
                      <td>
                          <img src="{{ asset($brand->image) }}" height="70px" width="70px">
                      </td>

                      <td>{{ $trashBrand->firstItem() + $loop->index  }}</td>
                      <td class="d-flex justify-between">

                        <a class="btn btn-success" href="{{ url('/brands/restore/' .$brand->id) }}">Restore</a>

                        <a href="{{ url('/brands/deleteP/' .$brand->id) }}" class="btn btn-danger">Delete Permanentaly</a>
                        
                    </td>
                </tr>

                @endforeach 
                 
            </tbody>
        </table>

       
    </div>
</div>


</div>
</div>
</x-app-layout>
