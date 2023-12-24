<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Vasco</title>
</head>

<body>

    <div class="w-full">
        <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Log in here to get the latest product</p>
    </div>
    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">Vasco</h1>
    </div>
    <hr>
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <h1 class="">{{ $product->product_name }}</h1>



    <form action="{{ route('product.order', ['idProduct' => $product->id]) }}" method="POST">

        <h2> Buy Now </h2>
        @csrf

        <label for="selected_color">Select Color</label>
        <br>

        <div class="flex">
            @foreach ($productVariants as $variant)
                @if ($loop->first || $variant->color->color_name != $productVariants[$loop->index - 1]->color->color_name)
                    <label class="mr-2">
                        <input type="radio" name="selected_color" value="{{ $variant->color_id }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                        {{ $variant->color->color_name }}
                        @foreach ($variant->productFiles as $productFile)
                            @if ($productFile->product_variant_id = $variant->id)
                                {{--  @dd($productFile->url) --}}
                                <img src="{{ asset($productFile->url) }}" class="w-20 h-20"
                                    alt="{{ $productFile->file_name }}">
                            @else
                            @endif
                        @endforeach
                    </label>
                @endif
            @endforeach
        </div>

        <label for="selected_size">Available Size:</label>

        <div class="flex" id="sizes-container">
            @foreach ($productVariants as $variant)
                @if ($loop->first || $variant->color->color_name != $productVariants[$loop->index - 1]->color->color_name)
                    @foreach ($variant->availableSizes as $availableSize)
                        <div class="ml-4 mt-2 size-container" data-color-id="{{ $variant->color_id }}"
                            style="display: none;">
                            <input type="radio" name="size_name" value="{{ $availableSize->size->size_name }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" required>
                            {{ $availableSize->size->size_name }}

                            {{ $availableSize->price }}
                            {{ $availableSize->stock }} {{-- Tampilin data ini Pada tabel --}}
                            <br>
                            <!-- Hidden input for price -->
                            <input type="hidden" name="price" value="{{ $availableSize->price }}">
                            <!-- Hidden input for stock -->
                            <input type="hidden" name="stock" value="{{ $availableSize->stock }}">
                            <br>



                        </div>
                    @endforeach
                @endif
            @endforeach

        </div>


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('input[name="selected_color"]').change(function() {
                    var selectedColorId = $(this).val();
                    $('.size-container').hide();
                    $('.size-container[data-color-id="' + selectedColorId + '"]').show();
                });
            });
        </script>


        <script>
            console.log(priceSize);
        </script>


        <label for="qty">Qty</label>
        <input type="number" name="qty" id="qty" min="1" required> {{-- max = stock --}}
        <br>

        {{-- Kalo belom login bakal ada pop up --}}


        <!-- Button to open modal -->
<!-- Tombol untuk membuka modal -->
<button type="button" class="modal-button bg-light text-sm px-2 py-1" onclick="openModal('modal1')">
    Order
</button>

<!-- Modal RejMsg -->
<div id="modal1" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="modal-content modal-dialog modal-lg bg-white p-8 rounded">
        <h3 class="text-2xl font-semibold mb-4">Login to Continue Process</h3>
        <!-- Konten modal lainnya -->
        <button type="button" class="close-button bg-blue-500 text-white px-4 py-2 rounded" onclick="closeModal('modal1')">
            Close
        </button>
    </div>
</div>

<script src="{{ asset('js/popUp.js') }}"></script>

      
    {{--   @if ()
    
      @else
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
            type="submit">Order</button>
      @endif --}}

      


    </form>

    <br>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <strong>Product Details</strong>
        </thead>
        <tbody>

            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description
                </td>
                <td class="px-6 py-3 text-left">{{ $product->description }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</td>
                <td class="px-6 py-3 text-left"></td> {{-- Tampilin data price disini --}}
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</td>
                <td class="px-6 py-3 text-left"></td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</td>
                <td class="px-6 py-3 text-left"></td>
            </tr>
        </tbody>
    </table>





    {{-- <form action="{{ route('product.buy', ['idProduct' => $product->id]) }}" method="POST"> --}}

</body>

</html>
