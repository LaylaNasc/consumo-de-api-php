<?php
defined('CONTROL') or die('Acesso inválido');

$api = new ApiConsumo();
$paises = $api->buscarTodosOsPaises();

?>

<div class="container mt-5">

    <div class="row">
        <div class="col text-center">
            <h3>Países do Mundo!</h3>
            <hr>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-4">
            <p>Lista de Países</p>
            <select id="select_pais" class="form-select">
                <option value="">Selecione um país</option>
                <?php foreach($paises as $pais) : ?>
                    <option value="<?= $pais ?>"><?= $pais ?></option>
                <?php endforeach; ?>    
            </select>
        </div>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', () => {

        const select_pais = document.querySelector("#select_pais");
        select_pais.addEventListener('change', () => {
            const pais = select_pais.value;
            window.location.href = `?route=pais&nomePais=${pais}`
        })
    })

</script>