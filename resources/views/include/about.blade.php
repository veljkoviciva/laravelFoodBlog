@extends('layouts/mainLayout')

@section('content')
    <div class="card border-primary mb-3" style="max-width: 50rem; top: 2rem; margin: auto;" align="center">
        <div class="card-header"><strong>O nama</strong></div>
        <div class="card-body text-primary">
            {{-- <h5 class="card-title">Primary card title</h5> --}}
            <p class="card-text">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.9647508616704!2d20.4197871!3d44.801907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6fed775da59b%3A0xb523201fb055943a!2z0KHQsNCy0YHQutC4INC90LDRgdC40L8gNywg0JHQtdC-0LPRgNCw0LQgMTEwNzA!5e0!3m2!1ssr!2srs!4v1707831675815!5m2!1ssr!2srs"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="row row-cols-4" align="center">
                <div class="col">
                    <a href="https://www.linkedin.com/school/itsbeograd/" class="btn btn-primary">
                        <span class="spanSocial">LinkedIn <i class="bi bi-linkedin"></i></span>
                    </a>
                </div>
                <div class="col">
                    <a href="https://www.facebook.com/ITSBeograd/" class="btn btn-primary">
                        <span class="spanSocial">Facebook <i class="bi bi-facebook"></i></span>
                    </a>
                </div>
                <div class="col">
                    <a href="https://www.instagram.com/itsbeograd/" class="btn btn-primary">
                        <span class="spanSocial">Instagram <i class="bi bi-instagram"></i></span>
                    </a>
                </div>
                <div class="col">
                    <a href="https://www.its.edu.rs/" class="btn btn-primary">
                        <span class="spanSocial">Google <i class="bi bi-google"></i></span>
                    </a>
                </div>
            </div>
            </p>
        </div>
    </div>
    <!-- <div class="row"> -->
    <!-- <div class="col-md-6"> -->
    <!-- <div class="page-header">
                            <h3><strong>O nama</strong></h3>
                        </div> -->
    <!-- Prostor za mapu sajta -->
    <!-- <ul style="list-style-type: none; padding-top: 5%;">
                                <a href="#" style="color: white;">Početna</a>
                                <a href="#" style="color: white;">Lista recepata</a>
                                <a href="#" style="color: white;">Pretraži</a>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="page-header">
                                <h3 style="color: slateblue;"><strong>Posetite</strong></h3>
                            </div>
                            <ul class="list-inline" align="center">
                                <a href="https://www.linkedin.com/school/itsbeograd/">
                                        <span style="color: white;">LinkedIn</span>
                                        <i class="fa-brands fa-linkedin fa-xl" style="color: #6a5acd;"></i>
                                    </a>
                                <a href="https://www.facebook.com/ITSBeograd/">
                                        <span style="color: white;">Facebook</span>
                                        <i class="fa-brands fa-facebook fa-xl" style="color: #6a5acd;"></i>
                                    </a>
                                <a href="https://www.instagram.com/itsbeograd/">
                                        <span style="color: white;">Instagram</span>
                                        <i class="fa-brands fa-instagram fa-xl" style="color: #6a5acd;"></i>
                                    </a>
                                <a href="https://www.its.edu.rs/">
                                        <span style="color: white;">Google</span>
                                        <i class="fa-brands fa-google fa-xl" style="color: #6a5acd;"></i>
                                    </a>
                            </ul>
                        </div>

                    </div> -->

    <!-- <div class="panel-footer"> -->
@endsection
