var retornoBackEnd = '';
var constrCondicao =  new Object();
var linhaAtual = 0;
var _dia0 = '';
var _dia1 = '';
var _dia2 = '';
var _dia3 = '';
var _dia4 = '';
var _dia5 = '';
var _dia6 = '';
var _dia7 = '';
var _dia8 = '';
var hoje = new Date();
var dia = hoje.getDate() < 10 ? "0" + hoje.getDate() : hoje.getDate();
var mes = hoje.getMonth() < 9 ? "0" + (hoje.getMonth() + 1) : (hoje.getDate() + 1);
var ano = hoje.getFullYear();

var foraDiaExemplo = backEndExemplo("L");
var dataDiaExemplo = backEndExemplo("D");
var foraSemanaExemplo = backEndExemplo("S");
var foraQuinzenaExemplo = backEndExemplo("Q");
var foraMesExemplo = backEndExemplo("F");
var foraDezenaExemplo = backEndExemplo("Z");
  
function backEndExemplo(exemple){
    
    var constrCondicaoExemplo = new constructorCondicao({
        contando: `${dia}/${mes}/${ano}`,
        diasCondicao: exemple,
        condicao0: 10,
        condicao1: "",
        condicao2: "",
        condicao3: "",
        condicao4: "",
        condicao5: "",
        condicao6: "",
        condicao7: "",
        condicao8: ""
    });
    //console.log(constrCondicaoExemplo)
    let temp = $.ajax({
        url:"Scripts/CalculadorDatas.php",
        type:'POST',
        // contentType: 'application/json; charset=utf-8',
        data: {config: JSON.stringify(constrCondicaoExemplo)},
        success:function(msg){
            return JSON.parse(msg);
        }
    });
    return temp;

}

document.addEventListener('DOMContentLoaded', function () {
    
    // document.querySelector('.contandoVencimento').value = `${dia}/${mes}/${ano}`;
    var elems = document.querySelectorAll('.contandoVencimento');
    var instances = M.Datepicker.init(elems, {
        'autoClose': true,
        'format': 'dd/mm/yyyy',
        i18n: {
            cancel: 'Cancelar',
            clear: 'Limpar',
            done: 'Ok',
            months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            weekdays: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
            weekdaysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
            weekdaysAbbrev: ["D", "S", "T", "Q", "Q", "S", "S"]
        },
        defaultDate: new Date(),
        setDefaultDate: new Date()
    });
    var elemsSelect = document.querySelectorAll('select');
    var instancesSelect = M.FormSelect.init(elemsSelect);
    var elemsTooltips = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elemsTooltips);
    M.updateTextFields();

});

$('#dias').on('keyup', function(e){

    if(e.which == 13){
        addRows();
    }
    montarLinhas();
    
});

$('#duvida').on('click', function(){

    viewDetais();

});

$('#add').on('click', function(){

    addRows();

  });

document.querySelector('#contandoVencimento').addEventListener('change',function(){
    montarLinhas();
});

$('#contandoVencimento').on('change', function () {

    montarLinhas();

});

$('#selectDiasCondicao').on('change click', function () {

    montarLinhas();

});

function montarLinhas(){
    if($('#dias').attr('linha') == 0){
        _dia0 = $('#dias').val();
    }
    else if($('#dias').attr('linha') == 1){
        _dia1 = $('#dias').val();
    }
    else if($('#dias').attr('linha') == 2){
        _dia2 = $('#dias').val();
    }
    else if($('#dias').attr('linha') == 3){
        _dia3 = $('#dias').val();
    }
    else if($('#dias').attr('linha') == 4){
        _dia4 = $('#dias').val();
    }
    else if($('#dias').attr('linha') == 5){
        _dia5 = $('#dias').val();
    }
    else if($('#dias').attr('linha') == 6){
        _dia6 = $('#dias').val();
    }
    else if($('#dias').attr('linha') == 7){
        _dia7 = $('#dias').val();
    }
    else if($('#dias').attr('linha') == 8){
        _dia8 = $('#dias').val();
    }
    construir();
    enviarParaCodeBehind();
}
function construir(){
    constrCondicao = new constructorCondicao({
        contando: document.querySelector('.contandoVencimento').value,
        diasCondicao: document.querySelector('.selectDiasCondicao').value,
        condicao0: _dia0,
        condicao1: _dia1,
        condicao2: _dia2,
        condicao3: _dia3,
        condicao4: _dia4,
        condicao5: _dia5,
        condicao6: _dia6,
        condicao7: _dia7,
        condicao8: _dia8
    });
}

