@extends('template.config')
@section('content')


<div class="container-fluid">
     <br>
     <br>
     <br>
    <div class="row maze-container">
         
        <div class="col-md-12 text-center">
            <h2>Test Backend NusanTech</h2>
            <br>
            <div class="col-md-6 mx-auto">
                <form id="form-input">
                    <div class="form-group">
                         <input type="number" name="bilangan" id="bilangan" value="15" class="form-control" placeholder="Input" readonly/>
                         <span class="text-danger">Silahkan langsung klik submit</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" id="btn-input">Submit</button>
                    </div>
                </form>
            </div>
            <br>
                
            <div id="hasil">
                
            </div>
        </div>
    </div>
</div>


@endsection