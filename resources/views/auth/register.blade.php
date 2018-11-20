@extends('users.layouts.app')

@section('content')
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
<div class="container">
    <div class="row justify-content-center" style="min-height: 300px">
        <div class="col-md-8">
            
            <div class="card m-3">
                <div class="card-header"><h4><center>You will register as </center></h4></div>
                   
                        <input type="hidden" value="merchant" name="role"/>
                            <div id="merchant-page">
                                <merchant-page/>
                            </div>  
                    
                    
                        <input type="hidden" value="customer" name="role"/>
                            <div id="customer-page">
                                <customer-page/>
                            </div> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