function constructorCondicao(config) {
	this.contando = config.contando;
	this.diasCondicao = config.diasCondicao;
	this.condicao0 = config.condicao0;
	this.condicao1 = config.condicao1;
    this.condicao2 = config.condicao2;
    this.condicao3 = config.condicao3;
	this.condicao4 = config.condicao4;
	this.condicao5 = config.condicao5;
    this.condicao6 = config.condicao6;
    this.condicao7 = config.condicao7;
    this.condicao8 = config.condicao8;
	return this;
}

function enviarParaCodeBehind(){
    $.ajax({
        url:"Scripts/CalculadorDatas.php",
        type:'POST',
        // contentType: 'application/json; charset=utf-8',
        data: {config: JSON.stringify(constrCondicao)},
        success:function(msg){
            retornoBackEnd =  JSON.parse(msg);
            preenchendoFront();
        }
    });
}

function preenchendoFront(){
    if(retornoBackEnd.diaMaisAjuste0 != null){
        if(retornoBackEnd.diaMaisAjuste0 > 0){
            $('[diaPronto="0"]').text(retornoBackEnd.diaMaisAjuste0);
            $('[vencimentoPronto="0"]').text(retornoBackEnd.vencimento0);
        }else{
            $('[diaPronto="0"]').text("");
            $('[vencimentoPronto="0"]').text("");
        }
    }else{
        $('[diaPronto="0"]').text("");
        $('[vencimentoPronto="0"]').text("");
    }

    if(retornoBackEnd.diaMaisAjuste1 != null){
        if(retornoBackEnd.diaMaisAjuste1 > 0){
            $('[diaPronto="1"]').text(retornoBackEnd.diaMaisAjuste1);
            $('[vencimentoPronto="1"]').text(retornoBackEnd.vencimento1);
        }else{
            $('[diaPronto="1"]').text("");
            $('[vencimentoPronto="1"]').text("");
        }
    }else{
        $('[diaPronto="1"]').text("");
        $('[vencimentoPronto="1"]').text("");
    }

    if(retornoBackEnd.diaMaisAjuste2 != null){
        if(retornoBackEnd.diaMaisAjuste2 > 0){
            $('[diaPronto="2"]').text(retornoBackEnd.diaMaisAjuste2);
            $('[vencimentoPronto="2"]').text(retornoBackEnd.vencimento2);
        }else{
            $('[diaPronto="2"]').text("");
            $('[vencimentoPronto="2"]').text("");
        }
    }else{
        $('[diaPronto="2"]').text("");
        $('[vencimentoPronto="2"]').text("");
    }

    if(retornoBackEnd.diaMaisAjuste3 != null){
        if(retornoBackEnd.diaMaisAjuste3 > 0){
            $('[diaPronto="3"]').text(retornoBackEnd.diaMaisAjuste3);
            $('[vencimentoPronto="3"]').text(retornoBackEnd.vencimento3);
        }else{
            $('[diaPronto="3"]').text("");
            $('[vencimentoPronto="3"]').text("");
        }
    }else{
        $('[diaPronto="3"]').text("");
        $('[vencimentoPronto="3"]').text("");
    }
    
    if(retornoBackEnd.diaMaisAjuste4 != null){
        if(retornoBackEnd.diaMaisAjuste4 > 0){
            $('[diaPronto="4"]').text(retornoBackEnd.diaMaisAjuste4);
            $('[vencimentoPronto="4"]').text(retornoBackEnd.vencimento4);
        }else{
            $('[diaPronto="4"]').text("");
            $('[vencimentoPronto="4"]').text("");
        }
    }else{
        $('[diaPronto="4"]').text("");
        $('[vencimentoPronto="4"]').text("");
    }

    if(retornoBackEnd.diaMaisAjuste5 != null){
        if(retornoBackEnd.diaMaisAjuste5 > 0){
            $('[diaPronto="5"]').text(retornoBackEnd.diaMaisAjuste5);
            $('[vencimentoPronto="5"]').text(retornoBackEnd.vencimento5);
        }else{
            $('[diaPronto="5"]').text("");
            $('[vencimentoPronto="5"]').text("");
        }
    }else{
        $('[diaPronto="5"]').text("");
        $('[vencimentoPronto="5"]').text("");
    }

    if(retornoBackEnd.diaMaisAjuste6 != null){
        if(retornoBackEnd.diaMaisAjuste6 > 0){
            $('[diaPronto="6"]').text(retornoBackEnd.diaMaisAjuste6);
            $('[vencimentoPronto="6"]').text(retornoBackEnd.vencimento6);
        }else{
            $('[diaPronto="6"]').text("");
            $('[vencimentoPronto="6"]').text("");
        }
    }else{
        $('[diaPronto="6"]').text("");
        $('[vencimentoPronto="6"]').text("");
    }

    if(retornoBackEnd.diaMaisAjuste7 != null){
        if(retornoBackEnd.diaMaisAjuste7 > 0){
            $('[diaPronto="7"]').text(retornoBackEnd.diaMaisAjuste7);
            $('[vencimentoPronto="7"]').text(retornoBackEnd.vencimento7);
        }else{
            $('[diaPronto="7"]').text("");
            $('[vencimentoPronto="7"]').text("");
        }
    }else{
        $('[diaPronto="7"]').text("");
        $('[vencimentoPronto="7"]').text("");
    }

    if(retornoBackEnd.diaMaisAjuste8 != null){
        if(retornoBackEnd.diaMaisAjuste8 > 0){
            $('[diaPronto="8"]').text(retornoBackEnd.diaMaisAjuste8);
            $('[vencimentoPronto="8"]').text(retornoBackEnd.vencimento8);
        }else{
            $('[diaPronto="8"]').text("");
            $('[vencimentoPronto="8"]').text("");
        }
    }else{
        $('[diaPronto="8"]').text("");
        $('[vencimentoPronto="8"]').text("");
    }
}

