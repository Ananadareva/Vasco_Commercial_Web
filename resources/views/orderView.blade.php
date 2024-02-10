<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Vasco</title>
</head>

<body>

    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">Vasco</h1>
    </div>
    <hr>
    <button onclick="goBack()" class="bg-black mt-4 text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <div class="grid grid-cols-3 gap-4">
        <section class=" flex">
            <div class="w-1/2 grid grid-rows-1 grid-flow-col gap-4">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            {{-- <td class="py-2 px-4 border-b"> <img class="w-1/2" src="{{ asset($url) }}"> </td>
                            <td class="py-2 px-4 border-b">
                                <div>

                                    {{ $productName }}
                                </div>
                            </td> --}}
                        </tr>

                        <tr>
                            <td class="py-2 px-4 border-b"> Color</td>
                            <td class="py-2 px-4 border-b">{{ $selectedColorName }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b"> Size</td>
                            <td class="py-2 px-4 border-b">{{ $selectedSize }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b"> Price</td>
                            <td class="py-2 px-4 border-b font-normal">Rp. {{ $price }},-</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Qty</td>
                            <td class="py-2 px-4 border-b font-normal">{{ $qty }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-t font-bold">Items Price</td>
                            <td class="py-2 px-4 border-b border-t font-bold">Rp. {{ $totalPrice }},-</td>
                        </tr>
                    </thead>
                </table>


                {{-- @dump($productsWeight) --}}
        </section>
        <section w-full>
            <div class="font-semibold text-center">
                {{ $productName }}
            </div>
            <div class="items-center justify-center align-center mx-auto py-2 px-4 border-b">
                <img class="w-1/2 items-center mx-auto justify-center align-center " src="{{ asset($url) }}">
            </div>

        </section>
        <section class="">


            <script>
                var weight = @json($productsWeight); // Convert PHP variable $idx to a JavaScript variable
            </script>


            <form method="post" onsubmit="return validateForm()"
                action="{{ route('order.process', ['idProduct' => $idProduct, 'idVariant' => $variant_id, 'idAvailableSize' => $availableSizeId]) }}">
                @csrf

                <div class="">

                    <div class="py-2">
                        <label for="province">Province:</label>
                        <select required class="border p-2" id="province" name="province" onchange="getCities()">
                            <option value="" disabled selected>Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->province_id }}">
                                    {{ $province->province }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="py-2">
                        <label for="city">City:</label>
                        <select required class="border p-2" name="city" id="city" class="form-select"
                            onchange="getCouriers()"></select>
                    </div>

                    <div class="py-2">
                        <label for="courier">Couriers:</label>
                        <select required class="border p-2" name="courier_provider" id="courier_service"
                            class="form-select" onchange="getCouriers()">
                            <option value="" disabled selected>Select Courier</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS</option>
                        </select>
                    </div>

                    <div id="shippingServices">
                        <label for="courier">Available services:</label>
                        <div id="servicesButton" class="">
                            {{-- isinya pilihan ongkir dari fetchCity.js --}}
                        </div>
                    </div>

                    <label for="address">Address </label> <br>
                    <textarea required name="address" rows="3" cols="70"> </textarea> <br>


                    <label for="recipient"> Recipient Name</label>
                    <input required type="text" name="recipient"> <br>



                    {{--  <script src="jquery-3.7.1.min.js"></script> --}}
                    <script src="{{ asset('js/fetchCity.js') }}"></script>




                    <input type="hidden" name="qty" value="{{ $qty }}">
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <input type="hidden" name="stock" value="{{ $stock }}">
                    <input type="hidden" name="user_id" value="{{ Session::get('idLogin') }}">
                    <input type="hidden" name="weight" value="{{ $productsWeight }}">
                    <input type="hidden" name="status" value="pending">



                    <input type="submit" value="Buy Now"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
            </form>
    </div>
    </div>
    </div>
    </section>


    </div>
</body>

</html>
