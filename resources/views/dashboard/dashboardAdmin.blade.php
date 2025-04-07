@extends('layouts.templateAdmin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #eef1f7;
        color: #2c3e50;
        margin: 0;
        padding: 0;
    }

    .dashboard-card {
        background: linear-gradient(135deg, #ffffff, #f8f9fc);
        padding: 50px 40px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        margin-top: 50px;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
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
        margin-top: 40px;
        text-align: center;
    }

    .image-container img {
        width: 100%;
        max-width: 850px;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .image-container img:hover {
        transform: scale(1.06);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background: linear-gradient(90deg, #1e3a8a, #2563eb);
        border: none;
        color: #fff;
        font-weight: 500;
        padding: 14px 24px;
        font-size: 1rem;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #1d4ed8, #2563eb);
        transform: translateY(-3px);
    }

    @media (max-width: 1024px) {
        .dashboard-card {
            padding: 40px;
        }

        .dashboard-title {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .dashboard-card {
            padding: 30px;
        }

        .dashboard-title {
            font-size: 2.2rem;
        }

        .dashboard-text {
            font-size: 1rem;
        }
    }
</style>

<div class="container my-5">
    <div class="dashboard-card">
        <h1 class="dashboard-title">Bienvenue sur le tableau de bord de France Academy</h1><br>
        <p class="dashboard-text">
            Nous sommes ravis de vous accueillir sur la plateforme dédiée à l'accompagnement des lycéens à travers la France et l'Europe.
            Notre mission est de vous fournir les outils et ressources nécessaires pour garantir une éducation de qualité et soutenir le parcours éducatif de chaque étudiant.
        </p>
        <p class="dashboard-text">
            En tant qu'administrateur, vous avez accès à une gamme complète de fonctionnalités pour gérer efficacement les programmes éducatifs,
            suivre les performances des étudiants et collaborer avec les enseignants et le personnel éducatif.
        </p>

        <div class="image-container">
            <img src="{{global_asset('dist')}}/images/imagelycee2.jpg" alt="Image du lycée">
        </div>
    </div>
</div>
@endsection