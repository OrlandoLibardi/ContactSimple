@extends('admin.layout.admin') @section( 'breadcrumbs' )
<!-- breadcrumbs -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Contatos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">Paínel de controle</a>
            </li>
            <li class="active">Respostas Automáticas </li>
        </ol>
    </div>
    <div class="col-md-3 padding-btn-header text-right">
        <a href="{{ Route('contact.index') }}" class="btn btn-warning btn-sm">Voltar</a>
        <a href="javascript:savePage();" class="btn btn-primary btn-sm">Salvar</a>
    </div>
</div>

@endsection @section('content')
{!! Form::open(['route' => ['contact-config.update', 'id' => 0], 'method' => 'PUT', 'id' =>
                    'form-config']) !!}
<input name="cc" value="" type="hidden">
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Templates</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><span class="text-red">*</span> Admin Template </label>
                            {!! Form::textarea('admin_template', isset($templates) ? $templates['admin'] : null, ['placeholder' =>
                            'Escreva aqui...','class' => 'form-control', 'id' => 'admin_template']) !!}                           
                        </div>
                        <div class="form-group">
                            <a class="btn btn-success btn-sm btn-flat btn-set-default" href="javascript:loadTemplate(1);">Default template</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group">
                                <label><span class="text-red">*</span> Visitante Template</label>
                                {!! Form::textarea('user_template', isset($templates) ? $templates['user'] : null, ['placeholder' =>
                                'Escreva aqui...','class' => 'form-control', 'id' => 'user_template']) !!}                                
                            </div>
                            <a class="btn btn-success btn-sm btn-flat btn-set-default" href="javascript:loadTemplate(2);">Default template</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Configurações</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span class="text-red">*</span> Título do e-mail para administradores</label>
                            {!! Form::text('title_admin', isset($config) ? $config['title_admin'] : null, ['placeholder'
                            =>
                            'Título...','class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span class="text-red">*</span> Título do e-mail para visitantes</label>
                            {!! Form::text('title_user', isset($config) ? $config['title_user'] : null, ['placeholder'
                            =>
                            'Título...','class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span class="text-red">*</span> Reply nome para visitantes</label>
                            {!! Form::text('reply_user_name', isset($config) ? $config['reply_user_name'] : null,
                            ['placeholder' =>
                            'Nome do administrador que aparece ao visitante no e-mail...','class' => 'form-control'])
                            !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span class="text-red">*</span> Reply e-mail para visitantes</label>
                            {!! Form::text('reply_user_email', isset($config) ? $config['reply_user_email'] : null,
                            ['placeholder' =>
                            'E-mail usado para que o visitante possa responder a mensagem automatica...','class' =>
                            'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cópias Ocultas </label>
                            <table class="table table-bordered table-striped" id="results">
                                <thead>
                                    <tr>
                                        <td><input type="text" name="copia_name" class="form-control"
                                                placeholder="Nome..."></td>
                                        <td><input type="text" name="copia_email" class="form-control"
                                                placeholder="Email..."></td>
                                        <td width="100"><a href="javascript:;"
                                                class="btn btn-sm btn-flat btn-info addCopia">Adicionar</a></td>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                if(is_array($config['cc']) && count($config['cc']) > 0){
                                $copias = $config['cc'];
                                $i=0;
                                @endphp
                                
                                    @foreach($copias as $copia)
                                    <tr id="{{ $i }}">
                                        <td>{{ $copia['name']}} </td>
                                        <td>{{ $copia['email']}}</td>
                                        <td><a href="javascript:;" class="btn btn-sm btn-flat btn-danger removeCopia"
                                                data-id="{{ $i }}">Remover</a></td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                
                                @php } @endphp
                            </tbody>
                            </table>

                        </div>
                       
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
{!! Form::close() !!}
<input name="route_show" value="{{ Route('contact.show', ['id' => 0]) }}" type="hidden">
<input name="route_status" value="/admin/contact-status/" type="hidden">
@endsection
@push('style')
<!-- Adicional Styles -->
<link rel="stylesheet" href="{{ asset('assets/theme-admin/css/plugins/OLForm/OLForm.css') }}">
<!--CodeMirror-->
<link rel="stylesheet" href="{{ asset('assets/theme-admin/js/plugins/codemirror/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('assets/theme-admin/js/plugins/codemirror/duotone-dark.css') }}">
<style>
    tr.not-open>td {
        font-style: italic;
        font-weight: bold;
    }

    .no-border {
        border-color: transparent !important;
    }
</style>
@endpush
@push('script')
<!-- Adicional Scripts -->
<script src="{{ asset('assets/theme-admin/js/plugins/OLForm/OLForm.jquery.js') }}"></script>
<script src="{{ asset('assets/theme-admin/js/plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('assets/theme-admin/js/plugins/codemirror/mode/clike/clike.js') }}"></script>
<script src="{{ asset('assets/theme-admin/js/main.js') }}"></script>
<script>
    /*
    * Editores
    */
    var editor_config = { lineNumbers: true, selectionPointer: true, theme: 'duotone-dark', mode: "text/x-csrc" };
    var admin_template = CodeMirror.fromTextArea(document.getElementById("admin_template"), editor_config);
    var user_template = CodeMirror.fromTextArea(document.getElementById("user_template"), editor_config);
    
    $(document).ready(function () {
        /*Formulário*/
        $("#form-config").OLForm({ btn: true, listErrorPosition: 'after', listErrorPositionBlock: '.page-heading' });
    });
    /*
    * Cópias
    */
    $(document).on("click", ".removeCopia", function () {
        var id = $(this).attr("data-id");
        $("tr#" + id).fadeOut(300, function () {
            $(this).remove();
        });
    });
    $(document).on('click', ".addCopia", function () {
        var $input_email = $("input[name=copia_email]"),
            $input_name = $("input[name=copia_name]");

        $input_name.removeClass('error');
        $input_email.removeClass('error');

        if ($input_name.val() == "") {
            $input_name.addClass("error").focus();
            return false;
        }
        if (!validate.mail($input_email.val())) {
            $input_email.addClass("error").focus();
            return false;
        }
        var last_id = 0;
        $("#results tbody").find('tr').each(function () {
            if ($(this).attr("id") > last_id) {
                last_id = $(this).attr("id");
            }
        });

        last_id++;

        var obj = '<tr id="' + last_id + '">';
        obj += '<td>' + $input_name.val() + '</td>';
        obj += '<td>' + $input_email.val() + '</td>';
        obj += '<td><a href="javascript:;" class="btn btn-sm btn-flat btn-danger removeCopia" data-id="' + last_id + '">Remover</a></td>';
        obj += '</tr>';
        $("#results tbody").append(obj);
        $input_name.val("");
        $input_email.val("");

    });
    var default_admin = "\n";
        default_admin += '<!-- important do not remove -->'+ "\n";
        default_admin += 'extends("emails.layout")'+ "\n";
        default_admin += '<!-- important do not remove -->'+ "\n";
        default_admin += 'section("content")'+ "\n";
        default_admin += ' <h1 class="title">Olá Administrador,</h1>'+ "\n";
        default_admin += ' <p class="text">Recebemos um novo contato, abaixo os dados recebidos:</p>'+ "\n";
        default_admin += ' <table width="100%" cellpadding="0" cellspacing="0" border="0">'+ "\n";
        default_admin += '  <tr>'+ "\n";
        default_admin += '   <td class="line_two" width="200">Nome </td>'+ "\n";
        default_admin += '   <td class="line_two"> [ __contact->name ] </td>'+ "\n";
        default_admin += '  </tr>'+ "\n";
        default_admin += '  <tr>'+ "\n";
        default_admin += '   <td class="line" width="200">Email </td>'+ "\n";
        default_admin += '   <td class="line"> [ __contact->email ]</td>'+ "\n";
        default_admin += '  </tr>'+ "\n";
        default_admin += '  <tr>'+ "\n";
        default_admin += '   <td class="line_two" width="200">Assunto </td>'+ "\n";
        default_admin += '   <td class="line_two"> [ __contact->subject ]</td>'+ "\n";
        default_admin += '   </tr>'+ "\n";
        default_admin += '  <tr>'+ "\n";
        default_admin += '   <td class="line" width="200">Telefone </td>'+ "\n";
        default_admin += '   <td class="line"> [ __contact->phone ]</td>'+ "\n";
        default_admin += '  </tr>'+ "\n";
        default_admin += '  <tr>'+ "\n";
        default_admin += '   <td class="line_two" width="200">Data </td>'+ "\n";
        default_admin += '   <td class="line_two"> [ __contact->created_at ]</td>'+ "\n";
        default_admin += '  </tr>'+ "\n";
        default_admin += '  <tr>'+ "\n";
        default_admin += '   <td class="line" width="200">IP </td>'+ "\n";
        default_admin += '   <td class="line"> [ __contact->ip_address ]</td>'+ "\n";
        default_admin += '  </tr>'+ "\n";
        default_admin += '  <tr>'+ "\n";
        default_admin += '   <td class="line_two" colspan="2" style="text-align:center">Mensagem </td>'+ "\n";
        default_admin += '  </tr>'+ "\n";
        default_admin += '  <tr>'+ "\n";
        default_admin += '   <td class="line" colspan="2" style="text-align:center"> [ __contact->message ]</td>'+ "\n";
        default_admin += '  </tr>'+ "\n";
        default_admin += ' </table>'+ "\n";
        default_admin += '<!-- important do not remove -->'+ "\n";
        default_admin += 'endsection'+ "\n";

        var default_user = "\n";
        default_user += '<!-- important do not remove -->'+ "\n";
        default_user += 'extends("emails.layout")'+ "\n";
        default_user += '<!-- important do not remove -->'+ "\n";
        default_user += 'section("content")'+ "\n";
        default_user += ' <h1 class="title">Olá [ __contact->name ],</h1>'+ "\n";
        default_user += ' <p class="text">Recebemos sua mensagem e em breve retornaremos, abaixo os dados recebidos:</p>'+ "\n";
        default_user += ' <table width="100%" cellpadding="0" cellspacing="0" border="0">'+ "\n";
        default_user += '  <tr>'+ "\n";
        default_user += '   <td class="line_two" width="200">Nome </td>'+ "\n";
        default_user += '   <td class="line_two"> [ __contact->name ] </td>'+ "\n";
        default_user += '  </tr>'+ "\n";
        default_user += '  <tr>'+ "\n";
        default_user += '   <td class="line" width="200">Email </td>'+ "\n";
        default_user += '   <td class="line"> [ __contact->email ]</td>'+ "\n";
        default_user += '  </tr>'+ "\n";
        default_user += '  <tr>'+ "\n";
        default_user += '   <td class="line_two" width="200">Assunto </td>'+ "\n";
        default_user += '   <td class="line_two"> [ __contact->subject ]</td>'+ "\n";
        default_user += '  </tr>'+ "\n";
        default_user += '  <tr>'+ "\n";
        default_user += '   <td class="line" width="200">Telefone </td>'+ "\n";
        default_user += '   <td class="line"> [ __contact->phone ]</td>'+ "\n";
        default_user += '  </tr>'+ "\n";
        default_user += '  <tr>'+ "\n";
        default_user += '   <td class="line_two" width="200">Data </td>'+ "\n";
        default_user += '   <td class="line_two"> [ __contact->created_at ]</td>'+ "\n";
        default_user += '  </tr>'+ "\n";
        default_user += '  <tr>'+ "\n";
        default_user += '   <td class="line" width="200">IP </td>'+ "\n";
        default_user += '   <td class="line"> [ __contact->ip_address ]</td>'+ "\n";
        default_user += '  </tr>'+ "\n";
        default_user += '  <tr>'+ "\n";
        default_user += '   <td class="line_two" colspan="2" style="text-align:center">Mensagem </td>'+ "\n";
        default_user += '  </tr>'+ "\n";
        default_user += '  <tr>'+ "\n";
        default_user += '   <td class="line" colspan="2" style="text-align:center"> [ __contact->message ]</td>'+ "\n";
        default_user += '  </tr>'+ "\n";
        default_user += ' </table>'+ "\n";
        default_user += '<!-- important do not remove -->'+ "\n";
        default_user += 'endsection'+ "\n";

    function loadTemplate(id){

        if(id == 1){
            admin_template.getDoc().setValue(default_admin);             
        }
        else
        {
            user_template.getDoc().setValue(default_user);             
        }
    }
    /*Save page*/
    function savePage(){
            $("textarea[name=admin_template]").val(admin_template.getDoc().getValue());
            $("textarea[name=user_template]").val(user_template.getDoc().getValue());
            $("input[name=cc]").val(getCC());
            $("#form-config").submit();
        }
    function getCC(){
        var _return = '[';
        $("#results tbody").find('tr').each(function () {
            _return += '{ "name" : "'+$("td:eq(0)", this).html()+'", "email" : "'+$("td:eq(1)", this).html()+'"},';
        });        
        _return += ']';
        var resultado = _return.replace("},]", "}]");
        return resultado;
    }

</script>

@endpush