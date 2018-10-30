@extends('layouts.admin-layout')

@section('content')
    @auth
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3>Edit Footer</h3>
                </div>
                <div class="card-body">
                    <form id="edit-footer-form" method="post" action="">
                        @csrf
                        <div class="row">

                            <input type="hidden" name="post_id" value="">

                            <div class="col-md-3">
                                <h3>Column Nr 1</h3>
                                <br>
                                <textarea class="textarea_example" name="footer_column_one"></textarea>
                            </div>

                            <div class="col-md-3">
                                <h3>Column Nr 2</h3>
                                <br>
                                <textarea class="textarea_example" name="footer_column_two"></textarea>
                            </div>

                            <div class="col-md-6">
                                <h3>Column Nr 3</h3>
                                <br>
                                <textarea class="textarea_example" name="footer_column_three"></textarea>
                            </div>

                            <input id="edit-footer-button" class="primary-button" type="submit" value="Update">
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
    @endauth
@endsection

