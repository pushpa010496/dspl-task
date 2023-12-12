<!-- The Create Modal Modal  with ajax-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Prodcut</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
         <div id="success"></div>
          <form method="post" id="addProductForm">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" name="product_name_ajax" required>
            </div>
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" class="form-control" name="category_name_ajax" required > 
            </div>
            <button type="post" class="btn btn-primary">Create</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--  End The Create Modal Modal -->