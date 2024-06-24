<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
      body {
        background-color: #f4f4f4;
        color: #333;
        font-family: Arial, sans-serif;
      }

      .div_center {
        text-align: center;
        padding-top: 40px;
      }

      .font_size {
        font-size: 40px;
        padding-bottom: 40px;
        color: #333;
      }

      .text_color {
        color: #333;
        padding-bottom: 20px;
      }

      label {
        display: inline-block;
        width: 200px;
        font-weight: bold;
      }

      .div_design {
        padding-bottom: 15px;
      }

      .btn {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
      }

      .btn-primary {
        background-color: #007bff;
      }

      .btn-primary:hover {
        background-color: #0056b3;
      }

      input[type="text"], input[type="number"], select, input[type="file"] {
        width: calc(100% - 220px);
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

      img {
        border-radius: 8px;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
              {{session()->get('message')}}
            </div>
          @endif
          <div class="div_center">
            <h1 class="font_size">Add Product</h1>
            <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="div_design">
                <label>Product name :</label>
                <input class="text_color" type="text" name="name" placeholder="Write here" required="">
              </div>
              <div class="div_design">
                <label>Product Description :</label>
                <input class="text_color" type="text" name="description" placeholder="Write here" required="">
              </div>
              <div class="div_design">
                <label>Product Price :</label>
                <input class="text_color" type="text" id="price" name="price" placeholder="Write here" required="">
              </div>
              <div class="div_design">
                <label>Discount Price :</label>
                <input class="text_color" type="text" id="disc_price" name="disc_price" placeholder="Write here">
              </div>
              <div class="div_design">
                <label>Product Quantity :</label>
                <input class="text_color" type="number" min="0" name="quantity" placeholder="Write here" required="">
              </div>
              <div class="div_design">
                <label>Product Category :</label>
                <select class="text_color" name="category" required="">
                  <option value="" selected="">Choose category here</option>
                  @foreach($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="div_design">
                <label>Product Image :</label>
                <input type="file" name="image" required="">
              </div>
              <div class="div_design">
                <input type="submit" value="Add Product" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
    <script>
      document.getElementById('price').addEventListener('input', function (e) {
        this.value = formatNumber(this.value);
      });

      document.getElementById('disc_price').addEventListener('input', function (e) {
        this.value = formatNumber(this.value);
      });

      function formatNumber(value) {
        return value.replace(/\D/g, '')
                    .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      }
    </script>
  </body>
</html>
