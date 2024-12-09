@extends('layouts.app')
@include('partials.header')
<!-- Sentiment Analysis Start -->
<style>
    #text-input {
        color: black;
    }

    :focus {
        color: black;
        outline: none;
    }

    #clear-text:hover {
        background-color: #c82333;
        color: white;
        transition: background-color 0.3s ease-in-out;
    }

    #start-speech:hover {
        background-color: #004085;
        color: white;
        transition: background-color 0.3s ease-in-out;
    }
</style>

<body>
    <div class="container-xxl py-5" id="sentiment-analysis">
        <div class="container py-5 px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-primary-gradient fw-medium">Sentiment Analysis</h5>
                <h1 class="mb-5">Quickly Analyze Text to Understand Its Emotional Tone</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <form action="{{ route('analyze') }}" method="POST" onsubmit="transformToParagraph()"
                            id="sentimentForm" enctype="multipart/form-data"
                            class="mt-4 p-4 shadow-lg rounded-3 bg-light">
                            @csrf

                            <!-- Text Area with Mic Icon -->
                            <div class="form-group position-relative">
                                <label for="text-input" class="fw-bold mb-2">Enter Text for Analysis</label>
                                <textarea name="text" class="form-control" id="text-input"
                                    placeholder="Type your text or click the mic icon to speak..."
                                    style="height: 200px; padding-right: 50px;">Works like a champ! Easy to install and clone....OS now loads quickly. Everything is just perfect.
{{ old('text') }}</textarea>
                                <!-- Mic Icon -->
                                <button type="button" id="start-speech"
                                    class="btn btn-primary rounded-circle position-absolute"
                                    style="top: 10px; right: 10px; height: 40px; width: 40px;">🎤</button>
                            </div>

                            <div class="text-center mt-3">
                                <button type="button" id="clear-text" class="btn btn-danger">Clear Text</button>
                            </div>

                            <!-- File Upload -->


                            <div class="form-floating mt-4 mb-3">
                                <label for="text-input" class="fw-bold mb-2">Upload a file (.txt, .pdf, .docx)</label>
                                <input type="file" name="file" class="form-control" id="file"
                                    aria-label="File Upload for Sentiment Analysis" accept=".txt,.pdf,.docx">
                            </div>
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <!-- Action Buttons -->
                            <div class="col-12 text-center mt-4">
                                <div class="justify-content-center gap-6">
                                    <button type="submit" class="btn btn-primary py-3 px-5">
                                        <i class="fas fa-search"></i> Run Analysis
                                    </button>

                                    <a href="{{ route('history') }}" class="btn btn-secondary py-3 px-5">
                                        <i class="fas fa-history"></i> View History
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div id="resultContainer" class="row justify-content-center mt-5">
                <!-- Sentiment analysis results will be dynamically injected here -->
            </div>
        </div>
    </div>

    @include('partials.footer')

    <!-- Font Awesome for Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha512-eOIUsTXIxFZ9T+oTNjlkgPjRsMQDG1LsGlnlhYj2sfgVPJzaxzLBM2La+nrsNAFq4IrR6ZMKID0EhCZWo+ziqA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('frontend/lib/wow/wow.min.js')}}"></script>
<script src="{{url('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{url('frontend/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{url('frontend/lib/counterup/counterup.min.js')}}"></script>
<script src="{{url('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{url('frontend/js/main.js')}}"></script>

<script>
    function transformToParagraph() {
        // Get the textarea element
        const textArea = document.getElementById('text-input');
        // Replace all newlines with spaces
        textArea.value = textArea.value.replace(/\s+/g, ' ').trim();
    }
</script>

