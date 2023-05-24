
@extends('admin.layouts.master')
@section('title', 'Setting - Admin')
@section('maincontent')
<?php
$data['heading'] = 'Setting';
$data['title'] = 'Setting';
?>
@include('admin.layouts.topbar',$data)
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header">
          <h5 class="card-title">{{ __('Add Setting') }}</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <form action="{{ route('googlemeet.updatefile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <div class="eyeCy">
                    <label>Choose Json File (clientsecret.json):</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input type="file"  name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div>
                    
                    
                    
                  </div>
                </div>
    
                @php
    
                $auth_email = Auth::user()->email;
    
                $path = 'files/googlemeet'.'/'.$auth_email;
    
               
    
                @endphp
    
                <div class="form-group">
                 
                    <label>My Credentials:</label>
                
                    @if(file_exists(public_path().'/'.$path.'/'.'client_secret.json'))
                 
    
                    <a href="{{ asset('files/googlemeet'.'/'.$auth_email.'/'.'client_secret.json') }}" download="client_secret.json" class="btn btn-info-rgba" style="width:100%"><i class="fa fa-download"></i> Download</a>
    
                    <br>
                    <br>
                  @else
                    <div class="btn btn-primary" style="width:100%">
                      {{ __('No File Found') }}
                      
                    </div>
                  @endif
                </div>
                
    
    
                <div class="form-group">
                  <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> {{ __("Reset")}}</button>
                  <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                  {{ __("Update")}}</button>
                </div>
    
              </form>
            </div>
    
            <div class="col-md-6">
              <h4 style="color: black"><i class="fa fa-question-circle"></i> How to get Google Meet clientsecret.json file : </h4>
              <hr>
              <div class="panel panel-default">
                <div class="panel-body">
                  <ul>
                    <li> Use the link to create or select a project in the google developers console and automatically turn on the APi. Click continue then <b>go to credential</b>. : <a href="https://console.cloud.google.com/flows/enableapi?apiid=calendar" target="_blank">Google Cloud Platform</a></li>
                     <li>On the <b>Add credentials to your project</b> click the <b>Cancel</b> button.</li>
                     <li>At the top of the page, select the <b>Oauth consent screen</b>tab. Select an <b>Email Address</b>, Enter product name if not already set and click the <b>Save</b> button.</li>
                     <li>Select the <b>Credentials</b> tab, click the <b>Create Credentials</b> button and select <b>Oauth client id</b>.</li>
    
                     <li>Use this URL as Redirect URL <b>{{ url('oauth') }}</b> </li>
    
                     <li>Select the application type <b>Other</b>, enter the name 'googlemeet'. and click the <b>Create</b> button.</li>
                     
    
                     <li>Click <b>Ok</b> to dismiss the resulting dialog.</li>
                     <li>Click the <b>download json</b> button to the right of the client id.</li>
                     <li>Upload your <b>(Downloaded json)</b>file.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 @endsection
 @section('script')
  <script>
     $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
      });

    
  </script>
@endsection


