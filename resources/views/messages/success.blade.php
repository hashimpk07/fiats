@extends('layouts.fiats.user')

@section('content')

    <div class="main-content center-block" style="text-align: center">

    <!-- You only need this form and the form-basic.css -->

<div class="form-admin">

    <div class="form_thank_you">
        <h1>Thank You </h1>
        <h3>Transaction Completed</h3>
        <?php if( $ref_no ) { ?>
        <h6>Ref ID : <?php echo $ref_no;?></h6>
        <?php } ?>
    </div>
    <div class="fiat-button2">
        <a href="{{ url() }}">
            <input type="button"   onclick="window.location='{{ url("person") }}'" class="btn btn-primary button" value="Back To Home">
        </a>

    </div>
</div>

</div>

    @endsection