<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style class="text/css">
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_deg{
            border: 2px solid #34495e;
        }

        th{
            background-color: #2c3e50;
            color: #ecf0f1;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td{
            border: 1px solid #34495e;
            text-align: center;
            color: white;
        }

        input[type='search']{
            width: 500px;
            height: 60px;
            margin-left: 50px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($product as $products)  
                    <tr>
                        <td>{{$products->title}}</td>
                        <td>{!!Str::limit($products->description, 20)!!}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>
                            <img width="120" height="120"src="products/{{$products->image}}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{url('update_product',$products->id)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="div_deg">
                {{$product->onEachSide(1)->links()}}
            </div>
          </div>  
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>