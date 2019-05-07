@extends('admin.layout.admin') @section( 'breadcrumbs' )
<!-- breadcrumbs -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Contatos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">Paínel de controle</a>
            </li>
            <li class="active">Contatos Recebidos </li>
        </ol>
    </div>
    <div class="col-md-3 padding-btn-header text-right">
        @can('create')
        <a href="{{ Route('contact-config.index') }}" class="btn btn-success btn-sm">Respostas Automáticas</a>
        @endcan
    </div>
</div>

@endsection @section('content')

<div class="row">
    <div class="col-md-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Contatos Recebidos</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i>  </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="results">
                            <thead>
                                <tr>
                                    <td width="200">Nome</td>
                                    <td>E-mail</td>
                                    <td width="150">Enviado em:</td>
                                    <td width="150">Atualizado em:</td>
                                    <td width="50">Abrir</td>
                                </tr>
                            </thead>
                            <tbody>
                                @can('edit')
                                    @foreach ($contacts as $contact)
                                        <tr @if($contact->status == 0) class="not-open" @endif >
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>{{ $contact->updated_at }}</td>
                                            <td width="50" class="text-center">
                                                <a href="javascript:;" data-id="{{ $contact->id }}" data-status="{{ $contact->status }}" 
                                                class="btn btn-sm btn-flat btn-info btn-open">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </a>
                                            </td>                                            
                                        </tr>
                                    @endforeach                                
                                @endcan
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<input name="route_show" value="{{ Route('contact.show', ['id' => 0]) }}" type="hidden">
<input name="route_status" value="/admin/contact-status/" type="hidden">
@endsection
@push('style')
<!-- Adicional Styles -->
<style>
    tr.not-open > td
    {
        font-style:italic;
        font-weight: bold;
    }
</style>
@endpush
@push('script')
<script>


$(document).on("click", "a.btn-open", function(){
    var id = $(this).attr("data-id");
    window.location =""+$("input[name=route_show]").val().replace("/0", "/"+id)+"";
});

/*
function sendStatus(_id, _status, _url){
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $("meta[name=csrf-token]").attr("content") } });
    $.ajax({
        data: {'id' : _id, 'status' : _status},
        method: 'PATCH',
        url: _url + _id,
        success: function(exr) {
            console.log(exr);
        },
        error: function(exr, sender) {
            console.log(exr);

        }
    });
}*/


</script>

@endpush
