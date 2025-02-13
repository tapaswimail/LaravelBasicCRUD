<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="bg-dark py-3">
      <h3 class="text-white text-center">Simple Laravel 11 CRUD</h3>
    </div>
    <div class="container">
      <!--Back Button-->
      <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
        </div>
      </div>
      <!--Back Button-->
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card borde-0 shadow-lg my-4">
            <div class="card-header bg-dark">
              <h3 class="text-white">Create Product</h3>
            </div>
           <form enctype="multipart/form-data" action="{{route('products.store')}}" method="post">
            @csrf
            <div class="card-body">
              <div class="mb-3" >
                <label for="" class="form-label h5">Name</label>
                <input type="text" value="{{old('name')}}" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name" name="name">
                @error('name')
                  <p class="invalid-feedback">{{$message}}</p>
                @enderror
              </div>
              <div class="mb-3" >
                <label for="" class="form-label h5">Sku</label>
                <input type="text" value="{{old('sku')}}" class="@error('sku') is-invalid @enderror form-control form-control-lg" placeholder="Sku" name="sku">
                @error('sku')
                  <p class="invalid-feedback">{{$message}}</p>
                @enderror
              </div>
              <div class="mb-3" >
                <label for="" class="form-label h5">Price</label>
                <input type="text" value="{{old('price')}}" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="Price" name="price">
                @error('price')
                  <p class="invalid-feedback">{{$message}}</p>
                @enderror
              </div>
              <div class="mb-3" >
                <label for="" class="form-label h5">Description</label>
                <textarea placeholder="Description" class="form-control" name="description" cols="30" rows="5" ></textarea>
              </div>
              <div class="mb-3" >
                <label for="" class="form-label h5">Image</label>
                <input type="file" class="form-control form-control-lg"  name="image">
              </div>
              <div class="d-grid">
                  <button class="btn btn-lg btn-primary">Submit</button>
              </div>              
            </div><!--end of body-->
          </form>
          </div>
        </div>
      </div>      
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
