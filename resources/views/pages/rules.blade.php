@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1>This site has rules</h1>
                <div>
                    <a class="btn btn-primary" href="{{route('link.create')}}">Create link</a>
                </div>
            </div>

            <div class="card-body">
                <p>This site has rules to keep things going like they should and keep the site usefull for everybody.</p>
                <ol>
                    {{--<li>Posting is allowed after you have given your feedback (voting on links) 5 times</li>--}}
                    <li>Voting is allowed after you have made at least 5 posts.</li>
                </ol>
            </div>


        </div>
    </div>
@endsection
