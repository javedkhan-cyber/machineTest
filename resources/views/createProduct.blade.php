
<html lang="en">
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
    <h3 class="well">Upload Product <a href="/home" style="float: right;">Back To Home</a></h3>
    <form method="post" action="{{route('upload.prouct')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label for="exampleInputEmail1">Product Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Product Price</label>
        <input type="number" name="product_price" class="form-control" id="exampleInputPassword1" placeholder="Product Price">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Category </label>
        <select class="form-control" name="category">
          <option value="">Select Category</option>
          <option value="Cotton">Cotton</option>
          <option value="Leylon">Leylon</option>
          <option value="Ryon">Ryon</option>
          <option value="Strech">Strech</option>
        </select>
        <div class="form-group">
          <label for="exampleInputPassword1">Select Image</label>
          <input type="file" name="image[]" class="form-control" id="exampleInputPassword1" placeholder="Select Multiple Images" multiple="">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">XXL Size </label>
        <select class="form-control" name="size_xxl">
          <option value="">Select Availabilty</option>
          <option value="available">Available</option>
          <option value="not_available">Not Available</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Large Size </label>
        <select class="form-control" name="size_large">
          <option value="">Select Availabilty</option>
          <option value="available">Available</option>
          <option value="not_available">Not Available</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Medium Size </label>
        <select class="form-control" name="size_medium">
          <option value="">Select Availabilty</option>
          <option value="available">Available</option>
          <option value="not_available">Not Available</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">XL Size </label>
        <select class="form-control" name="size_xl">
          <option value="">Select Availabilty</option>
          <option value="available">Available</option>
          <option value="not_available">Not Available</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
    </form>        
  </div>

</body>
</html>
