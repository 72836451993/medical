@extends('layout')
@section('body_class')
class="home"
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="login-div">
                <form method="get" id="log_out" action="{{url('/login')}}">
                    <button form="log_out" class=" btn" type="submit">Login</button>
                </form>
            </div>

        </div>
        <hr>
        <div class="row">
            @if(isset($products))
                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="prod_img" style="background-image: url('{{url($product['image'])}}')"></div>
                        <div class="product_name">{{$product['product_name']}}</div>
                        <ul>
                           <li><strong>Producer name: </strong> {{$product['producer']['producer_name']}}</li>
                           <li><strong>Medicine type: </strong>{{$product['category']['category_name']}}</li>
                           <li><strong>Weight: </strong>{{$product['weight']}} Mg</li>
                        </ul>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div>
                        There are no data
                    </div>
                </div>
            @endif

        </div>
        <div class="row">
            {{ $products->links() }}
        </div>

    </div>
@endsection