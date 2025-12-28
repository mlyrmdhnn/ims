@extends('layouts.mainLayout')

@php
    $isAdmin = session('user.isClient') == 1 ? 'Client' : 'Admin';
@endphp

@section('content')
<div id="app">
    @if (session('user.isClient') !== 1)
        <x-nav-and-side/>
    @else
        <x-nav-and-side-client/>
    @endif

    @if (session('user.role') == 'staff')
        <x-nav-and-side-staff/>
    @endif


    <section class="is-title-bar">
        <div class="ims-kwitansi">

            <div class="ims-kw-header">
                <h2>KWITANSI IMS</h2>

                <div class="ims-kw-right">
                    <p>Tgl Transaksi: {{ $detailTransaction->created_at }}</p>
                    <p>Kode Transaksi: {{ $detailTransaction->transaction_no }}</p>
                    <p>Kode Request: {{ $detailTransaction->transaction->notification_id }}</p>
                </div>
            </div>

            <div class="ims-kw-section">
                <p><strong>Nama Client:</strong> {{ $detailTransaction->ownerTransaction->name }}</p>
                <p><strong>Status:</strong> {{ $detailTransaction->transaction->isAproved }}</p>
                <p><strong>Judul:</strong> {{ $detailTransaction->transaction->title }}</p>
                <p><strong>Deskripsi:</strong> {{ $detailTransaction->transaction->desc }}</p>
            </div>

            <table class="ims-kw-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Request dibuat</td>
                        <td>{{ $detailTransaction->created_at }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Disetujui</td>
                        <td>{{ $detailTransaction->created_at }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="ims-kw-footer">
                <div class="ims-kw-note">
                    <p>Catatan:</p>
                    <div class="ims-kw-note-box">
                        {{ $detailTransaction->transaction->message }}
                    </div>
                </div>

                <div class="ims-kw-sign">
                    <p>{{ now()->format('d F Y') }}</p>
                    <p style="margin-top: 60px;">IMS</p>
                </div>
            </div>
        </div>

    </section>
</div>

<style>
    /* WRAPPER */
.ims-kwitansi {
    max-width: 900px;
    margin: 20px auto;
    padding: 20px 25px;
    background: #ffffff;
    border: 1px solid #ccc;
    font-family: Arial, sans-serif;
    color: #333;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

/* HEADER */
.ims-kw-header {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.ims-kw-header h2 {
    margin: 0;
    font-size: 22px;
}

.ims-kw-right p {
    margin: 0;
    font-size: 14px;
}

/* DETAIL SECTION */
.ims-kw-section {
    margin-bottom: 25px;
    font-size: 15px;
    line-height: 1.5;
}

/* TABLE */
.ims-kw-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

.ims-kw-table th,
.ims-kw-table td {
    border: 1px solid #999;
    padding: 8px 10px;
    font-size: 14px;
}

.ims-kw-table th {
    background: #f3f3f3;
    text-align: left;
}

/* FOOTER SIGN */
.ims-kw-footer {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}

.ims-kw-note {
    width: 55%;
}

.ims-kw-note-box {
    height: 70px;
    border: 1px solid #aaa;
    margin-top: 5px;
}

.ims-kw-sign {
    width: 40%;
    text-align: center;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .ims-kwitansi {
        padding: 15px;
    }

    .ims-kw-header {
        flex-direction: column;
        gap: 10px;
    }

    .ims-kw-sign,
    .ims-kw-note {
        width: 100%;
    }

    .ims-kw-table th,
    .ims-kw-table td {
        font-size: 13px;
        padding: 6px;
    }
}

/* PRINT FRIENDLY */
@media print {
    body * {
        visibility: hidden;
    }

    .ims-kwitansi,
    .ims-kwitansi * {
        visibility: visible;
    }

    .ims-kwitansi {
        border: none;
        box-shadow: none;
    }
}

</style>
@endsection