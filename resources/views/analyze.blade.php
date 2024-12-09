@extends('layouts.app')
@include('partials.header')

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

    #sentiment-bar {
        position: relative;
        width: 100%;
        background: linear-gradient(to right, #d21486, #8c52ff, #f2fe72);
        /* Updated colors */
        border-radius: 15px;
        /* Adjusted for smoother corners */
        margin: 20px 0;
    }

    #sentiment-emoji {
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 45px;
        transition: left 0.5s;
    }

    #sentiment-info {
        margin-top: 20px;
        font-size: 1.2em;
    }

    #sentiment-info p {
        margin: 5px 0;
    }

    .positive-word,
    .negative-word {
        display: inline-block;
        margin: 5px;
        font-weight: bold;
        transition: transform 0.3s ease;
    }

    .positive-word:hover,
    .negative-word:hover {
        transform: scale(1.2);
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .positive-word {
        color: #28a745;
        /* Green for positive words */
    }

    .negative-word {
        color: #dc3545;
        /* Red for negative words */
    }
</style>

<body>
    <div class="container-xxl py-5" id="sentiment-analysis">
        <div class="container py-5 px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-warning mb-3">Sentiment Analysis</h5>
                    <h1 class="mb-5">Analyze Text to Understand Its Emotional Tone</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <form action="{{ route('analyze') }}" method="POST" onsubmit="transformToParagraph()"
                            id="sentimentForm" enctype="multipart/form-data"
                            class="mt-4 p-4 shadow-lg rounded-3 bg-light">
                            @csrf

                            <!-- Text Area with Mic Icon -->
                            <div class="form-group position-relative" style="width: 100%;">
                                <label for="text-input" class="fw-bold mb-2">Enter Text for Analysis</label>
                                <textarea name="text" class="form-control" id="text-input"
                                    placeholder="Type your text or click the mic icon to speak..."
                                    style="height: 200px; padding-right: 50px;">{{ old('text') }}
                                 </textarea>
                                <!-- Mic Icon with Tooltip -->
                                <button type="button" id="start-speech" class="position-absolute"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Analyze by voice"
                                    style="top: calc(100% - 40px); right: 15px; height: 30px; width: 30px; background: transparent; border: none; padding: 0;">
                                    <i class="fas fa-microphone"></i>
                                </button>
                            </div>

                            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
                                rel="stylesheet">
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
                                rel="stylesheet">
                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

                            <!-- File Upload -->

                            <div class="form-group position-relative" style="width: 100%;">
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
                                    <button type="submit" class="btn py-3 px-5"
                                        style="background-color: #d21486; color: white; border: none;">
                                        <i class="fas fa-search"></i> Run Analysis
                                    </button>

                                    <a href="{{ route('history') }}" class="btn py-3 px-5"
                                        style="background-color: #d21486; color: white; border: none;">
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
            Overall Sentiment:
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
                                                <h5 class="text-primary">Sentiment Score</h5>
                                                <p class="card-text" style="font-size: 2.5rem; font-weight: bold;">
                                                    ${response.score}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-sm border-success">
                                            <div class="card-body">
                                                <h5 class="text-success">Positive Words</h5>
                                                <p class="card-text" style="font-size: 2.5rem; font-weight: bold;">
                                                    ${response.positiveCount}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card shadow-sm border-danger">
                                            <div class="card-body">
                                                <h5 class="text-danger">Negative Words</h5>
                                                <p class="card-text" style="font-size: 2.5rem; font-weight: bold;">
                                                    ${response.negativeCount}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

</div>     
            <p class="mt-3 p-3 rounded bg-light shadow-sm text-center" style="font-size: 1.2rem; font-weight: bold;">
                ${response.highlightedText}
            </p>
            <!-- Positive and Negative Words as Word Cloud -->
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h4 class="">Positive Words</h4>
                        <div id="positive-word-cloud" style="height: 200px; background-color: #f0f9f0; border-radius: 10px; padding: 20px; overflow: hidden;">
                            ${response.positiveWords.length > 0 ?
                            response.positiveWords.map(word => `<span class="positive-word" style="font-size: ${10 + Math.random() * 20}px;">${word}</span>`).join(' ') :
                            "<p>No positive words found</p>"}
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="">Negative Words</h4>
                        <div id="negative-word-cloud" style="height: 200px; background-color: #f9f0f0; border-radius: 10px; padding: 20px; overflow: hidden;">
                            ${response.negativeWords.length > 0 ?
                            response.negativeWords.map(word => `<span class="negative-word" style="font-size: ${10 + Math.random() * 20}px;">${word}</span>`).join(' ') :
                            "<p>No negative words found</p>"}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sentiment Bar -->
            <div id="sentiment-info" class="text-center mt-5" style="margin-top: 50px; padding-top: 20px;">
                <p style="font-size: 1.8rem; font-weight: bold; margin-bottom: 20px;">
                    Emotion Meter:
                </p>
                <div id="sentiment-bar" class="position-relative mt-3" style="height: 30px; background-color: #f1f1f1; border-radius: 5px;">
                    <div id="sentiment-emoji" class="position-absolute" style="left: 50%; transform: translateX(-50%);">
                        😊
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