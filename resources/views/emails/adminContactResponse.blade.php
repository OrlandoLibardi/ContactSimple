<!-- important do not remove -->
@extends("emails.layout")
<!-- important do not remove -->
@section("content")
 <h1 class="title">Olá Administrador,</h1>
 <p class="text">Recebemos um novo contato, abaixo os dados recebidos:</p>
 <table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
   <td class="line_two" width="200">Nome </td>
   <td class="line_two"> {{  $contact->name  }} </td>
  </tr>
  <tr>
   <td class="line" width="200">Email </td>
   <td class="line"> {{  $contact->email  }}</td>
  </tr>
  <tr>
   <td class="line_two" width="200">Assunto </td>
   <td class="line_two"> {{  $contact->subject  }}</td>
   </tr>
  <tr>
   <td class="line" width="200">Telefone </td>
   <td class="line"> {{  $contact->phone  }}</td>
  </tr>
  <tr>
   <td class="line_two" width="200">Data </td>
   <td class="line_two"> {{  $contact->created_at  }}</td>
  </tr>
  <tr>
   <td class="line" width="200">IP </td>
   <td class="line"> {{  $contact->ip_address  }}</td>
  </tr>
  <tr>
   <td class="line_two" colspan="2" style="text-align:center">Mensagem </td>
  </tr>
  <tr>
   <td class="line" colspan="2" style="text-align:center"> {{  $contact->message  }}</td>
  </tr>
 </table>
<!-- important do not remove -->
@endsection