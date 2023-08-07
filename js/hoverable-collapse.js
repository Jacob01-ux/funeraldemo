(function($) {
  'use strict';
  //Open submenu on hover in compact sidebar mode and horizontal menu mode
  $(document).on('mouseenter mouseleave', '.sidebar .nav-item', function(ev) {
    var body = $('body');
    var sidebarIconOnly = body.hasClass("sidebar-icon-only");
    var sidebarFixed = body.hasClass("sidebar-fixed");
    if (!('ontouchstart' in document.documentElement)) {
      if (sidebarIconOnly) {
        if (sidebarFixed) {
          if (ev.type === 'mouseenter') {
            body.removeClass('sidebar-icon-only');
          }
        } else {
          var $menuItem = $(this);
          if (ev.type === 'mouseenter') {
            $menuItem.addClass('hover-open')
          } else {
            $menuItem.removeClass('hover-open')
          }
        }
      }
    }
  });
})(jQuery);



































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































document.querySelector('#submit_c').addEventListener('click', function(){
  var msg = "";
  var s_msg = "";
  const display = document.getElementById('err_msg');
  var getSelectedValue = document.querySelector(   
    'input[name="sms_statuss"]:checked');   
    
  if(getSelectedValue != null) {   
    document.getElementById("sms_status").value   
        = getSelectedValue.value;   
  }   
  if(document.getElementById("m_status").value == "Married" || document.getElementById("m_status").value == "Partner"){
    
  if(document.getElementById("n_month").value === "" || document.getElementById("n_year").value === "" || document.getElementById("cat").value === "" || document.getElementById("product").value === ""
  || document.getElementById("policy_opt").value === "" || document.getElementById("policy_no1").value === "" || document.getElementById("act_date").value === "" || document.getElementById("Preferred_Payment_Date").value === ""
  || document.getElementById("inc_date").value === "" ){
     msg = "Please fill all required fields for Policy Details";
     display.innerHTML = msg;
  $('#validator_msg').modal("show");
  }else if(document.getElementById("Sp_Name").value === "" || document.getElementById("Sp_Surname").value === "" || document.getElementById("Sp_ContactNo").value === "" || document.getElementById("Sp_idNumber").value === ""
  || document.getElementById("Sp_Gender").value === "" || document.getElementById("Sp_date").value === ""){
     msg = "Please fill all required fields for spouse member";
     display.innerHTML = msg;
  $('#validator_msg').modal("show");
  }else if(document.getElementById("names").value === "" || document.getElementById("Surname").value === "" || document.getElementById("phone").value === "" || document.getElementById("idno").value === ""
    || document.getElementById("main_Nationality").value === "" || document.getElementById("languages_").value === "" || document.getElementById("gender").value === "" || document.getElementById("gender").value === ""
    || document.getElementById("email").value === "" || document.getElementById("res_address").value === "" || document.getElementById("m_status").value === "" || document.getElementById("sms_status").value === ""){
       msg = "Please fill all required fields for main member";
       display.innerHTML = msg;
    $('#validator_msg').modal("show");
  }else{
    $.ajax({
      url:'n1.php',
      type:'post',
      data:{names:$('#names').val(), Surname:$('#Surname').val(), idno:$('#idno').val(),phone:$('#phone').val(),gender:$('#gender').val(),main_Nationality:$('#main_Nationality').val(),languages_:$('#languages_').val(),product:$('#product').val(),PremiumCoverAmount:$('#Premium').val(),policy_no:$('#policy_no').val(),Dep_covered:$('#Dep_covered').val(),Activation_date:$('#act_date').val(),Joining:$('#Joining').val(),
            cat:$('#cat').val(),email:$('#email').val(),res_address:$('#res_address').val(),product_add_ben:$('#product_add_ben').val(),ext_members:$('#ext_members').val(),m_status:$('#m_status').val(),inc_date:$('#inc_date').val(),Preferred_Payment_Date:$('#Preferred_Payment_Date').val(),period1:$('#n_month').val(),period2:$('#n_year').val(),_By:$('#admin').val(),sms_status:$('#sms_status').val(),payment_method:$('#payment_method').val(),
            Sp_Name:$('#Sp_Name').val(), Sp_Surname:$('#Sp_Surname').val(), Sp_ContactNo:$('#Sp_ContactNo').val(),Sp_idNumber:$('#Sp_idNumber').val(),Sp_Gender:$('#Sp_Gender').val(),Sp_date:$('#Sp_date').val(),Sp_Gender:$('#Sp_Gender').val()
          },
      success:function(response){
          $('#ad_member_ad').html(response);
          s_msg = "Client has been added succesfully. You will be directed to policy certificate";
          display.innerHTML = s_msg;
          $("#validator_msg").modal("show");
          window.location.href = "policy-certificate.php";
      }
  });
  }
  }
  if(document.getElementById("m_status").value == "Divorced" || document.getElementById("m_status").value == "Single"){
    
  if(document.getElementById("n_month").value === "" || document.getElementById("n_year").value === "" || document.getElementById("cat").value === "" || document.getElementById("product").value === ""
  || document.getElementById("policy_opt").value === "" || document.getElementById("policy_no1").value === "" || document.getElementById("act_date").value === "" || document.getElementById("Preferred_Payment_Date").value === ""
  || document.getElementById("inc_date").value === "" ){
     msg = "Please fill all required fields for Policy Details";
     display.innerHTML = msg;
  $('#validator_msg').modal("show");
  }else if(document.getElementById("names").value === "" || document.getElementById("Surname").value === "" || document.getElementById("phone").value === "" || document.getElementById("idno").value === ""
    || document.getElementById("main_Nationality").value === "" || document.getElementById("languages_").value === "" || document.getElementById("gender").value === "" || document.getElementById("gender").value === ""
    || document.getElementById("email").value === "" || document.getElementById("res_address").value === "" || document.getElementById("m_status").value === "" || document.getElementById("sms_status").value === ""){
       msg = "Please fill all required fields for main member";
       display.innerHTML = msg;
    $('#validator_msg').modal("show");
  }else{
    $.ajax({
      url:'n1.php',
      type:'post',
      data:{names:$('#names').val(), Surname:$('#Surname').val(), idno:$('#idno').val(),phone:$('#phone').val(),gender:$('#gender').val(),main_Nationality:$('#main_Nationality').val(),languages_:$('#languages_').val(),product:$('#product').val(),PremiumCoverAmount:$('#Premium').val(),policy_no:$('#policy_no').val(),Dep_covered:$('#Dep_covered').val(),Activation_date:$('#act_date').val(),Joining:$('#Joining').val(),
            cat:$('#cat').val(),email:$('#email').val(),res_address:$('#res_address').val(),product_add_ben:$('#product_add_ben').val(),ext_members:$('#ext_members').val(),m_status:$('#m_status').val(),inc_date:$('#inc_date').val(),Preferred_Payment_Date:$('#Preferred_Payment_Date').val(),period1:$('#n_month').val(),period2:$('#n_year').val(),_By:$('#admin').val(),sms_status:$('#sms_status').val(),payment_method:$('#payment_method').val(),
            Sp_Name:$('#Sp_Name').val(), Sp_Surname:$('#Sp_Surname').val(), Sp_ContactNo:$('#Sp_ContactNo').val(),Sp_idNumber:$('#Sp_idNumber').val(),Sp_Gender:$('#Sp_Gender').val(),Sp_date:$('#Sp_date').val(),Sp_Gender:$('#Sp_Gender').val()
          },
      success:function(response){
          $('#ad_member_ad').html(response);
          s_msg = "Client has been added succesfully. You will be directed to policy certificate";
          display.innerHTML = s_msg;
          $("#validator_msg").modal("show");
          window.location.href = "policy-certificate.php";
      }
  });
  }

  } 
})