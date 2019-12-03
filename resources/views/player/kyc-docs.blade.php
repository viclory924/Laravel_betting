@extends('layouts.2.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
            	
                <h1>KYC Docs</h1>
                @if(Session::has('sucess_message'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ Session::get('sucess_message') }}</em></div>
                @endif
                @if(Session::has('error_message'))
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><em> {{ Session::get('error_message') }}</em></div>
                @endif
                 <form enctype= "multipart/form-data" action="{{ route('uploadkycDocs') }}" method="post">
				  <div class="form-group">
				    <label for="email">Upload Doc:</label>
				    {{csrf_field()}}
				    <input type="file" required name="file" class="form-control" id="email">
				  </div>
				  
				  <button type="submit" class="btn btn-success">Submit</button>
				</form> 
            </div>
        </div>
    </section>
@endsection