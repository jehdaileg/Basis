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
                     <h5>All Users</h5>
                     <h5>Total Users: <span class="text-danger">5</span></h5>
                 </div>
                 <div class="card-body">
                   <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Save Order ID</th>
                      </tr>
                  </thead>
                  <tbody>

                    @php($var = 1)

                    @foreach($users as $user)
                   
                  
                  </tr>
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $var ++ }}</td>
                  </tr>

                  @endforeach 
              </tbody>
          </table>
                 </div>
             </div>

             <div class="card createData col-md-4">
                <div class="card-header">New User</div>
                <div class="card-body">
                    
                    <div class="form">
                        <form >
                            
                        </form>
                        
                    </div>
                </div>
                 
             </div>
                
            </div>
      
     </div>
 </div>
</x-app-layout>
