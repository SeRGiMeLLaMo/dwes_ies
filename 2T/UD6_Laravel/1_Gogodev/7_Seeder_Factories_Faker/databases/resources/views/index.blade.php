<body>
    @forelse($products as $product)
        <div>
            <h3>{{$product->name}}</h3>
            <p>{{$product->short_description}}</p>
            <p>{{$product->price}}USD</p>
        </div>
    @empty
        <h5>No data.</h5>
    @endforelse
</body>