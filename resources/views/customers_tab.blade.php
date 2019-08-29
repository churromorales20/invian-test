<h3 class="dashboard_heading">Registered Users
  <span class="btn btn-light float-right" data-toggle="modal" data-target="#customersModal">Add user</span>
</h3>
@if(count($customers) > 0)
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Categories</th>
      </tr>
    </thead>
    <tbody>
      @foreach($customers as $user)
        <tr>
          <th>{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->address}}</td>
          <td>{{$user->phone}}</td>
          <td>
            @foreach($user->categories as $category_user)
              <span class="badge badge-primary">{{$category_user->name}}</span>
            @endforeach
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <h3 class="dashboard_heading">No users registered</h3>
@endif
<div class="modal fade" id="customersModal" tabindex="-1" role="dialog" aria-labelledby="customersModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('add_customer') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
              <label for="customer_name" class="col-md-4 col-form-label text-md-right">Name</label>
              <div class="col-md-6">
                  <input id="customer_name" type="text" class="form-control" name="customer_name"  required>
              </div>
          </div>
          <div class="form-group row">
              <label for="customer_phone" class="col-md-4 col-form-label text-md-right">Phone</label>
              <div class="col-md-6">
                  <input id="customer_phone" type="text" class="form-control" name="customer_phone"  required>
              </div>
          </div>
          <div class="form-group row">
              <label for="customer_address" class="col-md-4 col-form-label text-md-right">Address</label>
              <div class="col-md-6">
                  <input id="customer_address" type="text" class="form-control" name="customer_address"  required>
              </div>
          </div>
          @if(count($categories) > 0)
          <h3 class="dashboard_heading">Available cateories</h3>
            @foreach($categories as $category)
              <div class="form-group row">
                  <label for="customer_address" class="col-md-4 col-form-label text-md-right">{{$category['name']}}</label>
                  <div class="col-md-6">
                      <input type="checkbox" class="form-control" value="{{$category['id']}}" name="customer_categories[]">
                  </div>
              </div>
            @endforeach
          @else
            <h3 class="dashboard_heading">No categories registered</h3>
          @endif
        </div>
        <div class="modal-footer">
          <span class="btn btn-secondary" data-dismiss="modal">Close</span>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>
