@forelse($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->slug }}</td>
        <td>{{ number_format($product->price, 2) }}</td>
        <td>
            @if($product->image)
                <img src="{{ asset('images/' . $product->image) }}" width="80">
            @endif
        </td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn-action btn-edit">Edit</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure?')" class="btn-action btn-delete">Delete</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">No products found</td>
    </tr>
@endforelse
