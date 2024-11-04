@extends('ui.backend.layouts.default')

@section('title')
    Create new content
@endsection



@section('main-panel')
    <div class="row">
        <div class="col-12"><a href="{{ route('content') }}" class="btn btn-sm btn-dark float-end mb-2"><span class="mdi mdi-keyboard-backspace"></span> Back</a></div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Add new content</div>
                    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Type</label>
                            <select class="custom-select form-control" id="type" name="type">
                                <option selected disabled>Select Content Type</option>
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                                @if ($currencyExists == false)
                                    <option value="currency">Currency</option>
                                @endif
                                @if ($profitExists == false)
                                    <option value="profit">Profit</option>
                                @endif
                            </select>
                        </div>

                        <!-- Image Section -->
                        <div id="imageType" style="display: none;">
                            <div class="form-group">
                                <label>Select Image File</label>
                                <input type="file" class="form-control" id="imageFile" name="image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Duration</label>
                                <input type="number" class="form-control" name="imageDuration" min="1">
                                <small class="text-muted">Write only number of seconds (Eg: 30)</small>
                            </div>
                        </div>

                        <!-- Video Section -->
                        <div id="videoType" style="display: none;">
                            <div class="form-group">
                                <label>Select Video File</label>
                                <input type="file" class="form-control" id="videoFile" name="video" accept="video/*">
                            </div>
                        </div>

                        <!-- Currency Section -->
                        <div id="currencyType" style="display: none;">
                            <div class="form-group">
                                <label>Duration</label>
                                <input type="number" class="form-control" name="currencyDuration" min="1">
                                <small class="text-muted">Write only number of seconds (Eg: 30)</small>
                            </div>
                        </div>

                        <!-- Profit Section -->
                        <div id="profitType" style="display: none;">
                            <div class="form-group">
                                <label>Duration</label>
                                <input type="number" class="form-control" name="profitDuration" min="1">
                                <small class="text-muted">Write only number of seconds (Eg: 30)</small>
                            </div>
                        </div>

                        <button class="btn btn-success btn-sm w-100" type="submit">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('type');
            const imageTypeDiv = document.getElementById('imageType');
            const videoTypeDiv = document.getElementById('videoType');
            const currencyTypeDiv = document.getElementById('currencyType');
            const profitTypeDiv = document.getElementById('profitType');
            const imageFileInput = document.getElementById('imageFile');
            const videoFileInput = document.getElementById('videoFile');

            // Hide or show sections based on selected type
            typeSelect.addEventListener('change', function() {
                const selectedType = this.value;

                // Hide all sections initially
                imageTypeDiv.style.display = 'none';
                videoTypeDiv.style.display = 'none';
                currencyTypeDiv.style.display = 'none';
                profitTypeDiv.style.display = 'none';

                // Clear file inputs
                imageFileInput.value = '';
                videoFileInput.value = '';

                // Show the correct section based on the selected type
                if (selectedType === 'image') {
                    imageTypeDiv.style.display = 'block';
                } else if (selectedType === 'video') {
                    videoTypeDiv.style.display = 'block';
                } else if (selectedType === 'currency') {
                    currencyTypeDiv.style.display = 'block';
                }else if (selectedType === 'profit') {
                    profitTypeDiv.style.display = 'block';
                }
            });
        });
    </script>
@endsection
