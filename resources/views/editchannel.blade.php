@extends('layouts.app')

@section('content')


<section class="scrollable padder">
    <div class="m-b-md">
                <h3 class="m-b-none">Add Channel <i class="icon-playlist icon text-warning"></i></h3>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Basic info</header>
                    <div class="panel-body">
                      <form role="form" action="{{route('savechannel')}}" method="post">
                        @csrf
                            @include('includes/msgs')
                            @include('includes/channel-form')

                        <button type="submit" class="btn btn-block btn-default rounded">Submit</button>
                      </form>
                    </div>
                  </section>
                </div>
                <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold"><i class="icon icon-info"></i> Help </header>
                    <div class="panel-body">
                        <ul>
                            <li>Specify a name for your channel. This will is what be used to generate your stream.</li>
                            <li>You may add a description as well.</li>
                            <li>Select Private to make Channel private to you only.</li>
                            <li>You may add a description as well.</li>
                            <li>Channel details can be edited at anytime except generated stream url.</li>
                            <li>Save when done to proceed to add media.</li>
                        </ul>
                    </div>
                  </section>
                </div>
            </div>
</section>
@endsection
