<?php 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="Css/index.css">
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEACABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAABfX18AAAAAAPLy8gAvMJQAPT09AOLi4gC3t7cAKCmNAPT09ABqamoAJieKAKenpwB8fHwA5OTkAMLCwgD29vYAKixrAMvLywBgX8MAKCmMAN3d3QCHh4cA5ubmAC4vlADv7+8AYWHFACsrjgDf398A8fHxAC4vkwD6+voAz8/PAHl5eQAsLZAA4eHhAGFhxAAqK40AyMjIAC8xlQBycnIAJiaJAOzs7ADBwcEA9fX1AMrKygB0dHQA09PTACcoiwC6uroAw8PDAPf39wBtbW0AYGDEAHZ2dgApKo0A5+fnAPDw8AAtLpIA+fn5AM7OzgCjo6MAKyyPANfX1wCBgYEAioqKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANTU1NTU1NTU1NTU1NTU1ATUrKysrKysCAisrKysrNQE1KykWFUA3AgIJCT8FKzUBNSsYLTwLJwICMQkGDSs1ATUrOBsUJTMCAiIABgIrNQE1KwIcHy07AgIiCSwCKzUBNSsrDg4qJwICFAkRAis1ATUrDwwODgwCAgwMLgIrNQE1Kw8MDCAMAgICDC4CKzUBNSs6Mg8rCAICHDgYAis1ATUrHjoyDysICAIcOBgrNQEQHR05IT0aJCQ2Ey8KKBABEAMDHRkZIzQ0NBI2Ey8QARAmJgMXHTkhIT0aJDYHEAEQEDAEEBAQEBAQEDAEEBABAQE+NQEBAQEBAQE+NQEBAQABAAAAAQAAAAEAAAABAAAAAQAAAAEAAAABAAAAAQAAAAEAAAABAAAAAQAAAAEAAAABAAAAAQAAAAEAAM/nAAA=" rel="icon" type="image/x-icon" />
    <title>CalculadorData - BSS</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper #263238 blue-grey darken-4">
                <a href="index.php" class="brand-logo center">Calculador de Datas - BSS</a>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="col s12 m12 l12 xl12">
                    <div class="input-field col s12">
                        <?php 
                            $t = date('d/m/Y', mktime());
                            echo "
                            
                            <input id='contandoVencimento' type='text' class='contandoVencimento' value='$t'>
                            <label for='contandoVencimento'>A partir de</label>
                            "
                        ?>
                    </div>
                </div>
                <div class="col s12 m12 l12 xl12 dfjcac">
                    <div class="input-field col s14">
                        <select id="selectDiasCondicao" class="selectDiasCondicao">
                            <option value="L">L - Fora o Dia</option>
                            <option value="D">D - Data do Dia</option>
                            <option value="S">S - Fora Semana</option>
                            <option value="Q">Q - Fora Quinzena</option>
                            <option value="F">F - Fora Mês</option>
                            <option value="Z">Z - Fora Dezena</option>
                        </select>
                        <label for='selectDiasCondicao'>Dias da Condição</label>
                    </div>
                    <div class="col s2 dfjcac">
                        <a class="waves-effect waves-light btn tooltipped" data-position="bottom" data-tooltip="Entenda!" id="duvida"><i class="material-icons">contact_support</i></a>
                    </div>
                    <div class="input-field col s4">
                        <input id="dias" name="adicionarDia" linha="0" type="number" class="validate dias0">
                        <label for="dias">Dias</label>
                    </div>
                    <div class="col s2">
                        <a class="waves-effect waves-light btn tooltipped" data-position="bottom" data-tooltip="Adicionar" id="add"><i class="material-icons">add_box</i></a>
                    </div>
                </div>
                <div class="col s12 m12 l12 xl12">
                    <div class="col lancamentos s12">
                        <div class="row">
                            <div class="col s2 labelRodape">Dias</div>
                            <div class="col s10 labelRodape">Data</div> 
                        </div>
                        <div class="row">
                            <div diaPronto="0" class="col s2"></div>
                            <div vencimentoPronto="0" class="col s10"></div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="page-footer #263238 blue-grey darken-4">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Dashboard Faturamento</h5>
            <p class="grey-text text-lighten-4">Desenvolvido por Bruno Sájermann.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Sobre Autor</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="http://bruno.sajermann.com/" target="_blak">Site</a></li>
              <li><a class="grey-text text-lighten-3" href="https://www.linkedin.com/in/devbrunosajermann/" target="_blak">Linkedin</a></li>
              <li><a class="grey-text text-lighten-3" href="https://github.com/sajermann" target="_blak">Github</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          © 2020 Copyright
          <a class="grey-text text-lighten-4 right" href="#!">Sobre</a>
        </div>
      </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="Scripts/index.js"></script>
</body>
</html>