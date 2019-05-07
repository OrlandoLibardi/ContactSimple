<form action="{{ Route('contact-send') }}" method="POST" class="row" onsubmit="return false" id="contact-form">
@csrf
<input type="hidden" name="ip_address" value="{{ $ip_address }}">

    <div class="col-md-5 col-12">
        <label for="name" class="sr-only">Nome</label>
        <input type="text" id="name" name="name" class="theme-input" placeholder="Nome">
    </div>
    <div class="col-md-7 col-12">
        <label for="email" class="sr-only">E-mail</label>
        <input type="text" id="email" name="email" class="theme-input" placeholder="E-mail">
    </div>
    <div class="col-12">
        <label for="subject" class="sr-only">Assunto</label>
        <input type="text" id="subject" name="subject" class="theme-input" placeholder="Assunto">
    </div>
    <div class="col-12">
        <label for="message" class="sr-only">Mensagem</label>
        <textarea class="theme-input" id="message" name="message" placeholder="Mensagem"></textarea>
    </div>
    <div class="col-12">
        <button name="send" class="send">Enviar</button>
    </div>
</form>