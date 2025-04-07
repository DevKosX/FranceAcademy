@extends('layouts.templateAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4 mb-4">
        <div class="card-body">
            <h1>Identifiant: <strong>{{$eleves->ine}}</strong></h1>
            <h3>Login: <strong>{{$eleves->user->login}}</strong></h3>
            <div class="row">
                <div class="col-md-6">
                    <h3>Nom: {{$eleves->user->nom}}</h3>
                    <h3>Prénom: {{$eleves->user->prenom}}</h3>
                </div>
                <div class="col-md-6">
                    <h3>Date de naissance: {{date('d-m-Y', strtotime($eleves->user->date_naissance))}}</h3>
                    <h3>Numéro de téléphone: {{$eleves->user->telephone_1}}</h3>
                </div>
            </div>
            <h3>Classe: <strong>{{$eleves->classe->nom}}</strong></h3>
            @foreach($eleves->classe_options as $eco)
            <h3>Classe Option: {{$eco->nom ?? 'aucun'}}</h3>
            @endforeach
            <h3>Adresse :</h3>
            <textarea class="form-control" disabled rows="3">{{$eleves->user->adresse}} <?=chr(10) ?>{{$eleves->user->ville->nom}}<?=chr(10) ?>{{$eleves->user->ville->pays->nom}}</textarea>
            <br>
        </div>
    </div>

    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="matieresc-tab" data-bs-toggle="tab" href="#matieresc" role="tab" aria-controls="matieresc" aria-selected="true">
                <i class="bi bi-book"></i> Matières Classe
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="matieresco-tab" data-bs-toggle="tab" href="#matieresco" role="tab" aria-controls="matieresco" aria-selected="false">
                <i class="bi bi-people"></i> Matières Classe Option
            </a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="matieresc" role="tabpanel" aria-labelledby="matieresc-tab">
            <ul>
                @foreach($eleves->classe->filiere->matieres as $ecfm)
                <li >Matiere :
                    @php /*<a href="{{ route('fiche.matiere', ['matiereId' => $ecfm->id]) }}"> {{$ecfm->nom}}</a> */@endphp {{$ecfm->nom}}</li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="matieresco" role="tabpanel" aria-labelledby="matieresco-tab">
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <ul>
                        @foreach($eleves->classe_options as $eco)
                            <li>{{$eco->matiere->nom}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    // Fonction pour afficher et masquer la désactivation des matières
    function verifeCheck(id) {
        let toto = document.getElementById('matiere_' + id);
        let tata = document.getElementById('coefficient_' + id);
        let groupe = document.getElementById('group_' + id);

        if (toto.checked) {
            tata.disabled = false;
            groupe.classList.add("selectionne");
        } else {
            tata.disabled = true;
            groupe.classList.remove("selectionne");
        }
    }
</script>
