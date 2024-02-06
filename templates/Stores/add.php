<html>

<head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="heading"><?= __('Cadastrar') ?></h4>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'btn btn-outline-info']) ?>
        </div>
        <hr class="mt-2">
    </div>
    <?= $this->Form->create($store) ?>
    <div class="row">
        <div class="col-md-2">
            <?= $this->Form->control('name', ['label' => 'Store Name', 'class' => 'form-control']); ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.postal_code', ['label' => 'Postal Code', 'class' => 'form-control', 'id' => 'cep']) ?>
        </div>
        
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.street_number', ['label' => 'Street Number', 'class' => 'form-control']) ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.complement', ['label' => 'Complement', 'class' => 'form-control']) ?>
        </div>
        <div class="col-md-2">
        <?= $this->Form->control('addresses.0.city', ['label' => 'City', 'class' => 'form-control readonly', 'disabled' => false, 'id' => 'cidade']) ?>
        </div>
        <div class="col-md-2">
        <?= $this->Form->control('addresses.0.state', ['label' => 'State', 'class' => 'form-control readonly', 'disabled' => false, 'id' => 'uf']) ?>
        </div>
        <div class="col-md-2">
        <?= $this->Form->control('addresses.0.sublocality', ['label' => 'Sublocality', 'class' => 'form-control readonly', 'disabled' => false, 'id' => 'bairro']) ?>
        </div>
        <div class="col-md-3">
        <?= $this->Form->control('addresses.0.street', ['label' => 'Street', 'class' => 'form-control readonly', 'disabled' => false, 'id' => 'rua']) ?>
        </div>
        
        <div class="col-md-9 mt-4">
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-outline-primary']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
</body>

</html>