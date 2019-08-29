<h3 class="dashboard_heading">Registered Categories
  <span class="btn btn-light float-right" data-toggle="modal" data-target="#categoriesModal">Add category</span>
</h3>
@if(count($categories) > 0)
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
        <tr>
          <td>{{$category->id}}</td>
          <td>{{$category->name}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <h3 class="dashboard_heading">No categories registered</h3>
@endif

<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="categoriesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('add_category') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
              <label for="category_name" class="col-md-4 col-form-label text-md-right">Category name</label>
              <div class="col-md-6">
                  <input id="category_name" type="text" class="form-control" name="category_name"  required>
              </div>
          </div>
        <div class="modal-footer">
          <span class="btn btn-secondary" data-dismiss="modal">Close</span>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>
