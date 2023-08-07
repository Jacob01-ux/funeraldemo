
(function($) {
  'use strict';
  $(function() {
  $(".nav-settings").on("click", function() {
    $("#right-sidebar").toggleClass("open");
  });
  $(".settings-close").on("click", function() {
    $("#right-sidebar,#theme-settings").removeClass("open");
  });
  
  $("#settings-trigger").on("click" , function(){
    $("#theme-settings").toggleClass("open");
  });
  
  
  //background constants
  var navbar_classes = "navbar-danger navbar-success navbar-warning navbar-dark navbar-light navbar-primary navbar-info navbar-pink";
  var sidebar_classes = "sidebar-light sidebar-dark";
  var $body = $("body");
  
  //sidebar backgrounds
  $("#sidebar-light-theme").on("click" , function(){
    $body.removeClass(sidebar_classes);
    $body.addClass("sidebar-light");
    $(".sidebar-bg-options").removeClass("selected");
    $(this).addClass("selected");
  });
  $("#sidebar-dark-theme").on("click" , function(){
    $body.removeClass(sidebar_classes);
    $body.addClass("sidebar-dark");
    $(".sidebar-bg-options").removeClass("selected");
    $(this).addClass("selected");
  });
  
  
  //Navbar Backgrounds
  $(".tiles.primary").on("click" , function(){
    $(".navbar").removeClass(navbar_classes);
    $(".navbar").addClass("navbar-primary");
    $(".tiles").removeClass("selected");
    $(this).addClass("selected");
  });
  $(".tiles.success").on("click" , function(){
    $(".navbar").removeClass(navbar_classes);
    $(".navbar").addClass("navbar-success");
    $(".tiles").removeClass("selected");
    $(this).addClass("selected");
  });
  $(".tiles.warning").on("click" , function(){
    $(".navbar").removeClass(navbar_classes);
    $(".navbar").addClass("navbar-warning");
    $(".tiles").removeClass("selected");
    $(this).addClass("selected");
  });
  $(".tiles.danger").on("click" , function(){
    $(".navbar").removeClass(navbar_classes);
    $(".navbar").addClass("navbar-danger");
    $(".tiles").removeClass("selected");
    $(this).addClass("selected");
  });
  $(".tiles.light").on("click" , function(){
    $(".navbar").removeClass(navbar_classes);
    $(".navbar").addClass("navbar-light");
    $(".tiles").removeClass("selected");
    $(this).addClass("selected");
  });
  $(".tiles.info").on("click" , function(){
    $(".navbar").removeClass(navbar_classes);
    $(".navbar").addClass("navbar-info");
    $(".tiles").removeClass("selected");
    $(this).addClass("selected");
  });
  $(".tiles.dark").on("click" , function(){
    $(".navbar").removeClass(navbar_classes);
    $(".navbar").addClass("navbar-dark");
    $(".tiles").removeClass("selected");
    $(this).addClass("selected");
  });
  $(".tiles.default").on("click" , function(){
    $(".navbar").removeClass(navbar_classes);
    $(".tiles").removeClass("selected");
    $(this).addClass("selected");
  });
  });
  })(jQuery);
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
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
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


  

  function select_opt(){
    if(document.getElementById("snd_opt").value == "single"){
      document.getElementById("e_mail").style.display = "block"; 
      document.getElementById("filt").disabled = true;
    }else{
      document.getElementById("e_mail").style.display = "none";
      document.getElementById("filt").disabled = false; 
    }
  }
  document.querySelector('#m_status').addEventListener('change', function(){
    var msg = "";
    const display = document.getElementById('err_msg');
    if(document.getElementById("m_status").value == "Married" || document.getElementById("m_status").value == "Partner"){
      msg = "Please fill details of your spouse or partner bellow";
      display.innerHTML = msg;
      $('#validator_msg').modal("show");
      document.getElementById("spouse").style.display = "block";
    }
    if(document.getElementById("m_status").value == "Divorced" || document.getElementById("m_status").value == "Single"){
      document.getElementById("spouse").style.display = "none";
    }
  })
  
  function get_0(){
    
    if(document.getElementById("ext_members").value != ""){
      document.getElementById("Ex_m").style.display = "block";
      
      document.getElementById("product_add_ben").value;
    }else {
      document.getElementById("Ex_m").style.display = "none";
    }
  }
  function get_1(){
    
    if(document.getElementById("Dep_covered").value != ""){
      document.getElementById("d_m").style.display = "block";
    }else {
      document.getElementById("d_m").style.display = "none";
    }
  }
  function get_2(){
    
    if(document.getElementById("product_add_ben").value != ""){
      document.getElementById("p_ben").style.display = "block";
    }else {
      document.getElementById("p_ben").style.display = "none";
    }
  }
  function valueee(){
    document.getElementById("policy_no").value = document.getElementById("policy_no1").value;
  }
  function remove_files() {
    $('#exampleModal').modal("hide");
    $.ajax({
      url:'doc-del.php',
      type:'post',
      data:{admin:$('#admin').val()
          },
      success:function(response){
          //$('#ad_member_ad').html(response);
          //alert("iyafika")
          window.location.replace("upload.php");
      }
  });
  }
  
  