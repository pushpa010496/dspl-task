<!DOCTYPE html>
<html lang="en">
<head>
  <title>DSPL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="container mt-3">
      <h3>DSPL</h3>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
      Create Product Ajax
      </button>
    </div>
 @if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
@if(Session::has('product_update'))
<p class="alert alert-success">{{ Session::get('product_update') }}</p>
@endif
@if(Session::has('product_delete'))
<p class="alert alert-danger">{{ Session::get('product_delete') }}</p>
@endif
<div class="container mt-3">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal1">
      Create Product
      </button>
    </div>

<div class="container">
     <table>
       <tr>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Image</th>
            <th col="2">Action</th>
        </tr>
          @foreach($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->category_name}}</td>
            <td>
            @if($product->image)          
              <img src="{{ asset('images/'. $product->image) }}" alt="" style="width:100px;">
            @else
              <span>No Image</span>
            @endif
          </td>
          <td><button type ="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalEdit" onclick="editProduct({{$product->id}})" >Edit</button></td>
          <td><button type ="button" class="btn btn-danger" data-bs-target="#myModalDelete" onclick="deleteId({{$product->id}})" data-bs-toggle="modal" data-original-title="Delete Products">Delete</button></td>
      </tr>
        @endforeach
</table>
</div>
@include('products.create')
@include('products.ajax')
@include('products.update')

<!-- The Delete Modal Form -->
<div id="myModalDelete" class="modal fade">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
              <form action="{{ route('products.delete')}}" method="post">
                  @csrf
                  <div class="modal-body">
                      <p>Do you really want to delete these records? This process cannot be undone.</p>
                  </div>
                  <div class="modal-footer justify-content-center">
                      <input type="hidden" value="" name="delete_id" id="delete_id">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
              </form>
      </div>
    </div>
  </div>
  <!-- End Delete Modal -->

<script>
$('#addProductForm').submit(function (e) {
    e.preventDefault();
    var product_name =$('input[name="product_name_ajax"]').val() ;
    var category_name = $('input[name="category_name_ajax"]').val();
    $.ajax({
        type: "POST", 
        url: "{{ url('products-sucess')}}",
        data: {
          'product_name': product_name,
          'category_name': category_name,
          "_token": "{{ csrf_token() }}"
        },
        success: function(response){
            if(response.status === 200){
                $('#success').html(`<div class="alert alert-success">Product Created Successfuly</div>`);
                setTimeout(function(){
                  location.reload();
                }, 1000);
              }
        }, 
        error: function(error){
          consol.log(error);
        }
    })
});


 function editProduct(id){
  var base_url = "{{getenv('APP_URL')}}"
  $.ajax({
        type: 'post',
        url: "{{ url('products-edit')}}",
        data:{
          'id': id,
          "_token": "{{ csrf_token() }}"
        },
        success: function(response){
         //console.log(response.data);
         $("#product_id").val(response.data.id)
          $('#edit_product_name').val(response.data.product_name);
          $('#edit_category_name').val(response.data.category_name);
          document.getElementById('imagePreview').src = base_url+response.data.image;

        },
        error:function(error){
          consol.log(error);
        }
  })
 }
 function deleteId(id) {
     document.getElementById('delete_id').value = id;
 }
</script>



</body>
</html>
