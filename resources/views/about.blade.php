@extends('layouts.app')

@include('partials.header')

    <section class="miri-ui-kit-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex flex-column justify-content-center">
                    <h6 class="text-warning mb-3">About</h5>
                        <h2 class="h1 font-weight-semibold mb-4">MoodCloud is a versatile tool that can analyze and translate various forms of content, including text, speech-to-text, audio files, and documents (e.g., PDF or Word). 
                        </h2>
                        <p class="mb-5">MoodCloud is a versatile tool that can analyze and translate various forms of content, including text, speech-to-text, audio files, and documents (e.g., PDF or Word). </p>
                </div>
            </div>
        </div>
    </section>
    <Section class="miri-ui-kit-section team-members-section">
        <div class="container">
            <h2 class="pb-2 mb-5">Team Members</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-1.jpg" alt="Team 1" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Kristine Angeli B. Basilio</h5>
                            <p class=" font-weight-medium designation">BSIT 4</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-2.jpg" alt="Team 2" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Elmalia Jane S. Diaz</h5>
                            <p class=" font-weight-medium designation">BSIT 4</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card card border-0 raise-on-hover">
                        <img src="assets/images/team-3.jpg" alt="Team 3" class="card-img-top">
                        <div class="card-body px-0">
                            <h5 class="card-title mb-0">Paul Trustan S. Yumang</h5>
                            <p class=" font-weight-medium designation">BSIT 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Section>

    @include('partials.footer')

    <!-- <section class="miri-ui-kit-section pricing-section">
        <div class="container">
            <h2>Choose Plan</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <div class="card-group">
                <div class="card text-center">
                    <div class="card-body p-5">
                        <h4>Free</h4>
                        <p>Achieve virtually any design and layout from with in the</p>
                        <p>
                            <button class="btn btn-primary">ChoosePlan</button>
                        </p>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body p-5">
                        <h4>Premium</h4>
                        <p>Achieve virtually any design and layout from with in the</p>
                        <p>
                            <button class="btn btn-danger">ChoosePlan</button>
                        </p>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body p-5">
                        <h4>Business</h4>
                        <p>Achieve virtually any design and layout from with in the</p>
                        <p>
                            <button class="btn btn-success">ChoosePlan</button>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="miri-ui-kit-section contact-section">
        <div class="container">
            <h2 class="text-center mb-4">Work with us</h2>
            <p class="text-center mb-4 pb-3">If there is something we can help you with, just let us know. We'll <br />
                be more than happy to offer you our
                help.</p>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form action="/" class="contact-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill" placeholder="Default">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill"
                                    placeholder="Email@example.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-pill" placeholder="Contact-number">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="submit" value="Send Message" class="btn btn-block btn-pill btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
