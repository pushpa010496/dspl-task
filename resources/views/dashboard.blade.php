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

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  


<div class="container mt-3">
    <a href="{{route('logout')}}">Logout</a>
    <a href="{{route('products.index')}}">Prodcuts</a>
    </div>
    

<div class="container">
     <table>
       <tr>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Image</th>
           
        </tr>
          @foreach($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->category_name}}</td>
            <td>
            @if($product->image)          
              <img src="{{  $product->image }}" alt="" style="width:100px;">
            @else
              <span>No Image</span>
            @endif
          </td>
         
      </tr>
        @endforeach
</table>
</div>

  <div>
  <canvas id="myChart"></canvas>
  </div>

<script>
  const ctx = document.getElementById('myChart');
  function mothlySales(labels,data){
    new Chart(ctx, {
    type: 'bar',
    data: {
      labels:labels ,
      datasets: [{
        label: '# of Sales',
        data: data,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  }
  window.addEventListener('load', function() {
     var labels = JSON.parse(`<?php echo json_encode(array_values($lables)) ?>`);
     var data = JSON.parse(`<?php echo json_encode(array_values($sales)) ?>`);
        mothlySales(labels,data);
  });
</script>

</body>
</html>
