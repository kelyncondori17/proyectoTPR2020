<x-app-layout>
    <x-slot name="header">
</br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Productos</div>

                <a href="{{url('cart/')}}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">Carrito de Compras</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                    @endif

                    {{-- Agregar productos --}}
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-6">
                                
                                <center><img src="img/{{$product->imagen}}" width="50%" alt=""</center>



                                    <h4>{{ $product->name }}</h4>
                                    <p>{{ $product->description }}</p>
                                    <p><strong>Precio: </strong> {{ $product->price }}Bs</p>

                                    <a href="{{url('add-to-cart/'.$product->id)}}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Agregar al Carrito</a>

                                    <a href="{{url('product-detail/'.$product->id)}}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">Detalle</a>
                                 </div>  
                            @endforeach
                        </div>
                        
                    {{-- Agregar Productos --}}

                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>