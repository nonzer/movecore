@extends('layouts.master', ['order_summary' => 'active', 'delivery' => 'active'])

@section('title', 'Livraison')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if($order)
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> MOVe GLOBAL.
                                        <small class="float-right">Date: {{ DateTime::createFromFormat('Y-m-d', $order->date_order)->format('d/m/Y') }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-6 col-md-4 invoice-col">
                                    Livreur
                                    <address>
                                        <strong>{{ Auth::user()->name }}.</strong><br>
                                        {{--795 Folsom Ave, Suite 600<br>
                                        San Francisco, CA 94107<br>
                                        Phone: (804) 123-5432<br>
                                        Email: info@almasaeedstudio.com--}}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6 col-md-4 invoice-col">
                                    Client
                                    <address>
                                        <strong>{{ $order->customer->name }}</strong><br>
                                        {{ $order->customer->quarter->arrondissement->city->name }}, {{ $order->customer->quarter->arrondissement->slug }}<br>
                                        {{ $order->customer->quarter->name }}, {{ $order->customer->quarter->sector }}<br>
                                        {{ $order->customer->quarter->landmark }}<br>
                                        {{ $order->customer->quarter->particular_landmark }}<br>
                                        Téléphone: (237) {{ $order->customer->tel }}<br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-12 col-md-4 invoice-col">
                                    <b>Code Maison {{ $order->customer->code }}</b><br>
                                    <b>ID Commande :</b> {{ '#'.addZero($order->id) }}<br>
                                    <b>Date Paiement :</b> {{ DateTime::createFromFormat('Y-m-d', $order->date_order)->format('d/m/Y') }}<br>
                                    <b>Code Maison :</b> {{ $order->customer->code }}
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row mt-3">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Qte</th>
                                            <th>Gaz</th>
                                            <th>Repere</th>
                                            <th>Repere particulier</th>
                                            <th>poids</th>
                                            <th>Sous-total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->gaz->name }}</td>
                                            <td>{{ $order->customer->landmark }}</td>
                                            <td>{{ $order->customer->particular_landmark }}</td>
                                            <td>{{ number_format($order->gaz->weight, 1).' Kg' }}</td>
                                            <td>{{ number_format(subtotal($order),  0, '.', ' ').' FCFA' }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <p class="lead">Total</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Sous-total:</th>
                                                <td class="font-weight-bold text-right">{{ number_format(subtotal($order),  0, '.', ' ') }} FCFA</td>
                                            </tr>
                                            <tr>
                                                <th>Frais de livraison:</th>
                                                <td class="font-weight-bold text-right">{{ number_format(delivery_cost($order),  0, '.', ' ') }} FCFA</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="font-weight-bold text-right">{{ number_format((total($order)),  0, '.', ' ') }} FCFA</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print mt-5 mb-3">
                                <div class="col-12 mx-auto text-center">
                                    @livewire('stromae.start-delivery', ['id_order' => $order->id])
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    @else
                        <div class="mt-5 text-center">
                            <h2 class="headline text-maroon"> <i class="fas fa-3x fa-bell-slash"></i></h2>
                            <h3 class="headline text-maroon">Livraison non disponible.</h3>
                            <p>
                                Aucune livraison ne vous a été attribuée pour le moment. <br>
                                Veuillez patienter qu'une commande soit emise.
                                <br>
                            </p>
                        </div>
                        <!-- /.error_page -->
                    @endif
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection