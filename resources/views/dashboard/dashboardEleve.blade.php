@extends('layouts.templateEleve')

@section('content')
    <style>

        .dashboard-card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
        }

        .dashboard-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15); 
        }

    
        .dashboard-title h1 {
        font-family: 'Exo 2', serif;
        font-size: 2.8rem;
        font-weight: 700;
        color: #080c18;
        margin-bottom: 20px;
        text-align: center;
        letter-spacing: 1px;
        line-height: 1.3;
    }

    .dashboard-text {

        font-size: 1.2rem;
        color: #5d6d7e;
        line-height: 1.8;
        margin-bottom: 25px;
        text-align: justify;
        font-weight: 400;
    }


        .image-container {
            margin-top: 30px;
            text-align: center;
        }

        .image-container img {
            width: 100%;
            max-width: 800px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: block;
            margin: 0 auto;
            height: auto;
            transition: transform 0.3s ease;
        }

        .image-container img:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .dashboard-card {
                padding: 25px;
            }

            .dashboard-title {
                font-size: 2rem;
            }

            .dashboard-text {
                font-size: 1rem;
            }
        }
    </style>

    <div class="container my-5">
        <div class="dashboard-card">
            <h1 class="dashboard-title">Bienvenue sur le tableau de bord de France Academy</h1>
            <p class="dashboard-text">
                Nous sommes ravis de vous accueillir sur la plateforme dédiée à l'accompagnement des lycéens à travers la France et l'Europe.
                Notre mission est de vous fournir les outils et ressources nécessaires pour garantir une éducation de qualité et soutenir le parcours éducatif de chaque étudiant.
            </p>
            <p class="dashboard-text">
                En tant qu'élève, vous avez accès à une gamme complète de fonctionnalités pour gérer efficacement les programmes éducatifs,
                suivre votre emploi du temps, voir votre classe ainsi que vos notes et bulletins.
            </p>
            <div class="image-container">
                <img src="{{global_asset('dist')}}/images/imagelycee2.jpg" alt="Image du lycée">
            </div>
        </div>
    </div>
@endsection
