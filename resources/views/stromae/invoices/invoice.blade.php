@extends('layouts.master')

@section('title', 'Facture')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('invoice') }}
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> MOVe GLOBAL.
                                    <small class="float-right">Date: {{ date('d/m/Y') }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info mt-4">
                            <div class="col-sm-4 invoice-col">
                                Client
                                <address>
                                    <strong>{{ $order->customer->name }}</strong><br>
                                    {{ $order->customer->quarter->arrondissement->city->name }}, {{ $order->customer->quarter->arrondissement->slug }}<br>
                                    {{ $order->customer->quarter->name }}<br>
                                    Téléphone: (237) {{ $order->customer->tel }}<br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Facture #007612</b><br>
                                <br>
                                <b>ID Commande :</b> 4F3S8J<br>
                                <b>Date Paiement :</b> {{ date('d/m/Y') }}<br>
                                <b>Code Maison :</b> {{ $order->customer->code }}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Qte</th>
                                        <th>Gaz</th>
                                        <th>poids</th>
                                        <th>Description</th>
                                        <th>Sous-total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->gaz->name }}</td>
                                            <td>{{ number_format($order->gaz->weight, 1).' Kg' }}</td>
                                            <td>El snort testosterone trophy driving gloves handsome</td>
                                            <td>{{ number_format($order->gaz->price,  0, '.', ' ').' FCFA' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Méthode Paiement :</p>
                                <img src="/master/dist/img/credit/visa.png" alt="Visa">
                                <img src="/master/dist/img/credit/mastercard.png" alt="Mastercard">
                                <img src="/master/dist/img/credit/american-express.png" alt="American Express">
                                <img src="/master/dist/img/credit/paypal2.png" alt="Paypal">

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Total</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Sous-total:</th>
                                            <td>{{ number_format($order->gaz->price,  0, '.', ' ') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Frais de livraison:</th>
                                            <td>{{ number_format(500,  0, '.', ' ') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{ number_format(($order->gaz->price + 500),  0, '.', ' ') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <hr style="border: 1px dashed black">
                    </div>
                    <!-- /.invoice -->

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <script>
        window.addEventListener("load", window.print());
    </script>
@endpush