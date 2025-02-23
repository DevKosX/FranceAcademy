@extends('layouts.templateAdmin')

@section('content')
<div class="container-fluid py-4">
    <!-- Information du professeur -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h3 mb-3">Identifiant: <span class="text-primary">{{$professeurs->identifiant}}</span></h1>
                    <h1 class="h3 mb-3">Login: <span class="text-primary">{{$professeurs->user->login}}</span></h1>
                    <h3 class="h5 mb-3">Nom : <span class="text-secondary">{{$professeurs->user->nom}}</span></h3>
                    <h3 class="h5 mb-3">Prenom : <span class="text-secondary">{{$professeurs->user->prenom}}</span></h3>
                </div>
                <div class="col-md-6">
                    <h3 class="h5 mb-3">Adresse : 
                        <textarea class="form-control bg-light" disabled rows="3">{{$professeurs->user->adresse}}<?=chr(10)?>{{$professeurs->user->ville->nom}}<?=chr(10)?>{{$professeurs->user->ville->pays->nom}}</textarea>
                    </h3>
                    <h3 class="h5 mb-3">Date de naissance : <span class="text-secondary">{{date('d-m-Y', strtotime($professeurs->user->date_naissance))}}</span></h3>
                    <h3 class="h5 mb-3">Numéro de telephone : <span class="text-secondary">{{$professeurs->user->telephone_1}}</span></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Onglets -->
    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active fw-medium" id="matieres-tab" data-bs-toggle="tab" href="#associer-matieres" role="tab"
                aria-controls="associer-matieres" aria-selected="true">
                <i class="fas fa-book me-2"></i>Matières
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-medium" id="classes-tab" data-bs-toggle="tab" href="#associer-classes" role="tab"
                aria-controls="associer-classes" aria-selected="false">
                <i class="fas fa-chalkboard me-2"></i>Classes
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-medium" id="classes-tab" data-bs-toggle="tab" href="#associer-classes-options" role="tab"
                aria-controls="associer-classes" aria-selected="false">
                <i class="fas fa-tasks me-2"></i>Classes Options
            </a>
        </li>
    </ul>

    <!-- Contenu des onglets -->
    <div class="tab-content" id="myTabContent">
        <!-- Onglet Matières -->
        <div class="tab-pane fade show active" id="associer-matieres" role="tabpanel" aria-labelledby="matieres-tab">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#associerMatiereModal">
                <i class="fas fa-plus me-2"></i>Associer une matière
            </button>

            <!-- Table des matières -->
            <div class="card shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Nom de la matière</th>
                                <th scope="col">Description de la matière</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($professeurs->matieres as $matiere)
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary ms-2">#{{$matiere->id }}</span>
                                        {{ $matiere->nom }}

                                    </td>
                                    <td>{{ $matiere->description }}</td>                          
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Onglet Classes -->
        <div class="tab-pane fade" id="associer-classes" role="tabpanel" aria-labelledby="classes-tab">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#associerMatiereModal">
                <i class="fas fa-plus me-2"></i>Attribuer à une classe
            </button>
            <div class="card shadow-sm">
                
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Matiere enseigné</th>
                                <th scope="col">Nom de la classe</th>
                                <th scope="col">Nom de la filière</th>
                                <th scope="col">Niveau de la filiere</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($professeurs->classes as $classe)
                                @php
                                    $matiere_id=$classe->pivot->matiere_id;
                                    $matiere=$professeurs->matieres->firstWhere('id', $matiere_id); 
                                    if(!is_object($matiere))dd('probleme');
                                @endphp 
                                <tr>
                                    <td>
                                        
                                        <span class="badge bg-secondary ms-2">#{{$matiere_id }}</span>
                                        {{ $matiere->nom}}
                                    </td>
                                    <td>
                                      
                                        <span class="badge bg-secondary ms-2">#{{ $classe->id}}</span>
                                        {{ $classe->nom }}
                                    </td>
                                    <td>
                                        
                                        <span class="badge bg-secondary ms-2">#{{ $classe->filiere->id}}</span>
                                        {{ $classe->filiere->nom }}
                                    </td>
                                    <td>{{ $classe->filiere->niveau }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-primary btn-sm" href='/info_classe/{{$classe->id}}'>
                                            <i class="fas fa-eye me-1"></i>Voir
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Onglet Classes Options -->
        <div class="tab-pane fade" id="associer-classes-options" role="tabpanel" aria-labelledby="classes-tab">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#associerMatiereModal">
                <i class="fas fa-plus me-2"></i>Attribuer à une classe option
            </button>
            <div class="card shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Matiere enseigné</th>
                                <th scope="col">Nom de la classe</th>
                                <th scope="col">Fiche</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($professeurs->classeOptions as $classe)
                        @php
                        $matiere_id=$classe->matiere_id;
                        $matiere=$professeurs->matieres->firstWhere('id', $matiere_id); 
                        if(!is_object($matiere))dd('probleme');

                    @endphp 
                                <tr>
                                    <td>
                                        
                                        <span class="badge bg-secondary ms-2">#{{$matiere_id }}</span>
                                        {{ $matiere->nom}}
                                    </td>
                                    <td>
                                       
                                        <span class="badge bg-secondary ms-2">#{{ $classe->id}}</span>
                                        {{ $classe->nom }}
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm" href='/info_classe_option/{{$classe->id}}'>
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="associerMatiereModal" tabindex="-1" aria-labelledby="associerMatiereModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="associerMatiereModalLabel">
                        <i class="fas fa-plus-circle me-2"></i>Associer des matières au professeur
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('associationProfesseurMatiere')}}">
                        @csrf
                        <input type='hidden' name='professeur_id' value='{{$professeurs->id}}'>
                        <ul class="list-group">
                            @foreach ($matieres as $matiere)
                                @php
                                    $tata = 0;
                                @endphp
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="matieres[{{ $matiere->id }}]"
                                            value="{{ $matiere->id }}" id="matiere_{{ $matiere->id }}"
                                            @if(is_object($matiere->professeurs) && $matiere->professeurs->count()==1 )
                                                checked
                                                @php
                                                    $tata = $matiere->filieres_count+$matiere->classe_options_count+$matiere->classes_count+$matiere->examens_count;
                                                    if($tata>0) echo ' onclick="return false;" ';
                                                @endphp
                                            @endif    
                                        >
                                        <label class="form-check-label" for="matiere_{{ $matiere->id }}">
                                            {{ $matiere->nom }} 
                                            @if($tata>0)
                                                <span class="badge bg-warning text-dark ms-2">Associée à des classes, filières ou examens</span> 
                                            @endif
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Associer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="desassocierMatiereModal" tabindex="-1" aria-labelledby="desassocierMatiereModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="desassocierMatiereModalLabel">
                        <i class="fas fa-minus-circle me-2"></i>Désassocier des matières du professeur
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('desassociationProfesseurMatiere', ['professeur_id' => $professeurs->id]) }}">
                        @csrf
                        <ul class="list-group">
                            @if($professeurs->matieres->count() > 0)
                                @foreach ($professeurs->matieres as $matiere)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="matieres[{{ $matiere->id }}]"
                                                value="{{ $matiere->id }}" id="matiere_{{ $matiere->id }}">
                                            <label class="form-check-label" for="matiere_{{ $matiere->id }}">
                                                {{ $matiere->nom }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="list-group-item text-center text-muted py-3">
                                    <i class="fas fa-info-circle mb-2"></i>
                                    <p class="mb-0">Aucune matière associée</p>
                                </li>
                            @endif
                        </ul>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Désassocier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="associerMatiereModal" tabindex="-1" aria-labelledby="associerMatiereModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="associerMatiereModalLabel">
                        <i class="fas fa-plus-circle me-2"></i>Associer des matières au professeur
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('associationProfesseurMatiere')}}">
                        @csrf
                        <input type='hidden' name='professeur_id' value='{{$professeurs->id}}'>
                        <ul class="list-group">
                            @foreach ($matieres as $matiere)
                                @php
                                    $tata = 0;
                                @endphp
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="matieres[{{ $matiere->id }}]"
                                            value="{{ $matiere->id }}" id="matiere_{{ $matiere->id }}"
                                            @if(is_object($matiere->professeurs) && $matiere->professeurs->count()==1 )
                                                checked
                                                @php
                                                    $tata = $matiere->filieres_count+$matiere->classe_options_count+$matiere->classes_count+$matiere->examens_count;
                                                    if($tata>0) echo ' onclick="return false;" ';
                                                @endphp
                                            @endif    
                                        >
                                        <label class="form-check-label" for="matiere_{{ $matiere->id }}">
                                            {{ $matiere->nom }} 
                                            @if($tata>0)
                                                <span class="badge bg-warning text-dark ms-2">Associée à des classes, filières ou examens</span> 
                                            @endif
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Associer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
<style>
    .card {
        border: none;
        border-radius: 0.5rem;
    }
    .nav-tabs .nav-link {
        color: #6c757d;
        font-weight: 500;
    }
    .nav-tabs .nav-link.active {
        color: #a91111;
        font-weight: 600;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
    }

    /* Améliorer les titres */
    .card-body h1, .card-body h3 {
        color: #343a40;
        font-weight: 600;
    }

    .card-body h1 span, .card-body h3 span {
        font-weight: 400;
    }

    /* Espacement entre les sections */
    .container-fluid {
        padding-top: 30px;
    }

    .row .col-md-6 {
        margin-bottom: 20px;
    }

    /* Ajouter un peu de style aux boutons */
    .btn {
        border-radius: 1rem;
        color: #a91111;
    }

    .btn-primary, .btn-outline-primary {
        font-weight: 600;
        color: #a91111;
    }
    .btn-primary {
    color: #a91111; /* Bleu Bootstrap */
    border-color:  #a91111;
}


    .btn-light {
        color: #6c757d;
        border-color: #ced4da;
    }

    /* Modifier la couleur des badges */
    .badge {
        font-size: 1rem;
        color: #a91111;
    }

    .badge.bg-secondary {
        background-color: #6c757d;
    }

    /* Modifications des tables */
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-light th {
        background-color: #f8f9fa;
        color: #343a40;
        font-weight: 600;
    }
</style>
@endpush

@endsection