<div class="row flex-wrap-reverse">

    <div class="mex-box debug col-12 d-flex flex-column justify-content-around py-3">
        <h6 class="mb-0">Messaggio:</h6>
        <div class="text box debug py-3 px-lg-3 mb-2">
            <p class="mb-0">{{ $message->text }}</p>
        </div>
        <h6 class="mb-0">E-mail mittente:</h6>
        <div class="email box debug py-2 px-lg-3">
            <p class="mb-0">{{ $message->email }}</p>
        </div>
    </div>

</div>
