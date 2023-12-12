<!-- The Update Modal Modal-->
<div class="modal" id="myModalEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Prodcut</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <form method="post" action="{{route('products.update')}}"  id="addProductForm" enctype = "multipart/form-data">
            <input type="hidden" id="product_id" name="id" value="">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" name="product_name" id="edit_product_name"  value="">
            </div>
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" class="form-control" name="category_name" id="edit_category_name"  value=""> 
            </div>
            <div class="form-group">
                <label for="category_name">Image:</label>
                <input type="file" class="form-control" name="image" id="edit_image" > 
                <img src=""  id="imagePreview" alt="">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--  End The Update Modal Modal -->