<script>
    $(document).ready(function () {
        $("#sentimentForm").on("submit", function (e) {
            e.preventDefault(); // Prevent page reload

            let formData = new FormData(this);

            // Show a loading indicator
            $("#resultContainer").html(`
                <div class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                    <p>Analyzing text...</p>
                </div>
            `);

            $.ajax({
                url: "{{ route('analyze') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Dynamically update the results with sentiment analysis details
                    $("#resultContainer").html(`
                        <div class="col-lg-9">
                            <div class="wow fadeInUp" data-wow-delay="0.5s">
                                <h1 class="text-center mt-5 mb-5">Sentiment Analysis Result</h1>

<div class="text-center my-4">
    <p style="font-size: 1.8rem; font-weight: bold;">
        Tone of Text:
    </p>
    <p style="font-size: 2rem; font-weight: bold; color: ${response.sentiment === 'POSITIVE' ? 'green' : response.sentiment === 'NEGATIVE' ? 'red' : 'black'};">
        ${response.sentiment}
    </p>
</div>

                                <!-- Sentiment Details as Cards -->
                                <div class="row text-center">
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-sm border-primary">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Sentiment Score</h5>
                                                <p class="card-text" style="font-size: 1.2rem; font-weight: bold;">
                                                    ${response.score}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-sm border-success">
                                            <div class="card-body">
                                                <h5 class="card-title text-success">Positive Words</h5>
                                                <p class="card-text" style="font-size: 1.2rem; font-weight: bold;">
                                                    ${response.positiveCount}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-sm border-danger">
                                            <div class="card-body">
                                                <h5 class="card-title text-danger">Negative Words</h5>
                                                <p class="card-text" style="font-size: 1.2rem; font-weight: bold;">
                                                    ${response.negativeCount}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sentiment Highlight -->
                                <div id="sentiment-info" class="text-center mt-4">
                                    <div id="sentiment-bar" class="position-relative mt-3" style="height: 10px; background-color: #f1f1f1; border-radius: 5px;">
                                        <div id="sentiment-emoji" class="position-absolute" style="left: 50%; transform: translateX(-50%);">
                                            😊
                                        </div>
                                    </div>
                                    <p class="mt-3 p-3 rounded-lg bg-light shadow-sm" style="font-size: 1.1rem;">
                                        ${response.highlightedText}
                                    </p>
                                    
                                    <!-- Positive and Negative Words -->
                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-success">Positive Words</h4>
                                                <ul class="list-unstyled">
                                                    ${response.positiveWords.length > 0 ? 
                                                        response.positiveWords.map(word => `<li class="text-success">${word}</li>`).join('') : 
                                                        "<li>No positive words found</li>"}
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="text-danger">Negative Words</h4>
                                                <ul class="list-unstyled">
                                                    ${response.negativeWords.length > 0 ? 
                                                        response.negativeWords.map(word => `<li class="text-danger">${word}</li>`).join('') : 
                                                        "<li>No negative words found</li>"}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);

                    // Emoji position logic based on the score
                    const emoji = document.getElementById('sentiment-emoji');
                    const score = response.score;

                    const minScore = -10;
                    const maxScore = 10;
                    const normalizedScore = ((score - minScore) / (maxScore - minScore)) * 100;

                    // Move the emoji dynamically based on the normalized score
                    emoji.style.left = `${Math.min(100, Math.max(0, normalizedScore))}%`;
                    emoji.textContent = score > 0 ? '😊' : score < 0 ? '😢' : '😐';
                },
                error: function () {
                    $("#resultContainer").html('<div class="text-danger text-center">An error occurred while processing your request.</div>');
                }
            });
        });
    });
</script>


<script>
    // Check if the browser supports Speech Recognition
    if ('webkitSpeechRecognition' in window) {
        const recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.lang = 'en-US';
        recognition.interimResults = true;

        // Start speech recognition
        document.getElementById('start-speech').addEventListener('click', function () {
            recognition.start();
        });

        // Process the speech input
        recognition.onresult = function (event) {
            let text = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
                text += event.results[i][0].transcript;
            }
            // Display the transcribed text in the textarea
            document.getElementById('text-input').value = text;
        };

        // Handle speech recognition errors
        recognition.onerror = function (event) {
            console.error('Speech recognition error', event);
        };

        // Stop recognition when done
        recognition.onend = function () {
            console.log('Speech recognition ended');
        };
    } else {
        console.log('Speech recognition not supported in this browser.');
    }
</script>

<script>
    document.getElementById('clear-text').addEventListener('click', function () {
        document.getElementById('text-input').value = '';
    });
</script>