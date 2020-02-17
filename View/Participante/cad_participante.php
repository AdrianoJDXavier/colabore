<?php
include_once('../Layout/principal.php');
?>
<section class="panel">
        <header class="panel-heading">
            Cadastrar Participantes
        </header>
        <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="register_form" method="get" action="../../Controller/ParticipanteController.php">
                <input type="hidden" name="opcao" value="1">
                <input type="hidden" name="status" value="1">
                    <div class="form-group ">
                        <label for="nome" class="control-label col-lg-2">Nome <span class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="nome" name="nome" type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="matricula" class="control-label col-lg-2">Matricula <span class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="matricula" name="matricula" type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cpf" class="control-label col-lg-2">CPF <span
                                    class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="cpf" name="cpf" type="text" onKeyUp="maskIt(this,event,'###.###.###-##',true)"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="rg" class="control-label col-lg-2">RG <span
                                    class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="rg" name="rg" type="text" onKeyUp="maskIt(this,event,'####.###.###',true)"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="setor" class="control-label col-lg-2">Setor <span
                                    class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="setor" name="setor" type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cargo" class="control-label col-lg-2">Cargo <span class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="cargo" name="cargo" type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="funcao" class="control-label col-lg-2">Função <span class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="funcao" name="funcao" type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="tipo" class="control-label col-lg-2">Tipo <span class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="tipo" name="tipo" type="text"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="data_nascimento" class="control-label col-lg-2">Data Nascimento <span class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="data_nascimento" name="data_nascimento" type="date"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="email" name="email" type="email"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="senha" class="control-label col-lg-2">Senha <span class="required">*</span></label>
                        <div class="col-lg-10">
                            <input class="form-control " id="password" name="password" type="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                            <button class="btn btn-default" type="reset">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
        function maskIt(w,e,m,r,a){
// Cancela se o evento for Backspace
            if (!e) var e = window.event
            if (e.keyCode) code = e.keyCode;
            else if (e.which) code = e.which;
// Variáveis da função
            var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
            var mask = (!r) ? m : m.reverse();
            var pre  = (a ) ? a.pre : "";
            var pos  = (a ) ? a.pos : "";
            var ret  = "";
            if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;
// Loop na máscara para aplicar os caracteres
            for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
                if(mask.charAt(x)!='#'){
                    ret += mask.charAt(x); x++; }
                else {
                    ret += txt.charAt(y); y++; x++; } }
// Retorno da função
            ret = (!r) ? ret : ret.reverse()
            w.value = pre+ret+pos; }
        // Novo método para o objeto 'String'
        String.prototype.reverse = function(){
            return this.split('').reverse().join(''); };
    </script>

    <script language="javascript">
        function number_format( number, decimals, dec_point, thousands_sep ) {
            var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
            var d = dec_point == undefined ? "," : dec_point;
            var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
            var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        }
    </script>

    </section>
<?php
include_once('../Layout/rodape.php');
?>