<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style type="text/css">
    .div_deg, .order_dag{
      display: flex;
      padding: 3rem 0; 
      justify-content: center;
      align-items: center;
    }

    table{
      border: 2px solid black;
      text-align: center;
      width: 800px;
    }

    th{
      border: 2px solid black;
      text-align: center;
      color: white;
      font-size: 20px;
      font-weight: bold;
      background-color: black;
    }

    td{
      border: 1px solid skyblue; 
    }

    .cart_value{
      text-align: center;
      margin-bottom: 70px;
      padding: 18px; 
    }

    label{
      display: inline-block;
      width: 150px;
    }

    .div_gap{
      padding: 20px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    
  </div>
  <div class="div_deg">

    <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>

        <?php

        $value =  0;

        ?>

        @foreach ($cart as $cart)
          
        <tr>
          <td>{{$cart->product->title}}</td>
          <td>{{$cart->product->price}}</td>
          <td>
            <img width="150" src="/products/{{$cart->product->image}}" alt="">
          </td>

          <td>
            <a class="btn btn-danger" href="{{url('delete_cart', $cart->id)}}">Remove</a>
          </td>
        </tr>

        <?php

        $value = $value + $cart->product->price;

        ?> 

        @endforeach

      </table>
  </div>

  <div class="cart_value">
    <h3>Total Value of Cart is : Rs{{$value}}</h3>
  </div>

  <div class="order_deg" style="display: flex; justify-content: center; align-items: center;">
      <form action="{{url('confirm_order')}}" method="post">
        @csrf
        <div class="div_gap">
          <label>Receiver Name</label>
          <input type="text" name="name" value="{{Auth::user()->name}}">
        </div>

        <div class="div_gap">
          <label>Receiver Address</label>
          <textarea name="address">{{Auth::user()->address}}</textarea>
        </div>

        <div class="div_gap">
          <label>Receiver Phone</label>
          <input type="text" name="phone" value="{{Auth::user()->phone}}">
        </div>

        <div class="div_gap">
          <input class="btn btn-primary" type="submit" value="Cash on Delivery">
          <a class="btn btn-success" href="{{url('stripe', $value)}}">Pay Using Card</a>
        </div>
      </form>

    </div>


  <!-- info section -->

  @include('home.footer')

</body>

</html>