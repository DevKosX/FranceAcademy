@extends('layouts.templateAdmin')

@section('content')
<div class="container mt-4">
<<<<<<< HEAD
    <!-- Carte principale -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <!-- En-tête -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h2 class="h4 mb-1">{{ $eleves->user->prenom }} {{ $eleves->user->nom }}</h2>
                    <span class="text-muted">INE : {{ $eleves->ine }}</span>
                </div>
                <span class="badge bg-primary fs-6">Élève</span>
            </div>

            <div class="row">
                <!-- Colonne gauche -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <dl class="row mb-4">
                        <dt class="col-sm-4 text-muted fw-normal">Login</dt>
                        <dd class="col-sm-8 mb-3">
                            <i class="bi bi-person-circle me-2"></i>{{ $eleves->user->login }}
                        </dd>

                        <dt class="col-sm-4 text-muted fw-normal">Naissance</dt>
                        <dd class="col-sm-8 mb-3">
                            <i class="bi bi-calendar-event me-2"></i>
                         
                            {{ \Carbon\Carbon::parse($eleves->user->date_naissance )->format('d-m-Y à H:i:s') }}
                        </dd>

                        <dt class="col-sm-4 text-muted fw-normal">Téléphone</dt>
                        <dd class="col-sm-8 mb-3">
                            <i class="bi bi-phone me-2"></i>
                            {{ preg_replace('/(\d{2})(\d{2})(\d{2})(\d{2})/', '\1 \2 \3 \4', $eleves->user->telephone_1) }}
                        </dd>
                    </dl>
                </div>

                <!-- Colonne droite -->
                <div class="col-md-6">
                    <div class="card border-0 bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <i class="bi bi-geo-alt me-2"></i>Adresse
                            </h5>
                            <div class="preformatted-address">
                                {{ $eleves->user->adresse }}
                                {{ $eleves->user->ville->nom }}
                                {{ $eleves->user->ville->pays->nom }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section formations -->
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <i class="bi bi-diagram-2 me-2"></i>
                                <a href="/filiere/{{ $eleves->classe->filiere->id }}" class="text-decoration-none">
                                    Filiére : {{ $eleves->classe->filiere->nom }}
                                </a>
                            </h5>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-people me-2"></i>
                                <a href="/info_classe/{{ $eleves->classe->id }}" class="text-dark text-decoration-none">
                                    Classe : {{ $eleves->classe->nom }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    Liste de ses Classes Options : <br>
                    @foreach($eleves->classe_options as $eco)
                    <div class="card border-success mb-2">
                        <div class="card-body py-2">
                           
                            <a href="/info_classe_option/{{ $eco->id }}" class="text-decoration-none text-success">
                                <i class="bi bi-journal-bookmark me-2"></i>
                                {{ $eco->nom ?? 'Aucune option' }}
                            </a>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Onglets des matières -->
    <div class="card shadow-sm">
        <div class="card-body">
            <ul class="nav nav-tabs nav-justified mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="matieresc-tab" data-bs-toggle="tab" href="#matieresc">
                        <i class="bi bi-journal-text me-2"></i>Matières principales
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="matieresco-tab" data-bs-toggle="tab" href="#matieresco">
                        <i class="bi bi-journal-plus me-2"></i>Options
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Matières principales -->
                <div class="tab-pane fade show active" id="matieresc">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach($eleves->classe->filiere->matieres as $ecfm)
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title mb-0">
                                        <i class="bi bi-book me-2 text-muted"></i>
                                        {{ $ecfm->nom }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Matières options -->
                <div class="tab-pane fade" id="matieresco">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach($eleves->classe_options as $eco)
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title mb-0">
                                        <i class="bi bi-star me-2 text-warning"></i>
                                        {{ $eco->matiere->nom }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
=======
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
>>>>>>> 7732459b1a45b866405aa956d49bd57483e54f8a
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

<style>
    .preformatted-address {
        white-space: pre-line;
        line-height: 1.6;
        font-size: 0.95em;
    }
    .card-title i {
        min-width: 25px;
    }
    .selectionne {
        background-color: #f8f9fa;
        border-radius: 4px;
    }
</style>
@endsection
=======
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
>>>>>>> 7732459b1a45b866405aa956d49bd57483e54f8a
