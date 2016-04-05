
   $(document).ready(function () {
    $("[type=checkbox]").change(function () {
     // $('#autohideid').fadeToggle();
        
        $('#agency-add_house_no').val( $('#agency-mail_house_no').val() );
        $('#agency-add_street_address').val( $('#agency-mail_street_address').val() );
        $('#agency-add_p_office').val( $('#agency-mail_p_office').val() );
        $('#agency-add_country_id').val( $('#agency-mail_country_id').val() );
        $('#agency-add_state_id').val( $('#agency-mail_state_id').val() );
        $('#agency-add_district_id').val( $('#agency-mail_district_id').val() );
        $('#agency-add_pincode').val( $('#agency-mail_pincode').val() );
    });
    //agency-agency_type
     $('#agency-agency_type').on('change', function() {
      if ( this.value == 'Combined')
      //.....................^.......
      {
        $("#agencytypeshow").show();
      }
      else
      {
        $("#agencytypeshow").hide();
      }
    });
   //Delivery method detail
   //agency-agency_type
     $('#agency-route_id').on('change', function() {
      if ( this.value == '5')
      //.....................^.......
      {

        $("#deliveryrail").show();
        $("#agency-source").prop('required',true);
        $("#agency-train_no").prop('required', true);
        $("#agency-train_name").prop('required',true);

      }
      else
      {
        $("#deliveryrail").hide();
      }
    });  
     //slected in rail method in edit mode

     if($('#agency-route_id').val()=='5'){
         $("#deliveryrail").show();
     }else{
            $("#deliveryrail").hide();
       // console.log($('#agency-route_id').val());
     }
     if($('#agency-agency_type').val()=='Combined'){
          $("#agencytypeshow").show();
     }else{
            $("#agencytypeshow").hide();
       // console.log($('#agency-route_id').val());
     }

    // if($("#agency-route_id option[value='Rail']")){
    //     console.log('YES');
    //      $("#deliveryrail").hide();
    //   }
    // else{
    //     console.log('No');
    // }

  


});