<div style="max-width: 320px; margin: auto; padding: 20px 0">
    <div style="max-width: 260px; margin: auto;">
        <img style="max-width:100%;" src="https://tokogampang.online/images/landing/tokogampang-logo-text-red.png" alt="" />
    </div>
    <div style="padding: 0 20px">
        <h3>Menunggu Pembayaran Pesanan</h3>
        <h4 style="margin-top: -5px">
            Terimakasih telah berbelanja di Toko Gampang.
        </h4>

        <ul style="margin-left: -25px; list-style: none">
            <li style="margin-top: 5px">
                Pemesanan dengan No transaksi : {{ $order->orderReceipt->code }}
            </li>
            <li style="margin-top: 5px">
                Nama barang : {{ $order->orderProduct->product->name }}
            </li>
            <li style="margin-top: 5px">
                Harga Barang : Rp.{{ idr($order->orderProduct->unit_price) }},-
            </li>
            <li style="margin-top: 5px">
                Ongkos Kirim : Rp.{{ idr($order->shipping_cost) }},-
            </li>
            <li style="margin-top: 5px">
                Kode unik : Rp.{{ idr($order->orderReceipt->unique_code) }},-
            </li>
            <li style="margin-top: 5px">
                Diskon : Rp.{{ idr($order->voucher_discount) }},-
            </li>
            <li style="margin-top: 5px">
                Total Harga : Rp.{{ idr($order->orderReceipt->total - $order->voucher_discount) }},-
            </li>
            <li style="margin-top: 5px">
                Alamat Pengiriman : {{ $order->orderReceipt->shipping_address }}, {{ $order->orderReceipt->shipping_city}}, 
                {{ $order->orderReceipt->shipping_subdistrict}}, {{ $order->orderReceipt->shipping_province }} {{ $order->orderReceipt->shipping_zip }}
            </li>
        </ul>
        <p>Pesanan sedang dalam proses menunggu pembayaran.</p>
        <p>Nominal yang harus dibayar sebesar Rp.{{ idr($order->orderReceipt->total - $order->voucher_discount) }},- </p>
        <p>Transfer melalui no rekening 3350133088 atas nama DWI NOPIYANTI</p>
        <p>
            Untuk menyelesaikan pembayaran silahkan klik link
            berikut:
        </p>
        <div>
            <a href="{{ $attachment['payment_confirmation_url'] }}" style="text-decoration: none">Selesaikan Pembayaran</a>
        </div>
        <p class="text-sm text-gray-600">*Untuk verifikasi lebih cepat, harap masukkan kode {{ $order->orderReceipt->code }} pada berita transfer</p>
        <p>
            Kepada pelanggan yang terhormat, terimakasih telah menggunakan layanan
            <a href="{{ $attachment['payment_confirmation_url'] }}" style="text-decoration: none">{{ str_replace('_',' ',$order->OrderReceipt->payment_method) }}</a>
            Toko Gampang.
        </p>
    </div>
</div>