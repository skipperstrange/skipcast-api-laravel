@extends('layouts.app')

@section('content')

<section class="scrollable padder">
    <div class="m-b-md">
                <h3 class="m-b-none">Add Songs <i class="icon-music-tone-alt icon text-warning-lter"></i></h3>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Please select your songs to be uploded</header>
                    <div class="panel-body">
                    @include('includes.media-form')
                </div>
                </section>
                </div>
                <div class="col-sm-4">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold"><i class="icon icon-info"></i> Help </header>
                    <div class="panel-body">
                        <ul>
                            <li>Select "Add Files" to browse for media files.</li>
                            <li>You may select multiple files to be uploaded.</li>
                            <li>Drag and drop is also supported.</li>
                            <li>Only mp3 files can be uploaded.</li>
                        </ul>
                    </div>
                  </section>
                </div>
            </div>




             <!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>

</section>

@endsection

@include('includes.upload-scripts')
