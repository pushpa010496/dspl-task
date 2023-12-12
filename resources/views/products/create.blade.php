<!-- The Create Modal Modal with post-->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Prodcut</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <form method="post" action="{{ route('products.create')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" class="form-control" name="category_name" required > 
            </div>
            <div class="form-group">
                <label for="category_name">Image:</label>
                <input type="file" class="form-control" name="image" required > 
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--  End The Create Modal Modal -->