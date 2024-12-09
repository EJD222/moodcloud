@extends('layouts.app')
@include('partials.header')

<style>
    body {
        font-family: 'Heebo', sans-serif;
        background-color: #f4f7fc;
    }

    .navbar h1 {
        color: #fff;
        font-size: 1.8rem;
    }

    .navbar-brand {
        font-weight: 600;
    }

    .container-xxl {
        margin-top: 30px;
    }

    .text-primary-gradient {
        background: linear-gradient(to right, #0d6efd, #6610f2);
        color: transparent;
        -webkit-background-clip: text;
    }

    .search-input {
        border-radius: 25px;
        padding: 15px;
        border: 1px solid #ddd;
        width: 100%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .search-input:focus {
        outline: none;
        border-color: #0d6efd;
    }

    .table-wrapper {
        overflow-x: auto;
        margin-top: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
    }

    .table th,
    .table td {
        text-align: center;
        padding: 12px;
    }

    .table th {
        font-weight: normal;
        background: #3b296a;
        color: white;
    }

    /* .table td {
        border-bottom: 1px solid #ddd;
    } */

    /* .btn-view,
    .btn-delete {
        width: 100px;
        font-weight: 600;
    } */

    .btn-view {
        background-color: #0d6efd;
        color: white;
    }

    .btn-view:hover {
        background-color: #0056b3;
        color: white;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .modal-header {
        background-color: #0d6efd;
        color: white;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        justify-content: center;
    }
</style>


<body>
    <div class="container-xxl py-5" id="sentiment-analysis">
        <div class="container py-5 px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-warning mb-3">Sentiment History</h5>
                    <h1 class="mb-5">Review Your Analysis Results</h1>
            </div>

            <!-- Search Input -->
            <div class="mb-4">
                <input type="text" id="searchInput" class="form-control search-input" placeholder="Search...">
            </div>

            <!-- Table -->
            <div class="table-responsive table-wrapper">
                @if($history->isEmpty())
                    <div class="text-center py-5">
                        <p class="text-muted" style="font-size: 1.2rem;">You have no sentiment analysis history yet.</p>
                    </div>
                @else
                    <table class="table table-hover table-striped" id="historyTable">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Text</th>
                                <th scope="col">Sentiment</th>
                                <th scope="col">Score</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $item)
                                <tr>
                                    <!-- Display text with a tooltip for full text -->
                                    <td data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $item->text }}">
                                        {{ Str::limit($item->text, 50) }}
                                    </td>
                                    <!-- Sentiment -->
                                    <td>
                                        <span
                                            class="badge badge-pill 
                                                                                            {{ strtoupper($item->sentiment) === 'POSITIVE' ? 'badge-success' : (strtoupper($item->sentiment) === 'NEGATIVE' ? 'badge-danger' : 'badge-warning') }}">
                                            {{ $item->sentiment }}
                                        </span>
                                    </td>
                                    <!-- Score -->
                                    <td>{{ $item->score }}</td>

                                    <!-- Action Buttons -->
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- View Button -->
                                            <button class="btn btn-outline-primary view-text-btn" style="margin-right: 10px;"
                                                data-bs-toggle="modal" data-bs-target="#viewTextModal"
                                                data-text="{{ $item->text }}">
                                                <i class="fas fa-eye"></i> View
                                            </button>

                                            <!-- Delete Button -->
                                            <form action="{{ route('history.destroy', $item->id) }}" method="POST"
                                                style="margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>

            <!-- Include Bootstrap Tooltip -->
            <script>
                // Initialize Bootstrap tooltips
                document.addEventListener('DOMContentLoaded', function () {
                    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                    tooltipTriggerList.map(function (tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl);
                    });
                });
            </script>


            <div class="d-flex justify-content-center">
                {{ $history->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
            </div>

        </div>
    </div>

    <!-- Modal for Viewing Full Text -->
    <div class="modal fade" id="viewTextModal" tabindex="-1" role="dialog" aria-labelledby="viewTextModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-primary text-white text-center">
                    <h5 class="modal-title text-white w-100" id="viewTextModalLabel">Text Preview</h5>
                </div>
                <!-- Modal Body -->
                <div class="modal-body text-start" style="max-height: 500px; overflow-y: auto; padding: 30px;">
                    <p id="fullText" class="text-black" style="font-size: 1.1rem; line-height: 1.8;"></p>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Viewing Files -->
    <div class="modal fade" id="viewFileModal" tabindex="-1" role="dialog" aria-labelledby="viewFileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg">
                <!-- Modal Header -->
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title text-white w-100 text-center" id="viewFileModalLabel">File Preview</h5>
                </div>
                <!-- Modal Body -->
                <div class="modal-body" style="max-height: 500px; overflow-y: auto; padding: 30px;">
                    <div id="fileContent" class="d-flex justify-content-center align-items-center text-muted">
                        <!-- Dynamic File Content Here -->
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Font Awesome for Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha512-eOIUsTXIxFZ9T+oTNjlkgPjRsMQDG1LsGlnlhYj2sfgVPJzaxzLBM2La+nrsNAFq4IrR6ZMKID0EhCZWo+ziqA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('partials.footer')

</body>

</html>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>

<script>
    $(document).ready(function () {
        // Search functionality
        $("#searchInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#historyTable tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Populate modal with full text when "View" button is clicked
        $(".view-text-btn").on("click", function () {
            var text = $(this).data("text");
            $("#fullText").text(text);
        });

        // Handle file preview
        $(".view-file").on("click", function (e) {
            e.preventDefault();
            var fileUrl = $(this).data("file");
            var fileContent = "";

            if (fileUrl.endsWith(".pdf")) {
                fileContent = `<embed src="${fileUrl}" type="application/pdf" width="100%" height="500px">`;
            } else if (fileUrl.endsWith(".jpg") || fileUrl.endsWith(".jpeg") || fileUrl.endsWith(".png") || fileUrl.endsWith(".gif")) {
                fileContent = `<img src="${fileUrl}" class="img-fluid" alt="File Preview">`;
            } else {
                fileContent = `<p>Preview not available for this file type. <a href="${fileUrl}" target="_blank">Download file</a></p>`;
            }

            $("#fileContent").html(fileContent);
            $("#viewFileModal").modal("show");
        });
    });
</script>