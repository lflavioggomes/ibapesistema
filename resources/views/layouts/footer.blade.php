<footer class="main-footer">
    <strong>Copyright © <script>
            document.write(new Date().getFullYear())
        </script> IBAPE NACIONAL - Certificação Profissional em Engenharia de Avaliações IBAPE.</strong>

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
@stop