
<div class="row" style="padding-top: 50px">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row ">
                    <div class="col-md-6"><h3 class="font-weight-bold">List Makanan dan Minuman</h3></div>
                    <div class="col-md-6"><input wire:model="search" type="text" class="form-control" placeholder="Search Products..." ></div>

                </div>

            </div>
            <div class="card-body">

                <div class="row">
                    @forelse($products as $products1)
                        <div class="col-md-3 mb-3" :key="{{$products1->id}}">
                        <div class="card" style="border-radius: 10%">

                                <img src="{{ asset('storage/images/'.$products1->image)}}" alt="product" style="object-fit: cover; width:100%;height:175px; border-radius: 10%">

                                    <h6 class="text-center font-weight-bold mt-2">{{$products1->name}}</h6>
                                    <h6 class="text-center font-weight-bold" style="color:grey">Rp {{number_format($products1 ['price'],2,',','.')}}</h6>
                                    <button wire:click="addItem({{$products1->id}})" class="btn btn-primary btn-sm" style="border-radius: 1rem"><i class="fas fa-cart-plus fa-lg"></i> Add to cart</button>
                            </div>
                        </div>
                        @empty
                        <div class="col-sm-12 mt-5" style="display:table-cell; vertical-align:middle; text-align:center;">
                            <h1 class="text-center font-weight-bold text-primary">menu yang dicari tidak tersedia</h1>
                            {{-- <img src="{{asset('/images/marah.jpg')}}" class="center" style="width: 400px; height:400px" alt=""> --}}

                        </div>
                    @endforelse

                </div>
                <div style="display:flex;justify-content:center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h2 class="font-weight-bold">cart</h2>


            </div>
            <div class="card-body">
                @if(session()->has('error'))
                    <p class="text-danger font-weight-bold">
                    {{session('error')}}
                    </p>
                    @endif
                    <table class="table table-sm table-bordered table-hovered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="font-weight-bold">No</th>
                                <th class="font-weight-bold">Name</th>
                                <th class="font-weight-bold">Qty</th>
                                <th class="font-weight-bold">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($carts as $index=>$cart)
                            <tr>
                                <td>{{$index + 1}}
                                <br>
                                <i class="fas fa-trash-alt" wire:click="removeItem('{{$cart['rowId']}}')" class="font-weight-bold text-danger" style="font-size:18px;cursor:pointer;color:red"></i>

                                </td>
                                <td>
                                    <a href="#" class="font-weight-bold text-dark">{{$cart['name']}}</a>
                                    <br>
                                    <a>Rp {{number_format($cart ['pricesingle'],2,',','.')}}</a>
                                </td>
                                <td>
                                    <button wire:click="increaseItem('{{$cart['rowId']}}')" class="btn btn-primary btn-sm" style="padding:7px 10px"><i class="fas fa-plus"  class="font-weight-bold text-primary" style="font-size:15px;cursor:pointer;color:white"></i></button>
                                    {{$cart['qty']}}
                                    <button wire:click="decreaseItem('{{$cart['rowId']}}')" class="btn btn-info btn-sm" style="padding:7px 10px"><i class="fas fa-minus"  class="font-weight-bold text-danger" style="font-size:15px;cursor:pointer;color:white"></i></button>
                                </td>
                                <td>Rp {{number_format($cart ['price'],2,',','.')}}</td>
                            </tr>
                        @empty
                        <td colspan="4"><h6 class="text-center">Empty cart</h6></td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="font-weight-bold">Cart Summary</h4>
                    <h5 class="font-weight-bold">Sub Total : Rp {{number_format($summary['sub_total'],2,',','.')}}</h5>
                    <h5 class="font-weight-bold">Tax : Rp {{number_format($summary['pajak'],2,',','.')}}</h5>
                    <h4 class="font-weight-bold">Total : Rp {{number_format($summary['total'],2,',','.')}}</h4>

                    <div class="row">
                        <div class="col-sm-6">
                            <button wire:click="enableTax" class="btn btn-primary btn-block btn-sm font-weight-bold">Add Tax</button>
                        </div>

                        <div class="col-sm-6">
                            <button wire:click="disableTax" class="btn btn-info btn-block btn-sm font-weight-bold">Remove Tax</button>
                        </div>
                    </div>


                    <div class="form-group mt-4">
                        <input type="number"  class="form-control" id="payment" placeholder="input customer payment amount">
                        <input type="hidden" id="total" value="{{$summary['total']}}">
                    </div>

                    <form wire:submit.prevent="handleSubmit">

                        <div>
                            <label>Payment</label>
                            <h1 id="paymenttext" wire:ignore>Rp. 0</h1>
                        </div>

                        <div>
                            <label>Kembalian</label>
                            <h1 id="kembalian" wire:ignore>Rp. 0</h1>
                        </div>

                        <div class="mt-4">
                            <button wire:ignore type="submit" id="saveButton" disabled class="btn btn-success active btn-block" id="saveButton"><i class="fas fa-save" style="font-size: 18px"></i>  Save Transaction</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@push('script-custom')
    <script>
        payment.oninput = () => {
            const paymentAmount = document.getElementById("payment").value
            const totalAmount = document.getElementById("total").value

            const kembalian = paymentAmount - totalAmount

            document.getElementById("paymenttext").innerHTML = paymentAmount ? 'Rp ' + rupiah(paymentAmount) + ',00' : 'Rp ' + 0 +
                ',00';
            document.getElementById("kembalian").innerHTML = kembalian ? 'Rp ' + rupiah(kembalian) + ',00' : 'Rp ' + 0 +
                ',00';

                const saveButton = document.getElementById("saveButton")

                if(kembalian < 0){
                    saveButton.disabled = true
                }else{
                    saveButton.disabled = false
                }
        }

        function rupiah(bilangan) {
            var number_string = bilangan.toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        }
    </script>

@endpush
