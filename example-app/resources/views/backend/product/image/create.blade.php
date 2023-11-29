@extends('backend.header')
@section('content')
    <div class="mt-3"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add image</h3>

                    </div>
                    <form action="{{ route('product.image.store', [$product->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" id="cardBody">
                            <div class="form-group">
                                <label>File image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="images[]" accept="image/png, image/jpg, image/jpeg"
                                            multiple>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Create new Project" class="btn btn-success float-right">
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-2">
                            <button id="addFileInput" class="btn btn-primary">Thêm File Input</button>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addFileInput').click(function() {
                var newFormGroup = `

                <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="images[]" multiple>
                                    </div>
                                </div>
                            </div>
            `;
                $('#cardBody').append(newFormGroup);
            });
        });
    </script>
    <!-- /.content -->
@endsection
