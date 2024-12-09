@extends('layouts.app')

@include('partials.header')

<section class="miri-ui-kit-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h6 class="text-warning mb-3">About</h5>
                    <h2 class="h1 font-weight-semibold mb-4">Mood Cloud is a versatile tool that can analyze and
                        translate various forms of content, including text, speech-to-text, audio files, and documents
                        (e.g., PDF or Word).
                    </h2>
                    <!-- <p class="mb-5">MoodCloud is a versatile tool that can analyze and translate various forms of content, including text, speech-to-text, audio files, and documents (e.g., PDF or Word).</p> -->
            </div>
            <div class="col-md-6 text-right"><img src="frontend/images/about.png" alt="About" class="img-fluid"></div>
        </div>
    </div>
</section>
<Section class="miri-ui-kit-section team-members-section">
    <div class="container">
        <h2 class="pb-2 mb-5 font-weight-bold">Team Members</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="team-card card border-0 raise-on-hover">
                    <img src="frontend/images/team-1.png" alt="Team 1" class="card-img-top">
                    <div class="card-body px-0">
                        <h5 class="card-title mb-0 font-weight-bold">Kristine Angeli B. Basilio</h5>
                        <p class=" font-weight-medium designation" style="color: #d21486;">Front-End Developer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card card border-0 raise-on-hover">
                    <img src="frontend/images/team-2.png" alt="Team 2" class="card-img-top">
                    <div class="card-body px-0">
                        <h5 class="card-title mb-0 font-weight-bold">Elmalia Jane S. Diaz</h5>
                        <p class=" font-weight-medium designation" style="color: #d21486;">Back-End Developer & DevOps
                            Specialist (Azure)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card card border-0 raise-on-hover">
                    <img src="frontend/images/team-3.png" alt="Team 3" class="card-img-top">
                    <div class="card-body px-0">
                        <h5 class="card-title mb-0 font-weight-bold">Paul Trustan S. Yumang</h5>
                        <p class="font-weight-medium designation" style="color: #d21486;">Back-End Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Section>

@include('partials.footer')