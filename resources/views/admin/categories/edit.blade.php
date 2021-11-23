<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hey... {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">

        
            <div class="d-flex justify-between row">

             <div class="card createData col-md-8">
                <div class="card-header">Edit Category</div>
                <div class="card-body">
                    
                    <div class="form">
                        <form class="form" action="{{ route('cat.update', $category->id) }}" method="post">

                            @csrf
                            @method('put')

                            <div class="form-group">

                                <label>Name:</label>
                                <input type="text" placeholder="Tap here... "name="name" class="form-control" value="{{ $category->name }}" old="{{ $category->name }}">

                                @error('name')

                                    <div class="mt-2 text-danger">{{ $message }} </div>

                                @endif
                                
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
</x-app-layout>
