<tr class="odd">
    <td>Dados Pessoais</td>
    <td>{{(isset($dados[0]->status) ? $dados[0]->status : ' - ')}}</td>
        @if(isset($dados[0]->status))
            <td><a target="_blank" href="{{route('admin.candidato.dado')}}?id={{$dados[0]->id}}"><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></a></td>
        @else    
        <td><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
        @endif
</tr>
<tr class="odd">
    <td>Requerimento</td>
    <td>{{(isset($requerimentos[0]->status) ? $requerimentos[0]->status : ' - ')}}</td>
    @if(isset($requerimentos[0]->status))
    <td><a target="_blank" href="{{route('admin.candidato.requerimento')}}?id={{$requerimentos[0]->id}}"><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></a></td>
    @else  
    <td><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
    @endif
</tr>
<tr class="odd">
    <td>Declaração</td>
    <td>{{(isset($declaracao[0]->status) ? $declaracao[0]->status : ' - ')}}</td>
    @if(isset($declaracao[0]->status))
     <td><a target="_blank" href="{{route('admin.candidato.atestado')}}?id={{$declaracao[0]->id}}"><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></a></td>
    @else
     <td><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
    @endif
</tr>
<tr class="odd">
    <td>Diploma</td>
    <td>{{(isset($diplomas[0]->status) ? $diplomas[0]->status : ' - ')}}</td>
    @if(isset($diplomas[0]->status))
    <td><a target="_blank" href="{{route('admin.candidato.diploma')}}?id={{$diplomas[0]->id}}"><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></a></td>
    @else
    <td><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
    @endif
</tr>
<tr class="odd">
    <td>Solicitação Justificada</td>
    <td>{{(isset($solicitacao[0]->status) ? $solicitacao[0]->status : ' - ')}}</td>
    @if(isset($solicitacao[0]->status))
    <td><a target="_blank" href="{{route('admin.candidato.solicitacao')}}?id={{$solicitacao[0]->id}}"><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></a></td>
    @else
    <td><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
    @endif
</tr>
<tr class="odd">
    <td>Comprovante de Pagamento</td>
    <td>{{(isset($comprovantes[0]->status) ? $comprovantes[0]->status : ' - ')}}</td>
    @if(isset($comprovantes[0]->status))
    <td><a target="_blank" href="{{route('admin.candidato.comprovante')}}?id={{$comprovantes[0]->id}}"><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></a></td>
    @else
    <td><i data-toggle="modal" data-target="#exampleModal" class="fas  fa-edit"></i></td>
    @endif
</tr>