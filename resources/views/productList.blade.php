
<html lang="en">
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container lst">

    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div> 
    @endif
    <h3 class="well">Product List <a href="/home" style="float: right;">Back To Home</a></h3>
           
  </div>

<div class="container">     
  <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Large</th>
        <th>XXL</th>
        <th>Image</th>
        <th>Uploaded</th>
      </tr>
    </thead>
    <tbody>
      @forelse($getProductDetails as $product)
      
      <tr>
        <td>{{ $product->product_name}}</td>
        <td>{{ $product->product_price}}</td>
        <td>{{ $product->category}}</td>
        <td>{{ $product->getVarient->size_large}}</td>
        <td>{{ $product->getVarient->size_xxl}}</td>
        <td><a href="{{ route('product.details',$product->id) }}"><img src="{{ asset('images/brandImages/'.$product->getImages[0]->image) }}"></a></td>
        <td>{{ $product->created_at}}</td>
      </tr>
      @empty
      <p>There is no data available</p>
      @endforelse
    </tbody>
  </table>
  {{-- {!! $getProductDetails->links() !!} --}}
</div>
</html>
