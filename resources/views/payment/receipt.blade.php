    <?php 
    $regno = $member->reg_no ;
    $date = Qudratom\Utilities\DateTime::clientDate( $member->payment_date ) ;
    $name = $member->name ;
    $address = $member->address ;
    $phone = $member->mobile ;
    $dob = Qudratom\Utilities\DateTime::clientDate( $member->dob ) ;
    $age = Qudratom\Utilities\Helper::ageAsOf($member->dob) ;
    $language = $member->language ;
    
    $left = 0 ;
    $top  = 0 ;

    ?>

<style>
    .fiat-receipt
    {
        font-family: courier new;
        font-size: 13px;
        font-weight: bold;
        width: 100%;
        float: left;
        height: 100%;
        position: relative;
        background: url('{{ asset('public/assets/images/receiptbg.jpg') }}') no-repeat ;
    }
    .fitem-regno, .fitem-date, .fitem-name, .fitem-address, .fitem-phone, .fitem-dob, .fitem-age, .fitem-language {
        position: absolute;
    }
    .fitem-date{
        left : <?php echo $left + 450; ?>px ;
        top: <?php echo $top + 70; ?>px ;
    }
    .fitem-regno{
        left : <?php echo $left + 32; ?>px ;
        top: <?php echo $top + 57; ?>px ;
        width: 100px;
        text-align: center;
    
    }
    .fitem-name{
        left : <?php echo $left + 80; ?>px ;
        top: <?php echo $top + 105; ?>px ;
    }
    .fitem-address{
        left : <?php echo $left + 20; ?>px ;
        top: <?php echo $top + 131; ?>px ;
        text-indent: 75px;
        width: 500px;
        line-height: 31px;
    }
    .fitem-phone{
        left : <?php echo $left + 335; ?>px ;
        top: <?php echo $top + 200; ?>px ;
    }
    
    .fitem-dob{
        left : <?php echo $left + 65; ?>px ;
        top: <?php echo $top + 232; ?>px ;
    }
    .fitem-age{
        left : <?php echo $left + 248; ?>px ;
        top: <?php echo $top + 232; ?>px ;
    }
    .fitem-language{
        left : <?php echo $left + 390; ?>px ;
        top: <?php echo $top + 232; ?>px ;
    }
</style>
<div class="fiat-receipt">
    <span class="fitem-regno">{{ $regno }}</span>
    <span class="fitem-date">{{ $date }}</span>
    <span class="fitem-name">{{ $name }}</span>
    <span class="fitem-address">{{ $address }}</span>
    <span class="fitem-phone">{{ $phone }}</span>
    <span class="fitem-dob">{{ $dob }}</span>
    <span class="fitem-age">{{ $age}}</span>
    <span class="fitem-language">{{ $language }}</span>
</div>