function addRows(){

    if($('#dias').val() == ""){
        M.toast({html: 'Campo dias está em branco!'})
    }
    else if($('#dias').attr('linha') == 8){
        
    }
    else{     
        $('#dias').attr('linha', `${parseInt($('#dias').attr('linha')) + 1}`);
        
        if($('#dias').attr('linha') == 8){
            $('#add').attr('disabled', 'disabled');
        }
        
        $('.lancamentos').append(`
            <div class="row">
                <div diaPronto="${parseInt($('#dias').attr('linha'))}" class="col s2"></div>
                <div vencimentoPronto="${parseInt($('#dias').attr('linha'))}" class="col s10"></div> 
            </div>
        `);

        $('input[name="adicionarDia"]').val(''); $('input[name="adicionarDia"]').focus(); 
    }

}

function viewDetais() {
     
    var t = document.createElement('div');
    t.id = "detailsModal"
    document.querySelector('main').appendChild(t)
    document.querySelector('#detailsModal').innerHTML = `
        <div id="modalDetails" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Como Funciona cada um dos cálculos</h4>
                <div class="row">
                    <p>Para demonstrar os exemplos abaixo, considere a data de hoje (${dia}/${mes}/${ano}) com acréscimo de 10 dias.</p>
                    <table>
                        <thead>
                            <th>Dias da Condição</th>
                            <th>Resultado</th>
                            <th>Explicação</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fora o Dia</td>
                                <td>${JSON.parse(foraDiaExemplo.responseText).vencimento0}</td>
                                <td>Contagem começa a partir de amanhã.</td>
                            </tr>
                            <tr>
                                <td>Data do Dia</td>
                                <td>${JSON.parse(dataDiaExemplo.responseText).vencimento0}</td>
                                <td>Contagem começa a partir de hoje.</td>
                            </tr>
                            <tr>
                                <td>Fora Semana</td>
                                <td>${JSON.parse(foraSemanaExemplo.responseText).vencimento0}</td>
                                <td>Contagem começa a partir da próxima semana.</td>
                            </tr>
                            <tr>
                                <td>Fora Mês</td>
                                <td>${JSON.parse(foraMesExemplo.responseText).vencimento0}</td>
                                <td>Contagem começa a partir do próximo mês.</td>
                            </tr>
                            <tr>
                                <td>Fora Dezena</td>
                                <td>${JSON.parse(foraDezenaExemplo.responseText).vencimento0}</td>
                                <td>Contagem começa a partir da próxima dezena</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat" onclick="setTimeout(function(){document.getElementById('detailsModal').remove()}, 500);">OK</a>
            </div>`;

    var elem = document.getElementById('modalDetails');
    var instance = M.Modal.init(elem, {
        dismissible: false,
        onOpenEnd: function () {
            //alert('abertto')
        }
    });
    instance.open();

}