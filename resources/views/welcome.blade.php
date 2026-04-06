@extends('layouts.main')
 <style>
  .dash1{
    background: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    padding: 2px;
    height: 200px;
    border-radius: 6px;
    box-shadow: 1px  1px 1px 1px #8080804e;
  }
  .dash2{
    display: flex;
    flex-direction: column;
    gap: 6px;
    align-items: center;
  }
 </style>
 
@section('content')
  <div class="container mt-5">
    <div class="row d-flex justify-content-between">
        <div class="col dash1" >
          
          <h4 class="text-warning font-bold">Active Projects</h4>
          <div class="container dash2">
            <i i class="bi bi-list-task" style="font-size: 1.5rem"></i>
            <p class="font-bold" style="font-size: 1.5rem">4</p>
          </div>

        </div>
        <div class="col mx-1 dash1 ">
          <h4 class="text-warning font-bold">Completed Projects</h4>
          <div class="container dash2">
            <i class="bi bi-list-check" style="font-size: 1.5rem"></i>
            <p class="font-bold" style="font-size: 1.5rem">4</p>
          </div>
        </div>
        <div class="col dash1">
          <h4 class="text-warning font-bold">Outstanding invoices</h4>
          <div class="container dash2">
            <i class="bi bi-receipt-cutoff" style="font-size: 1.5rem"></i>
            <p class="font-bold" style="font-size: 1.5rem">4</p>
          </div>
        </div>
    </div>

    <div class="row d-flex justify-content-between mt-4">
        <div class="col dash1" >
          <h4>Total monthly revenue</h4>
        </div>
        <div class="col mx-1 dash1">
          <h4>	Total outstanding payments</h4>
        </div>
        <div class="col dash1">
          <h4>	Estimated profit per job</h4>
        </div>
    </div>

    <div class="row d-flex justify-content-between mt-4">
        <div class="col dash1" >

        </div>
        <div class="col mx-1 dash1">

        </div>
        <div class="col dash1">

        </div>
    </div>
  </div>
@endsection
 
