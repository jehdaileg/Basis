@extends('admin.admin_base')

@section('main_content')


    <div class="py-12">

        <div class="container">

       
            <div class="d-flex justify-between row">

               <div class="card getDatas col-md-12">
                   <div class="card-header d-flex justify-between">
                       <h5>All Contacts</h5>
                       <h5>Number Messages: <span class="text-danger"></span></h5>
                   </div>
                   <div class="card-body">
                     <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="scope" width="5%">#</th>
                          <th class="scope" width="10%">Name</th>
                          <th class="scope" width="10%">Email</th>
                          <th class="scope" width="10%">Subject</th>
                          <th class="scope" width="20%">Message</th>
                          <th class="scope" width="10%">Created At</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                      <!--  @php($var = 1)  !-->

                      @foreach($contacts as $contact)


                  </tr>
                  <tr>
                      <td>{{ $contact->id }}</td>
                      <td>{{ $contact->name }}</td>
                      <td>

                        {{ $contact->email }}
                      </td> 
                       <td>

                        {{ $contact->subject }}
                      </td> 

                     
                      <td>{{ Str::substr($contact->message, 0, 15) }} ...</td>

                      @if($contact->created_at == NULL)
                      <td class="text-danger">No date available</td>

                      @else
                      <td>{{ $contact->created_at }}</td>

                      @endif
                      <td class="d-flex justify-between">

                       

                    </td>
                </tr>

                @endforeach 
            </tbody>
        </table>

        {{ $contacts->links() }}
    </div>
</div>






          
</div>

@stop

