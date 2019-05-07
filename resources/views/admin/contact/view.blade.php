@extends('admin.layout.admin') @section( 'breadcrumbs' )
<!-- breadcrumbs -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Contatos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">Paínel de controle</a>
            </li>
            <li><a href="{{ Route('contact.index') }}">Contatos Recebidos</a> </li>
            <li>Contato </li>
        </ol>
    </div>
    <div class="col-md-3 padding-btn-header text-right">
        <a href="{{ Route('contact.index') }}" class="btn btn-warning btn-sm">Voltar</a>
    </div>
</div>

@endsection @section('content')

<div class="row">
    <div class="col-md-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Dados do Contato</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="results">
                            <tbody>
                                <tr>
                                    <td width="200">Nome:</td>
                                    <td>{{ $contact->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <td>Assunto:</td>
                                    <td>{{ $contact->subject }}</td>
                                </tr>
                                <tr>
                                    <td>Telefone:</td>
                                    <td>{{ $contact->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Data de envio:</td>
                                    <td>{{ $contact->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>IP:</td>
                                    <td>{{ $contact->ip_address }}</td>
                                </tr>
                                <tr>
                                    <td>Mensagem:</td>
                                    <td>{{ $contact->message }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
@push('style')

@endpush
@push('script')

@endpush