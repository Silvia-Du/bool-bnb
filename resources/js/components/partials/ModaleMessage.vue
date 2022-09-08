<template>
    <!-- Modale Email -->
    <div class="modal-content rounded-5 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h2 class="fw-bold mb-0">Contatta l'host</h2>
            <!-- Bottone chiusura modale -->
            <button type="button" class="btn btn-outline-secondary rounded-circle" data-bs-dismiss="modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form class="">
                <label for="floatingInput">Indirizzo Email</label>
                    <!-- Indirizzo email -->
                    <input type="email" class="form-control rounded-4" id="floatingInput" placeholder="personabellissima@email.it">
                <hr class="my-4">
                <div class="form-floating">
                    <!-- Text area messaggio -->
                    <textarea class="form-control" id="floatingTextarea"></textarea>
                    <button class="btn btn-outline-secondary my-3" type="submit">
                        Invia messaggio
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModaleMessage'
}
</script>

<style lang="scss" scoped>


</style>
