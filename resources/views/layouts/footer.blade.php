
<div class="modal fade bd-example-modal-lg" id="modalconfirma" tabindex="-1" role="dialog" aria-labelledby="modalconfirmaLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-bullhorn"></i> Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                  <p>Confirmo que estou ciente de todas as etapas que fazem parte do Processo de Certificação Profissional, que constam no Regulamento disponível no site do IBAPE. <a href="https://ibape-nacional.com.br/site/certificacao/" target="_bla
                    ">Veja o Regulamento</a></p>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Não Confirmo</button> -->
                <form method="post" action="{{route('site.verifica.confirma')}}">
                @csrf
                <input type="hidden" name="confirma" value="1">
                <button type="submit" class="btn btn-primary">Confirmo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer">
    <strong>Certificação Profissional em Engenharia de Avaliações IBAPE NACIONAL</strong>

    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.7.1
    </div>
</footer>

@section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
<script type="text/javascript" src="{{asset('js/jquery.mask.js')}}"></script>
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>

<script type="text/javascript">
    
</script>
@stop