<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hey... {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">

          
            <div class="d-flex justify-between row">

               <div class="card getDatas col-md-6">
                   <div class="card-header d-flex justify-between">
                       <h5>All Categories</h5>
                       <h5>Number Categories: <span class="text-danger">{{ count($cats) }}</span></h5>
                   </div>
                   <div class="card-body">
                     <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Created At</th>
                          <th>Save Order ID</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                      <!--  @php($var = 1)  !-->

                      @foreach($cats as $cat)


                  </tr>
                  <tr>
                      <td>{{ $cat->id }}</td>
                      <td>{{ $cat->name }}</td>
                      <td>

                          @if($cat->created_at == NULL)
                          <span class="text-danger">No Date Available</span>
                          @else
                          <span>{{ $cat->created_at->diffForHumans() }} </span>
                          @endif
                      </td> 
                      <td>{{ $cats->firstItem() + $loop->index }}</td>
                      <td class="d-flex justify-between">

                        <a class="btn btn-primary" href="{{ route('cat.edit', $cat->id) }}">Edit</a>

                        <a href="{{ url('/categories/SoftDelete/' .$cat->id) }}" class="btn btn-warning">Send To Trash</a>

                    </td>
                </tr>

                @endforeach 
            </tbody>
        </table>

        {{$cats->links()}}
    </div>
</div>

<div class="card createData col-md-4">
    <div class="card-header">New Category</div>
    <div class="card-body">

        <div class="form">
            <form class="form" method="post" action="{{ route('cat.add') }}">

                @csrf
                @method('post')

                <div class="form-group">

                    <label>Name:</label>
                    <input type="text" placeholder="Tap here... "name="name" class="form-control">

                    @error('name')

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
                       <h5>Number Categories: <span class="text-danger">{{ count($trashCat) }}</span></h5>
                   </div>
                   <div class="card-body">
                     <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Created At</th>
                          <th>Save Order ID</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                      <!--  @php($var = 1)  !-->

                      @foreach($trashCat as $cat)
                      
                      
                  </tr>
                  <tr>
                      <td>{{ $cat->id }}</td>
                      <td>{{ $cat->name }}</td>
                      <td>

                          @if($cat->created_at == NULL)
                          <span class="text-danger">No Date Available</span>
                          @else
                          <span>{{ $cat->created_at->diffForHumans() }} </span>
                          @endif
                      </td> 
                      <td>{{ $trashCat->firstItem() + $loop->index }}</td>
                      <td class="d-flex justify-between">

                        <a class="btn btn-success" href="{{ url('/categories/Restore/' .$cat->id) }}">Restore</a>

                        <a href="{{ url('/categories/DeletePermanent/' .$cat->id) }}" class="btn btn-danger">Delete Permanentaly</a>
                        
                    </td>
                </tr>

                @endforeach 
            </tbody>
        </table>

        {{$cats->links()}}
    </div>
</div>


</div>
</div>
</x-app-layout>
